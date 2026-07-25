@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Pesanan #{{ $order->id }}</h1>
    <p><strong>User:</strong> {{ $order->user->name }}</p>
    <p><strong>Tanggal:</strong> {{ $order->tanggal }}</p>
    <p><strong>Total:</strong> Rp{{ number_format($order->total,0,',','.') }}</p>
    <p><strong>Status:</strong> {{ $order->status }}</p>

    <h3>Detail Item</h3>
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Buku</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->orderDetails as $detail)
            <tr>
                <td>{{ $detail->book->judul }}</td>
                <td>{{ $detail->jumlah }}</td>
                <td>Rp{{ number_format($detail->harga,0,',','.') }}</td>
                <td>Rp{{ number_format($detail->subtotal,0,',','.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
