<?php

namespace App\Http\Controllers;

use App\Models\Order;

class ReportController extends Controller
{
    public function index()
    {
        // Ambil semua pesanan yang sudah selesai
        // Mendukung status lama "completed" dan status sistem sekarang "selesai"
        $orders = Order::whereIn('status', [
                'selesai',
                'completed'
            ])
            ->with('user')
            ->latest()
            ->get();

        return view('admin.laporan.index', compact('orders'));
    }
}