<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Products;
use App\Traits\GenerateSlug;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    use GenerateSlug;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function brand_list()
    {
        try {
            $brands = Brand::publish()->get();
            return view('products.brand-list', compact('brands'));
        } catch (\Exception $ex) {
            return response()->json([
                'message' => 'Something Went Wrong BrandController.brand_list',
                'error' => $ex->getMessage()
            ], 400);
        }
    }

    public function brand_products($slug)
    {
        try {
            $brand = Brand::active()->where('slug', $slug)->first();
            if ($slug == 'all') {
                $products = Products::active()->paginate(12);
            } else {
                $products = Products::active()->where('brand_id', $brand->id)->paginate(12);
            }
            return view('frontend.product-list', compact('products', 'brand'));
        } catch (\Exception $ex) {
            return response()->json([
                'message' => 'Something Went Wrong BrandController.brand_list',
                'error' => $ex->getMessage()
            ], 400);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.Modal.brandcreate');
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
            'name' => 'required|max:100',
            'image' => 'required'
        ]);

        $image = $this->fileUpload($request->image);
        Brand::create([
            'name' => $request->name,
            'slug' => $this->generateSlug($request->name, 'brands'),
            'status' => $request->status ? true : false,
            'image_url' => $image
        ]);
        return redirect()->back()->with('success', 'Successfully Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('products.Modal.brandedit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'name' => 'required|max:100'
        ]);
        if ($request->image) {
            $image = $this->fileUpload($request->image);
        }
        if ($request->name != $brand->name) {
            $slug = $this->generateSlug($request->name, 'brands');
        }
        $brand->update([
            'name' => $request->name,
            'slug' => $slug ?? $brand->slug,
            'image_url' => $image ?? $brand->image_url,
            'status' => $request->status ? true : false,
        ]);
        return redirect()->back()->with('success', 'Successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        if($brand->products->count() > 0){
            return response()->json([
                'message' => 'This brand has products. Can not delete.'
            ], 422);
        }

        $brand->update([
            'status' => false,
            'deleted_at' => now()
        ]);
    }

    private function fileUpload($image)
    {
        $file_name = time() . '.' . $image->extension();
        $path = Brand::UPLOAD_PATH . "/" . date("Y") . "/" . date("m") . "/";
        $image->move(public_path($path), $file_name);
        return $path . $file_name;
    }
}
