@extends('layouts.app')

@section('title', 'Home')

@section('content')

<div class="p-5 mb-5 bg-primary text-white rounded-4">
    <div class="container py-4">

        <h1 class="display-5 fw-bold">
            Selamat Datang di Toko Buku Online
        </h1>

        <p class="lead">
            Temukan berbagai koleksi buku terbaik dengan harga terjangkau.
        </p>

        <a href="#" class="btn btn-warning btn-lg">
            Lihat Buku
        </a>

    </div>
</div>

<div class="row">

    <div class="col-md-4 mb-4">
        <div class="card shadow-sm h-100">
            <div class="card-body text-center">
                <h4>📚</h4>
                <h5>Koleksi Lengkap</h5>
                <p>Tersedia berbagai kategori buku untuk semua kalangan.</p>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card shadow-sm h-100">
            <div class="card-body text-center">
                <h4>🚚</h4>
                <h5>Pengiriman Cepat</h5>
                <p>Pesanan diproses dengan cepat dan aman.</p>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card shadow-sm h-100">
            <div class="card-body text-center">
                <h4>💳</h4>
                <h5>Pembayaran Mudah</h5>
                <p>Nikmati proses checkout yang sederhana.</p>
            </div>
        </div>
    </div>

</div>

@endsection