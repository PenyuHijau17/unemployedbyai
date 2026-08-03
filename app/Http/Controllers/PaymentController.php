<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;

class PaymentController extends Controller
{
    public function index()
    {
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
       $address = auth()->user()
    ->addresses()
    ->where('utama', true)
    ->first();

$address = auth()->user()
    ->addresses()
    ->where('utama', true)
    ->first();


if(!$address){

    return redirect()
        ->back()
        ->with('error','Silahkan pilih alamat utama terlebih dahulu');

}


$order = Order::create([

    'user_id' => auth()->id(),

    'address_id' => $address->id,

    'tanggal' => now(),

    'total' => $total,

    'status' => 'pending',

    'metode' => $request->metode,

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
