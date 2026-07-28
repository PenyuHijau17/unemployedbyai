<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;


class CartController extends Controller
{


    public function add(Request $request, Book $book)
    {


        $request->validate([

            'jumlah' => 'required|integer|min:1'

        ]);



        $cart = session()->get('cart', []);



        if(isset($cart[$book->id])){


            $cart[$book->id]['jumlah'] += $request->jumlah;


        } else {


            $cart[$book->id] = [

                'id' => $book->id,

                'judul' => $book->judul,

                'harga' => $book->harga,

                'gambar' => $book->gambar,

                'jumlah' => $request->jumlah

            ];


        }



        session()->put('cart',$cart);



        return redirect()
            ->route('cart.index')
            ->with('success','Buku berhasil ditambahkan ke keranjang');

    }





    public function index()
    {


        $cart = session()->get('cart',[]);



        return view('cart.index', compact('cart'));

    }





    public function remove($id)
    {


        $cart = session()->get('cart',[]);



        unset($cart[$id]);



        session()->put('cart',$cart);



        return redirect()
            ->route('cart.index');

    }


}