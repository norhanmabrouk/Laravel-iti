<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\postController;

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

Route::get('/posts', [postController::class, 'index'])->name('posts.index');
Route::get('/create', [postController::class, 'create'])->name('posts.create');
Route::post('/posts', [postController::class, 'store']);
Route::get('/show/{post}', [postController::class, 'show'])->name('posts.show');
Route::get('/edit}', [postController::class, 'edit'])->name('posts.edit');