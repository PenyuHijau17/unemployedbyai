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
        // Statistik
        $totalBooks = Book::count();
        $totalCategories = Category::count();
        $totalUsers = User::where('role', 'customer')->count();

        // Buku terbaru
        $newBooks = Book::with('category')
            ->latest()
            ->take(8)
            ->get();

        return view('home.index', compact(
            'totalBooks',
            'totalCategories',
            'totalUsers',
            'newBooks'
        ));
    }

    // =========================
    // CUSTOMER JELAJAH BUKU
    // =========================
    public function books(Request $request)
    {
        $search = $request->search;
        $category = $request->category;

        $books = Book::with('category')

            ->when($search, function ($query) use ($search) {

                $query->where(function ($q) use ($search) {

                    $q->where('judul', 'like', '%' . $search . '%')
                      ->orWhere('penulis', 'like', '%' . $search . '%')
                      ->orWhere('penerbit', 'like', '%' . $search . '%');

                });

            })

            ->when($category, function ($query) use ($category) {

                $query->where('category_id', $category);

            })

            ->latest()
            ->get();

        $categories = Category::orderBy('nama_kategori')->get();

        return view(
            'books.customer',
            compact(
                'books',
                'categories'
            )
        );
    }
}