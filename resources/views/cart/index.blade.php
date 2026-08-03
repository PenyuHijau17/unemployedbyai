@extends('layouts.app')

@section('title','Keranjang Belanja')

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
   CART PAGE
========================================================== */

.cart-section{
    padding:50px 0;
}

.cart-card{
    background:var(--white);
    border:none;
    border-radius:var(--radius);
    overflow:hidden;
    box-shadow:var(--shadow);
    transition:var(--transition);
}

.cart-card:hover{
    box-shadow:var(--shadow-hover);
}

.cart-header{
    background:linear-gradient(135deg, var(--primary-dark) 0%, var(--primary) 55%, var(--secondary) 100%);
    padding:35px 40px;
    position:relative;
    overflow:hidden;
}

.cart-header::before{
    content:"";
    position:absolute;
    top:-100px;
    right:-60px;
    width:240px;
    height:240px;
    border-radius:50%;
    background:radial-gradient(circle at center, var(--gold) 0%, transparent 70%);
    opacity:.25;
    z-index:0;
    pointer-events:none;
}

.cart-header-inner{
    position:relative;
    z-index:1;
}

.cart-header h2{
    color:#fff;
    font-weight:800;
    margin:0;
    font-size:28px;
}

.cart-header h2 i{
    color:var(--gold);
}

.cart-header p{
    color:rgba(255,255,255,.80);
    margin-top:6px;
    margin-bottom:0;
    font-size:15px;
}

/* ==========================================================
   TABLE
========================================================== */

.table-wrap{
    padding:0;
}

.table{
    margin-bottom:0;
}

.table thead{
    background:var(--primary);
    color:white;
}

.table thead th{
    border:none;
    padding:18px 20px;
    font-weight:600;
    font-size:14px;
    text-transform:uppercase;
    letter-spacing:.5px;
}

.table td{
    vertical-align:middle;
    padding:18px 20px;
    border-bottom:1px solid var(--border);
    font-size:15px;
}

.table tbody tr{
    transition:var(--transition);
}

.table tbody tr:hover{
    background:var(--primary-light);
}

.book-title{
    font-weight:700;
    color:var(--primary-dark);
    font-size:16px;
}

.book-title-sm{
    font-size:13px;
    color:var(--text-light);
}

.price{
    color:var(--primary-dark);
    font-weight:700;
    font-size:16px;
}

/* ==========================================================
   TOTAL CARD
========================================================== */

.total-card{
    background:var(--primary-light);
    border-radius:var(--radius);
    padding:30px 35px;
    border:1px solid var(--border);
    transition:var(--transition);
}

.total-card:hover{
    border-color:var(--gold);
}

.total-label{
    color:var(--text-light);
    font-size:16px;
    font-weight:500;
}

.total-price{
    color:var(--primary-dark);
    font-size:36px;
    font-weight:800;
}

/* ==========================================================
   BUTTONS
========================================================== */

.btn-shop{
    background:linear-gradient(135deg,var(--primary),var(--secondary));
    color:white;
    border:none;
    border-radius:50px;
    padding:12px 28px;
    font-weight:700;
    font-size:14px;
    transition:var(--transition);
    display:inline-flex;
    align-items:center;
    gap:8px;
}

.btn-shop:hover{
    background:linear-gradient(135deg,var(--primary-dark),var(--primary));
    color:white;
    transform:translateY(-2px);
    box-shadow:0 14px 26px rgba(0,58,112,.35);
}

.btn-payment{
    background:var(--gold);
    color:var(--primary-dark);
    border:none;
    border-radius:50px;
    padding:16px 38px;
    font-weight:700;
    font-size:16px;
    transition:var(--transition);
    display:inline-flex;
    align-items:center;
    gap:10px;
    box-shadow:0 10px 22px rgba(212,175,55,.35);
}

.btn-payment:hover{
    background:#C49E2F;
    color:var(--primary-dark);
    transform:translateY(-2px);
    box-shadow:0 16px 32px rgba(212,175,55,.45);
}

.btn-delete{
    border-radius:30px;
    padding:8px 18px;
    font-size:13px;
    border:none;
    background:#FEE2E2;
    color:#DC2626;
    transition:var(--transition);
    font-weight:600;
}

.btn-delete:hover{
    background:#DC2626;
    color:white;
    transform:translateY(-1px);
}

/* ==========================================================
   EMPTY STATE
========================================================== */

.empty-cart{
    padding:80px 30px;
    text-align:center;
}

.empty-cart i{
    font-size:80px;
    color:var(--primary);
    display:block;
    margin-bottom:20px;
}

.empty-cart h3{
    color:var(--primary-dark);
    font-weight:700;
    margin-top:10px;
}

.empty-cart p{
    color:var(--text-light);
    font-size:16px;
}

/* ==========================================================
   RESPONSIVE
========================================================== */

@media(max-width:768px){
    .cart-section{
        padding:20px 0;
    }
    .cart-header{
        padding:25px;
    }
    .cart-header h2{
        font-size:22px;
    }
    .table thead th,
    .table td{
        padding:12px;
        font-size:13px;
    }
    .total-card{
        padding:20px;
    }
    .total-price{
        font-size:28px;
    }
}

</style>

<script>document.body.classList.add('reveal-ready');</script>

<div class="container cart-section">

    <div class="cart-card reveal">

        <div class="cart-header">
            <div class="cart-header-inner">
                <h2>
                    <i class="bi bi-cart3 me-2"></i>
                    Keranjang Belanja
                </h2>
                <p>
                    Periksa kembali buku yang akan dibeli.
                </p>
            </div>
        </div>

        <div class="card-body p-4">

            @if(empty($cart) || count($cart)==0)

                <div class="empty-cart reveal">
                    <i class="bi bi-cart-x"></i>
                    <h3>Keranjang Masih Kosong</h3>
                    <p>Belum ada buku yang ditambahkan ke keranjang.</p>
                    <a href="{{ route('books.customer') }}" class="btn btn-shop mt-3">
                        <i class="bi bi-book-half me-2"></i>
                        Mulai Belanja
                    </a>
                </div>

            @else

                <div class="table-responsive table-wrap">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th>Buku</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Subtotal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $total = 0; @endphp
                            @foreach($cart as $id => $item)
                                @php
                                    $subtotal = $item['harga'] * $item['jumlah'];
                                    $total += $subtotal;
                                @endphp
                                <tr>
                                    <td>
                                        <div class="book-title">{{ $item['judul'] }}</div>
                                    </td>
                                    <td class="price">
                                        Rp {{ number_format($item['harga'],0,',','.') }}
                                    </td>
                                    <td>
                                        {{ $item['jumlah'] }}
                                    </td>
                                    <td class="price">
                                        Rp {{ number_format($subtotal,0,',','.') }}
                                    </td>
                                    <td>
                                        <form action="{{ route('cart.remove',$id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-delete">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="row mt-5 align-items-center">
                    <div class="col-lg-6 mb-3 mb-lg-0">
                        <a href="{{ route('books.customer') }}" class="btn btn-shop">
                            <i class="bi bi-arrow-left me-2"></i>
                            Lanjut Belanja
                        </a>
                    </div>
                    <div class="col-lg-6">
                        <div class="total-card text-end">
                            <div class="total-label">Total Belanja</div>
                            <div class="total-price">
                                Rp {{ number_format($total,0,',','.') }}
                            </div>
                            <a href="{{ route('payment.index') }}" class="btn btn-payment mt-3">
                                <i class="bi bi-credit-card me-2"></i>
                                Lanjut ke Pembayaran
                            </a>
                        </div>
                    </div>
                </div>

            @endif

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
