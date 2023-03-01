<?php

namespace App\Http\Controllers;

use App\Models\ContentType;
use App\Traits\GenerateSlug;
use Illuminate\Http\Request;

class ContentTypeController extends Controller
{
    use GenerateSlug;
    public function content_type_list()
    {
        try {
            $content_types = ContentType::publish()->with('blogs')->get();
            return view('contents.contentType.content-type-list', compact('content_types'));
        } catch (\Exception $ex) {
            return response()->json([
                'message' => 'Something Went Wrong CategoryController.index',
                'error' => $ex->getMessage()
            ], 400);
        }
    }

    public function content_type_form()
    {
        return view('contents.contentType.content-type-form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100'
        ]);
        ContentType::create([
            'name' => $request->name,
            'name_mm' => $request->name_mm,
            'slug' => $this->generateSlug($request->name, 'content_types'),
            'deleted_at' => Null
        ]);
        return redirect()->back()->with('success', 'Successfully created!');
    }

    public function update(Request $request, ContentType $content_type)
    {
        $request->validate([
            'name' => 'required|max:100'
        ]);
        $content_type->name == $request->name ? $slug = $content_type->slug : $slug = $this->generateSlug($request->name, 'content_types');
        $content_type->update([
            'name' => $request->name,
            'name_mm' => $request->name_mm,
            'slug' => $slug,
            'deleted_at' => Null
        ]);
        return redirect()->back()->with('success', 'Succesfully updated!');
    }

    public function destory(ContentType $content_type)
    {
        $content_type->update(['deleted_at' => now()]);
    }
}
