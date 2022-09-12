<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\CommentController as CommentController;
use App\Http\Controllers\NewsletterController as NewsletterController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController as SessionsController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\PostController;

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

Route::get('/', array( PostController::class, 'index'))->name('home');
Route::get('/posts/{post}', array( PostController::class, 'show' ) );
Route::post('/posts/{post:slug}/comments', [ CommentController::class, 'store' ] );
Route::get('register', [RegisterController::class,'create'])->middleware('guest');
Route::post('register', [RegisterController::class,'store'])->middleware('guest');

Route::get('login', [SessionsController::class,'create'])->middleware('guest');
Route::post('sessions', [SessionsController::class,'store'])->middleware('guest');
Route::post('logout', [SessionsController::class,'destroy'])->middleware('auth');

Route::post('newsletter', NewsletterController::class);

Route::get('admin/posts', [AdminPostController::class, 'index' ])->middleware('isadmin');
Route::get('admin/posts/create', [AdminPostController::class, 'create'])->middleware('isadmin');
Route::post('admin/posts', [AdminPostController::class, 'store'])->middleware('isadmin');
Route::get('admin/posts/{post}/edit', [AdminPostController::class, 'edit'])->middleware('isadmin');
Route::patch('admin/posts/{post}', [AdminPostController::class, 'update'])->middleware('isadmin');
Route::delete('admin/posts/{post}', [AdminPostController::class, 'destroy'])->middleware('isadmin');
