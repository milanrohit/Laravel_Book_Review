<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookController;

// Homepage route — loads home.blade.php with $books
Route::get('/', [HomeController::class, 'index'])->name('home');

// Book listing page — shows all books
Route::get('/books', [BookController::class, 'index'])->name('books.index');

// Single book review page — shows details for one book
Route::get('/books/{id}', [BookController::class, 'show'])->name('books.show');