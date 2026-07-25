<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    // Dashboard admin dengan data total user
    public function admin()
    {
        $totalUser = User::count(); // hitung jumlah user dari tabel users
        return view('admin.dashboard', compact('totalUser'));
    }

    // Halaman home umum
    public function home()
    {
        return view('home');
    }

    // Kalau mau pakai index untuk dashboard juga
    public function index()
    {
        $totalUser = User::count();
        return view('admin.dashboard', compact('totalUser'));
    }
}
