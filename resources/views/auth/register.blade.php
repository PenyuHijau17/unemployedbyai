@extends('layouts.auth')

@section('title','Register')

@section('content')

<style>

:root{

    --primary:#005BAA;
    --primary-dark:#003A70;
    --primary-light:#EAF4FF;

    --secondary:#0078D7;

    --gold:#D4AF37;
    --gold-light:#F8E8A8;

    --background:#F5F8FC;
    --border:#E5ECF3;

    --text:#22324A;
    --text-light:#718096;

}

.register-page{

    min-height:100vh;

    display:flex;

    background:var(--background);

    position:relative;

}


/* LEFT — TETAP PUNYA KAMU */

.register-brand{

    width:45%;

    background:
    linear-gradient(
        rgba(0,58,112,.92),
        rgba(0,58,112,.95)
    ),
    url('https://images.unsplash.com/photo-1521587760476-6c12a4b040da?w=1200');

    background-size:cover;

    background-position:center;

    display:flex;

    align-items:center;

    justify-content:center;

    padding:60px;

    color:white;

}


.brand-content{

    max-width:450px;

}


.brand-icon{

    font-size:70px;

    color:var(--gold);

}


.brand-title{

    font-size:48px;

    font-weight:700;

    line-height:1.1;

    margin-top:20px;

}


.brand-line{

    width:80px;

    height:4px;

    background:var(--gold);

    margin:25px 0;

}


.brand-text{

    color:var(--primary-light);

    font-size:17px;

    line-height:1.8;

}



/* RIGHT — DIKASIH DESAIN SENADA DENGAN LOGIN */

.register-area{

    width:55%;

    display:flex;

    justify-content:center;

    align-items:center;

    padding:40px;

    position:relative;

    overflow:hidden;

    background:
        radial-gradient(
            circle at 88% 10%,
            rgba(0,91,170,.07),
            transparent 45%
        ),
        radial-gradient(
            circle at 6% 90%,
            rgba(212,175,55,.10),
            transparent 45%
        ),
        var(--background);

}


/* pola titik halus */
.register-area::before{

    content:"";

    position:absolute;

    inset:0;

    background-image:
        radial-gradient(
            rgba(0,58,112,.10) 1.5px,
            transparent 1.5px
        );

    background-size:26px 26px;

    -webkit-mask-image:radial-gradient(
        circle at 78% 18%,
        black,
        transparent 55%
    );

    mask-image:radial-gradient(
        circle at 78% 18%,
        black,
        transparent 55%
    );

    pointer-events:none;

}


/* blob dekoratif pojok kanan atas */
.register-area::after{

    content:"";

    position:absolute;

    top:-90px;

    right:-90px;

    width:280px;

    height:280px;

    border-radius:50%;

    background:linear-gradient(
        135deg,
        rgba(0,91,170,.10),
        rgba(212,175,55,.14)
    );

    filter:blur(10px);

    pointer-events:none;

}


/* aksen lingkaran dashed pojok kiri bawah */
.register-shape{

    position:absolute;

    bottom:-60px;

    left:-60px;

    width:200px;

    height:200px;

    border-radius:50%;

    border:2px dashed rgba(0,91,170,.15);

    pointer-events:none;

}



.register-card{

    width:100%;

    max-width:500px;

    background:white;

    padding:45px;

    border-radius:30px;

    box-shadow:
    0 20px 50px rgba(0,0,0,.12);

    position:relative;

    z-index:2;

    border-top:4px solid var(--gold);

    transition:box-shadow .4s ease, transform .4s ease;

}


.register-card::before{

    content:"";

    position:absolute;

    top:14px;

    left:14px;

    right:-14px;

    bottom:-14px;

    border:1.5px solid rgba(0,91,170,.12);

    border-radius:30px;

    z-index:-1;

}


.register-card h2{

    color:var(--primary-dark);

    font-size:36px;

    font-weight:700;

}


.register-card h2 i{

    color:var(--gold);

    font-size:28px;

    margin-left:6px;

}



.subtitle{

    color:var(--text-light);

    margin-bottom:30px;

}



.form-label{

    color:var(--primary-dark);

    font-weight:600;

}



.form-control{

    height:52px;

    border-radius:14px;

    border:1px solid var(--border);

    transition:.25s;

}



.form-control:focus{

    border-color:var(--primary);

    box-shadow:
    0 0 0 .2rem rgba(0,91,170,.2);

}



/* =========================================================
   TOMBOL DAFTAR — EFEK GLOW SAAT DIKLIK
   ========================================================= */

.btn-register{

    height:55px;

    background:linear-gradient(
        135deg,
        var(--primary),
        var(--primary-dark)
    );

    color:white;

    border-radius:30px;

    font-weight:600;

    border:none;

    position:relative;

    overflow:hidden;

    isolation:isolate;

    box-shadow:0 10px 25px rgba(0,91,170,.25);

    transition:transform .3s ease, box-shadow .3s ease, background .3s ease;

}



.btn-register:hover{

    background:var(--primary-dark);

    color:white;

    transform:translateY(-2px);

    box-shadow:0 14px 32px rgba(0,91,170,.35);

}


.btn-register:active{

    transform:translateY(0) scale(.98);

}


/* lapisan shine yang lewat saat hover */
.btn-register::before{

    content:"";

    position:absolute;

    top:0;

    left:-60%;

    width:40%;

    height:100%;

    background:linear-gradient(
        120deg,
        transparent,
        rgba(255,255,255,.55),
        transparent
    );

    transform:skewX(-20deg);

    transition:left .6s ease;

    z-index:1;

}


.btn-register:hover::before{

    left:130%;

}


/* ripple/glow saat diklik */
.btn-register .btn-ripple{

    position:absolute;

    border-radius:50%;

    background:rgba(255,255,255,.55);

    transform:scale(0);

    animation:btnRipple .6s ease-out forwards;

    pointer-events:none;

    z-index:1;

}


@keyframes btnRipple{

    to{

        transform:scale(2.8);

        opacity:0;

    }

}


.btn-register span,
.btn-register i{

    position:relative;

    z-index:2;

}


/* halo cahaya sekitar tombol saat loading transisi */
.btn-register.is-loading{

    box-shadow:
        0 0 0 0 rgba(0,91,170,.5),
        0 14px 32px rgba(0,91,170,.35);

    animation:btnGlowPulse .9s ease-in-out infinite;

}


@keyframes btnGlowPulse{

    0%{ box-shadow:0 0 0 0 rgba(212,175,55,.55), 0 14px 32px rgba(0,91,170,.35); }
    70%{ box-shadow:0 0 0 16px rgba(212,175,55,0), 0 14px 32px rgba(0,91,170,.35); }
    100%{ box-shadow:0 0 0 0 rgba(212,175,55,0), 0 14px 32px rgba(0,91,170,.35); }

}



.login-link{

    color:var(--primary);

    text-decoration:none;

    font-weight:600;

    position:relative;

    transition:color .25s ease;

}


.login-link::after{

    content:"";

    position:absolute;

    left:0;

    bottom:-2px;

    width:0%;

    height:2px;

    background:var(--gold);

    transition:width .3s ease;

}


.login-link:hover{

    color:var(--primary-dark);

}


.login-link:hover::after{

    width:100%;

}



/* =========================================================
   OVERLAY TRANSISI HALAMAN — MENYALA SAAT PINDAH KE LOGIN/REGISTER
   ========================================================= */

.page-transition-overlay{

    position:fixed;

    inset:0;

    z-index:9999;

    pointer-events:none;

    opacity:0;

    background:radial-gradient(
        circle at var(--tx,50%) var(--ty,50%),
        rgba(212,175,55,.9) 0%,
        rgba(0,91,170,.85) 35%,
        rgba(0,58,112,.98) 70%
    );

    transition:opacity .5s ease;

}


.page-transition-overlay.active{

    opacity:1;

    pointer-events:all;

}


.page-transition-overlay::before{

    content:"";

    position:absolute;

    inset:0;

    background:radial-gradient(
        circle at var(--tx,50%) var(--ty,50%),
        rgba(255,255,255,.9),
        transparent 18%
    );

    opacity:0;

    transition:opacity .4s ease .1s;

}


.page-transition-overlay.active::before{

    opacity:1;

}


body.page-fading-out .register-page,
body.page-fading-out .login-page{

    animation:pageFadeOut .45s ease forwards;

}


@keyframes pageFadeOut{

    to{

        opacity:0;

        transform:scale(.98);

        filter:blur(4px);

    }

}




@media(max-width:900px){


.register-page{

    display:block;

}


.register-brand{

    width:100%;

    min-height:380px;

    padding:40px;

}


.brand-title{

    font-size:36px;

}


.register-area{

    width:100%;

    padding:30px 20px;

}


.register-card{

    padding:35px 25px;

}


}

</style>



<div class="page-transition-overlay" id="pageTransitionOverlay"></div>



<div class="register-page">


<div class="register-brand">


<div class="brand-content">


<div class="brand-icon">

<i class="bi bi-journal-bookmark-fill"></i>

</div>


<h1 class="brand-title">

Bergabung<br>
Bersama Kami

</h1>


<div class="brand-line"></div>


<p class="brand-text">

Buat akun dan nikmati pengalaman
berbelanja buku dengan lebih mudah
di Pustaka Nusantara.

</p>


</div>


</div>




<div class="register-area">


<div class="register-shape"></div>


<div class="register-card">


<h2>

Buat Akun <i class="bi bi-stars"></i>

</h2>


<p class="subtitle">

Daftar untuk mulai menjelajahi koleksi buku kami.

</p>




@if ($errors->any())

<div class="alert alert-danger rounded-3">

<ul class="mb-0">

@foreach ($errors->all() as $error)

<li>{{ $error }}</li>

@endforeach

</ul>

</div>

@endif





<form action="{{ route('register') }}" method="POST" id="registerForm">

@csrf




<div class="mb-3">


<label class="form-label">

Nama Lengkap

</label>


<input

type="text"

name="name"

class="form-control"

value="{{ old('name') }}"

placeholder="Masukkan nama"

required>


</div>





<div class="mb-3">


<label class="form-label">

Email

</label>


<input

type="email"

name="email"

class="form-control"

value="{{ old('email') }}"

placeholder="nama@email.com"

required>


</div>





<div class="mb-3">


<label class="form-label">

Password

</label>


<input

type="password"

name="password"

class="form-control"

placeholder="Buat password"

required>


</div>





<div class="mb-4">


<label class="form-label">

Konfirmasi Password

</label>


<input

type="password"

name="password_confirmation"

class="form-control"

placeholder="Ulangi password"

required>


</div>





<button type="submit" class="btn btn-register w-100" id="registerBtn">

<i class="bi bi-person-plus me-2"></i>

<span>Daftar Sekarang</span>

</button>




</form>




<div class="text-center mt-4">


<span class="text-muted">

Sudah punya akun?

</span>


<a href="{{ route('login') }}"
class="login-link"
id="goToLogin">

Masuk

</a>


</div>



</div>


</div>


</div>



<script>

document.addEventListener("DOMContentLoaded", function () {

    const overlay = document.getElementById("pageTransitionOverlay");


    function playTransition(x, y, callback) {

        overlay.style.setProperty("--tx", x + "px");
        overlay.style.setProperty("--ty", y + "px");

        overlay.classList.add("active");

        document.body.classList.add("page-fading-out");

        setTimeout(callback, 480);
    }


    /* ripple efek saat tombol Daftar diklik */
    const registerBtn = document.getElementById("registerBtn");
    const registerForm = document.getElementById("registerForm");

    if (registerBtn && registerForm) {

        registerBtn.addEventListener("click", function (event) {

            const rect = registerBtn.getBoundingClientRect();

            const ripple = document.createElement("span");
            ripple.className = "btn-ripple";

            const size = Math.max(rect.width, rect.height);

            ripple.style.width = size + "px";
            ripple.style.height = size + "px";
            ripple.style.left = (event.clientX - rect.left - size / 2) + "px";
            ripple.style.top = (event.clientY - rect.top - size / 2) + "px";

            registerBtn.appendChild(ripple);

            setTimeout(function () {
                ripple.remove();
            }, 650);

            registerBtn.classList.add("is-loading");

            /* biarkan submit form berjalan normal setelah efek muncul sebentar */
            if (registerForm.checkValidity()) {

                event.preventDefault();

                playTransition(event.clientX, event.clientY, function () {
                    registerForm.submit();
                });

            }

        });
    }


    /* transisi menyala saat pindah ke halaman Masuk */
    const goToLogin = document.getElementById("goToLogin");

    if (goToLogin) {

        goToLogin.addEventListener("click", function (event) {

            event.preventDefault();

            const href = goToLogin.getAttribute("href");

            playTransition(event.clientX, event.clientY, function () {
                window.location.href = href;
            });

        });
    }

});

</script>


@endsection