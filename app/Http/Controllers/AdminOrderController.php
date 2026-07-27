<?php

namespace App\Http\Controllers;

use App\Models\Order;

class AdminOrderController extends Controller
{
    public function index()
    {
        // ambil semua pesanan + relasi user
        $orders = Order::with('user')->get();
        return view('admin.orders.index', compact('orders'));
    }
}
