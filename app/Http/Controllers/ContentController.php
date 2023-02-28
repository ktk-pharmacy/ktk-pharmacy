<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\ContentType;
use App\Traits\GenerateSlug;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    use GenerateSlug;
    public function index($slug)
    {
        try {
            $content_type = ContentType::where('slug', $slug)->first();
            $contents = Content::typeIn($content_type->id)->active()->paginate(3);
            return view('frontend.blogs', compact('contents'));
        } catch (\Exception $ex) {
            return response()->json([
                'message' => 'Something Went Wrong BlogController.index',
                'error' => $ex->getMessage()
            ], 400);
        }
    }

    public function content_list()
    {
        try {
            $contents = Content::publish()->with('type')->get();
            return view('contents.content.content-list', compact('contents'));
        } catch (\Exception $ex) {
            return response()->json([
                'message' => 'Something Went Wrong CategoryController.index',
                'error' => $ex->getMessage()
            ], 400);
        }
    }

    public function create()
    {
        $content_types = ContentType::publish()->get();
        return view('contents.content.content-create', compact('content_types'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required'
        ]);
        $data = $this->helperContent($request);
        $data['slug'] = $this->generateSlug($request->name, 'contents');
        Content::create($data);
        return to_route('content_list')->with('success', 'Successfully created!');
    }


    public function edit(Content $content)
    {
        $content_types = ContentType::publish()->get();
        return view('contents.content.content-edit', compact('content_types', 'content'));
    }

    public function update(Request $request, Content $content)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        $data = $this->helperContent($request);
        if ($data['title'] ?? $request->title != $content->title) {
            $data['slug'] = $this->generateSlug($data['title'] ?? $request->title, 'contents');
        }
        $content->update($data);
        return to_route('content_list')->with('success', 'Successfully updated!');
    }

    public function destroy(Content $content)
    {
        $content->update([
            'status' => false,
            'deleted_at' => now()
        ]);
    }

    private function helperContent($request)
    {
        $data['title'] = $request->title;
        $data['content_type_id'] = $request->content_type;
        $data['description'] = $request->description;
        $data['status'] = $request->status ? true : false;
        if ($request->hasFile('image')) {
            $path = Content::UPLOAD_PATH . '/' . date('Y') . '/' . date('m') . '/';
            $file_name = time() . '.' . $request->image->extension();
            $data['image_url'] = $path . $file_name;
            $request->image->move(public_path($path), $file_name);
        }
        return $data;
    }
}
