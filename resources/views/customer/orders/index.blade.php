
@extends('layouts.app')

@section('title', 'Pesanan Saya')

@section('content')

<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold mb-1">
                <i class="bi bi-box-seam text-warning"></i>
                Pesanan Saya
            </h2>

            <small class="text-muted">
                Lihat semua riwayat pesanan buku Anda.
            </small>
        </div>

    </div>

    @if($orders->count())

        @foreach($orders as $order)

            <div class="card shadow-sm border-0 rounded-4 mb-4">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>

                            <h6 class="fw-bold">
                                Invoice #{{ $order->id }}
                            </h6>

                            <small class="text-muted">
                                {{ \Carbon\Carbon::parse($order->tanggal)->format('d M Y') }}
                            </small>

                        </div>

                        <div>

                            @if($order->status=='pending')

                                <span class="badge bg-warning">
                                    Pending
                                </span>

                            @elseif($order->status=='processing')

                                <span class="badge bg-primary">
                                    Diproses
                                </span>

                            @elseif($order->status=='shipped')

                                <span class="badge bg-info">
                                    Dikirim
                                </span>

                            @elseif($order->status=='completed')

                                <span class="badge bg-success">
                                    Selesai
                                </span>

                            @endif

                        </div>

                    </div>

                    <hr>

                    @foreach($order->orderDetails as $detail)

                        <div class="d-flex justify-content-between align-items-center mb-3">

                            <div>

                                <h6 class="mb-1">

                                    {{ $detail->book->judul }}

                                </h6>

                                <small class="text-muted">

                                    Jumlah :

                                    {{ $detail->jumlah }}

                                </small>

                            </div>

                            <strong>

                                Rp {{ number_format($detail->subtotal,0,',','.') }}

                            </strong>

                        </div>

                    @endforeach

                    <hr>

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <strong>

                                Total :

                            </strong>

                            Rp {{ number_format($order->total,0,',','.') }}

                        </div>

                        <a href="{{ route('customer.orders.show', $order) }}"
                             class="btn btn-outline-warning rounded-pill">

                             <i class="bi bi-eye"></i>

                             Detail

                        </a>

                    </div>

                </div>

            </div>

        @endforeach

    @else

        <div class="card border-0 shadow rounded-4">

            <div class="card-body text-center py-5">

                <i class="bi bi-bag-x display-1 text-warning"></i>

                <h4 class="mt-3">

                    Belum Ada Pesanan

                </h4>

                <p class="text-muted">

                    Kamu belum pernah melakukan pembelian buku.

                </p>

                <a href="{{ route('books.customer') }}"
                   class="btn btn-warning rounded-pill px-4">

                    Mulai Belanja

                </a>

            </div>

        </div>

    @endif

</div>

@endsection
