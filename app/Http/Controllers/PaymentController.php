<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);

        $total = collect($cart)->sum(function ($item) {
            return $item['harga'] * $item['jumlah'];
        });

        return view('payment.index', compact('cart', 'total'));
    }

    public function process(Request $request)
    {
        $request->validate([
            'metode' => 'required',
        ]);

        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()
                ->route('cart.index')
                ->with('error', 'Keranjang kosong.');
        }

        $address = auth()->user()
            ->addresses()
            ->where('utama', true)
            ->first();

        if (!$address) {
            return redirect()
                ->back()
                ->with('error', 'Silahkan pilih alamat utama terlebih dahulu.');
        }

        DB::beginTransaction();

        try {

            $total = collect($cart)->sum(function ($item) {
                return $item['harga'] * $item['jumlah'];
            });

            $order = Order::create([
                'user_id'    => auth()->id(),
                'address_id' => $address->id,
                'tanggal'    => now(),
                'total'      => $total,
                'status'     => 'pending',
                'metode'     => $request->metode,
            ]);

            foreach ($cart as $item) {

                OrderDetail::create([
                    'order_id' => $order->id,
                    'book_id'  => $item['id'],
                    'jumlah'   => $item['jumlah'],
                    'harga'    => $item['harga'],
                    'subtotal' => $item['harga'] * $item['jumlah'],
                ]);

            }

            DB::commit();

            session()->forget('cart');

            return view('payment.success', [
                'order'   => $order,
                'metode'  => $request->metode,
            ]);

        } catch (\Exception $e) {

            DB::rollBack();

            return redirect()
                ->route('cart.index')
                ->with('error', $e->getMessage());
        }
    }
}