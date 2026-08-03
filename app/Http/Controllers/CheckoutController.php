<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{

    public function index()
    {

        $cart = session()->get('cart', []);


        if(empty($cart)){

            return redirect()
                ->route('cart.index')
                ->with('error','Keranjang kosong');

        }


        $total = 0;

        foreach($cart as $item){

            $total += $item['harga'] * $item['jumlah'];

        }


        $address = Auth::user()
            ->addresses()
            ->where('utama', true)
            ->first();



        return view('checkout.index', compact(
            'cart',
            'total',
            'address'
        ));

    }

}