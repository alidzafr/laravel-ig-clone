<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/dashboard', [App\Http\Controllers\ProfilesController::class, 'index'])->name('profile.index');
Route::get('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'index'])->name('profile.index');

Route::get('/p/create', [App\Http\Controllers\PostsController::class, 'create'])->name('posts.create');
Route::get('/p/{post}', [App\Http\Controllers\PostsController::class, 'show'])->name('posts.show');
Route::post('/p', [App\Http\Controllers\PostsController::class, 'store'])->name('posts.store');
