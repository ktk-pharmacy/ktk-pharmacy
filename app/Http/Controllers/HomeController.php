<?php

namespace App\Http\Controllers;

use App\Models\home;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
                return view('home');
        }
        catch(\Exception $ex){
            return response()->json([
                'message' => 'Something Went Wrong HomeController.index',
                'error' => $ex->getMessage()
            ],400);
        }
    }

   
    public function aboutus()
    {
        try{
            return view('aboutus');
        }
        catch(\Exception $ex){
            return response()->json([
                'message' => 'Something Went Wrong HomeController.aboutus',
                'error' => $ex->getMessage()
            ],400);
        }
    }

    public function contactus()
    {
        try{
            return view('contactus');
        }
        catch(\Exception $ex){
            return response()->json([
                'message' => 'Something Went Wrong HomeController.contactus',
                'error' => $ex->getMessage()
            ],400);
        }
    }
}
