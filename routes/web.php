<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\postController;
use App\Http\Controllers\CommentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('posts.index');
// });

Route::get('/posts', [postController::class, 'index'])->name('posts.index')->middleware(['auth']);
Route::get('/posts/create', [postController::class, 'create'])->name('posts.create')->middleware(['auth']);
Route::post('/posts', [postController::class, 'store']);
Route::get('/posts/{post}/edit}', [postController::class, 'edit'])->name('posts.edit')->middleware(['auth']);
Route::put('/posts/{post}', [postController::class, 'update'])->name('posts.update');

Route::get('/posts/show/{post}', [postController::class, 'show'])->name('posts.show')->middleware(['auth']);
Route::delete('/posts/{post}', [postController::class, 'destroy'])->name('posts.destroy');

Route::post('/posts/{post}/comment', [CommentController::class, 'store'])->name('comments.store');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
