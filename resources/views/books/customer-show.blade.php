@extends('layouts.app')

@section('title',$book->judul)

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
   DETAIL CARD
========================================================== */

.book-detail-section{
    padding:50px 0;
}

.book-detail-card{
    background:var(--white);
    border-radius:var(--radius);
    overflow:hidden;
    box-shadow:var(--shadow);
    transition:var(--transition);
}

.book-detail-card:hover{
    box-shadow:var(--shadow-hover);
}

.detail-cover-wrap{
    background:var(--primary-light);
    border-radius:25px;
    padding:30px;
    height:500px;
    display:flex;
    align-items:center;
    justify-content:center;
    transition:var(--transition);
}

.book-detail-card:hover .detail-cover-wrap{
    background:#DCE8F5;
}

.detail-cover-wrap img{
    max-height:430px;
    max-width:100%;
    object-fit:contain;
    transition:transform .5s cubic-bezier(.19,1,.22,1);
}

.book-detail-card:hover .detail-cover-wrap img{
    transform:scale(1.04);
}

.no-cover{
    font-size:80px;
    color:var(--primary);
}

.detail-content{
    padding:20px 0;
}

.category-badge{
    display:inline-block;
    background:var(--gold-light);
    color:var(--primary-dark);
    font-size:13px;
    font-weight:700;
    padding:6px 16px;
    border-radius:30px;
    margin-bottom:16px;
}

.book-title{
    color:var(--primary-dark);
    font-size:38px;
    font-weight:800;
    line-height:1.2;
}

.info-list{
    color:var(--text-light);
    font-size:16px;
    margin-top:20px;
}

.info-list p{
    margin-bottom:10px;
}

.info-list i{
    color:var(--gold);
    width:25px;
    font-size:16px;
}

.price-row{
    display:flex;
    align-items:center;
    gap:20px;
    margin:20px 0;
    flex-wrap:wrap;
}

.price{
    color:var(--primary-dark);
    font-size:34px;
    font-weight:800;
}

.stock-badge{
    background:#E8F5E9;
    color:#2E7D32;
    display:inline-flex;
    align-items:center;
    gap:6px;
    padding:8px 18px;
    border-radius:20px;
    font-weight:600;
    font-size:14px;
}

.stock-badge i{
    color:#2E7D32;
}

.cart-form{
    margin-top:24px;
    padding-top:24px;
    border-top:1px solid var(--border);
}

.cart-form label{
    font-weight:600;
    color:var(--text);
    margin-bottom:10px;
    display:block;
}

.quantity-input{
    width:120px;
    border-radius:12px;
    padding:10px 14px;
    border:2px solid var(--border);
    font-weight:600;
    color:var(--text);
    transition:var(--transition);
    background:var(--white);
}

.quantity-input:focus{
    outline:none;
    border-color:var(--gold);
    box-shadow:0 0 0 4px rgba(212,175,55,.2);
}

.btn-cart{
    background:linear-gradient(135deg,var(--primary),var(--secondary));
    color:white;
    border:none;
    border-radius:50px;
    padding:14px 40px;
    font-weight:700;
    font-size:15px;
    transition:var(--transition);
    display:inline-flex;
    align-items:center;
    gap:8px;
}

.btn-cart:hover{
    background:linear-gradient(135deg,var(--primary-dark),var(--primary));
    color:white;
    transform:translateY(-2px);
    box-shadow:0 14px 26px rgba(0,58,112,.35);
}

.btn-cart i{
    font-size:18px;
}

.description-card{
    margin-top:30px;
    background:var(--primary-light);
    padding:30px 35px;
    border-radius:var(--radius);
    border-left:5px solid var(--gold);
    transition:var(--transition);
}

.description-card:hover{
    background:#DCE8F5;
}

.description-card h4{
    color:var(--primary-dark);
    font-weight:700;
    font-size:20px;
    margin-bottom:15px;
}

.description-card h4 i{
    color:var(--gold);
}

.description-card p{
    color:var(--text-light);
    font-size:15px;
    line-height:1.8;
}

/* ==========================================================
   NAV BACK LINK
========================================================== */

.back-link{
    display:inline-flex;
    align-items:center;
    gap:8px;
    color:var(--primary);
    text-decoration:none;
    font-weight:600;
    margin-bottom:25px;
    transition:var(--transition);
}

.back-link:hover{
    color:var(--primary-dark);
    gap:12px;
}

/* ==========================================================
   RESPONSIVE
========================================================== */

@media(max-width:992px){
    .detail-cover-wrap{
        height:380px;
    }
    .book-title{
        font-size:30px;
    }
    .price{
        font-size:28px;
    }
}

@media(max-width:768px){
    .book-detail-section{
        padding:20px 0;
    }
    .detail-cover-wrap{
        height:300px;
        padding:20px;
    }
    .book-title{
        font-size:26px;
    }
    .detail-content{
        padding:15px 0;
    }
    .description-card{
        padding:20px;
    }
    .price{
        font-size:24px;
    }
}

</style>

<script>document.body.classList.add('reveal-ready');</script>

<div class="container book-detail-section">

    <a href="{{ route('books.customer') }}" class="back-link reveal">
        <i class="bi bi-arrow-left"></i>
        Kembali ke Koleksi
    </a>

    <div class="book-detail-card p-4 p-lg-5 reveal">

        <div class="row align-items-center g-5">

            {{-- COVER --}}
            <div class="col-lg-5">
                <div class="detail-cover-wrap">
                    @if($book->gambar)
                        <img src="{{ asset('storage/'.$book->gambar) }}" alt="{{ $book->judul }}">
                    @else
                        <div class="no-cover">
                            <i class="bi bi-book"></i>
                        </div>
                    @endif
                </div>
            </div>

            {{-- INFO --}}
            <div class="col-lg-7">
                <div class="detail-content">

                    <span class="category-badge">
                        {{ $book->category->nama_kategori ?? 'Umum' }}
                    </span>

                    <h1 class="book-title">{{ $book->judul }}</h1>

                    <div class="info-list">
                        <p>
                            <i class="bi bi-person"></i>
                            {{ $book->penulis }}
                        </p>
                        <p>
                            <i class="bi bi-building"></i>
                            {{ $book->penerbit }}
                        </p>
                        <p>
                            <i class="bi bi-calendar"></i>
                            {{ $book->tahun_terbit }}
                        </p>
                    </div>

                    <div class="price-row">
                        <span class="price">
                            Rp {{ number_format($book->harga,0,',','.') }}
                        </span>
                        <span class="stock-badge">
                            <i class="bi bi-check-circle"></i>
                            Stok: {{ $book->stok }}
                        </span>
                    </div>

                    <form action="{{ route('cart.add',$book->id) }}" method="POST" class="cart-form">
                        @csrf

                        <label for="jumlah">Jumlah</label>
                        <input
                            type="number"
                            name="jumlah"
                            id="jumlah"
                            value="1"
                            min="1"
                            max="{{ $book->stok }}"
                            class="quantity-input mb-3 d-block">

                        <button class="btn btn-cart">
                            <i class="bi bi-cart-plus"></i>
                            Tambah ke Keranjang
                        </button>
                    </form>

                </div>
            </div>

        </div>

        {{-- DESKRIPSI --}}
        <div class="description-card reveal">
            <h4>
                <i class="bi bi-card-text me-2"></i>
                Deskripsi Buku
            </h4>
            <p class="mb-0">
                {{ $book->deskripsi ?? 'Belum ada deskripsi.' }}
            </p>
        </div>

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
