<?php

namespace App\Http\Controllers;

use App\Models\ServiceSetting;
use Illuminate\Http\Request;

class ServiceSettingController extends Controller
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
    public function service_setting_list()
    {
        try {
            $services = ServiceSetting::publish()->get();
            return view('settings.ServiceSetting.service-setting-list', compact('services'));
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
        return view('settings.ServiceSetting.service-setting-create');
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
            'title' => 'required',
            'description' => 'required'
        ]);
        $data = $this->helperService($request);
        ServiceSetting::create($data);
        return to_route('service_setting_list')->with('success', 'Successfully created!');
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
    public function edit(ServiceSetting $service)
    {
        return view('settings.ServiceSetting.service-setting-edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServiceSetting $service)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
        $data = $this->helperService($request);
        $service->update($data);
        return to_route('service_setting_list')->with('success', 'Successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServiceSetting $service)
    {
        $service->update([
            'status' => false,
            'deleted_at' => now()
        ]);
    }

    private function helperService($request)
    {
        $data['title'] = $request->title;
        $data['description'] = $request->description;
        $data['status'] = $request->status ? true : false;
        if ($request->hasFile('image')) {
            $path = ServiceSetting::UPLOAD_PATH . date('Y') . '/' . date('m') . '/';
            $file_name = uniqid() . time() . "." . $request->image->extension();
            $request->image->move(public_path($path), $file_name);
            $data['image_url'] = $path . $file_name;
        }
        return $data;
    }
}