<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Brand;
use App\Models\Products;
use App\Models\MainCategory;
use App\Traits\GenerateSlug;
use Illuminate\Http\Request;
use App\Exports\ProductsExport;
use App\Http\Controllers\Controller;
use App\Imports\ProductsImport;
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
    public function categories()
    {
        try{
            return view('frontend.categories');
        }
        catch(\Exception $ex){
            return response()->json([
                'message' => 'Something Went Wrong ProductsController.index',
                'error' => $ex->getMessage()
            ],400);
        }
    }
    /**Product List*/
    public function products()
    {
        try{
            return view('frontend.product-list');
        }
        catch(\Exception $ex){
            return response()->json([
                'message' => 'Something Went Wrong ProductsController.index',
                'error' => $ex->getMessage()
            ],400);
        }
    }

    public function product_detail()
    {
        try{
            return view('frontend.product-details');
        }
        catch(\Exception $ex){
            return response()->json([
                'message' => 'Something Went Wrong ProductsController.index',
                'error' => $ex->getMessage()
            ],400);
        }
    }
    /* End Front End */
    // admin panel
    public function product_list()
    {
        try{
            $products = Products::publish()->with('brand','sub_category')->latest()->get();
            return view('products.product-list',compact('products'));
        }
        catch(\Exception $ex){
            return response()->json([
                'message' => 'Something Went Wrong ProductsController.index',
                'error' => $ex->getMessage()
            ],400);
        }
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
        return view('products.product.product-create',compact('brands','main_categories'));
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
            'name'=>'required',
            'category'=>'required',
            'description'=>'required',
            'availability'=>'required'
        ]);
        $data = $this->helperProduct($request);
        $data['slug']=$this->generateSlug($data['name']??$request->name,'products');

        Products::create($data);
        return to_route('product_list')->with('success','Successfully Created!');
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
        return view('products.product.product-edit',compact('brands','main_categories','product'));
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
        $request->validate([
            'name'=>'required',
            'category'=>'required',
            'description'=>'required',
            'availability'=>'required'
        ]);
        $data = $this->helperProduct($request);
        if ($product->name != $request->name??$data['name']) {
            $data['slug']=$this->generateSlug($data['name']??$request->name,'products');
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
        $data['sub_category_id'] = $request->category;
        $data['brand_id'] = $request->brand_id;
        $data['description'] = $request->description;
        $data['packaging'] = $request->packaging;
        $data['MOU'] = $request->MOU;
        $data['availability'] = $request->availability==1?true:false;
        $data['distributed_by'] = $request->distributed_by;
        $data['manufacturer'] = $request->manufacturer;
        $data['status'] = $request->status ? true : false;
        $data['product_details'] = $request->product_details;
        $data['other_information'] = $request->other_information;
        if ($request->hasFile('image')) {
            $file_name = time().'.'.$request->image->extension();
            $path = Products::UPLOAD_PATH . "/" . date("Y") . "/" . date("m") . "/";
            $data['image_url'] = $path . $file_name;
            $request->image->move(public_path($path), $file_name);
        }
        return $data;
    }
}
