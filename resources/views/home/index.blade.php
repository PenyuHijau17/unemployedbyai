@extends('layouts.app')

@section('title','Home')

@section('content')

<style>

body{
    background:#F8F6F2;
}

.hero{
    background:#F2ECE2;
    border-radius:25px;
    padding:70px;
    border:1px solid #E5DCCF;
}

.hero h1{
    font-weight:700;
    color:#4E392B;
    font-size:3.2rem;
    line-height:1.2;
}

.hero p{
    color:#6B6258;
    font-size:1.08rem;
    margin-top:20px;
    margin-bottom:30px;
}

.btn-shop{
    background:#6A513B;
    color:white;
    padding:12px 28px;
    border-radius:40px;
    border:none;
    transition:.3s;
}

.btn-shop:hover{
    background:#523E2E;
    color:white;
}

.btn-outline-shop{
    border:1px solid #6A513B;
    color:#6A513B;
    padding:12px 28px;
    border-radius:40px;
    margin-left:10px;
}

.btn-outline-shop:hover{
    background:#6A513B;
    color:white;
}

.hero img{
    width:100%;
    border-radius:20px;
}

.section-title{
    color:#4E392B;
    font-weight:700;
    margin-bottom:40px;
}

.category-card{

    background:white;

    border:none;

    border-radius:20px;

    padding:35px;

    text-align:center;

    transition:.3s;

    box-shadow:0 5px 20px rgba(0,0,0,.05);

}

.category-card:hover{

    transform:translateY(-8px);

}

.category-card i{

    font-size:42px;

    color:#A8844F;

}

.category-card h5{

    margin-top:20px;

    color:#4E392B;

}

.info-card{

    background:white;

    border:none;

    border-radius:20px;

    padding:35px;

    text-align:center;

    box-shadow:0 5px 20px rgba(0,0,0,.05);

}

.info-card h2{

    color:#6A513B;

    font-weight:700;

}

.info-card p{

    margin:0;

    color:#777;

}

.feature-box{

    background:white;

    border-radius:20px;

    padding:35px;

    box-shadow:0 5px 20px rgba(0,0,0,.05);

    height:100%;

}

.feature-box i{

    font-size:42px;

    color:#A8844F;

}

.feature-box h4{

    margin-top:20px;

    color:#4E392B;

}

.feature-box p{

    color:#777;

}

</style>

<div class="hero mb-5">

<div class="row align-items-center">

<div class="col-lg-6">

<span class="badge bg-light text-dark px-3 py-2 mb-3">

📚 Toko Buku Online Terpercaya

</span>

<h1>

Temukan Buku Terbaik untuk Menemani Harimu.

</h1>

<p>

Mulai dari novel, pendidikan, teknologi hingga komik.
Kami menyediakan berbagai koleksi pilihan dengan harga
terjangkau dan kualitas terbaik.

</p>

<a href="{{ route('books.customer') }}" class="btn btn-shop">

<i class="bi bi-book"></i>

Jelajahi Buku

</a>

<a href="{{ route('books.customer') }}" class="btn btn-outline-shop">

Lihat Koleksi

</a>

</div>

<div class="col-lg-6 text-center">

<img src="https://images.unsplash.com/photo-1512820790803-83ca734da794?w=900"
class="img-fluid shadow">

</div>

</div>

</div>

<div class="row text-center mb-5">

    <div class="col-lg-4 col-md-4 mb-4">

        <div class="info-card">

            <i class="bi bi-book-half fs-1 mb-3" style="color:#A8844F;"></i>

            <h2>{{ $totalBooks }}</h2>

            <p>Koleksi Buku</p>

        </div>

    </div>

    <div class="col-lg-4 col-md-4 mb-4">

        <div class="info-card">

            <i class="bi bi-grid fs-1 mb-3" style="color:#A8844F;"></i>

            <h2>{{ $totalCategories }}</h2>

            <p>Kategori Buku</p>

        </div>

    </div>

    <div class="col-lg-4 col-md-4 mb-4">

        <div class="info-card">

            <i class="bi bi-people fs-1 mb-3" style="color:#A8844F;"></i>

            <h2>{{ $totalUsers }}</h2>

            <p>Pelanggan</p>

        </div>

    </div>

</div>

<h2 class="section-title text-center">

Kategori Populer

</h2>

<div class="row g-4 mb-5">

<div class="col-lg-3">

<div class="category-card">

<i class="bi bi-book"></i>

<h5>Novel</h5>

</div>

</div>

<div class="col-lg-3">

<div class="category-card">

<i class="bi bi-mortarboard"></i>

<h5>Pendidikan</h5>

</div>

</div>

<div class="col-lg-3">

<div class="category-card">

<i class="bi bi-cpu"></i>

<h5>Teknologi</h5>

</div>

</div>

<div class="col-lg-3">

<div class="category-card">

<i class="bi bi-palette"></i>

<h5>Komik</h5>

</div>

</div>

</div>

<h2 class="section-title text-center">

Mengapa Memilih Kami?

</h2>

<div class="row g-4">

<div class="col-md-4">

<div class="feature-box">

<i class="bi bi-patch-check"></i>

<h4>Buku Original</h4>

<p>

Kami menyediakan buku original dengan kualitas terbaik
dari berbagai penerbit terpercaya.

</p>

</div>

</div>

<div class="col-md-4">

<div class="feature-box">

<i class="bi bi-wallet2"></i>

<h4>Harga Bersahabat</h4>

<p>

Harga kompetitif dengan berbagai promo menarik
untuk semua pelanggan.

</p>

</div>

</div>

<div class="col-md-4">

<div class="feature-box">

<i class="bi bi-truck"></i>

<h4>Pengiriman Cepat</h4>

<p>

Pesanan diproses dengan cepat dan dikirim
ke seluruh Indonesia.

</p>

</div>

</div>

</div>

@include('partials.footer')

@endsection