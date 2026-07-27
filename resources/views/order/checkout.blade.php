@extends('layouts.app')

@section('title', 'Checkout')

@section('content')

<div class="container py-5">

    <div class="mb-4">
        <h2 class="fw-bold mb-1">Checkout</h2>
        <p class="text-muted mb-0">
            Periksa kembali pesanan kamu sebelum checkout.
        </p>
    </div>

    {{-- Pesan error --}}
    @if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}

        <button type="button" class="btn-close" data-bs-dismiss="alert">
        </button>
    </div>
    @endif

    <div class="row g-4">

        {{-- DAFTAR PESANAN --}}
        <div class="col-lg-8">

            <div class="card shadow-sm border-0">

                <div class="card-header bg-white py-3">
                    <h5 class="fw-bold mb-0">
                        Detail Pesanan
                    </h5>
                </div>

                <div class="card-body">

                    @foreach ($carts as $cart)

                    <div class="row align-items-center border-bottom py-3">

                        {{-- GAMBAR --}}
                        <div class="col-md-2">

                            @if ($cart->book->gambar)

                            <img src="{{ asset('storage/' . $cart->book->gambar) }}" alt="{{ $cart->book->judul }}"
                                class="img-fluid rounded" style="height: 100px; width: 75px; object-fit: cover;">

                            @else

                            <div class="bg-light rounded d-flex align-items-center justify-content-center"
                                style="height: 100px; width: 75px;">

                                <small class="text-muted">
                                    No Image
                                </small>

                            </div>

                            @endif

                        </div>

                        {{-- INFORMASI BUKU --}}
                        <div class="col-md-6">

                            <h6 class="fw-bold mb-1">
                                {{ $cart->book->judul }}
                            </h6>

                            <p class="text-muted mb-1">
                                {{ $cart->book->penulis }}
                            </p>

                            <small class="text-muted">
                                Harga:
                                Rp{{ number_format($cart->book->harga, 0, ',', '.') }}
                            </small>

                        </div>

                        {{-- JUMLAH --}}
                        <div class="col-md-2">

                            <small class="text-muted d-block">
                                Jumlah
                            </small>

                            <span class="fw-semibold">
                                {{ $cart->jumlah }}
                            </span>

                        </div>

                        {{-- SUBTOTAL --}}
                        <div class="col-md-2 text-end">

                            <small class="text-muted d-block">
                                Subtotal
                            </small>

                            <span class="fw-bold">
                                Rp{{ number_format($cart->subtotal, 0, ',', '.') }}
                            </span>

                        </div>

                    </div>

                    @endforeach

                </div>

            </div>

        </div>

        {{-- RINGKASAN --}}
        <div class="col-lg-4">

            <div class="card shadow-sm border-0">

                <div class="card-header bg-white py-3">
                    <h5 class="fw-bold mb-0">
                        Ringkasan Pembayaran
                    </h5>
                </div>

                <div class="card-body">

                    <div class="d-flex justify-content-between mb-3">

                        <span>
                            Total Item
                        </span>

                        <span class="fw-semibold">
                            {{ $carts->sum('jumlah') }}
                        </span>

                    </div>

                    <div class="d-flex justify-content-between mb-3">

                        <span>
                            Total Harga
                        </span>

                        <span>
                            Rp{{ number_format($total, 0, ',', '.') }}
                        </span>

                    </div>

                    <hr>

                    <div class="d-flex justify-content-between mb-4">

                        <span class="fw-bold">
                            Total Pembayaran
                        </span>

                        <span class="fw-bold text-primary fs-5">
                            Rp{{ number_format($total, 0, ',', '.') }}
                        </span>

                    </div>

                    {{-- FORM CHECKOUT --}}
                    <form action="{{ route('checkout.store') }}" method="POST">

                        @csrf

                        <button type="submit" class="btn btn-primary w-100"
                            onclick="return confirm('Apakah kamu yakin ingin melakukan checkout?')">

                            Checkout Sekarang

                        </button>

                    </form>

                    <a href="{{ route('cart.index') }}" class="btn btn-outline-secondary w-100 mt-2">

                        Kembali ke Keranjang

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection