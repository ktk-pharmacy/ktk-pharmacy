<?php

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProductsController as ProductFrontend;
use Illuminate\Support\Facades\Route;




Route::controller(HomeController::class)
    ->group(function () {
        Route::get('/home', 'home')->name('HOME');
        Route::get('/about', 'aboutus')->name('AboutUs');
        Route::get('/contact', 'contactus')->name('ContactUs');
    });

Route::controller(ProductFrontend::class)
    ->group(function () {
        Route::get('/products', 'index')->name('Products');
    });