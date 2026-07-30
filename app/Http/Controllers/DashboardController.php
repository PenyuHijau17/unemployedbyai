<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Book;
use App\Models\Order;

class DashboardController extends Controller
{
    // Halaman dashboard admin
    public function admin()
    {
        $totalBook = Book::count();       // hitung jumlah buku
        $totalUser = User::count();       // hitung jumlah user
        $totalOrder = Order::count();     // hitung jumlah pesanan
        $totalIncome = Order::sum('total'); // jumlahkan pendapatan (kolom total di tabel orders)

        return view('admin.dashboard', compact(
            'totalBook',
            'totalUser',
            'totalOrder',
            'totalIncome'
        ));
    }

    // Halaman home (frontend user)
    public function home()
    {
        // misalnya tampilkan daftar buku di halaman depan
        $books = Book::latest()->paginate(10);

        return view('home.index', compact('books'));
    }

    // Halaman index umum (misalnya redirect ke home)
    public function index()
    {
        return redirect()->route('home');
    }


    public function admin()
    {
        $totalUser = User::count();

        return view('admin.dashboard', compact('totalUser'));
    }

    public function home()
    {
        return view('home');
    }
}
}