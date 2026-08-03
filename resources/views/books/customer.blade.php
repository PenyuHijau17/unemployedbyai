@extends('layouts.app')

@section('title','Koleksi Buku')

@section('content')

<style>

@import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap');

:root{

    --primary:#005BAA;
    --primary-dark:#003A70;
    --primary-light:#EAF4FF;

    --secondary:#0078D7;

    --gold:#D4AF37;
    --gold-light:#F8E8A8;

    --white:#FFFFFF;

    --background:#F5F8FC;

    --border:#E5ECF3;

    --text:#22324A;

    --text-light:#718096;

    --shadow:
        0 10px 30px rgba(0,0,0,.05);

    --shadow-hover:
        0 20px 45px rgba(0,0,0,.10);

    --radius:20px;

    --transition:.30s ease;

}

body{
    font-family:'Plus Jakarta Sans',sans-serif;
    background:
    radial-gradient(circle at top right,#DCEEFF 0%,transparent 30%),
    radial-gradient(circle at bottom left,#EEF6FF 0%,transparent 25%),
    var(--background);
    color:var(--text);
}

/* ==========================================================
   SCROLL REVEAL (fade + geser naik saat elemen masuk viewport)
========================================================== */

.reveal,
.reveal-line{
    opacity:0;
}

.reveal{
    transform:translateY(46px);
    transition:opacity .8s cubic-bezier(.19,1,.22,1),
               transform .8s cubic-bezier(.19,1,.22,1);
    will-change:opacity, transform;
}

.reveal.is-visible{
    opacity:1;
    transform:translateY(0);
}

/* cascade / gelombang untuk grid buku, berulang tiap 4 kolom */
.book-results .reveal-item:nth-child(4n+1){ transition-delay:0s;   }
.book-results .reveal-item:nth-child(4n+2){ transition-delay:.08s; }
.book-results .reveal-item:nth-child(4n+3){ transition-delay:.16s; }
.book-results .reveal-item:nth-child(4n+4){ transition-delay:.24s; }

body:not(.reveal-ready) .reveal,
body:not(.reveal-ready) .reveal-line{
    opacity:1;
    transform:none;
}

@media (prefers-reduced-motion: reduce){
    .reveal, .reveal-line{
        opacity:1!important;
        transform:none!important;
        transition:none!important;
    }
}

/* ==========================================================
   CATALOG HEADER (jadi mini-hero navy-gold)
========================================================== */

.catalog-header{
    position:relative;
    background:linear-gradient(135deg, var(--primary-dark) 0%, var(--primary) 55%, var(--secondary) 100%);
    border-radius:30px;
    padding:60px 45px;
    margin-bottom:45px;
    overflow:hidden;
    box-shadow:var(--shadow-hover);
}

.catalog-header::before{
    content:"";
    position:absolute;
    top:-140px;
    right:-100px;
    width:320px;
    height:320px;
    border-radius:50%;
    background:radial-gradient(circle at center, var(--gold) 0%, transparent 70%);
    opacity:.30;
    z-index:0;
    pointer-events:none;
}

.catalog-header::after{
    content:"";
    position:absolute;
    bottom:-130px;
    left:-90px;
    width:280px;
    height:280px;
    border-radius:50%;
    background:radial-gradient(circle at center, #ffffff 0%, transparent 70%);
    opacity:.10;
    z-index:0;
    pointer-events:none;
}

.catalog-header-inner{
    position:relative;
    z-index:1;
}

.catalog-header .header-icon{
    width:74px;
    height:74px;
    margin:0 auto 20px;
    border-radius:50%;
    background:var(--gold);
    display:flex;
    align-items:center;
    justify-content:center;
    box-shadow:0 15px 32px rgba(212,175,55,.40);
}

.catalog-header .header-icon i{
    font-size:32px;
    color:var(--primary-dark);
}

.catalog-header h1{
    color:#fff;
    font-weight:800;
    font-size:2.5rem;
}

.catalog-header p{
    color:rgba(255,255,255,.85);
    font-size:1.05rem;
}

.search-box{
    background:var(--white);
    border-radius:50px;
    padding:8px;
    box-shadow:var(--shadow-hover);
    transition:var(--transition);
    max-width:640px;
    margin:0 auto;
}

.search-box:focus-within{
    box-shadow:0 0 0 5px rgba(212,175,55,.30), var(--shadow-hover);
}

.search-box input{
    border:none;
    background:transparent;
    padding:14px 20px;
    border-radius:50px;
}

.search-box input:focus{
    box-shadow:none;
}

.btn-search{
    background:linear-gradient(135deg,var(--primary),var(--secondary));
    color:white;
    border-radius:50px;
    padding:12px 30px;
    border:none;
    font-weight:700;
    transition:var(--transition);
    white-space:nowrap;
}

.btn-search:hover{
    background:linear-gradient(135deg,var(--primary-dark),var(--primary));
    color:white;
    transform:translateY(-2px);
    box-shadow:0 14px 26px rgba(0,58,112,.35);
}

.filter-area{
    margin-top:28px;
}

.filter-btn{
    display:inline-flex;
    align-items:center;
    gap:6px;
    text-decoration:none;
    background:rgba(255,255,255,.12);
    color:#fff;
    border:1px solid rgba(255,255,255,.35);
    border-radius:30px;
    padding:10px 20px;
    transition:var(--transition);
    font-weight:600;
    backdrop-filter:blur(6px);
    -webkit-backdrop-filter:blur(6px);
}

.filter-btn:hover{
    background:var(--gold);
    color:var(--primary-dark);
    border-color:var(--gold);
    transform:translateY(-2px);
}

.filter-active{
    background:var(--gold) !important;
    color:var(--primary-dark) !important;
    border-color:var(--gold) !important;
    box-shadow:0 10px 22px rgba(212,175,55,.35);
}

/* ==========================================================
   BOOK CARD
========================================================== */

.book-card{
    background:var(--white);
    border:none;
    border-radius:var(--radius);
    overflow:hidden;
    height:100%;
    box-shadow:var(--shadow);
    transition:var(--transition);
}

.book-card:hover{
    transform:translateY(-10px);
    box-shadow:var(--shadow-hover);
}

.book-image{
    position:relative;
    height:280px;
    background:var(--primary-light);
    padding:20px;
    overflow:hidden;
}

.book-image-link{
    display:flex;
    align-items:center;
    justify-content:center;
    width:100%;
    height:100%;
}

.book-image img{
    max-height:250px;
    max-width:100%;
    object-fit:contain;
    transition:transform .5s cubic-bezier(.19,1,.22,1);
}

.book-card:hover .book-image img{
    transform:scale(1.07);
}

.no-image{
    font-size:70px;
    color:var(--primary);
}

.book-quickview{
    position:absolute;
    inset:0;
    background:linear-gradient(180deg, rgba(0,58,112,0) 45%, rgba(0,58,112,.60));
    display:flex;
    align-items:flex-end;
    justify-content:center;
    padding-bottom:18px;
    opacity:0;
    transition:var(--transition);
    pointer-events:none;
}

.book-card:hover .book-quickview{
    opacity:1;
}

.book-quickview span{
    background:var(--gold);
    color:var(--primary-dark);
    padding:8px 18px;
    border-radius:30px;
    font-weight:700;
    font-size:.85rem;
    transform:translateY(10px);
    transition:var(--transition);
}

.book-card:hover .book-quickview span{
    transform:translateY(0);
}

.book-body{
    padding:25px;
}

.book-title{
    color:var(--primary-dark);
    font-size:18px;
    font-weight:700;
    min-height:55px;
}

.book-author{
    color:var(--text-light);
    font-size:14px;
}

.book-price{
    color:var(--primary-dark);
    font-size:22px;
    font-weight:800;
}

.category-tag{
    background:var(--gold-light);
    color:var(--primary-dark);
    font-size:13px;
    font-weight:700;
    padding:5px 12px;
    border-radius:20px;
    display:inline-block;
    margin-bottom:10px;
}

.result-info{
    color:var(--text-light);
    margin-bottom:20px;
    font-weight:500;
}

.result-info strong{
    color:var(--primary-dark);
}

.empty-state{
    background:var(--white);
    border:1px solid var(--border);
    border-radius:var(--radius);
    padding:50px 30px;
    text-align:center;
    box-shadow:var(--shadow);
}

.empty-state i{
    font-size:48px;
    color:var(--primary);
    margin-bottom:15px;
    display:block;
}

.empty-state h5{
    color:var(--primary-dark);
    font-weight:700;
}

.empty-state p{
    color:var(--text-light);
    margin:0;
}

</style>

<script>document.body.classList.add('reveal-ready');</script>

<div class="container py-5">

<div class="catalog-header text-center reveal">

<div class="catalog-header-inner">

<div class="header-icon">
<i class="bi bi-bookshelf"></i>
</div>

<h1>

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

</div>

<div class="result-info reveal">

Menampilkan <strong>{{ $books->count() }}</strong> buku

@if(request('search'))

untuk pencarian

<strong>"{{ request('search') }}"</strong>

@endif

</div>

<div class="row g-4 book-results">

@forelse($books as $book)

<div class="col-xl-3 col-lg-4 col-md-6 reveal reveal-item">

<div class="book-card">

<div class="book-image">

<a href="{{ route('books.customer.show',$book->id) }}" class="book-image-link">

@if($book->gambar)

<img
src="{{ asset('storage/'.$book->gambar) }}"
alt="{{ $book->judul }}">

@else

<div class="no-image">

<i class="bi bi-book"></i>

</div>

@endif

</a>

<div class="book-quickview">
<span><i class="bi bi-eye me-1"></i> Lihat Detail</span>
</div>

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

<div class="book-price">

Rp {{ number_format($book->harga,0,',','.') }}

</div>

</div>

</div>

</div>

@empty

<div class="col-12 reveal">

<div class="empty-state">

<i class="bi bi-search"></i>

<h5 class="mb-2">

Buku tidak ditemukan

</h5>

<p>

Coba gunakan kata kunci lain atau pilih kategori yang berbeda.

</p>

</div>

</div>

@endforelse

</div>

</div>

<script>
document.addEventListener('DOMContentLoaded', function () {

    var revealEls = document.querySelectorAll('.reveal, .reveal-line');

    if (!('IntersectionObserver' in window)) {
        revealEls.forEach(function (el) { el.classList.add('is-visible'); });
        return;
    }

    var observer = new IntersectionObserver(function (entries, obs) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                obs.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.12,
        rootMargin: '0px 0px -60px 0px'
    });

    revealEls.forEach(function (el) { observer.observe(el); });

});
</script>

@endsection