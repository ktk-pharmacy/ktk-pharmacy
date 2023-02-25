<?php

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProductsController as ProductFrontend;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoryGroupController;
use Illuminate\Support\Facades\Route;

Route::controller(HomeController::class)
    ->group(function () {
        Route::get('/', 'home')->name('HOME');
        Route::get('/home', 'home')->name('HOME');
        Route::get('/about', 'aboutus')->name('AboutUs');
        Route::get('/contact', 'contactus')->name('ContactUs');
    });

// Route::post('language/{locale}', 'LanguageController')->name('change');

Route::controller(LanguageController::class)
    ->group(function () {
        Route::post('language/{locale}')->name('change');
    });

Route::controller(BlogController::class)
    ->group(function () {
        Route::get('/blogs', 'index')->name('blogs');
    });

Route::controller(ProductFrontend::class)
    ->group(function () {
        Route::get('/products/{id}', 'products')->name('products');
        Route::get('/product_detail/{slug}', 'product_detail')->name('product_detail');
    });

Route::controller(CategoryController::class)
    ->group(function () {
        Route::get('/categories/{id}', 'index')->name('categories');
    });

// Route::controller(CategoryGroupController::class)
//     ->group(function () {
//         Route::get('/categories', 'index')->name('Categories');
//     });
