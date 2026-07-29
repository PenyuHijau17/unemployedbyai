<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Menampilkan halaman checkout.
     */
    public function checkout()
    {
        $carts = Cart::with('book')
            ->where('user_id', Auth::id())
            ->get();

        if ($carts->isEmpty()) {
            return redirect()
                ->route('cart.index')
                ->with('error', 'Keranjang masih kosong.');
        }

        $total = $carts->sum('subtotal');

        return view('order.checkout', compact('carts', 'total'));
    }

    /**
     * Proses checkout.
     */
    public function store()
    {
        $carts = Cart::with('book')
            ->where('user_id', Auth::id())
            ->get();

        if ($carts->isEmpty()) {
            return redirect()
                ->route('cart.index')
                ->with('error', 'Keranjang masih kosong.');
        }

        DB::beginTransaction();

        try {

            foreach ($carts as $cart) {

                if ($cart->jumlah > $cart->book->stok) {

                    DB::rollBack();

                    return redirect()
                        ->route('cart.index')
                        ->with('error', 'Stok buku "' . $cart->book->judul . '" tidak mencukupi.');
                }
            }

            $order = Order::create([
                'user_id'  => Auth::id(),
                'tanggal'  => now()->toDateString(),
                'total'    => $carts->sum('subtotal'),
                'status'   => 'Menunggu',
            ]);

            foreach ($carts as $cart) {

                OrderDetail::create([
                    'order_id'  => $order->id,
                    'book_id'   => $cart->book_id,
                    'jumlah'    => $cart->jumlah,
                    'harga'     => $cart->book->harga,
                    'subtotal'  => $cart->subtotal,
                ]);

                $cart->book->decrement('stok', $cart->jumlah);
            }

            Cart::where('user_id', Auth::id())->delete();

            DB::commit();

            return redirect()
                ->route('orders.show', $order)
                ->with('success', 'Pesanan berhasil dibuat.');
        } catch (\Throwable $e) {

            DB::rollBack();

            return redirect()
                ->route('cart.index')
                ->with('error', $e->getMessage());
        }
    }

    /**
     * Riwayat pesanan.
     */
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('order.index', compact('orders'));
    }

    /**
     * Detail pesanan.
     */
    public function show(Order $order)
    {
        if ($order->user_id != Auth::id()) {
            abort(403);
        }

        $order->load('orderDetails.book');

        return view('order.show', compact('order'));
    }
}