<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUser = User::count();

        return view('admin.dashboard', compact('totalUser'));
=======
class DashboardController extends Controller
{
    public function admin()
    {
        return view('admin.dashboard');
    }

    public function home()
    {
        return view('home');
>>>>>>> origin/auth
    }
}