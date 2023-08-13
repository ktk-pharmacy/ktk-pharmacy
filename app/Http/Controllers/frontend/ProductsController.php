<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;
use App\Models\Brand;
use App\Models\Products;
use App\Models\SubCategory;
use App\Models\MainCategory;
use App\Traits\GenerateSlug;
use Illuminate\Http\Request;
use App\Exports\ProductsExport;
use App\Imports\ProductsImport;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ProductsController extends Controller
{
    use GenerateSlug;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /* Front End */
    /** Product Category*/
    // public function categories()
    // {
    //     try{
    //         return view('frontend.categories');
    //     }
    //     catch(\Exception $ex){
    //         return response()->json([
    //             'message' => 'Something Went Wrong ProductsController.index',
    //             'error' => $ex->getMessage()
    //         ],400);
    //     }
    // }
    /**Product List*/
    public function products(SubCategory $sub_category)
    {
        try {
            $products = Products::publish()
                ->with('brand', 'sub_category')
                ->where('sub_category_id', $sub_category->id)
                ->paginate(12);
            $sub_ctgs = SubCategory::all();
            return view('frontend.product-list', compact('products', 'sub_category', 'sub_ctgs'));
        } catch (\Exception $ex) {
            return response()->json([
                'message' => 'Something Went Wrong ProductsController.products',
                'error' => $ex->getMessage()
            ], 400);
        }
    }

    public function product_detail($slug)
    {
        try {
            $product = Products::publish()
                ->with('sub_category')
                ->where('slug', $slug)
                ->first();
            // $category = SubCategory::with('products')->findOrFail($product->sub_category_id);
            $top_related_products = $product->limit(config('custom_value.related_product_limit'))->active()->get()->except($product->id);
            return view('frontend.product-details', compact('product', 'top_related_products'));
        } catch (\Exception $ex) {
            return response()->json([
                'message' => 'Something Went Wrong ProductsController.product_detail',
                'error' => $ex->getMessage()
            ], 400);
        }
    }
    /* End Front End */
    // admin panel
    public function product_list()
    {
        try {
            // $products = Products::publish()->with('brand', 'sub_category')->latest()->get();
            return view('products.product-list');
        } catch (\Exception $ex) {
            return response()->json([
                'message' => 'Something Went Wrong ProductsController.product_list',
                'error' => $ex->getMessage()
            ], 400);
        }
    }

    public function ssd(Request $request)
    {

        $products = Products::publish()->with('brand', 'sub_category');
        return DataTables::of($products)
            ->filterColumn('category',function($q,$key){
                $q->whereHas('sub_category', function($q) use($key){
                    $q->where('name','like', "%$key%");
                });
            })
            ->filterColumn('category_mm',function($q,$key){
                $q->whereHas('sub_category', function($q) use($key){
                    $q->where('name_mm','like', "%$key%");
                });
            })
            ->addColumn('category',function($e){
               return $e->sub_category->name??"-";
            })
            ->addColumn('category_mm',function($e){
                return $e->sub_category->name_mm??"-";
             })
            ->addColumn('action',function($e){
                return productActionBtns($e->id);
            })
            ->editColumn('availability',function($e){
                return getAvaliableBadge($e->availability);
            })
            ->editColumn('status',function($e){
                return getStatusBadge($e->status);
            })
            ->editColumn('image_url',function($e){
                return '<img src="' . $e->image_url.'" alt="">';
            })
            ->editColumn('updated_at',function($e){
                return Carbon::parse($e->updated_at)->format('Y-m-d H:i A');
            })
            ->rawColumns(['availability','action','status','image_url'])
            ->make(true);

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::publish()->get();
        $main_categories = MainCategory::with('children')->publish()->get();
        return view('products.product.product-create', compact('brands', 'main_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'description' => 'required',
            'availability' => 'required'
        ]);
        $data = $this->helperProduct($request);
        $data['slug'] = $this->generateSlug($data['name'] ?? $request->name, 'products');

        Products::create($data);
        return to_route('product_list')->with('success', 'Successfully Created!');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Products $products)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(Products $product)
    {
        $brands = Brand::publish()->get();
        $main_categories = MainCategory::with('children')->publish()->get();
        return view('products.product.product-edit', compact('brands', 'main_categories', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Products $product)
    {
        // var_dump($request->product_code);
        // die();
        $request->validate([
            'name' => 'required',
            'product_code' => 'required',
            'category' => 'required',
            'description' => 'required',
            'availability' => 'required'
        ]);

        $data = $this->helperProduct($request);
        if ($product->name != $request->name ?? $data['name']) {
            $data['slug'] = $this->generateSlug($data['name'] ?? $request->name, 'products');
        }
        $product->update($data);
        return to_route('product_list')->with('success', 'Successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $product)
    {
        $product->update([
            'status' => false,
            'deleted_at' => now()
        ]);
    }

    public function export()
    {
        $products =  Products::all();
        return Excel::download(new ProductsExport($products), 'products.xlsx');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required'
        ]);
        Excel::import(new ProductsImport, $request->file);

        return redirect()->back()->with('success', 'Successfully imported!');
    }

    private function helperProduct($request)
    {
        $data['name'] = $request->name;
        $data['name_mm'] = $request->name_mm;
        $data['product_code'] = $request->product_code;
        $data['sub_category_id'] = $request->category;
        $data['brand_id'] = $request->brand_id;
        $data['description'] = $request->description;
        $data['packaging'] = $request->packaging;
        $data['MOU'] = $request->MOU;
        $data['discount_amount'] = $request->discount_amount;
        $data['discount_type'] = $request->discount_type;
        $data['availability'] = $request->availability == 1 ? true : false;
        $data['distributed_by'] = $request->distributed_by;
        $data['manufacturer'] = $request->manufacturer;
        $data['status'] = $request->status ? true : false;
        $data['product_details'] = $request->product_details;
        $data['other_information'] = $request->other_information;
        $data['price'] = $request->price;
        $data['sale_price'] = $request->sale_price;
        $data['stock'] = $request->stock; //quantity
        $data['is_new'] = $request->is_new ? true : false;

        if ($request->discount_amount) {
            $date = splitDateRange($request->discount_period);
            $data['discount_from'] = $date['from'];
            $data['discount_to'] = $date['to'];
        }

        if ($request->hasFile('image')) {
            $file_name = time() . '.' . $request->image->extension();
            $path = Products::UPLOAD_PATH . "/" . date("Y") . "/" . date("m") . "/";
            $data['image_url'] = $path . $file_name;
            $request->image->move(public_path($path), $file_name);
        } else {
            $data['image_url'] = "assets/images/ktk_icon.jpg";
        }
        return $data;
    }
}
