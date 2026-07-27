<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    // Dashboard Admin
    public function admin()
    {
        $totalUser = User::count();

        return view('admin.dashboard', compact('totalUser'));
    }


    // Halaman Home
    public function home()
    {
        return view('home');
    }


    // Backup index kalau masih dipakai route lama
    public function index()
    {
        $totalUser = User::count();

        return view('admin.dashboard', compact('totalUser'));
    }
}