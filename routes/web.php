<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Follows Button route
Route::post('follow/{user}', [App\Http\Controllers\FollowsController::class, 'store'])->name('follows.store');

Route::get('/p/create', [App\Http\Controllers\PostsController::class, 'create'])->name('posts.create');
Route::post('/p', [App\Http\Controllers\PostsController::class, 'store'])->name('posts.store');
Route::get('/p/{post}', [App\Http\Controllers\PostsController::class, 'show'])->name('posts.show');

// Route::get('/dashboard', [App\Http\Controllers\ProfilesController::class, 'index'])->name('profile.index');
Route::get('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'index'])->name('profile.index');
Route::get('/profile/{user}/edit', [App\Http\Controllers\ProfilesController::class, 'edit'])->name('profile.edit');
Route::patch('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'update'])->name('profile.update');
