<?php

use App\Http\Controllers\CommentController as CommentController;
use App\Http\Controllers\NewsletterController as NewsletterController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController as SessionsController;
use App\Services\Newsletter as Newsletter;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use \App\Models\Post;
use \App\Models\Category;
use \App\Models\User;
use Spatie\YamlFrontMatter\YamlFrontMatter;
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



