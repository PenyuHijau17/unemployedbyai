<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{

    public function index()
    {

        $cart = session()->get('cart', []);


        $total = 0;


        foreach ($cart as $item) {

            $total += $item['harga'] * $item['jumlah'];

        }


        return view('payment.index', compact(
            'cart',
            'total'
        ));

    }



    public function process(Request $request)
    {

        $request->validate([

            'metode' => 'required'

        ]);



        $metode = $request->metode;



        // kosongkan keranjang setelah bayar

        session()->forget('cart');



        return view('payment.success', compact(
            'metode'
        ));

    }


}