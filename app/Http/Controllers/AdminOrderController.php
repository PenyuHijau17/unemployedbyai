<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class AdminOrderController extends Controller
{
    /**
     * Daftar semua pesanan
     */
    public function index()
    {
        $orders = Order::with('user')
            ->latest()
            ->get();

        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Detail pesanan
     */
    public function show(Order $order)
    {
        $order->load('user', 'orderDetails.book');

        return view('admin.orders.show', compact('order'));
    }

    /**
     * Update status pesanan
     */
    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,diproses,dikirim,selesai,dibatalkan',
        ]);

        $statusLama = $order->status;
        $statusBaru = $request->status;

        DB::beginTransaction();

        try {

            /*
            |--------------------------------------------------------------------------
            | Jika order berubah menjadi SELESAI
            |--------------------------------------------------------------------------
            */

            if (
                $statusLama !== 'selesai' &&
                $statusBaru === 'selesai'
            ) {

                $order->load('orderDetails.book');

                foreach ($order->orderDetails as $detail) {

                    $book = $detail->book;

                    // Buku tidak ditemukan
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
            | Update status
            |--------------------------------------------------------------------------
            */

            $order->update([
                'status' => $statusBaru,
            ]);

            DB::commit();

            return redirect()
                ->route('orders.show', $order->id)
                ->with(
                    'success',
                    'Status pesanan berhasil diubah menjadi ' .
                    ucfirst($statusBaru) . '.'
                );

        } catch (\Exception $e) {

            DB::rollBack();

            return back()
                ->withInput()
                ->with('error', $e->getMessage());
        }
    }
}