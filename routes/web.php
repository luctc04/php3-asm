<?php

use App\Http\Controllers\Client\PostController;
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

// Route::get('/', function () {
//     return view('client.home');
// });

Route::get('/',[PostController::class, 'home']);
Route::get('post/{id}', [PostController::class, 'post_Detail'])->name('post.detail');
Route::get('category/{id}', [PostController::class, 'post_Category'])->name('category');
Route::get('/search', [PostController::class, 'post_search'])->name('search');

