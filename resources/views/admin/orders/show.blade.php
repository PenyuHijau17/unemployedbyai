@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Detail Pesanan #{{ $order->id }}</h1>
    <p><strong>User:</strong> {{ $order->user->name }}</p>
    <p><strong>Tanggal:</strong> {{ $order->tanggal }}</p>
    <p><strong>Total:</strong> Rp{{ number_format($order->total,0,',','.') }}</p>
    <p><strong>Status:</strong> {{ $order->status }}</p>
    <p><strong>Metode:</strong> {{ $order->metode }}</p>

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

    <h3>Ubah Status Pesanan</h3>
    <form action="{{ route('orders.updateStatus', $order->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <select name="status" class="form-select">
                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="diproses" {{ $order->status == 'diproses' ? 'selected' : '' }}>Diproses</option>
                <option value="selesai" {{ $order->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update Status</button>
    </form>
</div>
@endsection
