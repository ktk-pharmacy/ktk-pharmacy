<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function change(Request $request, $locale)
    {
        // var_dump($request,$locale);
        if ($request->ajax()) {
            session()->put('locale', $locale);
        }
        return response()->json(['success' => true]);
    }

    public function __invoke(Request $request, $locale)
    {
        if ($request->ajax()) {
            session()->put('locale', $locale);
        }
        return response()->json(['success' => true]);
    }
}
