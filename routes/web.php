<?php

use App\Http\Controllers\Client\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[PostController::class, 'home']);

Route::get('post/{slug}',     [PostController::class, 'post_Detail'])->name('post.detail');
Route::get('category/{slug}', [PostController::class, 'post_Category'])->name('category');
Route::get('/search',       [PostController::class, 'post_Search'])->name('search');
Route::get('/tag/{id}',       [PostController::class, 'post_Tag'])->name('tag');


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
