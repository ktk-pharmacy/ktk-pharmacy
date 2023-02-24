<?php

use App\Http\Controllers\PermissionController;
use Illuminate\Support\Facades\Route;

Route::controller(PermissionController::class)
    ->group(function(){
        Route::get('/permission_list', 'permission_list')->name('permission_list');
        Route::get('/permission_create', 'create')->name('permission_create');
        Route::post('/permission_create', 'store')->name('permission_store');
        Route::get('/permission_edit/{permission}', 'edit')->name('permission_edit');
        Route::patch('/permission_edit/{permission}', 'update')->name('permission_update');
        Route::delete('/permission_delete/{permission}', 'destroy')->name('permission_destroy');
    });
