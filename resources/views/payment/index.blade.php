@extends('layouts.app')

@section('title','Checkout')

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
   SCROLL REVEAL
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
   CHECKOUT PAGE
========================================================== */

.checkout-section{
    padding:50px 0;
}

.checkout-title{
    color:var(--primary-dark);
    font-weight:800;
    font-size:28px;
    margin-bottom:25px;
}

.checkout-title i{
    color:var(--gold);
}

.checkout-card{
    background:var(--white);
    border:none;
    border-radius:var(--radius);
    box-shadow:var(--shadow);
    padding:30px 35px;
    transition:var(--transition);
}

.checkout-card:hover{
    box-shadow:var(--shadow-hover);
}

.checkout-card h4{
    color:var(--primary-dark);
    font-weight:700;
    font-size:20px;
    margin-bottom:20px;
}

.checkout-card h4 i{
    color:var(--gold);
}

.order-item{
    border-bottom:1px solid var(--border);
    padding:20px 0;
    transition:var(--transition);
}

.order-item:last-child{
    border-bottom:none;
}

.order-item:hover{
    background:var(--primary-light);
    margin:0 -35px;
    padding-left:35px;
    padding-right:35px;
    border-radius:12px;
    border-bottom-color:transparent;
}

.book-icon{
    width:65px;
    height:65px;
    border-radius:16px;
    background:var(--primary-light);
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:28px;
    color:var(--primary);
    flex-shrink:0;
}

.order-item-content{
    flex-grow:1;
}

.order-item-content h5{
    color:var(--primary-dark);
    font-weight:700;
    font-size:16px;
    margin-bottom:4px;
}

.order-meta{
    color:var(--text-light);
    font-size:14px;
}

.order-subtotal{
    color:var(--primary-dark);
    font-weight:700;
    font-size:16px;
    white-space:nowrap;
}

/* ==========================================================
   SUMMARY SIDEBAR
========================================================== */

.summary-card{
    background:var(--white);
    border:none;
    border-radius:var(--radius);
    box-shadow:var(--shadow);
    padding:30px;
    position:sticky;
    top:100px;
    transition:var(--transition);
}

.summary-card:hover{
    box-shadow:var(--shadow-hover);
}

.summary-card h4{
    color:var(--primary-dark);
    font-weight:700;
    font-size:20px;
    margin-bottom:20px;
}

.summary-row{
    display:flex;
    justify-content:space-between;
    margin-bottom:14px;
    color:var(--text-light);
    font-size:15px;
}

.summary-row span:last-child{
    color:var(--text);
    font-weight:600;
}

.summary-divider{
    border:0;
    border-top:1px solid var(--border);
    margin:18px 0;
}

.total-box{
    background:var(--primary-light);
    border-radius:18px;
    padding:22px 25px;
    border:1px solid var(--border);
    transition:var(--transition);
}

.total-box:hover{
    border-color:var(--gold);
}

.total-box h5{
    color:var(--text);
    font-weight:600;
    font-size:16px;
}

.total-box h4{
    color:var(--primary-dark);
    font-weight:800;
    font-size:22px;
    margin:0;
}

/* ==========================================================
   FORM ELEMENTS
========================================================== */

.form-label{
    color:var(--text);
    font-weight:600;
    font-size:14px;
    margin-bottom:8px;
}

.form-select{
    border-radius:12px;
    padding:12px 16px;
    border:2px solid var(--border);
    font-weight:500;
    color:var(--text);
    background-color:var(--white);
    transition:var(--transition);
    cursor:pointer;
}

.form-select:focus{
    outline:none;
    border-color:var(--gold);
    box-shadow:0 0 0 4px rgba(212,175,55,.2);
}

/* ==========================================================
   BUTTONS
========================================================== */

.btn-pay{
    background:linear-gradient(135deg,var(--gold),#C49E2F);
    color:var(--primary-dark);
    border:none;
    border-radius:50px;
    padding:14px;
    font-weight:700;
    font-size:16px;
    transition:var(--transition);
    display:inline-flex;
    align-items:center;
    justify-content:center;
    gap:8px;
    box-shadow:0 10px 22px rgba(212,175,55,.35);
}

.btn-pay:hover{
    background:linear-gradient(135deg,#C49E2F,var(--gold));
    color:var(--primary-dark);
    transform:translateY(-2px);
    box-shadow:0 16px 32px rgba(212,175,55,.45);
}

.btn-back-gradient{
    background:linear-gradient(135deg,var(--primary),var(--secondary));
    color:white;
    border:none;
    border-radius:50px;
    padding:14px 28px;
    font-weight:700;
    font-size:14px;
    transition:var(--transition);
    display:inline-flex;
    align-items:center;
    justify-content:center;
    gap:8px;
}

.btn-back-gradient:hover{
    background:linear-gradient(135deg,var(--primary-dark),var(--primary));
    color:white;
    transform:translateY(-2px);
    box-shadow:0 14px 26px rgba(0,58,112,.35);
}

.btn-outline-navy{
    border-radius:50px;
    padding:13px 28px;
    font-weight:600;
    border:2px solid var(--primary);
    color:var(--primary);
    transition:var(--transition);
}

.btn-outline-navy:hover{
    background:var(--primary);
    color:white;
    transform:translateY(-2px);
}

/* ==========================================================
   EMPTY STATE
========================================================== */

.empty-box{
    background:var(--white);
    border-radius:var(--radius);
    padding:80px 40px;
    text-align:center;
    box-shadow:var(--shadow);
}

.empty-box i{
    font-size:72px;
    color:var(--primary);
    display:block;
    margin-bottom:20px;
}

.empty-box h3{
    color:var(--primary-dark);
    font-weight:700;
    margin-top:15px;
}

.empty-box p{
    color:var(--text-light);
    font-size:16px;
}

/* ==========================================================
   RESPONSIVE
========================================================== */

@media(max-width:768px){
    .checkout-section{
        padding:20px 0;
    }
    .checkout-title{
        font-size:22px;
    }
    .checkout-card{
        padding:20px;
    }
    .order-item:hover{
        margin:0 -20px;
        padding-left:20px;
        padding-right:20px;
    }
    .summary-card{
        position:static;
    }
}

</style>

<script>document.body.classList.add('reveal-ready');</script>

<div class="container checkout-section">

    @if(count($cart)==0)

        <div class="empty-box reveal">
            <i class="bi bi-cart-x"></i>
            <h3>Keranjang masih kosong</h3>
            <p>Silakan pilih buku terlebih dahulu.</p>
            <a href="{{ route('books.customer') }}" class="btn btn-back-gradient px-5 mt-2">
                <i class="bi bi-book-half me-2"></i>
                Lihat Koleksi Buku
            </a>
        </div>

    @else

        <h2 class="checkout-title reveal">
            <i class="bi bi-credit-card-2-front me-2"></i>
            Checkout
        </h2>

        <div class="row g-4">

            <div class="col-lg-8">
                <div class="checkout-card reveal">
                    <h4>
                        <i class="bi bi-bag-check me-2"></i>
                        Ringkasan Pesanan
                    </h4>

                    @foreach($cart as $item)
                        <div class="order-item d-flex align-items-center">
                            <div class="book-icon me-3">
                                <i class="bi bi-book"></i>
                            </div>
                            <div class="order-item-content">
                                <h5>{{ $item['judul'] }}</h5>
                                <div class="order-meta">
                                    Jumlah: {{ $item['jumlah'] }} &middot;
                                    Rp {{ number_format($item['harga'],0,',','.') }}/pc
                                </div>
                            </div>
                            <div class="order-subtotal ms-3">
                                Rp {{ number_format($item['harga']*$item['jumlah'],0,',','.') }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="col-lg-4">
                <div class="summary-card reveal">
                    <h4>Ringkasan Pembayaran</h4>

                    <div class="summary-row">
                        <span>Subtotal</span>
                        <span>Rp {{ number_format($total,0,',','.') }}</span>
                    </div>
                    <div class="summary-row">
                        <span>Ongkir</span>
                        <span style="color:#2E7D32;font-weight:600;">Gratis</span>
                    </div>

                    <hr class="summary-divider">

                    <div class="total-box mb-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5>Total</h5>
                            <h4>Rp {{ number_format($total,0,',','.') }}</h4>
                        </div>
                    </div>

                    <form action="{{ route('payment.process') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label class="form-label">
                                <i class="bi bi-wallet2 me-1"></i>
                                Metode Pembayaran
                            </label>
                            <select name="metode" class="form-select" required>
                                <option value="">Pilih Metode</option>
                                <option value="Transfer Bank">🏦 Transfer Bank</option>
                                <option value="E-Wallet">📱 E-Wallet</option>
                                <option value="COD">🚚 COD</option>
                            </select>
                        </div>

                        <button class="btn btn-pay w-100 mb-3">
                            <i class="bi bi-shield-check me-2"></i>
                            Bayar Sekarang
                        </button>

                        <a href="{{ route('cart.index') }}" class="btn btn-outline-navy w-100">
                            <i class="bi bi-arrow-left me-2"></i>
                            Kembali ke Keranjang
                        </a>
                    </form>
                </div>
            </div>

        </div>

    @endif

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
