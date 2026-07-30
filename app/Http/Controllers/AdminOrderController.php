<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class AdminOrderController extends Controller
{
    public function index()
    {
        // ambil semua pesanan + relasi user
        $orders = Order::with('user')->latest()->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        // ambil order + relasi user + detail + buku
        $order->load('user','orderDetails.book');

        return view('admin.orders.show', compact('order'));
    }

    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,diproses,selesai'
        ]);

        $order->update([
            'status' => $request->status
        ]);

        // kalau mau balik ke detail pesanan:
        // return redirect()->route('orders.show', $order->id)
        //                  ->with('success', 'Status pesanan berhasil diubah');

        // kalau mau balik ke daftar pesanan:
        return redirect()->route('orders.index')
                         ->with('success', 'Status pesanan berhasil diubah');
    }
}
