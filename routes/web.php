<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;

// ✅ Home page handled by HomeController
Route::get('/', [HomeController::class, 'index'])->name('home');

// ✅ Book listing page
/* Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/books/{id}', [BookController::class, 'home'])->name('books.home'); */