<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;




class PaymentController extends Controller
{
    public function index()
    {
        $carts = Cart::where('user_id', Auth::id())
            ->with('book')
            ->get();

        $total = 0;

        foreach ($carts as $cart) {
            $total += $cart->subtotal;
        }

        return view('payment.index', compact('carts', 'total'));
    }

    public function store(Request $request)
    {
        $carts = Cart::where('user_id', Auth::id())
            ->with('book')
            ->get();

        $total = 0;

        foreach ($carts as $cart) {
            $total += $cart->subtotal;
        }

        $order = Order::create([
            'user_id' => Auth::id(),
            'tanggal' => now(),
            'total' => $total,
            'status' => 'pending',
        ]);

        foreach ($carts as $cart) {

            OrderDetail::create([
                'order_id' => $order->id,
                'book_id' => $cart->book_id,
                'jumlah' => $cart->jumlah,
                'harga' => $cart->book->harga,
                'subtotal' => $cart->subtotal,
            ]);

        }

        Cart::where('user_id', Auth::id())->delete();

        return redirect()
            ->route('books.index')
            ->with('success', 'Pembayaran berhasil');
    }
}

        $cart = session()->get('cart', []);

        $total = 0;
        foreach ($cart as $item) {
            $total += $item['harga'] * $item['jumlah'];
        }

        return view('payment.index', compact('cart','total'));
    }

    public function process(Request $request)
    {
        $request->validate([
            'metode' => 'required'
        ]);

        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->back()->with('error', 'Keranjang kosong');
        }

        // hitung total
        $total = collect($cart)->sum(fn($item) => $item['harga'] * $item['jumlah']);

        // buat order
        $order = Order::create([
            'user_id' => auth()->id(),
            'tanggal' => now(),
            'total'   => $total,
            'status'  => 'pending',
            'metode'  => $request->metode,
        ]);

        // buat order_details
        foreach ($cart as $item) {
            OrderDetail::create([
                'order_id' => $order->id,
                'book_id'  => $item['id'],
                'jumlah'   => $item['jumlah'],
                'harga'    => $item['harga'],
                'subtotal' => $item['harga'] * $item['jumlah'],
            ]);
        }

        // kosongkan keranjang
        session()->forget('cart');

        return view('payment.success', [
            'metode' => $request->metode,
            'order'  => $order
        ]);
    }
}