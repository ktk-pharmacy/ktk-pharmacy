<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Traits\GenerateSlug;
use Illuminate\Http\Request;
use App\Models\CategoryGroup;
use App\Exports\CategoryGroupExport;
use Maatwebsite\Excel\Facades\Excel;

class CategoryGroupController extends Controller
{
    use GenerateSlug;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    public function category_group_list()
    {
        try{
            $category_groups = CategoryGroup::publish()->orderBy('sorting','asc')->get();
            return view('products.category-group.category-group-list',compact("category_groups"));
        }
        catch(\Exception $ex){
            return response()->json([
                'message' => 'Something Went Wrong CategoryGroupController.category_group_list',
                'error' => $ex->getMessage()
            ],400);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() : View
    {
        return view('products.category-group.category-group-create');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:100',
            'image' => 'required|mimes:jpg,jpeg,png,JPG,JPEG,PNG|max:1024',
            'sorting' => 'required'
        ]);
        $data = $this->helperCategoryGroup($request);
        $data['slug'] = $this->generateSlug($data['name'],'category_groups');

        $category_group = CategoryGroup::create($data);
        $category_group->media()->create($data['image']);

        return to_route('category_group_list')->with('success', 'Successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MainCategory  $mainCategory
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,CategoryGroup $category)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MainCategory  $mainCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,CategoryGroup $category): View
    {
        return view('products.category-group.category-group-edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MainCategory  $mainCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoryGroup $category)
    {
        $request->validate([
            'name'=>'required',
            'sorting'=>'required'
        ]);
        $data = $this->helperCategoryGroup($request);
        if ($request->name != $category->name) {
            $data['slug'] = $this->generateSlug($data['name'],'category_groups');
        }
        $category->update($data);
        if ($request->hasFile('image')) {
            $category->media->delete();
            $category->media()->create($data['image']);
        }
        return to_route('category_group_list')->with('success', 'Successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MainCategory  $mainCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryGroup $category)
    {
        $category->update([
            'status'=>false,
            'deleted_at' => now()
        ]);
    }

    public function export()
    {
        return Excel::download(new CategoryGroupExport, 'category.xlsx');
    }

    private function helperCategoryGroup($request)
    {
        $data['name'] = $request->name;
        $data['sorting'] = $request->sorting;
        $data['status'] = $request->status ? true : false;

        if ($request->hasFile('image')) {
            $file_name = time().'.'.$request->image->extension();
            $path = CategoryGroup::UPLOAD_PATH . "/" . date("Y") . "/" . date("m") . "/";
            $data['image'] = [
                'image_url' => $path . $file_name,
                'file_name' => $file_name,
                'file_path' => $path,
                'file_type' => $request->image->getClientOriginalExtension(),
                'file_size' => $request->image->getSize(),
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ];
            $request->image->move(public_path($path), $file_name);
        }

        return $data;
    }
}
