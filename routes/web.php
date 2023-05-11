<?php

use App\Http\Controllers\Dashboard\PostController;
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

Route::resource('post', PostController::class);

Route::get('post', [PostController::class, 'index'])->name("post.index");
Route::get('post/{post}', [PostController::class, 'show'])->name('post.show');
Route::get('post/create', [PostController::class, 'create'])->name('juan');
Route::get('post/{post}/edit', [PostController::class, 'edit'])->name('post/edit');
//Route::delete('post/{post}', [PostController::class, 'delete'])->name("post.destroy");

//Route::post('post', [PostController::class, 'store']);
//Route::put('post/{post}', [PostController::class, 'update']);
