<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class AdminOrderController extends Controller
{
    public function index()
    {
        // Ambil semua pesanan beserta user
        $orders = Order::with('user')
            ->latest()
            ->get();

        return view('admin.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        // Ambil detail pesanan beserta user dan buku
        $order->load('user', 'orderDetails.book');

        return view('admin.orders.show', compact('order'));
    }

    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,processing,shipped,completed,cancelled',
        ]);

        $statusLama = $order->status;
        $statusBaru = $request->status;

        DB::beginTransaction();

        try {

            /*
            |--------------------------------------------------------------------------
            | Jika status berubah menjadi completed
            |--------------------------------------------------------------------------
            */

            if (
                $statusLama !== 'completed' &&
                $statusBaru === 'completed'
            ) {

                // Ambil semua detail pesanan beserta bukunya
                $order->load('orderDetails.book');

                foreach ($order->orderDetails as $detail) {

                    $book = $detail->book;

                    // Pastikan bukunya masih ada
                    if (!$book) {
                        throw new \Exception(
                            'Buku pada pesanan tidak ditemukan.'
                        );
                    }

                    // Cek stok
                    if ($detail->jumlah > $book->stok) {
                        throw new \Exception(
                            'Stok buku "' .
                            $book->judul .
                            '" tidak mencukupi.'
                        );
                    }

                    // Kurangi stok
                    $book->decrement(
                        'stok',
                        $detail->jumlah
                    );
                }
            }

            /*
            |--------------------------------------------------------------------------
            | Update status order
            |--------------------------------------------------------------------------
            */

            $order->update([
                'status' => $statusBaru,
            ]);

            DB::commit();

            return redirect()
                ->route('orders.index')
                ->with(
                    'success',
                    'Status pesanan berhasil diubah.'
                );

        } catch (\Exception $e) {

            DB::rollBack();

            return back()->with(
                'error',
                $e->getMessage()
            );
        }
    }
}