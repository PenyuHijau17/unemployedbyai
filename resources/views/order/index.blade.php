@extends('layouts.app')

@section('title', 'Riwayat Pesanan')

@section('content')

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold mb-1">
                Riwayat Pesanan
            </h2>

            <p class="text-muted mb-0">
                Daftar semua pesanan yang pernah kamu buat.
            </p>
        </div>

        <a href="{{ route('books.customer') }}" class="btn btn-outline-primary">
            ← Belanja Lagi
        </a>

    </div>


    @if(session('success'))

    <div class="alert alert-success">
        {{ session('success') }}
    </div>

    @endif


    @if(session('error'))

    <div class="alert alert-danger">
        {{ session('error') }}
    </div>

    @endif


    @if($orders->isEmpty())

    <div class="card shadow-sm border-0">

        <div class="card-body text-center py-5">

            <div style="font-size: 60px;">
                📦
            </div>

            <h4 class="fw-bold mt-3">
                Belum Ada Pesanan
            </h4>

            <p class="text-muted">
                Kamu belum melakukan pembelian.
            </p>

            <a href="{{ route('books.customer') }}" class="btn btn-primary">
                Mulai Belanja
            </a>

        </div>

    </div>

    @else

    <div class="card shadow-sm border-0">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-light">

                        <tr>
                            <th>No</th>
                            <th>ID Pesanan</th>
                            <th>Tanggal</th>
                            <th>Total Item</th>
                            <th>Total Harga</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>

                    </thead>

                    <tbody>

                        @foreach($orders as $order)

                        <tr>

                            <td>
                                {{ $loop->iteration }}
                            </td>

                            <td>
                                <strong>
                                    #{{ $order->id }}
                                </strong>
                            </td>

                            <td>
                                {{ $order->tanggal->format('d/m/Y') }}
                            </td>

                            <td>
                                {{ $order->orderDetails->sum('jumlah') }}
                            </td>

                            <td>
                                <strong>
                                    Rp{{ number_format($order->total, 0, ',', '.') }}
                                </strong>
                            </td>

                            <td>

                                @if($order->status === 'Menunggu')

                                <span class="badge bg-warning text-dark">
                                    Menunggu
                                </span>

                                @elseif($order->status === 'Diproses')

                                <span class="badge bg-info">
                                    Diproses
                                </span>

                                @elseif($order->status === 'Selesai')

                                <span class="badge bg-success">
                                    Selesai
                                </span>

                                @elseif($order->status === 'Dibatalkan')

                                <span class="badge bg-danger">
                                    Dibatalkan
                                </span>

                                @else

                                <span class="badge bg-secondary">
                                    {{ $order->status }}
                                </span>

                                @endif

                            </td>

                            <td>

                                <a href="{{ route('orders.show', $order->id) }}" class="btn btn-primary btn-sm">
                                    Detail
                                </a>

                            </td>

                        </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </div>

    @endif

</div>

@endsection