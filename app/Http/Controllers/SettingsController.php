<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            foreach (Settings::all() as $setting) {
                $site_settings[$setting->key]['value'] = $setting->value;
                $site_settings[$setting->key]['value_mm'] = $setting->value_mm;
            }
            return view('settings.setting', compact('site_settings'));
        } catch (\Exception $ex) {
            return response()->json([
                'message' => 'Something Went Wrong SettingsController.index',
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
        //
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
     * @param  \App\Models\setting\Settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function show(Settings $settings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\setting\Settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function edit(Settings $settings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\setting\Settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $keys = $request->except('_token');
        if ($request->hasFile('pop_up')) {
            $keys['pop_up'] = $this->fileStorage($request, 'pop_up');
        }
        foreach ($keys as $key => $value) {
            $entry = Settings::where('key', $key)->first();

            if ($entry) {
                if ($key=='pop_up') {
                    $entry->value_mm = $value;
                }
                $entry->value = $value;
                $entry->saveOrFail();
            } else {
                $new_entry = Settings::where('key', str_replace("_mm", "", $key))->firstOrFail();
                $new_entry->value_mm = $value;
                $new_entry->saveOrFail();
            }
        }
        return redirect()->back()->with('success', 'Successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\setting\Settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function destroy(Settings $settings)
    {
        //
    }

    private function fileStorage($request, $key)
    {
        $path = Settings::UPLOAD_PATH . "/" . date("Y") . "/" . date("m") . "/";
        $fileName = time() . '.' . $request->file($key)->extension();
        $request->file($key)->move(public_path($path), $fileName);
        return ($path . $fileName);
    }
}
