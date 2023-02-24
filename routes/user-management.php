<?php

use App\Http\Controllers\PermissionController;
use Illuminate\Support\Facades\Route;

Route::controller(PermissionController::class)
    ->group(function(){
        Route::get('/permission_list', 'permission_list')->name('permission_list');
        Route::get('/permission_create', 'create')->name('permission_create');
        Route::post('/permission_create', 'store')->name('permission_store');
    });
