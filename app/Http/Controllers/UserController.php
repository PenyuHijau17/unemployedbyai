<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Menampilkan semua user
    public function index()
    {
        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    // Menampilkan form tambah user
    public function create()
    {
        return view('admin.users.create');
    }

    // Menyimpan user baru
    public function store(Request $request)
    {
        //
    }

    // Menampilkan detail user
    public function show(User $user)
    {
        //
    }

    // Menampilkan form edit user
    public function edit(User $user)
    {
        //
    }

    // Update data user
    public function update(Request $request, User $user)
    {
        //
    }

    // Hapus user
    public function destroy(User $user)
    {
        //
    }
}