<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Brand;
use App\Models\Products;
use App\Models\MainCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
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
            return view('products.product-list');
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
        //
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
    public function edit(Products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Products $products)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $products)
    {
        //
    }
}
