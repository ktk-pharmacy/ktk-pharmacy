<?php

namespace App\Http\Controllers;

use App\Models\HeroSlider;
use Illuminate\Http\Request;

class HeroSliderController extends Controller
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
            $active_sldrs = HeroSlider::all();
            $sliders = HeroSlider::all();
            return view('hero-slider.slider-list', compact('sliders', 'active_sldrs'));
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
        return view('hero-slider.slider-create');
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
        HeroSlider::create($data);
        return to_route('hero_slider_list')->with('success', 'Successfully created!');
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
    public function edit(HeroSlider $slider)
    {
        return view('hero-slider.slider-edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HeroSlider $slider)
    {
        $data = $this->helperSlider($request);

        $slider->update($data);
        return to_route('hero_slider_list')->with('success', 'Successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(HeroSlider $slider)
    {
        $slider->delete();
    }

    private function helperSlider($request)
    {
        if ($request->hasFile('image')) {
            $path = HeroSlider::UPLOAD_PATH . date('Y') . '/' . date('m') . '/';
            $file_name = uniqid() . time() . "." . $request->image->extension();
            $request->image->move(public_path($path), $file_name);
            $data['image'] = $path . $file_name;
        }
        return $data;
    }
}
