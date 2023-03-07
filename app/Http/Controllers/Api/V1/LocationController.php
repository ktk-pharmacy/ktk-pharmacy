<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Location;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LocationController extends Controller
{
    public function index(Request $request)
    {
        $locations = Location::parent()->with('townships')
        ->when($request->region_id, function ($q) use ($request) {
            return $q->where('id', $request->region_id);
        })->get();

        return response()->success('Success!', 200, $locations);
    }
}
