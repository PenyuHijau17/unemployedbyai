@extends('layouts.app')

@section('title', 'Home')

@section('content')

<!-- Hero -->
<div class="bg-primary text-white rounded-4 p-5 mb-5">
    <div class="text-center">

        <h1 class="display-4 fw-bold">
            Selamat Datang di Toko Buku Online
        </h1>

        <p class="lead">
            Temukan berbagai koleksi buku terbaik dengan harga terjangkau.
        </p>

        <a href="{{ route('books.customer') }}" class="btn btn-warning btn-lg px-4 py-3">
            Jelajahi Buku
        </a>

    </div>
</div>

<!-- Kategori -->
<h2 class="mb-4 text-center">Kategori Buku</h2>

<div class="row g-4 mb-5">

    <div class="col-md-3">
        <div class="card text-center shadow h-100">
            <div class="card-body">
                <h3>📖</h3>
                <h5>Novel</h5>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-center shadow h-100">
            <div class="card-body">
                <h3>📚</h3>
                <h5>Pendidikan</h5>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-center shadow h-100">
            <div class="card-body">
                <h3>🎨</h3>
                <h5>Komik</h5>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-center shadow h-100">
            <div class="card-body">
                <h3>💻</h3>
                <h5>Teknologi</h5>
            </div>
        </div>
    </div>

</div>

<!-- Buku Terbaru -->
<h2 class="mb-4 text-center">Buku Terbaru</h2>

<div class="row">

    @for($i = 1; $i <= 4; $i++) <div class="col-lg-3 col-md-6 mb-4">

        <div class="card shadow h-100">

            <img src="https://placehold.co/300x400?text=Buku+{{ $i }}" class="card-img-top" alt="Buku">

            <div class="card-body">

                <h5 class="card-title">
                    Judul Buku {{ $i }}
                </h5>

                <p class="text-muted">
                    Penulis Buku
                </p>

                <h5 class="text-primary">
                    Rp100.000
                </h5>

                <a href="#" class="btn btn-primary w-100">
                    Detail Buku
                </a>

            </div>

        </div>

</div>

@endfor

</div>

@endsection