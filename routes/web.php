<?php

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

Route::get('/users/{author:username}', function(User $author){
    return view('posts', [
        'posts' => $author->posts,
        'categories' => Category::all(),
    ]);
});

