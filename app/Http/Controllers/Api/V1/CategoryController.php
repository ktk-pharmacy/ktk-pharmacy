<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Products;
use Illuminate\Http\Request;
use App\Models\CategoryGroup;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\SubCategory;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = CategoryGroup::with('main_categories.sub_categories')->active()->orderBy('sorting', 'asc')->get();
        return response()->success('Success!', 200, $categories);
    }


    public function getProductsByCategory(SubCategory $sub_category)
    {
        $products = Products::join('brands', 'products.brand_id', '=', 'brands.id')
            ->join(
                'sub_categories as sub_category',
                'products.sub_category_id',
                '=',
                'sub_category.id'
            )
            ->join(
                'main_categories as main_category',
                'sub_category.main_category_id',
                '=',
                'main_category.id'
            )
            ->join(
                'category_groups',
                'main_category.category_group_id',
                '=',
                'category_groups.id'
            )
            ->select(
                'products.id as product_id',
                'products.name',
                'products.name_mm',
                'products.description',
                'products.image_url',
                'products.manufacturer',
                'products.packaging',
                DB::raw('CASE WHEN availability = 1 then "Instock" ELSE "Outstock" END as availability'),
                'products.uom',
                'products.distributed_by',
                'products.manufacturer',
                'products.distributed_by',
                'products.product_details',
                'products.other_information',
            )->where('sub_category_id', $sub_category->id)->get();

        return response()->success('Success!', 200, $products);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
