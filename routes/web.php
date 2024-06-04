<?php


use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardPostController;

Route::get('/', function () {
    return view('home', [
        'title' => 'Home',
        'active' => 'home'
    ]);
});

Route::get('/about', function () {
    return view('about', [
        'title' => 'About',
        'active' => 'about'
    ]);
});

// Blog posts
Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::get('/posts/{slug}', [PostController::class, 'show']);

// Categories
Route::get('/categories', function () {
    return view('categories', [
        'title' => 'Post Categories',
        'categories' => Category::all(),
        'active' => 'categories'
    ]);
});

// Authors
Route::get('/authors/{author:username}', function (User $author) {
    return view('posts', [
        'title' => "Posts by Author: $author->name",
        'posts' => $author->posts()->with(['category', 'user'])->get(),
        'active' => 'authors'
    ]);
});

// Authentication
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

// Dashboard
Route::get('/dashboard', function() {
    return view('dashboard.index');
})->middleware('auth');

// Dashboard posts
Route::resource('dashboard/posts', DashboardPostController::class)->middleware('auth');

Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');