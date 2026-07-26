<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::with('book')
            ->where('user_id', Auth::id())
            ->get();

        return view('cart.index', compact('carts'));
    }


    public function store(Request $request)
    {
        $book = Book::findOrFail($request->book_id);


        $cart = Cart::where('user_id', Auth::id())
            ->where('book_id', $book->id)
            ->first();


        if ($cart) {

            $cart->jumlah += 1;
            $cart->subtotal = $cart->jumlah * $book->harga;
            $cart->save();

        } else {

            Cart::create([
                'user_id' => Auth::id(),
                'book_id' => $book->id,
                'jumlah' => 1,
                'subtotal' => $book->harga
            ]);

        }


        return redirect()
            ->route('cart.index')
            ->with('success', 'Buku berhasil ditambahkan ke keranjang.');
    }


    public function destroy(Cart $cart)
    {
        $cart->delete();

        return redirect()
            ->route('cart.index')
            ->with('success', 'Buku berhasil dihapus.');
    }
}