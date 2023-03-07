<?php

use App\Http\Controllers\Api\Auth\V1\AuthController;
use App\Http\Controllers\Api\V1\CategoryController;
use App\Http\Controllers\Api\V1\ProductController;
use App\Http\Controllers\Api\V1\LocationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('auth')
    ->group(function () {
        Route::prefix('v1')
            ->group(function () {
                Route::controller(AuthController::class)
                    ->group(function () {
                        Route::post('login', 'login');
                        Route::post('register', 'register');
                        Route::post('request-otp', 'requestOTP');
                        Route::post('validation-otp', 'validationOTP');

                        Route::middleware('auth:sanctum')
                            ->group(function () {
                                Route::post('logout', 'logout');
                                Route::get('profile', 'getProfile');
                                Route::post('profile', 'updateProfile');
                            });
                    });
            });
    });

Route::prefix('v1')
    ->middleware('auth:sanctum')
    ->group(function () {
        Route::controller(ProductController::class)
            ->group(function () {
                Route::get('products', 'index');
                Route::get('products/{product}', 'show');
            });
        Route::controller(CategoryController::class)
            ->group(function () {
                Route::get('categories', 'index');
                Route::get('categories/{sub_category}/products', 'getProductsByCategory');
            });
        Route::controller(LocationController::class)
            ->group(function () {
                Route::get('location', 'index');
                // Route::get('categories/{sub_category}/products', 'getProductsByCategory');
            });
    });

