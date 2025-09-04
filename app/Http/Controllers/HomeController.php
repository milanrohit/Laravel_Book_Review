<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class HomeController extends Controller
{
   public function index()
    {
        $books = Book::latest()->take(12)->get(); // or paginate if needed
        return view('home', compact('books'));
    }
}
