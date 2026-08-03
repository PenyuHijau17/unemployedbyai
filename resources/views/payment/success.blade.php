@extends('layouts.app')

@section('title','Pembayaran Berhasil')

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
   SUCCESS PAGE
========================================================== */

.success-section{
    padding:60px 0;
}

.success-card{
    background:var(--white);
    border:none;
    border-radius:var(--radius);
    box-shadow:var(--shadow);
    overflow:hidden;
    transition:var(--transition);
}

.success-card:hover{
    box-shadow:var(--shadow-hover);
}

.success-header{
    background:linear-gradient(135deg, var(--primary-dark) 0%, var(--primary) 55%, var(--secondary) 100%);
    color:white;
    padding:50px 40px;
    text-align:center;
    position:relative;
    overflow:hidden;
}

.success-header::before{
    content:"";
    position:absolute;
    top:-120px;
    right:-80px;
    width:300px;
    height:300px;
    border-radius:50%;
    background:radial-gradient(circle at center, var(--gold) 0%, transparent 70%);
    opacity:.25;
    z-index:0;
    pointer-events:none;
}

.success-header::after{
    content:"";
    position:absolute;
    bottom:-100px;
    left:-60px;
    width:240px;
    height:240px;
    border-radius:50%;
    background:radial-gradient(circle at center, #ffffff 0%, transparent 70%);
    opacity:.08;
    z-index:0;
    pointer-events:none;
}

.success-header-inner{
    position:relative;
    z-index:1;
}

.success-icon{
    width:110px;
    height:110px;
    background:var(--white);
    color:#28a745;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:58px;
    margin:0 auto 25px;
    box-shadow:0 8px 24px rgba(0,0,0,.15);
}

.success-header h2{
    font-weight:800;
    font-size:32px;
    color:#fff;
}

.success-header p{
    color:rgba(255,255,255,.85);
    font-size:16px;
    margin-bottom:0;
}

.success-header p strong{
    color:var(--gold);
}

.success-body{
    padding:45px 40px;
}

.success-lead{
    font-size:17px;
    color:var(--text-light);
    text-align:center;
    margin-bottom:30px;
}

/* ==========================================================
   INFO BOX
========================================================== */

.info-box{
    background:var(--primary-light);
    border-radius:18px;
    padding:28px 30px;
    margin-bottom:25px;
    border:1px solid var(--border);
    transition:var(--transition);
}

.info-box:hover{
    border-color:var(--gold);
}

.info-box h5{
    color:var(--primary-dark);
    font-weight:700;
    margin-bottom:20px;
    font-size:18px;
}

.info-box h5 i{
    color:var(--gold);
}

.info-row{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:14px;
    font-size:15px;
    color:var(--text-light);
}

.info-row:last-child{
    margin-bottom:0;
}

.info-row strong{
    color:var(--text);
}

/* ==========================================================
   STATUS BOX
========================================================== */

.status-box{
    background:#E8F5E9;
    color:#2E7D32;
    border-radius:15px;
    padding:18px 22px;
    text-align:center;
    font-weight:600;
    font-size:15px;
    border:1px solid #C8E6C9;
}

/* ==========================================================
   BUTTONS
========================================================== */

.btn-shop-gradient{
    background:linear-gradient(135deg,var(--primary),var(--secondary));
    color:white;
    border:none;
    border-radius:50px;
    padding:14px 30px;
    font-weight:700;
    font-size:15px;
    transition:var(--transition);
    display:inline-flex;
    align-items:center;
    gap:8px;
}

.btn-shop-gradient:hover{
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
    display:inline-flex;
    align-items:center;
    gap:8px;
}

.btn-outline-navy:hover{
    background:var(--primary);
    color:white;
    transform:translateY(-2px);
}

/* ==========================================================
   RESPONSIVE
========================================================== */

@media(max-width:768px){
    .success-section{
        padding:20px 0;
    }
    .success-header{
        padding:35px 25px;
    }
    .success-header h2{
        font-size:24px;
    }
    .success-icon{
        width:80px;
        height:80px;
        font-size:42px;
    }
    .success-body{
        padding:25px 20px;
    }
    .info-box{
        padding:20px;
    }
}

</style>

<script>document.body.classList.add('reveal-ready');</script>

<div class="container success-section">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="success-card reveal">

                <div class="success-header">
                    <div class="success-header-inner">
                        <div class="success-icon">
                            <i class="bi bi-check2-circle"></i>
                        </div>
                        <h2>Pembayaran Berhasil!</h2>
                        <p>
                            Terima kasih telah berbelanja di
                            <strong>Pustaka Nusantara</strong>
                        </p>
                    </div>
                </div>

                <div class="success-body">

                    <p class="success-lead">
                        Pesanan Anda telah berhasil dibuat dan sedang diproses.
                    </p>

                    <div class="info-box">
                        <h5>
                            <i class="bi bi-receipt me-2"></i>
                            Detail Pembayaran
                        </h5>

                        <div class="info-row">
                            <span>Metode Pembayaran</span>
                            <strong>{{ $metode }}</strong>
                        </div>
                        <div class="info-row">
                            <span>Status</span>
                            <span class="badge" style="background:#2E7D32;padding:6px 16px;border-radius:20px;font-weight:600;">
                                <i class="bi bi-check-circle me-1"></i>
                                Berhasil
                            </span>
                        </div>
                        <div class="info-row">
                            <span>Tanggal</span>
                            <strong>{{ now()->format('d M Y') }}</strong>
                        </div>
                    </div>

                    <div class="status-box">
                        <i class="bi bi-box-seam me-2"></i>
                        Pesanan sedang diproses dan akan segera disiapkan.
                    </div>

                    <div class="d-grid gap-3 d-md-flex justify-content-center mt-5">
                        <a href="{{ route('books.customer') }}" class="btn btn-shop-gradient">
                            <i class="bi bi-bag me-2"></i>
                            Belanja Lagi
                        </a>
                        <a href="{{ route('home') }}" class="btn btn-outline-navy">
                            <i class="bi bi-house-door me-2"></i>
                            Kembali ke Home
                        </a>
                    </div>

                </div>

            </div>

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
