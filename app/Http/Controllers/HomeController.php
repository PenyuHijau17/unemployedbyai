<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use App\Models\User;

class HomeController extends Controller
{
    // =========================
    // HOME CUSTOMER
    // =========================
    public function index()
    {
        // Total buku
        $totalBooks = Book::count();

        // Total kategori
        $totalCategories = Category::count();

        // Total customer
        // Kalau role customer belum ada, ganti jadi User::count()
        $totalUsers = User::where('role', 'customer')->count();

        return view('home.index', compact(
            'totalBooks',
            'totalCategories',
            'totalUsers'
        ));
    }

    // =========================
    // CUSTOMER JELAJAH BUKU
    // =========================
    public function books(Request $request)
    {
        $search = $request->search;

        $books = Book::with('category')
            ->when($search, function ($query) use ($search) {

                $query->where('judul', 'like', '%' . $search . '%')
                      ->orWhere('penulis', 'like', '%' . $search . '%')
                      ->orWhere('penerbit', 'like', '%' . $search . '%');

            })
            ->get();

        return view('books.customer', compact('books'));
    }
}