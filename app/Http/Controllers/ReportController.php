<?php

namespace App\Http\Controllers;

use App\Models\Order;

class ReportController extends Controller
{
    public function index()
    {
        // Ambil pesanan yang statusnya selesai
        $orders = Order::where('status', 'selesai')->with('user')->get();

        return view('admin.laporan.index', compact('orders'));
    }
}
