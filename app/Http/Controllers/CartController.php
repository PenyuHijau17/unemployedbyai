<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Menampilkan isi keranjang user yang sedang login.
     */
    public function index()
    {
        $carts = Cart::with('book')
            ->where('user_id', Auth::id())
            ->get();

        $total = $carts->sum('subtotal');

        return view('cart.index', compact('carts', 'total'));
    }

    /**
     * Menambahkan buku ke keranjang.
     */
    public function store(Request $request, Book $book)
    {
        $request->validate([
            'jumlah' => 'required|integer|min:1',
        ]);

        if ($request->jumlah > $book->stok) {
            return back()->with('error', 'Jumlah buku melebihi stok yang tersedia.');
        }

        $cart = Cart::where('user_id', Auth::id())
            ->where('book_id', $book->id)
            ->first();

        if ($cart) {
            $jumlahBaru = $cart->jumlah + $request->jumlah;

            if ($jumlahBaru > $book->stok) {
                return back()->with('error', 'Jumlah buku di keranjang melebihi stok yang tersedia.');
            }

            $cart->jumlah = $jumlahBaru;
            $cart->subtotal = $jumlahBaru * $book->harga;
            $cart->save();
        } else {
            Cart::create([
                'user_id' => Auth::id(),
                'book_id' => $book->id,
                'jumlah' => $request->jumlah,
                'subtotal' => $request->jumlah * $book->harga,
            ]);
        }

        return redirect()
            ->route('cart.index')
            ->with('success', 'Buku berhasil ditambahkan ke keranjang.');
    }

    /**
     * Mengubah jumlah buku di keranjang.
     */
    public function update(Request $request, Cart $cart)
    {
        $request->validate([
            'jumlah' => 'required|integer|min:1',
        ]);

        if ($cart->user_id !== Auth::id()) {
            abort(403);
        }

        if ($request->jumlah > $cart->book->stok) {
            return back()->with('error', 'Jumlah melebihi stok buku yang tersedia.');
        }

        $cart->jumlah = $request->jumlah;
        $cart->subtotal = $request->jumlah * $cart->book->harga;
        $cart->save();

        return redirect()
            ->route('cart.index')
            ->with('success', 'Jumlah buku berhasil diperbarui.');
    }

    /**
     * Menghapus buku dari keranjang.
     */
    public function destroy(Cart $cart)
    {
        if ($cart->user_id !== Auth::id()) {
            abort(403);
        }

        $cart->delete();

        return redirect()
            ->route('cart.index')
            ->with('success', 'Buku berhasil dihapus dari keranjang.');
    }
}