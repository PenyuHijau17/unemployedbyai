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


        foreach($carts as $cart){

            $total += $cart->subtotal;

        }


        return view('payment.index', compact('carts','total'));
    }



    public function store(Request $request)
    {

        $carts = Cart::where('user_id', Auth::id())
            ->with('book')
            ->get();



        $total = 0;


        foreach($carts as $cart){

            $total += $cart->subtotal;

        }



        // buat order

        $order = Order::create([

            'user_id' => Auth::id(),

            'tanggal' => now(),

            'total' => $total,

            'status' => 'pending'

        ]);




        // masukin detail order

        foreach($carts as $cart){


            OrderDetail::create([

                'order_id' => $order->id,

                'book_id' => $cart->book_id,

                'jumlah' => $cart->jumlah,

                'harga' => $cart->book->harga,

                'subtotal' => $cart->subtotal

            ]);

        }



        // kosongkan keranjang

        Cart::where('user_id', Auth::id())->delete();



        return redirect()
            ->route('books.index')
            ->with('success','Pembayaran berhasil');


    }

}