<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{

    public function index()
    {

        $orders = Order::where('user_id', auth()->id())
            ->latest()
            ->get();


        return view('customer.orders.index', compact('orders'));

    }


    public function show(Order $order)
    {

        return view('customer.orders.show', compact('order'));

    }

}