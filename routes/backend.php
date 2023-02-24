<?php

use App\Http\Controllers\Frontend\ProductsController as ProductBackend;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryGroupController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SettingsController;
use Illuminate\Support\Facades\Route;


Route::controller(ProductBackend::class)
    ->group(function () {
        // Route::get('/product', 'index')->name('product');
        Route::get('/product_list', 'product_list')->name('product_list');
        Route::get('/product_create', 'create')->name('product_create');
        Route::post('/product_create', 'store')->name('product_store');
        Route::get('/product_edit/{product}', 'edit')->name('product_edit');
        Route::patch('/product_edit/{product}', 'update')->name('product_update');
        Route::delete('/product_delete/{product}', 'destroy')->name('product_destroy');
        Route::get('/product_export', 'export')->name('product_export');
        Route::post('/product_import', 'import')->name('product_import');
    });

Route::controller(CategoryGroupController::class)
    ->group(function () {
        Route::get('/category_group_list', 'category_group_list')->name('category_group_list');
        Route::get('/category_group_create', 'create')->name('category_group_create');
        Route::post('/category_group_create', 'store')->name('category_group_store');
        Route::get('/category_group_edit/{category}', 'edit')->name('category_group_edit');
        Route::patch('/category_group_edit/{category}', 'update')->name('category_group_update');
        Route::delete('/category_group_delete/{category}', 'destroy')->name('category_group_destroy');
        Route::get('/category_group_export','export')->name('category_group_export');
        Route::post('/category_group_import','import')->name('category_group_import');
    });

Route::controller(CategoryController::class)
    ->group(function () {
        Route::get('/category_list', 'category_list')->name('category_list');
        Route::get('/category_create/{type}', 'create')->name('category_create');
        Route::post('/category_create/{type}', 'store')->name('category_store');
        Route::get('/{slug}/category_edit/{type}', 'edit')->name('category_edit');
        Route::patch('/{slug}/category_edit/{type}', 'update')->name('category_update');
        Route::delete('/{slug}/category_delete/{type}', 'destroy')->name('category_destroy');
    });

Route::controller(BrandController::class)
    ->group(function () {
        Route::get('/brand_list', 'brand_list')->name('brand_list');
        Route::get('/brand_create', 'create')->name('brand_create');
        Route::post('/brand_create', 'store')->name('brand_store');
        Route::get('/brand_edit/{brand}', 'edit')->name('brand_edit');
        Route::patch('/brand_edit/{brand}', 'update')->name('brand_update');
        Route::delete('/brand_delete/{brand}', 'destroy')->name('brand_destroy');
    });

Route::controller(SettingsController::class)
    ->group(function () {
        Route::get('/settings', 'index')->name('settings');
        Route::get('/update_setting', 'update')->name('update_setting');
    });
