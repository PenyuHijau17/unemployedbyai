@extends('layouts.app')

@section('title','Koleksi Buku')

@section('content')

<style>

body{
    background:#F8F6F2;
}

.catalog-header{
    background:#F2ECE2;
    border-radius:25px;
    padding:45px;
    margin-bottom:40px;
}

.catalog-header h1{
    color:#4E392B;
    font-weight:700;
}

.catalog-header p{
    color:#777;
}

.search-box{
    background:white;
    border-radius:50px;
    padding:8px;
    box-shadow:0 8px 20px rgba(0,0,0,.05);
}

.search-box input{
    border:none;
    padding:14px 20px;
    border-radius:50px;
}

.search-box input:focus{
    box-shadow:none;
}

.btn-search{
    background:#6A513B;
    color:white;
    border-radius:50px;
    padding:12px 30px;
    border:none;
}

.btn-search:hover{
    background:#523E2E;
    color:white;
}

.filter-area{
    margin-top:25px;
}

.filter-btn{
    display:inline-block;
    text-decoration:none;
    background:white;
    color:#6A513B;
    border:1px solid #D8C7AF;
    border-radius:30px;
    padding:10px 20px;
    transition:.3s;
    font-weight:500;
}

.filter-btn:hover{
    background:#6A513B;
    color:white;
    border-color:#6A513B;
}

.filter-active{
    background:#6A513B !important;
    color:white !important;
    border-color:#6A513B !important;
}

.book-card{
    background:white;
    border:none;
    border-radius:25px;
    overflow:hidden;
    height:100%;
    box-shadow:0 10px 25px rgba(0,0,0,.06);
    transition:.3s;
}

.book-card:hover{
    transform:translateY(-8px);
    box-shadow:0 15px 35px rgba(0,0,0,.12);
}

.book-image{
    height:280px;
    background:#F5EFE6;
    display:flex;
    align-items:center;
    justify-content:center;
    padding:20px;
}

.book-image img{
    max-height:250px;
    max-width:100%;
    object-fit:contain;
}

.no-image{
    font-size:70px;
    color:#A8844F;
}

.book-body{
    padding:25px;
}

.book-title{
    color:#4E392B;
    font-size:18px;
    font-weight:700;
    min-height:55px;
}

.book-author{
    color:#777;
    font-size:14px;
}

.book-price{
    color:#A8844F;
    font-size:22px;
    font-weight:700;
}

.btn-detail{
    background:#6A513B;
    color:white;
    border-radius:30px;
    padding:10px;
    border:none;
}

.btn-detail:hover{
    background:#523E2E;
    color:white;
}

.category-tag{
    background:#E8DCC8;
    color:#6A513B;
    font-size:13px;
    padding:5px 12px;
    border-radius:20px;
    display:inline-block;
    margin-bottom:10px;
}

.result-info{
    color:#666;
    margin-bottom:20px;
    font-weight:500;
}

</style>

<div class="container py-5">

<div class="catalog-header text-center">

<h1>

<i class="bi bi-bookshelf me-2"></i>

Koleksi Buku

</h1>

<p>

Temukan buku favoritmu dari berbagai kategori pilihan.

</p>

<form action="{{ route('books.customer') }}" method="GET">

<div class="search-box d-flex">

<input
type="text"
name="search"
value="{{ request('search') }}"
class="form-control"
placeholder="Cari judul, penulis, atau penerbit...">

@if(request('category'))
<input
type="hidden"
name="category"
value="{{ request('category') }}">
@endif

<button class="btn btn-search">

<i class="bi bi-search me-2"></i>

Cari

</button>

</div>

</form>

<div class="filter-area d-flex flex-wrap justify-content-center gap-2">

<a
href="{{ route('books.customer',['search'=>request('search')]) }}"
class="filter-btn {{ request('category') ? '' : 'filter-active' }}">

<i class="bi bi-grid"></i>

Semua

</a>

@foreach($categories as $category)

<a
href="{{ route('books.customer',[
'search'=>request('search'),
'category'=>$category->id
]) }}"
class="filter-btn {{ request('category') == $category->id ? 'filter-active' : '' }}">

<i class="bi bi-bookmark-fill me-1"></i>

{{ $category->nama_kategori }}

</a>

@endforeach

</div>

</div>

<div class="result-info">

Menampilkan <strong>{{ $books->count() }}</strong> buku

@if(request('search'))

untuk pencarian

<strong>"{{ request('search') }}"</strong>

@endif

</div>

<div class="row g-4">

@forelse($books as $book)

<div class="col-xl-3 col-lg-4 col-md-6">

<div class="book-card">

<div class="book-image">

@if($book->gambar)

<img
src="{{ asset('storage/'.$book->gambar) }}"
alt="{{ $book->judul }}">

@else

<div class="no-image">

<i class="bi bi-book"></i>

</div>

@endif

</div>

<div class="book-body">

<span class="category-tag">

{{ $book->category->nama_kategori ?? 'Umum' }}

</span>

<h5 class="book-title">

{{ $book->judul }}

</h5>

<p class="book-author">

<i class="bi bi-person"></i>

{{ $book->penulis }}

</p>

<div class="book-price mb-3">

Rp {{ number_format($book->harga,0,',','.') }}

</div>

<a
href="{{ route('books.customer.show',$book->id) }}"
class="btn btn-detail w-100">

<i class="bi bi-eye me-2"></i>

Lihat Detail

</a>

</div>

</div>

</div>

@empty

<div class="col-12">

<div class="alert alert-warning text-center rounded-4 p-4">

<h5 class="mb-2">

<i class="bi bi-search me-2"></i>

Buku tidak ditemukan

</h5>

<p class="mb-0">

Coba gunakan kata kunci lain atau pilih kategori yang berbeda.

</p>

</div>

</div>

@endforelse

</div>

</div>

@endsection