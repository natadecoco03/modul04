<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;

// Halaman Home baru
Route::get('/', [HomeController::class, 'index'])->name('home');

// CRUD Books
Route::resource('/books', BookController::class);

// CRUD Categories
Route::resource('/categories', CategoryController::class);