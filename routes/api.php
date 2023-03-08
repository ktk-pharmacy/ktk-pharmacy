<?php

use App\Http\Controllers\Api\Auth\V1\AuthController;
use App\Http\Controllers\Api\V1\CartController;
use App\Http\Controllers\Api\V1\CategoryController;
use App\Http\Controllers\Api\V1\LogisticController;
use App\Http\Controllers\Api\V1\ProductController;
use App\Http\Controllers\Api\V1\LocationController;
use App\Http\Controllers\Api\V1\CheckOutController;
use App\Http\Controllers\Api\V1\OrderController;

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

        Route::controller(CartController::class)
            ->group(function () {
                Route::get('carts', 'index');
                Route::post('carts/{product}', 'store');
            });

        Route::get('locations', [LocationController::class, 'index']);
        Route::get('logistics', [LogisticController::class, 'index']);

        Route::controller(CheckOutController::class)
            ->group(function() {
                Route::post('checkout','checkout');
                Route::post('coupons/{name}/check', 'validateCoupon');
            });

        Route::controller(OrderController::class)
            ->group(function() {
                Route::post('order','index');
                Route::post('order/{id}','show');
            });

    });

