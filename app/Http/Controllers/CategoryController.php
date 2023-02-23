<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\MainCategory;

use App\Models\CategoryGroup;
use App\Models\SubCategory;
use App\Traits\GenerateSlug;

class CategoryController extends Controller
{
    use GenerateSlug;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            // dd("adfadf");
            $categorygroup = CategoryGroup::publish()->get();

            return view('frontend.categories',compact('categorygroup'));
        }
        catch(\Exception $ex){
            return response()->json([
                'message' => 'Something Went Wrong CategoryController.index',
                'error' => $ex->getMessage()
            ],400);
        }
    }

    public function category_list()
    {
        try{
            $main_categories = MainCategory::with('group','children')->publish()->latest()->get();
            return view('products.category-list',compact('main_categories'));
        }
        catch(\Exception $ex){
            return response()->json([
                'message' => 'Something Went Wrong CategoryController.category_list',
                'error' => $ex->getMessage()
            ],400);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($type)
    {
        if ($type == 'main-category') {
            $categories = getGroupCategories();
        } elseif ($type == 'sub-category') {
            $categories = MainCategory::with('group')->publish()->get();
        }
        return view('products.categories.category-create',compact('type','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$type)
    {
        $rules = [
            'name'=>'required',
            'category'=>'required'
        ];
        $request->validate($rules);
        $data = $this->helperCategory($request);

        if ($type == 'main-category') {
            $data['category_group_id'] = $request->category;
            $data['slug'] = $this->generateSlug($data['name'], 'main_categories');
            MainCategory::create($data);

        } elseif ($type == 'sub-category') {
            $data['main_category_id'] = $request->category;
            $data['slug'] = $this->generateSlug($data['name'], 'sub_categories');
            SubCategory::create($data);

        }
        return to_route('category_list')->with('success', 'Successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($slug,$type)
    {
        if ($type == 'main-category') {
            $category = MainCategory::where('slug',$slug)->first();
            $categories = getGroupCategories();
        } elseif ($type == 'sub-category') {
            $category = SubCategory::where('slug',$slug)->first();
            $categories = MainCategory::with('group')->publish()->get();
        }
        return view('products.categories.category-edit',compact('category','type','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug, $type)
    {
        $rules = [
            'name'=>'required',
            'category'=>'required'
        ];
        $request->validate($rules);
        $data = $this->helperCategory($request);

        if ($type == 'main-category') {
            $category = MainCategory::where('slug',$slug)->first();
            $data['category_group_id'] = $request->category;
            if ($category->name != $request->name) {
                $data['slug'] = $this->generateSlug($data['name'], 'main_categories');
            }
            $category->update($data);
        } elseif ($type == 'sub-category') {
            $category = SubCategory::where('slug',$slug)->first();
            $data['main_category_id'] = $request->category;
            if ($category->name != $request->name) {
                $data['slug'] = $this->generateSlug($data['name'], 'sub_categories');
            }
            $category->update($data);

        }
        return to_route('category_list')->with('success', 'Successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug, $type)
    {
        if ($type == 'main-category') {
            MainCategory::where('slug',$slug)->first()->update([
                'status'=>false,
                'deleted_at'=>now()
            ]);
        } elseif ($type == 'sub-category') {
            SubCategory::where('slug',$slug)->first()->update([
                'status'=>false,
                'deleted_at'=>now()
            ]);
        }
    }

    private function helperCategory($request)
    {
        $data['name'] = $request->name;
        $data['name_mm'] = $request->name_mm??Null;
        $data['status'] = $request->status ? true : false;

        if ($request->hasFile('image')) {
            $file_name = time().'.'.$request->image->extension();
            $path = CategoryGroup::UPLOAD_PATH . "/" . date("Y") . "/" . date("m") . "/";
            $data['image_url'] = $path . $file_name;
            $request->image->move(public_path($path), $file_name);
        }

        return $data;
    }
}
