@extends('layouts.app')

@section('title',$book->judul)

@section('content')

<style>

@import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap');

/* ==========================================================
   LIQUID GLASS BOOK DETAIL
========================================================== */

:root{
    --primary:#005BAA;
    --primary-dark:#003A70;
    --primary-light:#EAF4FF;

    --secondary:#0078D7;

    --gold:#D4AF37;
    --gold-light:#F8E8A8;

    --text:#22324A;
    --text-light:#718096;

    --glass-bg:rgba(255,255,255,.58);
    --glass-strong:rgba(255,255,255,.72);
    --glass-border:rgba(255,255,255,.78);

    --glass-shadow:
        0 20px 60px rgba(0,58,112,.10),
        0 2px 8px rgba(0,0,0,.04);

    --glass-shadow-hover:
        0 30px 80px rgba(0,58,112,.16),
        0 8px 25px rgba(0,91,170,.08);

    --radius:28px;
}

/* ==========================================================
   BODY
========================================================== */

body{
    font-family:'Plus Jakarta Sans',sans-serif;
    color:var(--text);

    background:
        radial-gradient(
            circle at 10% 10%,
            rgba(0,120,215,.18),
            transparent 28%
        ),
        radial-gradient(
            circle at 90% 15%,
            rgba(212,175,55,.16),
            transparent 25%
        ),
        radial-gradient(
            circle at 50% 90%,
            rgba(0,91,170,.12),
            transparent 30%
        ),
        linear-gradient(
            135deg,
            #EEF6FF 0%,
            #F8FBFF 45%,
            #EDF5FF 100%
        );

    min-height:100vh;
}

/* ==========================================================
   BACKGROUND LIQUID BLOBS
========================================================== */

.book-page-bg{
    position:fixed;
    inset:0;
    pointer-events:none;
    overflow:hidden;
    z-index:-1;
}

.liquid-blob{
    position:absolute;
    border-radius:50%;
    filter:blur(2px);
    opacity:.45;
    animation:liquidFloat 12s ease-in-out infinite;
}

.blob-1{
    width:320px;
    height:320px;
    background:rgba(0,91,170,.12);
    top:8%;
    left:-120px;
}

.blob-2{
    width:260px;
    height:260px;
    background:rgba(212,175,55,.12);
    top:48%;
    right:-100px;
    animation-delay:2s;
}

.blob-3{
    width:220px;
    height:220px;
    background:rgba(0,120,215,.10);
    bottom:2%;
    left:30%;
    animation-delay:4s;
}

@keyframes liquidFloat{

    0%,100%{
        transform:translate3d(0,0,0) scale(1);
    }

    50%{
        transform:translate3d(30px,-25px,0) scale(1.08);
    }

}

/* ==========================================================
   MAIN CONTAINER
========================================================== */

.book-detail-section{
    padding:45px 0 80px;
}

/* ==========================================================
   BACK BUTTON
========================================================== */

.back-link{
    display:inline-flex;
    align-items:center;
    gap:9px;

    color:var(--primary-dark);

    text-decoration:none;
    font-weight:700;

    padding:10px 16px;

    border-radius:30px;

    background:rgba(255,255,255,.45);
    border:1px solid rgba(255,255,255,.7);

    backdrop-filter:blur(14px);
    -webkit-backdrop-filter:blur(14px);

    box-shadow:0 8px 25px rgba(0,58,112,.07);

    transition:.35s cubic-bezier(.19,1,.22,1);

    margin-bottom:25px;
}

.back-link:hover{
    transform:translateX(-4px);
    background:rgba(255,255,255,.75);
    color:var(--primary);
    box-shadow:0 12px 30px rgba(0,58,112,.12);
}

/* ==========================================================
   MAIN GLASS CARD
========================================================== */

.book-detail-card{

    position:relative;

    background:
        linear-gradient(
            135deg,
            rgba(255,255,255,.72),
            rgba(255,255,255,.42)
        );

    border:1px solid var(--glass-border);

    border-radius:32px;

    box-shadow:var(--glass-shadow);

    backdrop-filter:blur(28px) saturate(145%);
    -webkit-backdrop-filter:blur(28px) saturate(145%);

    overflow:hidden;

    transition:
        box-shadow .5s ease,
        transform .5s ease;
}

.book-detail-card:hover{
    box-shadow:var(--glass-shadow-hover);
}

/* glass reflection */

.book-detail-card::before{

    content:"";

    position:absolute;

    top:-150px;
    right:-100px;

    width:420px;
    height:420px;

    background:
        radial-gradient(
            circle,
            rgba(255,255,255,.75),
            transparent 68%
        );

    pointer-events:none;
}

.book-detail-card::after{

    content:"";

    position:absolute;

    top:0;
    left:0;
    right:0;

    height:1px;

    background:
        linear-gradient(
            90deg,
            transparent,
            rgba(255,255,255,.95),
            transparent
        );

    pointer-events:none;
}

/* ==========================================================
   COVER GLASS
========================================================== */

.detail-cover-wrap{

    position:relative;

    height:510px;

    display:flex;
    align-items:center;
    justify-content:center;

    border-radius:27px;

    background:
        linear-gradient(
            145deg,
            rgba(255,255,255,.72),
            rgba(226,240,255,.48)
        );

    border:1px solid rgba(255,255,255,.8);

    backdrop-filter:blur(22px);
    -webkit-backdrop-filter:blur(22px);

    box-shadow:
        inset 0 1px 0 rgba(255,255,255,.9),
        inset 0 -1px 0 rgba(0,58,112,.04),
        0 20px 40px rgba(0,58,112,.08);

    overflow:hidden;

    transition:.5s cubic-bezier(.19,1,.22,1);
}

.detail-cover-wrap::before{

    content:"";

    position:absolute;

    width:250px;
    height:250px;

    border-radius:50%;

    background:
        radial-gradient(
            circle,
            rgba(255,255,255,.8),
            transparent 70%
        );

    top:-120px;
    left:-80px;
}

.detail-cover-wrap::after{

    content:"";

    position:absolute;

    width:180px;
    height:180px;

    border-radius:50%;

    background:
        radial-gradient(
            circle,
            rgba(212,175,55,.13),
            transparent 70%
        );

    bottom:-90px;
    right:-50px;
}

.book-detail-card:hover .detail-cover-wrap{

    transform:translateY(-4px);

    box-shadow:
        inset 0 1px 0 rgba(255,255,255,.95),
        0 25px 55px rgba(0,58,112,.13);
}

.detail-cover-wrap img{

    position:relative;
    z-index:2;

    max-height:430px;
    max-width:80%;

    object-fit:contain;

    border-radius:8px;

    box-shadow:
        0 25px 45px rgba(0,0,0,.18);

    transition:
        transform .7s cubic-bezier(.19,1,.22,1),
        box-shadow .7s ease;
}

.detail-cover-wrap:hover img{

    transform:
        translateY(-8px)
        scale(1.035)
        rotateY(-2deg);

    box-shadow:
        0 35px 60px rgba(0,0,0,.22);
}

.no-cover{

    position:relative;
    z-index:2;

    width:150px;
    height:190px;

    border-radius:16px;

    display:flex;
    align-items:center;
    justify-content:center;

    background:
        linear-gradient(
            135deg,
            rgba(0,91,170,.9),
            rgba(0,120,215,.7)
        );

    color:white;

    box-shadow:0 25px 45px rgba(0,58,112,.22);
}

.no-cover i{
    font-size:70px;
}

/* ==========================================================
   BOOK CONTENT
========================================================== */

.detail-content{
    padding:8px 8px 8px 5px;
}

.category-badge{

    display:inline-flex;
    align-items:center;

    background:
        linear-gradient(
            135deg,
            rgba(212,175,55,.92),
            rgba(248,232,168,.8)
        );

    color:var(--primary-dark);

    font-size:12px;
    font-weight:800;

    letter-spacing:.5px;

    padding:8px 16px;

    border-radius:30px;

    border:1px solid rgba(255,255,255,.65);

    box-shadow:
        0 8px 20px rgba(212,175,55,.18);

    margin-bottom:16px;
}

.book-title{

    color:var(--primary-dark);

    font-size:40px;
    font-weight:800;

    line-height:1.18;

    letter-spacing:-1px;

    margin-bottom:18px;
}

/* ==========================================================
   STATS
========================================================== */

.book-stats{

    display:flex;
    align-items:center;
    gap:12px;

    margin:15px 0 25px;

    flex-wrap:wrap;
}

.book-stat{

    display:flex;
    align-items:center;
    gap:8px;

    padding:9px 14px;

    border-radius:30px;

    background:rgba(255,255,255,.45);

    border:1px solid rgba(255,255,255,.75);

    backdrop-filter:blur(14px);
    -webkit-backdrop-filter:blur(14px);

    font-size:13px;
    font-weight:700;

    box-shadow:
        0 6px 18px rgba(0,58,112,.05);
}

.book-stat.rating i{
    color:#E4B82D;
}

.book-stat.sold i{
    color:#2E8B57;
}

/* ==========================================================
   INFO
========================================================== */

.info-list{
    color:var(--text-light);
    font-size:15px;
}

.info-list p{
    margin-bottom:10px;
}

.info-list i{
    color:var(--gold);
    width:25px;
}

/* ==========================================================
   PRICE
========================================================== */

.price-row{

    display:flex;
    align-items:center;

    gap:16px;

    margin:25px 0;

    flex-wrap:wrap;
}

.price{

    color:var(--primary-dark);

    font-size:35px;
    font-weight:800;

    letter-spacing:-1px;
}

.stock-badge{

    display:inline-flex;
    align-items:center;
    gap:7px;

    padding:9px 16px;

    border-radius:30px;

    color:#23733D;

    background:rgba(232,245,233,.72);

    border:1px solid rgba(46,125,50,.12);

    font-size:13px;
    font-weight:700;

    backdrop-filter:blur(12px);
    -webkit-backdrop-filter:blur(12px);
}

/* ==========================================================
   CART
========================================================== */

.cart-form{

    margin-top:25px;

    padding-top:25px;

    border-top:
        1px solid rgba(0,58,112,.08);
}

.cart-form label{

    font-weight:700;

    color:var(--text);

    display:block;

    margin-bottom:9px;
}

.quantity-input{

    width:120px;

    border-radius:16px;

    padding:11px 14px;

    border:1px solid rgba(0,58,112,.12);

    background:rgba(255,255,255,.6);

    color:var(--text);

    font-weight:700;

    backdrop-filter:blur(12px);
    -webkit-backdrop-filter:blur(12px);

    transition:.3s;
}

.quantity-input:focus{

    outline:none;

    border-color:rgba(0,91,170,.4);

    background:rgba(255,255,255,.85);

    box-shadow:
        0 0 0 4px rgba(0,91,170,.08);
}

/* ==========================================================
   LIQUID GLASS BUTTON
========================================================== */

.btn-cart{

    position:relative;

    display:inline-flex;
    align-items:center;
    justify-content:center;

    gap:9px;

    padding:14px 28px;

    border-radius:50px;

    border:1px solid rgba(255,255,255,.5);

    background:
        linear-gradient(
            135deg,
            rgba(0,91,170,.95),
            rgba(0,120,215,.82)
        );

    color:#fff;

    font-size:14px;
    font-weight:800;

    box-shadow:
        0 14px 30px rgba(0,91,170,.25),
        inset 0 1px 0 rgba(255,255,255,.35);

    overflow:hidden;

    transition:
        transform .35s cubic-bezier(.19,1,.22,1),
        box-shadow .35s ease;
}

.btn-cart::before{

    content:"";

    position:absolute;

    top:-100%;
    left:-80%;

    width:50%;
    height:300%;

    background:
        linear-gradient(
            110deg,
            transparent,
            rgba(255,255,255,.45),
            transparent
        );

    transform:rotate(20deg);

    transition:left .8s ease;
}

.btn-cart:hover{

    color:#fff;

    transform:
        translateY(-3px)
        scale(1.025);

    box-shadow:
        0 20px 42px rgba(0,91,170,.32),
        inset 0 1px 0 rgba(255,255,255,.5);
}

.btn-cart:hover::before{
    left:140%;
}

.btn-cart i{
    font-size:18px;
    position:relative;
    z-index:2;
}

.btn-cart{
    position:relative;
    z-index:1;
}

/* ==========================================================
   SLIDING LIQUID GLASS NAVIGATION
========================================================== */

.detail-glass-nav-wrap{

    display:flex;
    justify-content:center;

    margin:35px 0 25px;
}

.detail-glass-nav{

    position:relative;

    display:flex;
    align-items:center;

    gap:4px;

    padding:6px;

    border-radius:50px;

    background:
        linear-gradient(
            135deg,
            rgba(255,255,255,.65),
            rgba(255,255,255,.38)
        );

    border:
        1px solid rgba(255,255,255,.82);

    box-shadow:
        0 15px 45px rgba(0,58,112,.10),
        inset 0 1px 0 rgba(255,255,255,.9);

    backdrop-filter:
        blur(25px)
        saturate(160%);

    -webkit-backdrop-filter:
        blur(25px)
        saturate(160%);

    overflow:hidden;
}

/* INI GLASS YANG NGIKUT MOUSE */

.detail-glass-slider{

    position:absolute;

    top:6px;
    left:6px;

    width:0;
    height:calc(100% - 12px);

    border-radius:40px;

    background:
        linear-gradient(
            135deg,
            rgba(255,255,255,.86),
            rgba(255,255,255,.52)
        );

    border:
        1px solid rgba(255,255,255,.95);

    box-shadow:
        0 7px 25px rgba(0,58,112,.12),
        inset 0 1px 0 rgba(255,255,255,.95);

    backdrop-filter:
        blur(18px)
        saturate(180%);

    -webkit-backdrop-filter:
        blur(18px)
        saturate(180%);

    pointer-events:none;

    opacity:0;

    transform:translateX(0);

    transition:
        left .48s cubic-bezier(.19,1,.22,1),
        width .48s cubic-bezier(.19,1,.22,1),
        opacity .25s ease;

    z-index:0;
}

/* efek cahaya dalam glass */

.detail-glass-slider::before{

    content:"";

    position:absolute;

    top:1px;
    left:15%;

    width:45%;
    height:2px;

    border-radius:50%;

    background:rgba(255,255,255,.95);

    filter:blur(.5px);
}

/* glow */

.detail-glass-slider::after{

    content:"";

    position:absolute;

    inset:0;

    border-radius:inherit;

    background:
        radial-gradient(
            circle at 30% 0%,
            rgba(255,255,255,.65),
            transparent 45%
        );

    opacity:.65;
}

.detail-nav-item{

    position:relative;
    z-index:2;

    border:none;
    background:transparent;

    color:#53657B;

    text-decoration:none;

    font-size:13px;
    font-weight:700;

    padding:10px 19px;

    border-radius:40px;

    cursor:pointer;

    transition:
        color .3s ease,
        transform .3s ease;
}

.detail-nav-item:hover{
    color:var(--primary-dark);
    transform:translateY(-1px);
}

.detail-nav-item.active{
    color:var(--primary-dark);
}

/* ==========================================================
   GLASS DESCRIPTION
========================================================== */

.description-card{

    position:relative;

    margin-top:25px;

    padding:28px 32px;

    border-radius:25px;

    background:
        linear-gradient(
            135deg,
            rgba(255,255,255,.66),
            rgba(255,255,255,.40)
        );

    border:1px solid rgba(255,255,255,.8);

    backdrop-filter:
        blur(25px)
        saturate(145%);

    -webkit-backdrop-filter:
        blur(25px)
        saturate(145%);

    box-shadow:var(--glass-shadow);

    overflow:hidden;

    scroll-margin-top:110px;
}

.description-card::before{

    content:"";

    position:absolute;

    top:0;
    left:0;

    width:5px;
    height:100%;

    background:
        linear-gradient(
            180deg,
            var(--primary),
            var(--gold)
        );
}

.description-card h4{

    color:var(--primary-dark);

    font-size:19px;

    font-weight:800;

    margin-bottom:13px;
}

.description-card h4 i{
    color:var(--gold);
}

.description-card p{

    color:var(--text-light);

    font-size:14px;

    line-height:1.8;

    margin:0;
}

/* ==========================================================
   REVIEW GLASS
========================================================== */

.review-card{

    position:relative;

    margin-top:25px;

    padding:30px 32px;

    border-radius:25px;

    background:
        linear-gradient(
            135deg,
            rgba(255,255,255,.68),
            rgba(255,255,255,.40)
        );

    border:1px solid rgba(255,255,255,.82);

    backdrop-filter:
        blur(28px)
        saturate(150%);

    -webkit-backdrop-filter:
        blur(28px)
        saturate(150%);

    box-shadow:var(--glass-shadow);

    overflow:hidden;

    scroll-margin-top:110px;

    transition:
        transform .35s ease,
        box-shadow .35s ease;
}

.review-card:hover{

    transform:translateY(-3px);

    box-shadow:var(--glass-shadow-hover);
}

.review-card::before{

    content:"";

    position:absolute;

    top:-100px;
    right:-80px;

    width:230px;
    height:230px;

    border-radius:50%;

    background:
        radial-gradient(
            circle,
            rgba(212,175,55,.12),
            transparent 70%
        );

    pointer-events:none;
}

.review-card h4{

    color:var(--primary-dark);

    font-weight:800;
}

/* ==========================================================
   REVIEW FORM
========================================================== */

.review-card .form-select,
.review-card .form-control{

    border-radius:15px;

    border:
        1px solid rgba(0,58,112,.10);

    background:
        rgba(255,255,255,.56);

    backdrop-filter:blur(12px);
    -webkit-backdrop-filter:blur(12px);

    padding:12px 15px;

    color:var(--text);

    transition:.3s;
}

.review-card .form-select:focus,
.review-card .form-control:focus{

    border-color:
        rgba(0,91,170,.35);

    background:
        rgba(255,255,255,.78);

    box-shadow:
        0 0 0 4px rgba(0,91,170,.07);
}

/* ==========================================================
   REVIEW ITEM
========================================================== */

.review-item{

    padding:18px;

    border-radius:18px;

    background:
        rgba(255,255,255,.35);

    border:
        1px solid rgba(255,255,255,.65);

    transition:.3s;
}

.review-item:hover{

    background:
        rgba(255,255,255,.58);

    transform:translateX(4px);
}

.review-user{

    display:flex;
    align-items:center;

    gap:10px;
}

.review-avatar{

    width:38px;
    height:38px;

    border-radius:50%;

    display:flex;
    align-items:center;
    justify-content:center;

    color:#fff;

    background:
        linear-gradient(
            135deg,
            var(--primary),
            var(--secondary)
        );

    font-weight:800;

    box-shadow:
        0 6px 15px rgba(0,91,170,.2);
}

.review-date{

    color:#8A98A8;

    font-size:12px;
}

.review-stars{

    color:#E4B82D;

    letter-spacing:2px;

    font-size:18px;
}

/* ==========================================================
   ALERT GLASS
========================================================== */

.glass-alert{

    border-radius:18px;

    border:
        1px solid rgba(255,255,255,.7);

    background:
        rgba(255,255,255,.48);

    backdrop-filter:blur(16px);
    -webkit-backdrop-filter:blur(16px);

    padding:16px 18px;

    color:var(--text);

    box-shadow:
        0 10px 25px rgba(0,58,112,.05);
}

/* ==========================================================
   SCROLL REVEAL
========================================================== */

.reveal{

    opacity:0;

    transform:translateY(35px);

    transition:
        opacity .8s cubic-bezier(.19,1,.22,1),
        transform .8s cubic-bezier(.19,1,.22,1);
}

.reveal.is-visible{

    opacity:1;

    transform:translateY(0);
}

body:not(.reveal-ready) .reveal{

    opacity:1;

    transform:none;
}

/* ==========================================================
   RESPONSIVE
========================================================== */

@media(max-width:992px){

    .detail-cover-wrap{
        height:400px;
    }

    .book-title{
        font-size:31px;
    }

    .price{
        font-size:29px;
    }

}

@media(max-width:768px){

    .book-detail-section{
        padding:25px 0 60px;
    }

    .book-detail-card{
        border-radius:23px;
        padding:18px!important;
    }

    .detail-cover-wrap{
        height:330px;
        border-radius:20px;
    }

    .detail-cover-wrap img{
        max-height:280px;
    }

    .book-title{
        font-size:27px;
        letter-spacing:-.5px;
    }

    .price{
        font-size:25px;
    }

    .detail-glass-nav{

        width:100%;

        justify-content:space-between;

    }

    .detail-nav-item{

        flex:1;

        padding:10px 8px;

        font-size:11px;

    }

    .description-card,
    .review-card{

        padding:22px 20px;

        border-radius:20px;

    }

}

@media(max-width:480px){

    .detail-glass-nav{

        padding:5px;

    }

    .detail-nav-item{

        font-size:10px;

    }

    .book-stats{

        gap:7px;

    }

    .book-stat{

        font-size:11px;

        padding:8px 10px;

    }

}

/* ==========================================================
   REDUCE MOTION
========================================================== */

@media(prefers-reduced-motion:reduce){

    *,
    *::before,
    *::after{

        animation:none!important;

        transition:none!important;

        scroll-behavior:auto!important;

    }

}

</style>


<script>
document.body.classList.add('reveal-ready');
</script>


{{-- ==========================================================
     LIQUID BACKGROUND
========================================================== --}}

<div class="book-page-bg" aria-hidden="true">

    <div class="liquid-blob blob-1"></div>

    <div class="liquid-blob blob-2"></div>

    <div class="liquid-blob blob-3"></div>

</div>


<div class="container book-detail-section">


    {{-- BACK --}}

    <a href="{{ route('books.customer') }}" class="back-link reveal">

        <i class="bi bi-arrow-left"></i>

        Kembali ke Koleksi

    </a>


    {{-- ======================================================
         MAIN BOOK CARD
    ====================================================== --}}

    <div class="book-detail-card p-4 p-lg-5 reveal">


        <div class="row align-items-center g-5">


            {{-- ==================================================
                 COVER
            ================================================== --}}

            <div class="col-lg-5">

                <div class="detail-cover-wrap">

                    @if($book->gambar)

                        <img
                            src="{{ asset('storage/'.$book->gambar) }}"
                            alt="{{ $book->judul }}"
                        >

                    @else

                        <div class="no-cover">

                            <i class="bi bi-book"></i>

                        </div>

                    @endif

                </div>

            </div>


            {{-- ==================================================
                 BOOK INFO
            ================================================== --}}

            <div class="col-lg-7">

                <div class="detail-content">


                    <span class="category-badge">

                        {{ $book->category->nama_kategori ?? 'Umum' }}

                    </span>


                    <h1 class="book-title">

                        {{ $book->judul }}

                    </h1>


                    {{-- STATS --}}

                    <div class="book-stats">


                        <div class="book-stat rating">

                            <i class="bi bi-star-fill"></i>

                            <span>

                                {{ number_format($averageRating,1) }}

                                ({{ $totalReview }} Rating)

                            </span>

                        </div>


                        <div class="book-stat sold">

                            <i class="bi bi-bag-check-fill"></i>

                            <span>

                                {{ $totalTerjual }} Terjual

                            </span>

                        </div>


                    </div>


                    {{-- INFO --}}

                    <div class="info-list">


                        {{-- AUTHOR --}}

                        <p>

                            <i class="bi bi-person-fill"></i>

                            <strong>Penulis:</strong>

                            {{ $book->penulis }}

                        </p>


                        {{-- PUBLISHER --}}

                        <p>

                            <i class="bi bi-building"></i>

                            <strong>Penerbit:</strong>

                            {{ $book->penerbit }}

                        </p>


                        {{-- YEAR --}}

                        <p>

                            <i class="bi bi-calendar3"></i>

                            <strong>Tahun:</strong>

                            {{ $book->tahun_terbit }}

                        </p>


                    </div>


                    {{-- PRICE --}}

                    <div class="price-row">


                        <span class="price">

                            Rp {{ number_format($book->harga,0,',','.') }}

                        </span>


                        <span class="stock-badge">

                            <i class="bi bi-check-circle-fill"></i>

                            Stok: {{ $book->stok }}

                        </span>


                    </div>


                    {{-- CART --}}

                    @if($book->stok > 0)

                        <form
                            action="{{ route('cart.add',$book->id) }}"
                            method="POST"
                            class="cart-form"
                        >

                            @csrf


                            <label for="jumlah">

                                Jumlah

                            </label>


                            <input
                                type="number"
                                name="jumlah"
                                id="jumlah"
                                value="1"
                                min="1"
                                max="{{ $book->stok }}"
                                class="quantity-input mb-3 d-block"
                            >


                            <button
                                type="submit"
                                class="btn btn-cart"
                            >

                                <i class="bi bi-cart-plus"></i>

                                Tambah ke Keranjang

                            </button>

                        </form>

                    @else

                        <div class="glass-alert">

                            <i class="bi bi-x-circle-fill text-danger me-2"></i>

                            Buku sedang habis.

                        </div>

                    @endif


                </div>

            </div>

        </div>


        {{-- ==================================================
             SLIDING LIQUID GLASS NAV
        ================================================== --}}

        <div class="detail-glass-nav-wrap reveal">

            <nav
                class="detail-glass-nav"
                id="detailGlassNav"
                aria-label="Navigasi detail buku"
            >

                {{-- GLASS YANG BERGERAK --}}

                <div
                    class="detail-glass-slider"
                    id="detailGlassSlider"
                ></div>


                <button
                    type="button"
                    class="detail-nav-item active"
                    data-target="descriptionSection"
                >

                    <i class="bi bi-card-text me-1"></i>

                    Deskripsi

                </button>


                <button
                    type="button"
                    class="detail-nav-item"
                    data-target="reviewSection"
                >

                    <i class="bi bi-star me-1"></i>

                    Ulasan

                </button>


                <button
                    type="button"
                    class="detail-nav-item"
                    data-target="topBook"
                >

                    <i class="bi bi-book me-1"></i>

                    Detail

                </button>

            </nav>

        </div>


        {{-- ==================================================
             DESCRIPTION
        ================================================== --}}

        <div
            class="description-card reveal"
            id="descriptionSection"
        >

            <h4>

                <i class="bi bi-card-text me-2"></i>

                Deskripsi Buku

            </h4>


            <p>

                {{ $book->deskripsi ?? 'Belum ada deskripsi.' }}

            </p>

        </div>


        {{-- ==================================================
             REVIEW
        ================================================== --}}

        <div
            class="review-card reveal"
            id="reviewSection"
        >


            <h4 class="mb-4">

                <i class="bi bi-stars text-warning me-2"></i>

                Rating & Ulasan

            </h4>


            {{-- ==================================================
                 FORM REVIEW
            ================================================== --}}

            @auth


                @if($canReview)


                    <form
                        action="{{ route('reviews.store',$book) }}"
                        method="POST"
                    >

                        @csrf


                        {{-- RATING --}}

                        <div class="mb-3">

                            <label class="form-label fw-bold">

                                Rating

                            </label>


                            <select
                                name="rating"
                                class="form-select"
                            >

                                <option value="5">

                                    ★★★★★ (5)

                                </option>

                                <option value="4">

                                    ★★★★☆ (4)

                                </option>

                                <option value="3">

                                    ★★★☆☆ (3)

                                </option>

                                <option value="2">

                                    ★★☆☆☆ (2)

                                </option>

                                <option value="1">

                                    ★☆☆☆☆ (1)

                                </option>

                            </select>

                        </div>


                        {{-- KOMENTAR --}}

                        <div class="mb-3">

                            <label class="form-label fw-bold">

                                Ulasan

                            </label>


                            <textarea
                                name="komentar"
                                class="form-control"
                                rows="4"
                                placeholder="Bagikan pengalamanmu membaca buku ini..."
                                required
                            ></textarea>

                        </div>


                        <button
                            type="submit"
                            class="btn btn-cart"
                        >

                            <i class="bi bi-send"></i>

                            Kirim Ulasan

                        </button>


                    </form>


                @else


                    <div class="glass-alert">

                        <i class="bi bi-info-circle-fill text-primary me-2"></i>

                        Anda hanya dapat memberikan ulasan setelah membeli
                        buku ini dengan status
                        <strong>selesai</strong>.

                    </div>


                @endif


            @else


                <div class="glass-alert">

                    <i class="bi bi-lock-fill text-warning me-2"></i>

                    Silakan login terlebih dahulu untuk memberikan ulasan.

                </div>


            @endauth


            <hr class="my-4">


            {{-- ==================================================
                 ALL REVIEWS
            ================================================== --}}

            <h5 class="fw-bold mb-4">

                Semua Ulasan

            </h5>


            @forelse($reviews as $review)


                <div class="review-item mb-3">


                    <div class="d-flex justify-content-between align-items-center">


                        <div class="review-user">


                            <div class="review-avatar">

                                {{ strtoupper(substr($review->user->name,0,1)) }}

                            </div>


                            <div>

                                <strong>

                                    {{ $review->user->name }}

                                </strong>


                                <div class="review-date">

                                    {{ $review->created_at->format('d M Y') }}

                                </div>

                            </div>


                        </div>


                    </div>


                    {{-- STARS --}}

                    <div class="review-stars my-2">

                        @for($i=1;$i<=5;$i++)

                            @if($i <= $review->rating)

                                ★

                            @else

                                ☆

                            @endif

                        @endfor

                    </div>


                    {{-- COMMENT --}}

                    <p class="mb-0">

                        {{ $review->komentar }}

                    </p>


                </div>


            @empty


                <div class="text-center text-muted py-4">

                    <i
                        class="bi bi-chat-square-text"
                        style="font-size:35px;"
                    ></i>


                    <p class="mt-2 mb-0">

                        Belum ada ulasan untuk buku ini.

                    </p>

                </div>


            @endforelse


        </div>


    </div>

</div>


<script>

/* ==========================================================
   LIQUID GLASS SLIDER
========================================================== */

document.addEventListener('DOMContentLoaded',function(){

    const nav =
        document.getElementById('detailGlassNav');

    const slider =
        document.getElementById('detailGlassSlider');

    const items =
        nav.querySelectorAll('.detail-nav-item');


    if(!nav || !slider || !items.length){

        return;

    }


    /*
    ----------------------------------------------------------
    POSISI GLASS
    ----------------------------------------------------------
    */

    function moveGlass(item){

        const navRect =
            nav.getBoundingClientRect();

        const itemRect =
            item.getBoundingClientRect();


        slider.style.left =
            (itemRect.left - navRect.left) + 'px';


        slider.style.width =
            itemRect.width + 'px';


        slider.style.opacity = '1';

    }


    /*
    ----------------------------------------------------------
    INITIAL
    ----------------------------------------------------------
    */

    requestAnimationFrame(function(){

        moveGlass(items[0]);

    });


    /*
    ----------------------------------------------------------
    HOVER
    ----------------------------------------------------------
    */

    items.forEach(function(item){

        item.addEventListener('mouseenter',function(){

            moveGlass(item);

        });


        /*
        CLICK
        */

        item.addEventListener('click',function(){

            items.forEach(function(navItem){

                navItem.classList.remove('active');

            });


            item.classList.add('active');


            const targetId =
                item.dataset.target;

            const target =
                document.getElementById(targetId);


            if(target){

                target.scrollIntoView({

                    behavior:'smooth',

                    block:'start'

                });

            }


            moveGlass(item);

        });

    });


    /*
    ----------------------------------------------------------
    MOUSE LEAVE
    BALIK KE ITEM ACTIVE
    ----------------------------------------------------------
    */

    nav.addEventListener('mouseleave',function(){

        const active =
            nav.querySelector('.detail-nav-item.active');

        if(active){

            moveGlass(active);

        }

    });


    /*
    ----------------------------------------------------------
    MOUSE MOVE
    LIQUID GLASS IKUT GERAKAN MOUSE
    ----------------------------------------------------------
    */

    nav.addEventListener('mousemove',function(event){

        const rect =
            nav.getBoundingClientRect();


        const mouseX =
            event.clientX - rect.left;


        /*
        cari item terdekat dengan posisi mouse
        */

        let closest = null;

        let closestDistance = Infinity;


        items.forEach(function(item){

            const itemRect =
                item.getBoundingClientRect();


            const itemCenter =
                itemRect.left -
                rect.left +
                itemRect.width / 2;


            const distance =
                Math.abs(mouseX - itemCenter);


            if(distance < closestDistance){

                closestDistance = distance;

                closest = item;

            }

        });


        if(closest){

            moveGlass(closest);

        }

    });


    /*
    ----------------------------------------------------------
    RESIZE
    ----------------------------------------------------------
    */

    window.addEventListener('resize',function(){

        const active =
            nav.querySelector('.detail-nav-item.active');

        if(active){

            moveGlass(active);

        }

    });

});


/* ==========================================================
   SCROLL REVEAL
========================================================== */

document.addEventListener('DOMContentLoaded',function(){

    const revealEls =
        document.querySelectorAll('.reveal');


    if(!('IntersectionObserver' in window)){

        revealEls.forEach(function(el){

            el.classList.add('is-visible');

        });

        return;

    }


    const observer =
        new IntersectionObserver(
            function(entries,obs){

                entries.forEach(function(entry){

                    if(entry.isIntersecting){

                        entry.target.classList.add(
                            'is-visible'
                        );

                        obs.unobserve(
                            entry.target
                        );

                    }

                });

            },
            {
                threshold:.12,

                rootMargin:
                    '0px 0px -60px 0px'
            }
        );


    revealEls.forEach(function(el){

        observer.observe(el);

    });

});

</script>

@endsection