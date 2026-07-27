<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }

    public function books()
    {
        $books = Book::latest()->get();

        return view('books.index', compact('books'));
    }
}