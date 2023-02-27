<?php

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProductsController as ProductFrontend;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoryGroupController;
use App\Http\Controllers\ContentController;
use Illuminate\Support\Facades\Route;

Route::controller(HomeController::class)
    ->group(function () {
        Route::get('/', 'home')->name('HOME');
        Route::get('/home', 'home')->name('HOME');
        Route::get('/about', 'aboutus')->name('AboutUs');
        Route::get('/contact', 'contactus')->name('ContactUs');
    });

Route::controller(LanguageController::class)
    ->group(function () {
        Route::post('change/{locale}', 'change')->name('change');
    });

Route::controller(BlogController::class)
    ->group(function () {
        Route::get('/blogs', 'index')->name('blogs');
    });

Route::controller(ProductFrontend::class)
    ->group(function () {
        Route::get('/products', 'products')->name('products');
        Route::get('/product_detail', 'product_detail')->name('product_detail');
    });

Route::controller(CategoryController::class)
    ->group(function () {
        Route::get('/categories/{id}', 'index')->name('categories');
    });

Route::controller(ContentController::class)
    ->group(function () {
        Route::get('/contents/{slug}', 'index')->name('contents');
    });
