@extends('admin.layouts.app')

@section('title','Detail Pesanan')

@section('content')

<div class="container mt-4 fade-up">

    <div class="page-header d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2>Detail Pesanan #{{ $order->id }}</h2>
            <p class="text-muted mb-0">
                Informasi lengkap pesanan pelanggan.
            </p>
        </div>

        <a href="{{ route('orders.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>

    </div>

    <div class="row">

        <div class="col-lg-4 mb-4">

            <div class="info-card">

                <h5 class="mb-4">Informasi Pesanan</h5>

                <div class="info-item">
                    <span>User</span>
                    <strong>{{ $order->user->name }}</strong>
                </div>

                <div class="info-item">
                    <span>Tanggal</span>
                    <strong>{{ $order->tanggal }}</strong>
                </div>

                <div class="info-item">
                    <span>Total</span>
                    <strong>Rp {{ number_format($order->total,0,',','.') }}</strong>
                </div>

                <div class="info-item">
                    <span>Metode</span>
                    <strong>{{ $order->metode }}</strong>
                </div>

                <div class="info-item">
                    <span>Status</span>


    <span class="badge badge-pending">
        Pending
    </span>

@elseif($order->status=='processing')

    <span class="badge badge-process">
        Diproses
    </span>

@elseif($order->status=='shipped')

    <span class="badge bg-info">
        Dikirim
    </span>

@elseif($order->status=='completed')

    <span class="badge badge-success-custom">
        Selesai
    </span>

@endif

                </div>

            </div>

        </div>

        <div class="col-lg-8">

            <div class="table-card mb-4">

                <table class="table modern-table mb-0">

                    <thead>

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

                            <td>Rp {{ number_format($detail->harga,0,',','.') }}</td>

                            <td>Rp {{ number_format($detail->subtotal,0,',','.') }}</td>

                        </tr>

                    @endforeach

                    </tbody>

                </table>

            </div>

            <div class="form-card">

                <h5 class="mb-4">Ubah Status Pesanan</h5>

                <form action="{{ route('orders.updateStatus',$order->id) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="row">

                        <div class="col-md-8">

                            <label class="form-label">Status</label>

                           <select name="status" class="form-select">

    <option value="pending"
    {{ $order->status=='pending'?'selected':'' }}>
        Pending
    </option>


    <option value="processing"
    {{ $order->status=='processing'?'selected':'' }}>
        Diproses
    </option>


    <option value="shipped"
    {{ $order->status=='shipped'?'selected':'' }}>
        Dikirim
    </option>


    <option value="completed"
    {{ $order->status=='completed'?'selected':'' }}>
        Selesai
    </option>

</select>
                        </div>

                        <div class="col-md-4 d-flex align-items-end">

                            <button class="btn btn-modern w-100">
                                Update Status
                            </button>

                        </div>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection