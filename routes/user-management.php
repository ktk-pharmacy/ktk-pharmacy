<?php

use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
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

Route::controller(RoleController::class)
    ->group(function(){
        Route::get('/role_list', 'role_list')->name('role_list');
        Route::get('/role_create', 'create')->name('role_create');
        Route::post('/role_create', 'store')->name('role_store');
        Route::get('/role_edit/{role}', 'edit')->name('role_edit');
        Route::patch('/role_edit/{role}', 'update')->name('role_update');
        Route::delete('/role_delete/{role}', 'destroy')->name('role_destroy');
    });
