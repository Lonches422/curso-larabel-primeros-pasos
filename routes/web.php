<?php

use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\Dashboard\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\TestController;

error_reporting(E_ALL);
ini_set('display_errors', 1);

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

//rutas para los post
Route::resource('post', PostController::class);

Route::get('post', [PostController::class, 'index'])->name("post.index");
Route::get('post/{post}', [PostController::class, 'show'])->name('post.show');
Route::get('post/create', [PostController::class, 'create'])->name('post/create');
Route::get('post/{post}/edit', [PostController::class, 'edit'])->name('post/edit');

//Rutas para las categorías
Route::resource('category', CategoryController::class);

Route::get('category', [CategoryController::class, 'index'])->name("category.index");
Route::get('category/{category}', [CategoryController::class, 'show'])->name('category.show');
Route::get('category/create', [CategoryController::class, 'create'])->name('category/create');
Route::get('category/{category}/edit', [CategoryController::class, 'edit'])->name('category/edit');
