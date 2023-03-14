<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Frontend\ProductsController as ProductBackend;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryGroupController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\ContentTypeController;
use App\Http\Controllers\LogisticController;
use App\Http\Controllers\ServiceSettingController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')
    ->group(function () {
        Route::controller(DashboardController::class)
            ->group(function () {
                Route::get('/dashboard', 'index')->name('dashboard');
            });
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
                Route::get('/category_group_export', 'export')->name('category_group_export');
                Route::post('/category_group_import', 'import')->name('category_group_import');
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
                // Route::patch('/update_setting', 'update')->name('update_setting');
                Route::post('/settings', 'update')->name('settings_update');
            });

        Route::controller(ServiceSettingController::class)
            ->group(function () {
                Route::get('/service_setting_list', 'service_setting_list')->name('service_setting_list');
                Route::get('/service_setting_create', 'create')->name('service_setting_create');
                Route::post('/service_setting_create', 'store')->name('service_setting_store');
                Route::get('/service_setting_edit/{service}', 'edit')->name('service_setting_edit');
                Route::patch('/service_setting_edit/{service}', 'update')->name('service_setting_update');
                Route::delete('/service_setting_delete/{service}', 'destroy')->name('service_setting_destroy');
            });

        Route::controller(BlogController::class)
            ->group(function () {
                Route::get('/blog_list', 'blog_list')->name('blog_list');
            });

        Route::controller(ContentTypeController::class)
            ->group(function () {
                Route::get('/content_type_list', 'content_type_list')->name('content_type_list');
                Route::get('/content_type_form', 'content_type_form')->name('content_type_form');
                Route::post('/content_type_list', 'store')->name('content_type_store');
                Route::patch('/content_type_update/{content_type}', 'update')->name('content_type_update');
                Route::delete('/content_type_delete/{content_type}', 'destory')->name('content_type_destroy');
            });

        Route::controller(ContentController::class)
            ->group(function () {
                Route::get('/content_list', 'content_list')->name('content_list');
                Route::get('/content_create', 'create')->name('content_create');
                Route::post('/content_create', 'store')->name('content_store');
                Route::get('/content_edit/{content}', 'edit')->name('content_edit');
                Route::patch('/content_edit/{content}', 'update')->name('content_update');
                Route::delete('/content_delete/{content}', 'destroy')->name('content_destroy');
            });

        Route::controller(SliderController::class)
            ->group(function () {
                Route::get('/slider_list', 'slider_list')->name('slider_list');
                Route::get('/slider_create', 'create')->name('slider_create');
                Route::post('/slider_create', 'store')->name('slider_store');
                Route::get('/slider_edit/{slider}', 'edit')->name('slider_edit');
                Route::patch('/slider_edit/{slider}', 'update')->name('slider_update');
                Route::delete('/slider_delete/{slider}', 'destroy')->name('slider_destroy');
            });

        Route::controller(LogisticController::class)
            ->group(function () {
                Route::get('/logistic_list', 'logistic_list')->name('logistic_list');
                Route::get('/logistic_create', 'create')->name('logistic_create');
                Route::post('/logistic_create', 'store')->name('logistic_store');
                Route::get('/logistic_edit/{logistic}', 'edit')->name('logistic_edit');
                Route::patch('/logistic_edit/{logistic}', 'update')->name('logistic_update');
                Route::delete('/logistic_delete/{logistic}', 'destroy')->name('logistic_destroy');
            });
        Route::controller(OrderController::class)
            ->group(function () {
                Route::get('/order_list', 'index')->name('order_list');
                Route::get('orders/{id}/edit', 'edit')->name('orders.edit');
                Route::patch('orders/{id}/edit', 'update')->name('orders.update');
                Route::get('orders/{id}/detail', 'detail')->name('orders.detail');
                Route::get('township/{id}', 'getTownshipView')->name('orders.township');
                Route::get('delivery/{id}', 'deliveryDetail')->name('orders.delivery.detail');
                Route::get('/order_export', 'export')->name('order_export');
            });
    });
