<?php

namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;

use App\Models\Location;

use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $locations = Location::parent()->with('townships')
        ->when($request->region_id, function ($q) use ($request) {
            return $q->where('id', $request->region_id);
        })->get();

        return response()->success('Success!', 200, $locations);
    }
}
