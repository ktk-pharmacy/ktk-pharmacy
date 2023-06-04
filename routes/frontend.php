<?php

use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\ProductsController as ProductFrontend;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\ServiceSettingController;
use Illuminate\Support\Facades\Route;

Route::controller(HomeController::class)
    ->group(function () {
        Route::get('/', 'home')->name('HOME');
        Route::get('/home', 'home')->name('HOME');
        Route::get('/about', 'aboutus')->name('AboutUs');
        Route::get('/contact', 'contactus')->name('ContactUs');
        Route::post('/contactForm', 'contactForm')->name('contactForm');

    });

// Route::post('language/{locale}', 'LanguageController')->name('change');

Route::controller(LanguageController::class)
    ->group(function () {

        Route::post('change/{locale}', 'change')->name('change');
    });

Route::get('/language/{locale}', function ($locale) {
    session()->put('locale', $locale);
    return redirect()->back();
});


Route::controller(BlogController::class)
    ->group(function () {
        Route::get('/blogs', 'index')->name('blogs');
    });

Route::controller(ProductFrontend::class)
    ->group(function () {
        Route::get('/products/{sub_category}', 'products')->name('products');
        Route::get('/product_detail/{slug}', 'product_detail')->name('product_detail');
    });

Route::controller(CategoryController::class)
    ->group(function () {
        Route::get('/categories/{slug}', 'index')->name('categories');
    });


Route::controller(ContentController::class)
    ->group(function () {
        Route::get('/contents/{slug}', 'index')->name('contents');
        Route::get('/contents/show/{slug}', 'show')->name('content_show');
    });

Route::controller(ServiceSettingController::class)
    ->group(function () {
        Route::get('/service_setting_show/{service}', 'show')->name('service_setting_show');
    });

Route::controller(BrandController::class)
    ->group(function () {
        Route::get('/{slug}/products', 'brand_products')->name('brand_products');
    });
