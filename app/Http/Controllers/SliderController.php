<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Return a List page of ServiceSettings
     *
     *  @return
     */
    public function slider_list()
    {
        try {
            $active_sldrs = Slider::active()->get();
            $sliders = Slider::publish()->get();
            return view('slider.slider-list', compact('sliders', 'active_sldrs'));
        } catch (\Exception $ex) {
            return response()->json([
                'message' => 'Something Went Wrong CategoryController.category_list',
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
        return view('slider.slider-create');
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
            'image' => 'required|mimes:png,jpg'
        ]);
        $data = $this->helperSlider($request);
        Slider::create($data);
        return to_route('slider_list')->with('success', 'Successfully created!');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        return view('slider.slider-edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        $data = $this->helperSlider($request);
        if($request->status) {
            $active_sldrs = Slider::active()->where('id', '!=', $slider->id)->get();
            $data['status'] = count($active_sldrs) == 4 ? false : true;
        }

        $slider->update($data);
        return to_route('slider_list')->with('success', 'Successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        $slider->update([
            'status' => false,
            'deleted_at' => now()
        ]);
    }

    private function helperSlider($request)
    {
        $data['url'] = $request->url;
        $data['status'] = $request->status ? true : false;
        if ($request->hasFile('image')) {
            $path = Slider::UPLOAD_PATH . date('Y') . '/' . date('m') . '/';
            $file_name = uniqid() . time() . "." . $request->image->extension();
            $request->image->move(public_path($path), $file_name);
            $data['image_url'] = $path . $file_name;
        }
        return $data;
    }
}
