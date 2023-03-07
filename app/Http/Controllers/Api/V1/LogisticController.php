<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Logistic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\LogisticsResource;

class LogisticController extends Controller
{
    public function index()
    {
        $logistics = Logistic::with('city', 'township', 'deliveryFees')->get();
        $data = LogisticsResource::collection($logistics);

        return response()->success('Success!', 200, $data);
    }
}
