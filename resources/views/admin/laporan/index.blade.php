@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Laporan Penjualan</h1>
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID Pesanan</th>
                <th>User</th>
                <th>Tanggal</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @forelse($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->user->name }}</td>
                <td>{{ $order->tanggal }}</td>
                <td>Rp{{ number_format($order->total,0,',','.') }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center">Belum ada laporan</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
