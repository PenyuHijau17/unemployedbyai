@extends('layouts.app')

@section('title','Home')

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
   Elemen fade + geser naik begitu masuk viewport saat discroll.
   Kalau JS mati, fallback ke "reveal-ready" membuat semua
   konten tetap tampil normal (tidak hilang).
========================================================== */

.reveal,
.reveal-line{
    opacity:0;
}

.reveal{
    transform:translateY(46px);
    transition:opacity .85s cubic-bezier(.19,1,.22,1),
               transform .85s cubic-bezier(.19,1,.22,1);
    will-change:opacity, transform;
}

.reveal.is-visible{
    opacity:1;
    transform:translateY(0);
}

/* stagger halus untuk kartu-kartu dalam satu baris/grid */
.reveal-item:nth-child(2){ transition-delay:.12s; }
.reveal-item:nth-child(3){ transition-delay:.24s; }
.reveal-item:nth-child(4){ transition-delay:.36s; }

/* divider "menggambar diri sendiri" dari kiri ke kanan */
.reveal-line{
    transform-origin:left center;
    transform:scaleX(0);
    transition:transform .9s cubic-bezier(.19,1,.22,1), opacity .3s ease;
}

.reveal-line.is-visible{
    opacity:.9;
    transform:scaleX(1);
}

/* fallback: sebelum JS jalan / kalau JS mati, tampilkan semua elemen normal */
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
   FLOATING FLOWERS (dekorasi kiri-kanan, mekar saat discroll)
========================================================== */

.flower-decor{
    position:fixed;
    top:0;
    height:100%;
    width:130px;
    pointer-events:none;
    z-index:1;
    overflow:hidden;
}

.flower-decor.left{ left:0; }
.flower-decor.right{ right:0; }

.flower{
    position:absolute;
    opacity:0;
    transform:scale(.2) rotate(-25deg);
    transition:opacity 1s cubic-bezier(.19,1,.22,1),
               transform 1.1s cubic-bezier(.19,1,.22,1);
}

.flower.is-visible{
    opacity:.85;
    transform:scale(1) rotate(0deg);
    animation:flowerSway 5.5s ease-in-out infinite;
}

.flower svg{
    width:100%;
    height:100%;
    display:block;
    filter:drop-shadow(0 6px 14px rgba(0,58,112,.15));
}

.flower-decor.left .flower:nth-child(1){ top:5%;  left:-14px; width:66px; height:66px; transition-delay:.05s; animation-delay:.2s; }
.flower-decor.left .flower:nth-child(2){ top:20%; left:22px;  width:42px; height:42px; transition-delay:.22s; animation-delay:1.1s; }
.flower-decor.left .flower:nth-child(3){ top:36%; left:-20px; width:80px; height:80px; transition-delay:.10s; animation-delay:.6s; }
.flower-decor.left .flower:nth-child(4){ top:54%; left:16px;  width:50px; height:50px; transition-delay:.32s; animation-delay:1.6s; }
.flower-decor.left .flower:nth-child(5){ top:70%; left:-8px;  width:60px; height:60px; transition-delay:.16s; animation-delay:.4s; }
.flower-decor.left .flower:nth-child(6){ top:87%; left:26px;  width:38px; height:38px; transition-delay:.40s; animation-delay:1.3s; }

.flower-decor.right .flower:nth-child(1){ top:8%;  right:-10px; width:58px; height:58px; transition-delay:.12s; animation-delay:.7s; }
.flower-decor.right .flower:nth-child(2){ top:25%; right:24px;  width:76px; height:76px; transition-delay:.28s; animation-delay:.1s; }
.flower-decor.right .flower:nth-child(3){ top:44%; right:-18px; width:46px; height:46px; transition-delay:.06s; animation-delay:1.4s; }
.flower-decor.right .flower:nth-child(4){ top:62%; right:12px;  width:66px; height:66px; transition-delay:.24s; animation-delay:.5s; }
.flower-decor.right .flower:nth-child(5){ top:79%; right:-12px; width:52px; height:52px; transition-delay:.38s; animation-delay:1.2s; }
.flower-decor.right .flower:nth-child(6){ top:94%; right:20px;  width:36px; height:36px; transition-delay:.18s; animation-delay:.9s; }

@keyframes flowerSway{
    0%,100%{ transform:scale(1) rotate(0deg) translateY(0); }
    50%{ transform:scale(1) rotate(5deg) translateY(-10px); }
}

@media (max-width:1300px){
    .flower-decor{ display:none; }
}

@media (prefers-reduced-motion: reduce){
    .flower{
        transition:opacity .01s linear!important;
    }
    .flower.is-visible{
        animation:none!important;
        transform:none!important;
    }
}

/* ===== Hero ===== */
.hero{
    position:relative;
    background:var(--primary-light);
    border-radius:25px;
    padding:70px;
    border:1px solid var(--border);
    border-left:8px solid var(--primary-dark);
    overflow:hidden;
    box-shadow:var(--shadow-hover);
}

.hero::before{
    content:"";
    position:absolute;
    top:-120px;
    right:-120px;
    width:320px;
    height:320px;
    border-radius:50%;
    background:radial-gradient(circle at center, var(--primary) 0%, transparent 70%);
    opacity:.16;
    pointer-events:none;
}

.hero::after{
    content:"";
    position:absolute;
    bottom:-90px;
    right:120px;
    width:200px;
    height:200px;
    border-radius:50%;
    background:radial-gradient(circle at center, var(--secondary) 0%, transparent 70%);
    opacity:.12;
    pointer-events:none;
}

.hero h1{
    font-weight:700;
    color:var(--primary-dark);
    font-size:3.2rem;
    line-height:1.2;
    position:relative;
}

.hero p{
    color:var(--text-light);
    font-size:1.08rem;
    margin-top:20px;
    margin-bottom:30px;
    position:relative;
}

/* badge emas solid, senada dengan tombol logout di admin */
.hero .badge{
    background:var(--gold) !important;
    color:var(--primary-dark) !important;
    letter-spacing:.3px;
    font-weight:700;
    position:relative;
}

.btn-shop{
    background:linear-gradient(135deg,var(--primary),var(--secondary));
    color:white;
    padding:12px 28px;
    border-radius:40px;
    border:none;
    transition:var(--transition);
    box-shadow:0 10px 20px rgba(0,91,170,.25);
    position:relative;
}

.btn-shop:hover{
    background:linear-gradient(135deg,var(--primary-dark),var(--primary));
    color:white;
    transform:translateY(-2px);
    box-shadow:0 15px 28px rgba(0,91,170,.32);
}

.btn-outline-shop{
    border:1px solid var(--primary-dark);
    color:var(--primary-dark);
    background:transparent;
    padding:12px 28px;
    border-radius:40px;
    margin-left:10px;
    transition:var(--transition);
}

.btn-outline-shop:hover{
    background:var(--primary-dark);
    color:white;
    border-color:var(--primary-dark);
}

/* ===== Tombol CTA utama Hero (lebih menonjol) ===== */
.btn-hero-cta{
    position:relative;
    display:inline-flex;
    align-items:center;
    gap:10px;
    background:linear-gradient(135deg,var(--primary),var(--secondary));
    background-size:200% 200%;
    color:#fff;
    font-weight:700;
    font-size:1.05rem;
    letter-spacing:.3px;
    padding:17px 42px;
    border:none;
    border-radius:60px;
    overflow:hidden;
    isolation:isolate;
    box-shadow:0 14px 30px rgba(0,91,170,.35), 0 0 0 0 rgba(212,175,55,.5);
    transition:transform .35s cubic-bezier(.19,1,.22,1),
               box-shadow .35s cubic-bezier(.19,1,.22,1),
               background-position .6s ease;
    animation:heroCtaPulse 2.8s ease-in-out infinite;
}

.btn-hero-cta::before{
    content:"";
    position:absolute;
    top:0;
    left:-60%;
    width:40%;
    height:100%;
    background:linear-gradient(120deg, transparent, rgba(255,255,255,.55), transparent);
    transform:skewX(-20deg);
    transition:left .75s ease;
    z-index:1;
}

.btn-hero-cta span,
.btn-hero-cta i{
    position:relative;
    z-index:2;
}

.btn-hero-cta .icon-arrow{
    transition:transform .35s ease;
}

.btn-hero-cta:hover{
    transform:translateY(-4px) scale(1.035);
    background-position:100% 50%;
    box-shadow:0 20px 40px rgba(0,91,170,.42), 0 0 0 8px rgba(212,175,55,.18);
    color:#fff;
}

.btn-hero-cta:hover::before{
    left:130%;
}

.btn-hero-cta:hover .icon-arrow{
    transform:translateX(5px);
}

.btn-hero-cta:active{
    transform:translateY(-1px) scale(.98);
}

@keyframes heroCtaPulse{
    0%,100%{
        box-shadow:0 14px 30px rgba(0,91,170,.35), 0 0 0 0 rgba(212,175,55,.45);
    }
    50%{
        box-shadow:0 14px 30px rgba(0,91,170,.35), 0 0 0 10px rgba(212,175,55,0);
    }
}

@media (prefers-reduced-motion: reduce){
    .btn-hero-cta{ animation:none; }
    .btn-hero-cta::before{ transition:none; }
}

.hero img{
    width:100%;
    border-radius:20px;
    box-shadow:var(--shadow-hover);
    border:4px solid #fff;
    position:relative;
}

/* ===== Label kecil emas di atas judul section ===== */
.section-eyebrow{
    display:inline-block;
    background:var(--gold);
    color:var(--primary-dark);
    font-size:.75rem;
    letter-spacing:1.5px;
    text-transform:uppercase;
    font-weight:700;
    padding:6px 18px;
    border-radius:30px;
    margin-bottom:14px;
}

.section-title{
    color:var(--primary-dark);
    font-weight:800;
    margin-bottom:40px;
    position:relative;
    display:inline-block;
}

.section-title::after{
    content:"";
    position:absolute;
    left:50%;
    bottom:-14px;
    transform:translateX(-50%);
    width:80px;
    height:4px;
    border-radius:4px;
    background:linear-gradient(90deg, var(--primary), var(--gold));
}

.section-title-wrap{
    text-align:center;
    margin-bottom:10px;
}

.category-card{

    background:var(--white);

    border:none;

    border-radius:var(--radius);

    padding:35px;

    text-align:center;

    transition:var(--transition);

    box-shadow:var(--shadow);

    border-top:4px solid var(--primary);

}

.category-card:hover{

    transform:translateY(-8px);

    box-shadow:var(--shadow-hover);

    border-top:4px solid var(--gold);

}

.category-card .icon-wrap{
    width:78px;
    height:78px;
    margin:0 auto 18px;
    border-radius:50%;
    background:linear-gradient(135deg, var(--primary), var(--secondary));
    display:flex;
    align-items:center;
    justify-content:center;
    box-shadow:0 12px 25px rgba(0,91,170,.30);
}

.category-card .icon-wrap i{
    font-size:32px;
    color:#fff;
}

.category-card h5{

    margin-top:5px;

    color:var(--text);

    font-weight:600;

}

.info-card{

    position:relative;

    background:var(--white);

    border:none;

    border-radius:var(--radius);

    padding:35px;

    text-align:center;

    box-shadow:var(--shadow);

    overflow:hidden;

}

.info-card::before{
    content:"";
    position:absolute;
    top:0;
    left:0;
    right:0;
    height:5px;
    background:linear-gradient(90deg, var(--primary), var(--gold));
}

.info-card .icon-circle{
    width:60px;
    height:60px;
    margin:0 auto 14px;
    border-radius:50%;
    background:var(--primary-light);
    display:flex;
    align-items:center;
    justify-content:center;
}

.info-card .icon-circle i{
    color:var(--primary);
    font-size:26px;
    margin:0;
}

.info-card h2{

    color:var(--primary-dark);

    font-weight:800;

}

.info-card p{

    margin:0;

    color:var(--text-light);

}

.feature-box{

    position:relative;

    background:var(--white);

    border-radius:var(--radius);

    padding:35px;

    box-shadow:var(--shadow);

    height:100%;

    border-left:5px solid var(--primary);

    transition:var(--transition);

}

.feature-box:hover{

    box-shadow:var(--shadow-hover);

    transform:translateY(-6px);

}

.feature-box .icon-wrap{
    width:70px;
    height:70px;
    margin-bottom:18px;
    border-radius:16px;
    background:linear-gradient(135deg, var(--primary), var(--secondary));
    display:flex;
    align-items:center;
    justify-content:center;
}

.feature-box .icon-wrap i{
    font-size:32px;
    color:#fff;
}

.feature-box h4{

    margin-top:0;

    color:var(--primary-dark);

}

.feature-box p{

    color:var(--text-light);

}

/* ===== Pita pembatas antar section ===== */
.navy-divider{
    height:6px;
    border-radius:6px;
    background:linear-gradient(90deg, var(--primary) 0%, var(--secondary) 50%, var(--gold) 100%);
    margin:55px 0;
}

/* ==========================================================
   ARTIKEL / BLOG
========================================================== */

.article-card{
    background:var(--white);
    border-radius:var(--radius);
    overflow:hidden;
    box-shadow:var(--shadow);
    transition:var(--transition);
    height:100%;
    display:flex;
    flex-direction:column;
}

.article-card:hover{
    transform:translateY(-10px);
    box-shadow:var(--shadow-hover);
}

.article-thumb{
    position:relative;
    overflow:hidden;
    height:210px;
}

.article-thumb img{
    width:100%;
    height:100%;
    object-fit:cover;
    transition:transform .6s cubic-bezier(.19,1,.22,1);
}

.article-card:hover .article-thumb img{
    transform:scale(1.09);
}

.article-category{
    position:absolute;
    top:16px;
    left:16px;
    background:var(--gold);
    color:var(--primary-dark);
    font-size:.72rem;
    font-weight:700;
    letter-spacing:.5px;
    text-transform:uppercase;
    padding:6px 14px;
    border-radius:30px;
}

.article-body{
    padding:26px 28px 28px;
    display:flex;
    flex-direction:column;
    flex:1;
}

.article-date{
    color:var(--text-light);
    font-size:.8rem;
    margin-bottom:10px;
    display:flex;
    align-items:center;
    gap:6px;
}

.article-body h5{
    color:var(--primary-dark);
    font-weight:700;
    margin-bottom:12px;
    line-height:1.4;
}

.article-body p{
    color:var(--text-light);
    font-size:.94rem;
    line-height:1.65;
    margin-bottom:18px;
    flex:1;
}

.article-link{
    color:var(--primary);
    font-weight:700;
    font-size:.9rem;
    display:inline-flex;
    align-items:center;
    gap:6px;
    transition:var(--transition);
}

.article-link i{
    transition:transform .3s ease;
}

.article-card:hover .article-link{
    color:var(--primary-dark);
}

.article-card:hover .article-link i{
    transform:translateX(4px);
}

/* ==========================================================
   PROMO "BUKU TERBARU"
========================================================== */

.promo-banner{
    background:linear-gradient(135deg, var(--gold-light) 0%, #fff 65%);
    border:1px solid var(--gold);
    border-radius:16px;
    padding:16px 30px;
    text-align:center;
    margin-bottom:36px;
    display:flex;
    align-items:center;
    justify-content:center;
    gap:10px;
    flex-wrap:wrap;
    box-shadow:var(--shadow);
}

.promo-banner .promo-icon{
    font-size:1.3rem;
}

.promo-banner strong{
    color:var(--primary-dark);
}

.promo-banner span.promo-text{
    color:var(--text);
    font-weight:500;
    font-size:.95rem;
}

.book-card{
    background:var(--white);
    border-radius:var(--radius);
    overflow:hidden;
    box-shadow:var(--shadow);
    transition:var(--transition);
    height:100%;
    display:flex;
    flex-direction:column;
    border-top:4px solid var(--gold);
}

.book-card:hover{
    transform:translateY(-8px);
    box-shadow:var(--shadow-hover);
}

.book-thumb{
    position:relative;
    overflow:hidden;
    height:230px;
    background:var(--primary-light);
}

.book-thumb img{
    width:100%;
    height:100%;
    object-fit:cover;
    transition:transform .6s cubic-bezier(.19,1,.22,1);
}

.book-card:hover .book-thumb img{
    transform:scale(1.07);
}

.book-badge-new{
    position:absolute;
    top:14px;
    left:14px;
    background:var(--gold);
    color:var(--primary-dark);
    font-size:.7rem;
    font-weight:700;
    letter-spacing:.5px;
    text-transform:uppercase;
    padding:5px 12px;
    border-radius:30px;
}

.book-badge-discount{
    position:absolute;
    top:14px;
    right:14px;
    background:var(--primary-dark);
    color:#fff;
    font-size:.7rem;
    font-weight:700;
    padding:5px 12px;
    border-radius:30px;
}

.book-body{
    padding:20px 22px 22px;
    display:flex;
    flex-direction:column;
    flex:1;
}

.book-category{
    color:var(--secondary);
    font-size:.72rem;
    font-weight:700;
    text-transform:uppercase;
    letter-spacing:.5px;
    margin-bottom:6px;
}

.book-body h5{
    color:var(--primary-dark);
    font-weight:700;
    font-size:1rem;
    margin-bottom:4px;
    line-height:1.4;
    min-height:2.8em;
}

.book-author{
    color:var(--text-light);
    font-size:.85rem;
    margin-bottom:12px;
}

.book-price{
    color:var(--primary-dark);
    font-weight:800;
    font-size:1.1rem;
    margin-bottom:14px;
    margin-top:auto;
}

.book-price .book-price-old{
    color:var(--text-light);
    font-weight:500;
    font-size:.85rem;
    text-decoration:line-through;
    margin-right:8px;
}

.btn-shop.btn-sm{
    font-size:.85rem;
    padding:9px 20px;
    width:100%;
}

</style>

<script>document.body.classList.add('reveal-ready');</script>

{{-- Dekorasi bunga mekar kiri & kanan, warna navy-gold senada tema --}}
<div class="flower-decor left" aria-hidden="true">
    <div class="flower reveal-flower">
        <svg viewBox="0 0 100 100"><g fill="var(--gold)"><circle cx="50" cy="25" r="18"/><circle cx="50" cy="75" r="18"/><circle cx="25" cy="50" r="18"/><circle cx="75" cy="50" r="18"/></g><circle cx="50" cy="50" r="16" fill="var(--primary)"/></svg>
    </div>
    <div class="flower reveal-flower">
        <svg viewBox="0 0 100 100"><g fill="var(--primary)"><ellipse cx="50" cy="24" rx="13" ry="20"/><ellipse cx="50" cy="76" rx="13" ry="20"/><ellipse cx="24" cy="50" rx="20" ry="13"/><ellipse cx="76" cy="50" rx="20" ry="13"/></g><circle cx="50" cy="50" r="12" fill="var(--gold)"/></svg>
    </div>
    <div class="flower reveal-flower">
        <svg viewBox="0 0 100 100"><g fill="var(--secondary)"><circle cx="50" cy="22" r="16"/><circle cx="78" cy="38" r="16"/><circle cx="78" cy="64" r="16"/><circle cx="50" cy="80" r="16"/><circle cx="22" cy="64" r="16"/><circle cx="22" cy="38" r="16"/></g><circle cx="50" cy="52" r="15" fill="var(--gold)"/></svg>
    </div>
    <div class="flower reveal-flower">
        <svg viewBox="0 0 100 100"><g fill="var(--gold)"><ellipse cx="50" cy="24" rx="12" ry="19"/><ellipse cx="50" cy="76" rx="12" ry="19"/><ellipse cx="24" cy="50" rx="19" ry="12"/><ellipse cx="76" cy="50" rx="19" ry="12"/></g><circle cx="50" cy="50" r="11" fill="var(--primary-dark)"/></svg>
    </div>
    <div class="flower reveal-flower">
        <svg viewBox="0 0 100 100"><g fill="var(--primary-dark)"><circle cx="50" cy="25" r="18"/><circle cx="50" cy="75" r="18"/><circle cx="25" cy="50" r="18"/><circle cx="75" cy="50" r="18"/></g><circle cx="50" cy="50" r="16" fill="var(--gold-light)"/></svg>
    </div>
    <div class="flower reveal-flower">
        <svg viewBox="0 0 100 100"><g fill="var(--secondary)"><ellipse cx="50" cy="24" rx="13" ry="20"/><ellipse cx="50" cy="76" rx="13" ry="20"/><ellipse cx="24" cy="50" rx="20" ry="13"/><ellipse cx="76" cy="50" rx="20" ry="13"/></g><circle cx="50" cy="50" r="12" fill="var(--gold)"/></svg>
    </div>
</div>

<div class="flower-decor right" aria-hidden="true">
    <div class="flower reveal-flower">
        <svg viewBox="0 0 100 100"><g fill="var(--primary)"><circle cx="50" cy="25" r="18"/><circle cx="50" cy="75" r="18"/><circle cx="25" cy="50" r="18"/><circle cx="75" cy="50" r="18"/></g><circle cx="50" cy="50" r="16" fill="var(--gold)"/></svg>
    </div>
    <div class="flower reveal-flower">
        <svg viewBox="0 0 100 100"><g fill="var(--gold)"><circle cx="50" cy="22" r="16"/><circle cx="78" cy="38" r="16"/><circle cx="78" cy="64" r="16"/><circle cx="50" cy="80" r="16"/><circle cx="22" cy="64" r="16"/><circle cx="22" cy="38" r="16"/></g><circle cx="50" cy="52" r="15" fill="var(--primary-dark)"/></svg>
    </div>
    <div class="flower reveal-flower">
        <svg viewBox="0 0 100 100"><g fill="var(--secondary)"><ellipse cx="50" cy="24" rx="12" ry="19"/><ellipse cx="50" cy="76" rx="12" ry="19"/><ellipse cx="24" cy="50" rx="19" ry="12"/><ellipse cx="76" cy="50" rx="19" ry="12"/></g><circle cx="50" cy="50" r="11" fill="var(--gold)"/></svg>
    </div>
    <div class="flower reveal-flower">
        <svg viewBox="0 0 100 100"><g fill="var(--primary-dark)"><ellipse cx="50" cy="24" rx="13" ry="20"/><ellipse cx="50" cy="76" rx="13" ry="20"/><ellipse cx="24" cy="50" rx="20" ry="13"/><ellipse cx="76" cy="50" rx="20" ry="13"/></g><circle cx="50" cy="50" r="12" fill="var(--gold-light)"/></svg>
    </div>
    <div class="flower reveal-flower">
        <svg viewBox="0 0 100 100"><g fill="var(--gold)"><circle cx="50" cy="25" r="18"/><circle cx="50" cy="75" r="18"/><circle cx="25" cy="50" r="18"/><circle cx="75" cy="50" r="18"/></g><circle cx="50" cy="50" r="16" fill="var(--primary)"/></svg>
    </div>
    <div class="flower reveal-flower">
        <svg viewBox="0 0 100 100"><g fill="var(--primary)"><ellipse cx="50" cy="24" rx="13" ry="20"/><ellipse cx="50" cy="76" rx="13" ry="20"/><ellipse cx="24" cy="50" rx="20" ry="13"/><ellipse cx="76" cy="50" rx="20" ry="13"/></g><circle cx="50" cy="50" r="12" fill="var(--gold-light)"/></svg>
    </div>
</div>

<div class="hero mb-5 reveal">

<div class="row align-items-center">

<div class="col-lg-6">

<span class="badge px-3 py-2 mb-3">

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

<a href="{{ route('books.customer') }}" class="btn btn-hero-cta">
    <i class="bi bi-book"></i>
    <span>Jelajahi Buku</span>
    <i class="bi bi-arrow-right icon-arrow"></i>
</a>

</div>

<div class="col-lg-6 text-center">

<img src="https://images.unsplash.com/photo-1512820790803-83ca734da794?w=900"
class="img-fluid shadow">

</div>

</div>

</div>

<div class="row text-center mb-5">

    <div class="col-lg-4 col-md-4 mb-4 reveal reveal-item">

        <div class="info-card">

            <div class="icon-circle">
                <i class="bi bi-book-half"></i>
            </div>

            <h2>{{ $totalBooks }}</h2>

            <p>Koleksi Buku</p>

        </div>

    </div>

    <div class="col-lg-4 col-md-4 mb-4 reveal reveal-item">

        <div class="info-card">

            <div class="icon-circle">
                <i class="bi bi-grid"></i>
            </div>

            <h2>{{ $totalCategories }}</h2>

            <p>Kategori Buku</p>

        </div>

    </div>

    <div class="col-lg-4 col-md-4 mb-4 reveal reveal-item">

        <div class="info-card">

            <div class="icon-circle">
                <i class="bi bi-people"></i>
            </div>

            <h2>{{ $totalUsers }}</h2>

            <p>Pelanggan</p>

        </div>

    </div>

</div>

<div class="navy-divider reveal reveal-line"></div>

<div class="navy-divider reveal reveal-line"></div>

<div class="section-title-wrap reveal">
    <span class="section-eyebrow">Buku Terbaru</span><br>

    <h2 class="section-title">
        Koleksi Terbaru Kami
    </h2>

    <p class="section-subtitle mt-3">
        Buku yang baru saja ditambahkan ke Pustaka Nusantara.
    </p>
</div>

<div class="row g-4 mb-4">

    @forelse($newBooks as $book)

    <div class="col-lg-3 col-md-6 reveal reveal-item">

        <div class="book-card">

            <div class="book-thumb">

                @if($book->gambar)

                    <img src="{{ asset('storage/'.$book->gambar) }}"
                         alt="{{ $book->judul }}">

                @else

                    <img src="https://images.unsplash.com/photo-1544947950-fa07a98d237f?w=600&q=80"
                         alt="{{ $book->judul }}">

                @endif

                <span class="book-badge-new">
                    Baru
                </span>

            </div>

            <div class="book-body">

                <div class="book-category">
                    {{ $book->category->nama_kategori ?? '-' }}
                </div>

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

                <a href="{{ route('books.customer.show',$book->id) }}"
                   class="btn btn-shop w-100 mt-3">

                    <i class="bi bi-eye"></i>
                    Lihat Detail

                </a>

            </div>

        </div>

    </div>

    @empty

    <div class="col-12">

        <div class="alert alert-light text-center rounded-4">

            Belum ada buku terbaru.

        </div>

    </div>

    @endforelse

</div>

<div class="text-center mb-5 reveal">

    <a href="{{ route('books.customer') }}"
       class="btn btn-outline-shop">

        Lihat Semua Buku

    </a>

</div>

<script>
document.addEventListener('DOMContentLoaded', function () {

    var revealEls = document.querySelectorAll('.reveal, .reveal-line, .reveal-flower');

    if (!('IntersectionObserver' in window)) {
        revealEls.forEach(function (el) {
            el.classList.add('is-visible');
        });
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

        threshold: 0.15,
        rootMargin: '0px 0px -60px 0px'

    });

    revealEls.forEach(function (el) {

        observer.observe(el);

    });

});
</script>

@endsection