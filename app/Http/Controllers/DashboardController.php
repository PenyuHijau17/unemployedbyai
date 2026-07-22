<?php

namespace App\Http\Controllers;

use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUser = User::count();

        return view('admin.dashboard', compact('totalUser'));
    }
}