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

</style>

<script>document.body.classList.add('reveal-ready');</script>

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

<div class="section-title-wrap reveal">
<span class="section-eyebrow">Koleksi Kami</span><br>
<h2 class="section-title">
Kategori Populer
</h2>
</div>

<div class="row g-4 mb-5">

<div class="col-lg-3 reveal reveal-item">

<div class="category-card">

<div class="icon-wrap"><i class="bi bi-book"></i></div>

<h5>Novel</h5>

</div>

</div>

<div class="col-lg-3 reveal reveal-item">

<div class="category-card">

<div class="icon-wrap"><i class="bi bi-mortarboard"></i></div>

<h5>Pendidikan</h5>

</div>

</div>

<div class="col-lg-3 reveal reveal-item">

<div class="category-card">

<div class="icon-wrap"><i class="bi bi-cpu"></i></div>

<h5>Teknologi</h5>

</div>

</div>

<div class="col-lg-3 reveal reveal-item">

<div class="category-card">

<div class="icon-wrap"><i class="bi bi-palette"></i></div>

<h5>Komik</h5>

</div>

</div>

</div>

<div class="navy-divider reveal reveal-line"></div>

<div class="section-title-wrap reveal">
<span class="section-eyebrow">Kenapa Kami</span><br>
<h2 class="section-title">
Mengapa Memilih Kami?
</h2>
</div>

<div class="row g-4 mb-5">

<div class="col-md-4 reveal reveal-item">

<div class="feature-box">

<div class="icon-wrap"><i class="bi bi-patch-check"></i></div>

<h4>Buku Original</h4>

<p>

Kami menyediakan buku original dengan kualitas terbaik
dari berbagai penerbit terpercaya.

</p>

</div>

</div>

<div class="col-md-4 reveal reveal-item">

<div class="feature-box">

<div class="icon-wrap"><i class="bi bi-wallet2"></i></div>

<h4>Harga Bersahabat</h4>

<p>

Harga kompetitif dengan berbagai promo menarik
untuk semua pelanggan.

</p>

</div>

</div>

<div class="col-md-4 reveal reveal-item">

<div class="feature-box">

<div class="icon-wrap"><i class="bi bi-truck"></i></div>

<h4>Pengiriman Cepat</h4>

<p>

Pesanan diproses dengan cepat dan dikirim
ke seluruh Indonesia.

</p>

</div>

</div>

</div>

<div class="navy-divider reveal reveal-line"></div>

<div class="section-title-wrap reveal">
<span class="section-eyebrow">Blog Kami</span><br>
<h2 class="section-title">
Artikel &amp; Tips Membaca
</h2>
</div>

<div class="row g-4 mb-4">

<div class="col-lg-4 col-md-6 mb-4 reveal reveal-item">

<div class="article-card">

<div class="article-thumb">
<img src="https://images.unsplash.com/photo-1495446815901-a7297e633e8d?w=800&q=80" alt="7 Novel Fiksi Wajib Baca Tahun Ini">
<span class="article-category">Rekomendasi</span>
</div>

<div class="article-body">

<div class="article-date"><i class="bi bi-calendar3"></i> 24 Jul 2026</div>

<h5>7 Novel Fiksi Wajib Baca Tahun Ini</h5>

<p>Dari kisah keluarga yang menghangatkan hati sampai thriller yang bikin susah berhenti membaca, ini daftar novel pilihan editor kami minggu ini.</p>

<a href="#" class="article-link">Baca Selengkapnya <i class="bi bi-arrow-right"></i></a>

</div>

</div>

</div>

<div class="col-lg-4 col-md-6 mb-4 reveal reveal-item">

<div class="article-card">

<div class="article-thumb">
<img src="https://images.unsplash.com/photo-1481627834876-b7833e8f5570?w=800&q=80" alt="Cara Menumbuhkan Kebiasaan Membaca Setiap Hari">
<span class="article-category">Tips</span>
</div>

<div class="article-body">

<div class="article-date"><i class="bi bi-calendar3"></i> 18 Jul 2026</div>

<h5>Cara Menumbuhkan Kebiasaan Membaca Setiap Hari</h5>

<p>Sering niat baca buku tapi selalu gagal di tengah jalan? Coba beberapa trik sederhana ini supaya membaca jadi rutinitas yang menyenangkan.</p>

<a href="#" class="article-link">Baca Selengkapnya <i class="bi bi-arrow-right"></i></a>

</div>

</div>

</div>

<div class="col-lg-4 col-md-6 mb-4 reveal reveal-item">

<div class="article-card">

<div class="article-thumb">
<img src="https://images.unsplash.com/photo-1521587760476-6c12a4b040da?w=800&q=80" alt="Panduan Memilih Buku Bacaan Sesuai Usia Anak">
<span class="article-category">Edukasi</span>
</div>

<div class="article-body">

<div class="article-date"><i class="bi bi-calendar3"></i> 10 Jul 2026</div>

<h5>Panduan Memilih Buku Bacaan Sesuai Usia Anak</h5>

<p>Memilih buku yang tepat bisa menumbuhkan kecintaan anak pada membaca sejak dini. Ini panduan praktis yang bisa orang tua terapkan di rumah.</p>

<a href="#" class="article-link">Baca Selengkapnya <i class="bi bi-arrow-right"></i></a>

</div>

</div>

</div>

</div>

<div class="text-center mb-5 reveal">
<a href="#" class="btn btn-outline-shop">Lihat Semua Artikel</a>
</div>

@include('partials.footer')

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
        threshold: 0.15,
        rootMargin: '0px 0px -60px 0px'
    });

    revealEls.forEach(function (el) { observer.observe(el); });

});
</script>

@endsection