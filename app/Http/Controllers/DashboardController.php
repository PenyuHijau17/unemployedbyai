<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Book;
use App\Models\Order;

class DashboardController extends Controller
{
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
}
