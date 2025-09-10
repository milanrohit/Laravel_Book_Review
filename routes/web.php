<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookController;

// Homepage route — loads home.blade.php with $books
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::resource('books', BookController::class);