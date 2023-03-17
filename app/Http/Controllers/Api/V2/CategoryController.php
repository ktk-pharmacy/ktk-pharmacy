<?php

namespace App\Http\Controllers\Api\V2;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SubCategory;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = SubCategory::active()->get();
        return response()->success('Success!', 200, $categories);
    }
}
