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


/* ==========================================================
   BODY
========================================================== */

body{
    font-family:'Plus Jakarta Sans',sans-serif;

    background:
        radial-gradient(
            circle at top right,
            #DCEEFF 0%,
            transparent 30%
        ),
        radial-gradient(
            circle at bottom left,
            #EEF6FF 0%,
            transparent 25%
        ),
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

    transition:
        opacity .8s cubic-bezier(.19,1,.22,1),
        transform .8s cubic-bezier(.19,1,.22,1);

    will-change:opacity,transform;
}

.reveal.is-visible{
    opacity:1;
    transform:translateY(0);
}


/* ==========================================================
   CASCADE BOOK
========================================================== */

.book-results .reveal-item:nth-child(4n+1){
    transition-delay:0s;
}

.book-results .reveal-item:nth-child(4n+2){
    transition-delay:.08s;
}

.book-results .reveal-item:nth-child(4n+3){
    transition-delay:.16s;
}

.book-results .reveal-item:nth-child(4n+4){
    transition-delay:.24s;
}


body:not(.reveal-ready) .reveal,
body:not(.reveal-ready) .reveal-line{
    opacity:1;
    transform:none;
}


/* ==========================================================
   FLOWER
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

.flower-decor.left{
    left:0;
}

.flower-decor.right{
    right:0;
}

.flower{

    position:absolute;

    opacity:0;

    transform:
        scale(.2)
        rotate(-25deg);

    transition:
        opacity 1s cubic-bezier(.19,1,.22,1),
        transform 1.1s cubic-bezier(.19,1,.22,1);
}

.flower.is-visible{

    opacity:.85;

    transform:
        scale(1)
        rotate(0deg);

    animation:
        flowerSway 5.5s ease-in-out infinite;
}

.flower svg{

    width:100%;
    height:100%;

    display:block;

    filter:
        drop-shadow(
            0 6px 14px
            rgba(0,58,112,.15)
        );
}


/* LEFT */

.flower-decor.left .flower:nth-child(1){
    top:5%;
    left:-14px;
    width:66px;
    height:66px;
    transition-delay:.05s;
    animation-delay:.2s;
}

.flower-decor.left .flower:nth-child(2){
    top:20%;
    left:22px;
    width:42px;
    height:42px;
    transition-delay:.22s;
    animation-delay:1.1s;
}

.flower-decor.left .flower:nth-child(3){
    top:36%;
    left:-20px;
    width:80px;
    height:80px;
    transition-delay:.10s;
    animation-delay:.6s;
}

.flower-decor.left .flower:nth-child(4){
    top:54%;
    left:16px;
    width:50px;
    height:50px;
    transition-delay:.32s;
    animation-delay:1.6s;
}

.flower-decor.left .flower:nth-child(5){
    top:70%;
    left:-8px;
    width:60px;
    height:60px;
    transition-delay:.16s;
    animation-delay:.4s;
}

.flower-decor.left .flower:nth-child(6){
    top:87%;
    left:26px;
    width:38px;
    height:38px;
    transition-delay:.40s;
    animation-delay:1.3s;
}


/* RIGHT */

.flower-decor.right .flower:nth-child(1){
    top:8%;
    right:-10px;
    width:58px;
    height:58px;
    transition-delay:.12s;
    animation-delay:.7s;
}

.flower-decor.right .flower:nth-child(2){
    top:25%;
    right:24px;
    width:76px;
    height:76px;
    transition-delay:.28s;
    animation-delay:.1s;
}

.flower-decor.right .flower:nth-child(3){
    top:44%;
    right:-18px;
    width:46px;
    height:46px;
    transition-delay:.06s;
    animation-delay:1.4s;
}

.flower-decor.right .flower:nth-child(4){
    top:62%;
    right:12px;
    width:66px;
    height:66px;
    transition-delay:.24s;
    animation-delay:.5s;
}

.flower-decor.right .flower:nth-child(5){
    top:79%;
    right:-12px;
    width:52px;
    height:52px;
    transition-delay:.38s;
    animation-delay:1.2s;
}

.flower-decor.right .flower:nth-child(6){
    top:94%;
    right:20px;
    width:36px;
    height:36px;
    transition-delay:.18s;
    animation-delay:.9s;
}


@keyframes flowerSway{

    0%,100%{
        transform:
            scale(1)
            rotate(0deg)
            translateY(0);
    }

    50%{
        transform:
            scale(1)
            rotate(5deg)
            translateY(-10px);
    }
}


@media(max-width:1300px){

    .flower-decor{
        display:none;
    }
}


/* ==========================================================
   CATALOG HEADER
========================================================== */

.catalog-header{

    position:relative;

    background:
        linear-gradient(
            135deg,
            var(--primary-dark) 0%,
            var(--primary) 55%,
            var(--secondary) 100%
        );

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

    background:
        radial-gradient(
            circle at center,
            var(--gold) 0%,
            transparent 70%
        );

    opacity:.30;
}

.catalog-header::after{

    content:"";

    position:absolute;

    bottom:-130px;
    left:-90px;

    width:280px;
    height:280px;

    border-radius:50%;

    background:
        radial-gradient(
            circle at center,
            #ffffff 0%,
            transparent 70%
        );

    opacity:.10;
}

.catalog-header-inner{

    position:relative;

    z-index:1;
}


.catalog-header .header-icon{

    width:74px;
    height:74px;

    margin:
        0 auto
        20px;

    border-radius:50%;

    background:var(--gold);

    display:flex;

    align-items:center;
    justify-content:center;

    box-shadow:
        0 15px 32px
        rgba(212,175,55,.40);
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

    color:
        rgba(255,255,255,.85);

    font-size:1.05rem;
}


/* ==========================================================
   SEARCH
========================================================== */

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

    box-shadow:
        0 0 0 5px
        rgba(212,175,55,.30),
        var(--shadow-hover);
}

.search-box input{

    border:none;

    background:transparent;

    padding:
        14px
        20px;

    border-radius:50px;
}

.search-box input:focus{
    box-shadow:none;
}


.btn-search{

    background:
        linear-gradient(
            135deg,
            var(--primary),
            var(--secondary)
        );

    color:white;

    border-radius:50px;

    padding:
        12px 30px;

    border:none;

    font-weight:700;

    transition:var(--transition);

    white-space:nowrap;
}

.btn-search:hover{

    background:
        linear-gradient(
            135deg,
            var(--primary-dark),
            var(--primary)
        );

    color:white;

    transform:translateY(-2px);

    box-shadow:
        0 14px 26px
        rgba(0,58,112,.35);
}


/* ==========================================================
   FILTER
========================================================== */

.filter-area{
    margin-top:28px;
}

.filter-btn{

    display:inline-flex;

    align-items:center;

    gap:6px;

    text-decoration:none;

    background:
        rgba(255,255,255,.12);

    color:#fff;

    border:
        1px solid
        rgba(255,255,255,.35);

    border-radius:30px;

    padding:
        10px 20px;

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

    background:var(--gold)!important;

    color:var(--primary-dark)!important;

    border-color:var(--gold)!important;

    box-shadow:
        0 10px 22px
        rgba(212,175,55,.35);
}


/* ==========================================================
   BEST SELLER SECTION
========================================================== */

.best-seller-section{

    position:relative;

    margin-bottom:55px;
}


.best-seller-heading{

    display:flex;

    align-items:center;

    justify-content:space-between;

    margin-bottom:25px;
}

.best-seller-title{

    display:flex;

    align-items:center;

    gap:14px;
}

.best-seller-icon{

    width:54px;
    height:54px;

    border-radius:18px;

    display:flex;

    align-items:center;
    justify-content:center;

    background:
        linear-gradient(
            135deg,
            var(--gold),
            #F4D96B
        );

    color:var(--primary-dark);

    box-shadow:
        0 12px 25px
        rgba(212,175,55,.25);
}

.best-seller-icon i{
    font-size:25px;
}

.best-seller-heading h2{

    margin:0;

    color:var(--primary-dark);

    font-size:1.7rem;

    font-weight:800;
}

.best-seller-heading p{

    margin:3px 0 0;

    color:var(--text-light);

    font-size:.9rem;
}


/* ==========================================================
   BEST SELLER CARD
========================================================== */

.best-card{

    position:relative;

    height:100%;

    background:#fff;

    border-radius:26px;

    overflow:hidden;

    border:
        1px solid
        rgba(212,175,55,.20);

    box-shadow:
        0 14px 35px
        rgba(0,58,112,.08);

    transition:
        transform .5s
        cubic-bezier(.19,1,.22,1),
        box-shadow .5s
        cubic-bezier(.19,1,.22,1);
}

.best-card:hover{

    transform:translateY(-12px);

    box-shadow:
        0 28px 60px
        rgba(0,58,112,.18),
        0 0 0 1px
        rgba(212,175,55,.35);
}


/* RANK */

.best-rank{

    position:absolute;

    top:15px;
    left:15px;

    z-index:5;

    min-width:46px;
    height:46px;

    padding:0 10px;

    border-radius:16px;

    display:flex;

    align-items:center;
    justify-content:center;

    background:
        linear-gradient(
            135deg,
            var(--gold),
            #F4D96B
        );

    color:var(--primary-dark);

    font-size:15px;

    font-weight:800;

    box-shadow:
        0 8px 20px
        rgba(212,175,55,.35);
}


/* TERLARIS */

.best-badge{

    position:absolute;

    top:15px;
    right:15px;

    z-index:5;

    padding:
        7px 13px;

    border-radius:30px;

    background:
        rgba(0,58,112,.92);

    color:#fff;

    font-size:11px;

    font-weight:800;

    letter-spacing:.5px;

    box-shadow:
        0 8px 20px
        rgba(0,58,112,.20);
}


/* IMAGE */

.best-image{

    position:relative;

    height:270px;

    padding:25px;

    display:flex;

    align-items:center;

    justify-content:center;

    background:
        linear-gradient(
            145deg,
            #EAF4FF,
            #F8FBFF
        );

    overflow:hidden;
}

.best-image::before{

    content:"";

    position:absolute;

    width:190px;
    height:190px;

    border-radius:50%;

    background:
        radial-gradient(
            circle,
            rgba(212,175,55,.24),
            transparent 70%
        );
}

.best-image img{

    position:relative;

    z-index:2;

    max-width:100%;

    max-height:220px;

    object-fit:contain;

    transition:
        transform .5s
        cubic-bezier(.19,1,.22,1);
}

.best-card:hover .best-image img{

    transform:
        scale(1.08)
        rotate(-1deg);
}


.best-no-image{

    position:relative;

    z-index:2;

    font-size:70px;

    color:var(--primary);
}


/* BODY */

.best-body{

    padding:22px;
}

.best-category{

    display:inline-block;

    background:var(--gold-light);

    color:var(--primary-dark);

    font-size:11px;

    font-weight:800;

    padding:
        6px 11px;

    border-radius:30px;

    margin-bottom:10px;
}

.best-title{

    color:var(--primary-dark);

    font-size:17px;

    font-weight:800;

    line-height:1.4;

    min-height:48px;

    margin-bottom:7px;
}

.best-author{

    color:var(--text-light);

    font-size:13px;

    margin-bottom:14px;
}

.best-price{

    color:var(--primary-dark);

    font-size:19px;

    font-weight:800;
}

.best-sold{

    color:var(--text-light);

    font-size:12px;

    margin-top:5px;
}

.best-sold i{

    color:var(--gold);

    margin-right:4px;
}


/* ==========================================================
   BOOK CARD
========================================================== */

.book-card{

    position:relative;

    isolation:isolate;

    background:var(--white);

    border:none;

    border-radius:var(--radius);

    overflow:hidden;

    height:100%;

    box-shadow:var(--shadow);

    transition:
        transform .5s
        cubic-bezier(.19,1,.22,1),
        box-shadow .5s
        cubic-bezier(.19,1,.22,1);
}

.book-card::before{

    content:"";

    position:absolute;

    top:0;

    left:0;

    right:0;

    height:3px;

    background:
        linear-gradient(
            90deg,
            var(--primary),
            var(--gold),
            var(--secondary)
        );

    transform:scaleX(0);

    transform-origin:center;

    transition:
        transform .6s
        cubic-bezier(.19,1,.22,1);

    z-index:4;
}

.book-card:hover{

    transform:translateY(-12px);

    box-shadow:
        0 28px 55px
        rgba(0,58,112,.20),
        0 0 0 1px
        rgba(212,175,55,.25),
        0 0 32px
        rgba(212,175,55,.14);
}

.book-card:hover::before{

    transform:scaleX(1);

    animation:
        cardShimmer
        2.6s linear infinite;
}

@keyframes cardShimmer{

    0%{
        background-position:0% 50%;
    }

    100%{
        background-position:200% 50%;
    }
}


/* ==========================================================
   BOOK IMAGE
========================================================== */

.book-image{

    position:relative;

    height:280px;

    background:var(--primary-light);

    padding:20px;

    overflow:hidden;
}

.book-image::after{

    content:"";

    position:absolute;

    top:0;

    left:-60%;

    width:35%;

    height:100%;

    background:
        linear-gradient(
            120deg,
            transparent,
            rgba(255,255,255,.55),
            transparent
        );

    transform:skewX(-20deg);

    transition:left .9s ease;

    z-index:2;

    pointer-events:none;
}

.book-card:hover .book-image::after{
    left:135%;
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

    transition:
        transform .5s
        cubic-bezier(.19,1,.22,1);
}

.book-card:hover .book-image img{
    transform:scale(1.07);
}

.no-image{

    font-size:70px;

    color:var(--primary);
}


/* ==========================================================
   BUBBLE
========================================================== */

.bubble-field{

    position:absolute;

    inset:0;

    overflow:hidden;

    pointer-events:none;

    z-index:2;
}

.bubble{

    position:absolute;

    bottom:-24px;

    border-radius:50%;

    background:
        radial-gradient(
            circle at 30% 30%,
            rgba(255,255,255,.95),
            rgba(212,175,55,.4) 55%,
            transparent 75%
        );

    box-shadow:
        0 0 6px
        rgba(212,175,55,.25);

    opacity:0;
}

.book-card:hover .bubble{

    animation:
        bubbleRise
        3.8s
        ease-in-out
        infinite;
}

.bubble:nth-child(1){
    left:10%;
    width:8px;
    height:8px;
}

.bubble:nth-child(2){
    left:26%;
    width:13px;
    height:13px;
    animation-delay:.55s;
}

.bubble:nth-child(3){
    left:46%;
    width:9px;
    height:9px;
    animation-delay:1.05s;
}

.bubble:nth-child(4){
    left:65%;
    width:12px;
    height:12px;
    animation-delay:.3s;
}

.bubble:nth-child(5){
    left:82%;
    width:7px;
    height:7px;
    animation-delay:.8s;
}

@keyframes bubbleRise{

    0%{
        transform:
            translateY(0)
            translateX(0)
            scale(.6);

        opacity:0;
    }

    14%{
        opacity:.6;
    }

    50%{

        transform:
            translateY(-130px)
            translateX(6px)
            scale(1);

        opacity:.45;
    }

    82%{
        opacity:.15;
    }

    100%{

        transform:
            translateY(-250px)
            translateX(-5px)
            scale(.65);

        opacity:0;
    }
}


/* ==========================================================
   QUICK VIEW
========================================================== */

.book-quickview{

    position:absolute;

    inset:0;

    background:
        linear-gradient(
            180deg,
            rgba(0,58,112,0) 45%,
            rgba(0,58,112,.60)
        );

    display:flex;

    align-items:flex-end;

    justify-content:center;

    padding-bottom:18px;

    opacity:0;

    transition:var(--transition);

    pointer-events:none;

    z-index:3;
}

.book-card:hover .book-quickview{
    opacity:1;
}

.book-quickview span{

    background:var(--gold);

    color:var(--primary-dark);

    padding:
        8px 18px;

    border-radius:30px;

    font-weight:700;

    font-size:.85rem;

    transform:translateY(10px);

    transition:var(--transition);
}

.book-card:hover .book-quickview span{
    transform:translateY(0);
}


/* ==========================================================
   BOOK BODY
========================================================== */

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

    padding:
        5px 12px;

    border-radius:20px;

    display:inline-block;

    margin-bottom:10px;
}


/* ==========================================================
   RESULT
========================================================== */

.result-info{

    color:var(--text-light);

    margin-bottom:20px;

    font-weight:500;
}

.result-info strong{
    color:var(--primary-dark);
}


/* ==========================================================
   EMPTY
========================================================== */

.empty-state{

    background:var(--white);

    border:
        1px solid
        var(--border);

    border-radius:var(--radius);

    padding:
        50px 30px;

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


/* ==========================================================
   MOBILE
========================================================== */

@media(max-width:767px){

    .catalog-header{

        padding:
            45px 20px;

        border-radius:22px;
    }

    .catalog-header h1{
        font-size:2rem;
    }

    .search-box{
        border-radius:25px;
    }

    .search-box .btn-search{
        padding:
            10px 18px;
    }

    .best-seller-heading{

        align-items:flex-start;

        gap:10px;
    }

    .best-seller-heading h2{
        font-size:1.35rem;
    }

    .best-image{
        height:250px;
    }
}


/* ==========================================================
   REDUCED MOTION
========================================================== */

@media(prefers-reduced-motion:reduce){

    .reveal,
    .reveal-line{

        opacity:1!important;

        transform:none!important;

        transition:none!important;
    }

    .book-card:hover::before,
    .book-card:hover .bubble{

        animation:none!important;
    }

    .book-image::after{
        transition:none!important;
    }
}

</style>


<script>
document.body.classList.add('reveal-ready');
</script>


{{-- ==========================================================
     FLOWER DECORATION
========================================================== --}}

<div class="flower-decor left" aria-hidden="true">

    <div class="flower reveal-flower">
        <svg viewBox="0 0 100 100">
            <g fill="var(--gold)">
                <circle cx="50" cy="25" r="18"/>
                <circle cx="50" cy="75" r="18"/>
                <circle cx="25" cy="50" r="18"/>
                <circle cx="75" cy="50" r="18"/>
            </g>
            <circle cx="50" cy="50" r="16" fill="var(--primary)"/>
        </svg>
    </div>

    <div class="flower reveal-flower">
        <svg viewBox="0 0 100 100">
            <g fill="var(--primary)">
                <ellipse cx="50" cy="24" rx="13" ry="20"/>
                <ellipse cx="50" cy="76" rx="13" ry="20"/>
                <ellipse cx="24" cy="50" rx="20" ry="13"/>
                <ellipse cx="76" cy="50" rx="20" ry="13"/>
            </g>
            <circle cx="50" cy="50" r="12" fill="var(--gold)"/>
        </svg>
    </div>

    <div class="flower reveal-flower">
        <svg viewBox="0 0 100 100">
            <g fill="var(--secondary)">
                <circle cx="50" cy="22" r="16"/>
                <circle cx="78" cy="38" r="16"/>
                <circle cx="78" cy="64" r="16"/>
                <circle cx="50" cy="80" r="16"/>
                <circle cx="22" cy="64" r="16"/>
                <circle cx="22" cy="38" r="16"/>
            </g>
            <circle cx="50" cy="52" r="15" fill="var(--gold)"/>
        </svg>
    </div>

    <div class="flower reveal-flower">
        <svg viewBox="0 0 100 100">
            <g fill="var(--gold)">
                <ellipse cx="50" cy="24" rx="12" ry="19"/>
                <ellipse cx="50" cy="76" rx="12" ry="19"/>
                <ellipse cx="24" cy="50" rx="19" ry="12"/>
                <ellipse cx="76" cy="50" rx="19" ry="12"/>
            </g>
            <circle cx="50" cy="50" r="11" fill="var(--primary-dark)"/>
        </svg>
    </div>

    <div class="flower reveal-flower">
        <svg viewBox="0 0 100 100">
            <g fill="var(--primary-dark)">
                <circle cx="50" cy="25" r="18"/>
                <circle cx="50" cy="75" r="18"/>
                <circle cx="25" cy="50" r="18"/>
                <circle cx="75" cy="50" r="18"/>
            </g>
            <circle cx="50" cy="50" r="16" fill="var(--gold-light)"/>
        </svg>
    </div>

    <div class="flower reveal-flower">
        <svg viewBox="0 0 100 100">
            <g fill="var(--secondary)">
                <ellipse cx="50" cy="24" rx="13" ry="20"/>
                <ellipse cx="50" cy="76" rx="13" ry="20"/>
                <ellipse cx="24" cy="50" rx="20" ry="13"/>
                <ellipse cx="76" cy="50" rx="20" ry="13"/>
            </g>
            <circle cx="50" cy="50" r="12" fill="var(--gold)"/>
        </svg>
    </div>

</div>


<div class="flower-decor right" aria-hidden="true">

    <div class="flower reveal-flower">
        <svg viewBox="0 0 100 100">
            <g fill="var(--primary)">
                <circle cx="50" cy="25" r="18"/>
                <circle cx="50" cy="75" r="18"/>
                <circle cx="25" cy="50" r="18"/>
                <circle cx="75" cy="50" r="18"/>
            </g>
            <circle cx="50" cy="50" r="16" fill="var(--gold)"/>
        </svg>
    </div>

    <div class="flower reveal-flower">
        <svg viewBox="0 0 100 100">
            <g fill="var(--gold)">
                <circle cx="50" cy="22" r="16"/>
                <circle cx="78" cy="38" r="16"/>
                <circle cx="78" cy="64" r="16"/>
                <circle cx="50" cy="80" r="16"/>
                <circle cx="22" cy="64" r="16"/>
                <circle cx="22" cy="38" r="16"/>
            </g>
            <circle cx="50" cy="52" r="15" fill="var(--primary-dark)"/>
        </svg>
    </div>

    <div class="flower reveal-flower">
        <svg viewBox="0 0 100 100">
            <g fill="var(--secondary)">
                <ellipse cx="50" cy="24" rx="12" ry="19"/>
                <ellipse cx="50" cy="76" rx="12" ry="19"/>
                <ellipse cx="24" cy="50" rx="19" ry="12"/>
                <ellipse cx="76" cy="50" rx="19" ry="12"/>
            </g>
            <circle cx="50" cy="50" r="11" fill="var(--gold)"/>
        </svg>
    </div>

    <div class="flower reveal-flower">
        <svg viewBox="0 0 100 100">
            <g fill="var(--primary-dark)">
                <ellipse cx="50" cy="24" rx="13" ry="20"/>
                <ellipse cx="50" cy="76" rx="13" ry="20"/>
                <ellipse cx="24" cy="50" rx="20" ry="13"/>
                <ellipse cx="76" cy="50" rx="20" ry="13"/>
            </g>
            <circle cx="50" cy="50" r="12" fill="var(--gold-light)"/>
        </svg>
    </div>

    <div class="flower reveal-flower">
        <svg viewBox="0 0 100 100">
            <g fill="var(--gold)">
                <circle cx="50" cy="25" r="18"/>
                <circle cx="50" cy="75" r="18"/>
                <circle cx="25" cy="50" r="18"/>
                <circle cx="75" cy="50" r="18"/>
            </g>
            <circle cx="50" cy="50" r="16" fill="var(--primary)"/>
        </svg>
    </div>

    <div class="flower reveal-flower">
        <svg viewBox="0 0 100 100">
            <g fill="var(--primary)">
                <ellipse cx="50" cy="24" rx="13" ry="20"/>
                <ellipse cx="50" cy="76" rx="13" ry="20"/>
                <ellipse cx="24" cy="50" rx="20" ry="13"/>
                <ellipse cx="76" cy="50" rx="20" ry="13"/>
            </g>
            <circle cx="50" cy="50" r="12" fill="var(--gold-light)"/>
        </svg>
    </div>

</div>


<div class="container py-5">


{{-- ==========================================================
     HEADER
========================================================== --}}

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


        {{-- SEARCH --}}

        <form action="{{ route('books.customer') }}" method="GET">

            <div class="search-box d-flex">

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    class="form-control"
                    placeholder="Cari judul, penulis, atau penerbit..."
                >

                @if(request('category'))

                    <input
                        type="hidden"
                        name="category"
                        value="{{ request('category') }}"
                    >

                @endif

                <button class="btn btn-search">

                    <i class="bi bi-search me-2"></i>

                    Cari

                </button>

            </div>

        </form>


        {{-- FILTER --}}

        <div class="filter-area d-flex flex-wrap justify-content-center gap-2">

            <a
                href="{{ route('books.customer',['search'=>request('search')]) }}"
                class="filter-btn {{ request('category') ? '' : 'filter-active' }}"
            >

                <i class="bi bi-grid"></i>

                Semua

            </a>


            @foreach($categories as $category)

                <a
                    href="{{ route('books.customer',[
                        'search'=>request('search'),
                        'category'=>$category->id
                    ]) }}"
                    class="filter-btn {{ request('category') == $category->id ? 'filter-active' : '' }}"
                >

                    <i class="bi bi-bookmark-fill me-1"></i>

                    {{ $category->nama_kategori }}

                </a>

            @endforeach

        </div>

    </div>

</div>



{{-- ==========================================================
     BUKU TERLARIS
========================================================== --}}

@if($bestSellers->count())

<div class="best-seller-section reveal">


    <div class="best-seller-heading">

        <div class="best-seller-title">

            <div class="best-seller-icon">

                <i class="bi bi-fire"></i>

            </div>

            <div>

                <h2>
                    Buku Terlaris
                </h2>

                <p>
                    Paling banyak dibeli oleh pelanggan
                </p>

            </div>

        </div>

    </div>



    <div class="row g-4">

        @foreach($bestSellers as $index => $book)

            <div class="col-lg-4 col-md-6">

                <div class="best-card">


                    {{-- RANK --}}

                    <div class="best-rank">

                        #{{ $index + 1 }}

                    </div>


                    {{-- TERLARIS --}}

                    <div class="best-badge">

                        🔥 TERLARIS

                    </div>


                    {{-- IMAGE --}}

                    <div class="best-image">

                        <a
                            href="{{ route('books.customer.show',$book->id) }}"
                            class="w-100 h-100 d-flex align-items-center justify-content-center"
                        >

                            @if($book->gambar)

                                <img
                                    src="{{ asset('storage/'.$book->gambar) }}"
                                    alt="{{ $book->judul }}"
                                >

                            @else

                                <div class="best-no-image">

                                    <i class="bi bi-book"></i>

                                </div>

                            @endif

                        </a>

                    </div>


                    {{-- BODY --}}

                    <div class="best-body">

                        <span class="best-category">

                            {{ $book->category->nama_kategori ?? 'Umum' }}

                        </span>


                        <h5 class="best-title">

                            {{ $book->judul }}

                        </h5>


                        <p class="best-author">

                            <i class="bi bi-person"></i>

                            {{ $book->penulis }}

                        </p>


                        <div class="best-price">

                            Rp {{ number_format($book->harga,0,',','.') }}

                        </div>


                        <div class="best-sold">

                            <i class="bi bi-fire"></i>

                            {{ $book->total_sold ?? 0 }} terjual

                        </div>

                    </div>

                </div>

            </div>

        @endforeach

    </div>

</div>

@endif



{{-- ==========================================================
     RESULT INFO
========================================================== --}}

<div class="result-info reveal">

    Menampilkan

    <strong>
        {{ $books->count() }}
    </strong>

    buku

    @if(request('search'))

        untuk pencarian

        <strong>
            "{{ request('search') }}"
        </strong>

    @endif

</div>



{{-- ==========================================================
     KOLEKSI BUKU
========================================================== --}}

<div class="row g-4 book-results">

    @forelse($books as $book)

        <div class="col-xl-3 col-lg-4 col-md-6 reveal reveal-item">

            <div class="book-card">


                {{-- IMAGE --}}

                <div class="book-image">

                    <a
                        href="{{ route('books.customer.show',$book->id) }}"
                        class="book-image-link"
                    >

                        @if($book->gambar)

                            <img
                                src="{{ asset('storage/'.$book->gambar) }}"
                                alt="{{ $book->judul }}"
                            >

                        @else

                            <div class="no-image">

                                <i class="bi bi-book"></i>

                            </div>

                        @endif

                    </a>


                    {{-- BUBBLES --}}

                    <div
                        class="bubble-field"
                        aria-hidden="true"
                    >

                        <span class="bubble"></span>
                        <span class="bubble"></span>
                        <span class="bubble"></span>
                        <span class="bubble"></span>
                        <span class="bubble"></span>

                    </div>


                    {{-- QUICK VIEW --}}

                    <div class="book-quickview">

                        <span>

                            <i class="bi bi-eye me-1"></i>

                            Lihat Detail

                        </span>

                    </div>

                </div>


                {{-- BODY --}}

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

                    Coba gunakan kata kunci lain
                    atau pilih kategori yang berbeda.

                </p>

            </div>

        </div>

    @endforelse

</div>


</div>


{{-- ==========================================================
     JAVASCRIPT REVEAL
========================================================== --}}

<script>

document.addEventListener(
    'DOMContentLoaded',
    function(){

        var revealEls =
            document.querySelectorAll(
                '.reveal, .reveal-line, .reveal-flower'
            );


        if(
            !('IntersectionObserver' in window)
        ){

            revealEls.forEach(
                function(el){

                    el.classList.add(
                        'is-visible'
                    );

                }
            );

            return;
        }


        var observer =
            new IntersectionObserver(
                function(entries, obs){

                    entries.forEach(
                        function(entry){

                            if(
                                entry.isIntersecting
                            ){

                                entry.target.classList.add(
                                    'is-visible'
                                );

                                obs.unobserve(
                                    entry.target
                                );

                            }

                        }
                    );

                },
                {
                    threshold:.12,

                    rootMargin:
                        '0px 0px -60px 0px'
                }
            );


        revealEls.forEach(
            function(el){

                observer.observe(el);

            }
        );

    }
);

</script>

@endsection