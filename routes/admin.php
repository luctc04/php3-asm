<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;

Route::prefix('admin')
    ->as('admin.')
    ->middleware(['auth', 'isAdmin'])
    ->group(function () {

        Route::get('/', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        Route::resource('categories', CategoryController::class);
        Route::resource('posts', PostController::class);
        Route::resource('users', UserController::class);
    
    });
