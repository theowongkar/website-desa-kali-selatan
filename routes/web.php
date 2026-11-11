<?php

use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/profil-desa', [HomeController::class, 'about'])->name('about');
Route::get('/postingan', [PostController::class, 'index'])->name('post.index');
Route::get('/postingan/{slug}', [PostController::class, 'show'])->name('post.show');
