@extends('layouts.auth')

@section('title','Login')

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

.login-page{

    min-height:100vh;

    display:flex;

    background:var(--background);

}


/* LEFT SIDE — TETAP PUNYA KAMU */

.login-brand{

    width:55%;

    background:
    linear-gradient(
        rgba(0,58,112,.9),
        rgba(0,58,112,.95)
    ),
    url('https://images.unsplash.com/photo-1507842217343-583bb7270b66?w=1200');

    background-size:cover;

    background-position:center;

    display:flex;

    align-items:center;

    justify-content:center;

    padding:60px;

    color:white;

}


.brand-content{

    max-width:500px;

}


.brand-logo{

    font-size:70px;

    color:var(--gold);

}


.brand-title{

    font-size:52px;

    font-weight:700;

    margin-top:20px;

    line-height:1.1;

}


.brand-text{

    color:var(--primary-light);

    font-size:18px;

    line-height:1.8;

    margin-top:25px;

}



.brand-line{

    width:80px;

    height:4px;

    background:var(--gold);

    margin:25px 0;

}





/* RIGHT SIDE — DIKASIH DESAIN BIAR GAK POLOS */


.login-area{

    width:45%;

    display:flex;

    align-items:center;

    justify-content:center;

    padding:40px;

    position:relative;

    overflow:hidden;

    background:
        radial-gradient(
            circle at 85% 8%,
            rgba(0,91,170,.07),
            transparent 45%
        ),
        radial-gradient(
            circle at 8% 92%,
            rgba(212,175,55,.10),
            transparent 45%
        ),
        var(--background);

}


.login-area::before{

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
        circle at 75% 15%,
        black,
        transparent 55%
    );

    mask-image:radial-gradient(
        circle at 75% 15%,
        black,
        transparent 55%
    );

    pointer-events:none;

}


.login-area::after{

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


.login-shape{

    position:absolute;

    bottom:-60px;

    left:-60px;

    width:200px;

    height:200px;

    border-radius:50%;

    border:2px dashed rgba(0,91,170,.15);

    pointer-events:none;

}



.login-card{

    width:100%;

    max-width:450px;

    background:white;

    padding:45px;

    border-radius:30px;

    box-shadow:
    0 20px 50px rgba(0,0,0,.12);

    position:relative;

    z-index:2;

    border-top:4px solid var(--gold);

}


.login-card::before{

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



.login-card h2{

    color:var(--primary-dark);

    font-size:36px;

    font-weight:700;

}


.login-card h2 i{

    color:var(--gold);

    font-size:28px;

    margin-left:6px;

}



.login-subtitle{

    color:var(--text-light);

    margin-bottom:35px;

}




.form-label{

    color:var(--primary-dark);

    font-weight:600;

}



.form-control{

    height:55px;

    border-radius:15px;

    border:1px solid var(--border);

    padding-left:18px;

}



.form-control:focus{

    border-color:var(--primary);

    box-shadow:
    0 0 0 .2rem rgba(0,91,170,.2);

}




/* =========================================================
   TOMBOL MASUK — EFEK GLOW SAAT DIKLIK
   ========================================================= */

.btn-login{

    height:55px;

    border-radius:30px;

    background:linear-gradient(
        135deg,
        var(--primary),
        var(--primary-dark)
    );

    color:white;

    font-weight:600;

    transition:transform .3s ease, box-shadow .3s ease, background .3s ease;

    position:relative;

    overflow:hidden;

    isolation:isolate;

    box-shadow:0 10px 25px rgba(0,91,170,.25);

}



.btn-login:hover{

    background:var(--primary-dark);

    color:white;

    transform:translateY(-2px);

    box-shadow:0 14px 32px rgba(0,91,170,.35);

}


.btn-login:active{

    transform:translateY(0) scale(.98);

}


.btn-login::before{

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


.btn-login:hover::before{

    left:130%;

}


.btn-login .btn-ripple{

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


.btn-login span,
.btn-login i{

    position:relative;

    z-index:2;

}


.btn-login.is-loading{

    animation:btnGlowPulse .9s ease-in-out infinite;

}


@keyframes btnGlowPulse{

    0%{ box-shadow:0 0 0 0 rgba(212,175,55,.55), 0 14px 32px rgba(0,91,170,.35); }
    70%{ box-shadow:0 0 0 16px rgba(212,175,55,0), 0 14px 32px rgba(0,91,170,.35); }
    100%{ box-shadow:0 0 0 0 rgba(212,175,55,0), 0 14px 32px rgba(0,91,170,.35); }

}



.register-text{

    color:var(--text-light);

}



.register-link{

    color:var(--primary);

    font-weight:600;

    text-decoration:none;

    position:relative;

    transition:color .25s ease;

}


.register-link::after{

    content:"";

    position:absolute;

    left:0;

    bottom:-2px;

    width:0%;

    height:2px;

    background:var(--gold);

    transition:width .3s ease;

}



.register-link:hover{

    color:var(--primary-dark);

}


.register-link:hover::after{

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


body.page-fading-out .login-page,
body.page-fading-out .register-page{

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


.login-page{

    display:block;

}


.login-brand{

    width:100%;

    min-height:420px;

    padding:40px;

}


.brand-title{

    font-size:36px;

}


.brand-logo{

    font-size:50px;

}


.login-area{

    width:100%;

    padding:30px 20px;

}


.login-card{

    padding:35px 25px;

}


}


</style>



<div class="page-transition-overlay" id="pageTransitionOverlay"></div>



<div class="login-page">


<div class="login-brand">


<div class="brand-content">


<div class="brand-logo">

<i class="bi bi-book-half"></i>

</div>


<h1 class="brand-title">

Pustaka<br>
Nusantara

</h1>


<div class="brand-line"></div>


<p class="brand-text">

Membuka dunia melalui buku.
Temukan koleksi terbaik untuk belajar,
berkarya, dan berkembang.

</p>


</div>


</div>





<div class="login-area">


<div class="login-shape"></div>


<div class="login-card">


<h2>

Selamat Datang <i class="bi bi-stars"></i>

</h2>


<p class="login-subtitle">

Silakan masuk untuk melanjutkan.

</p>




@if($errors->any())

<div class="alert alert-danger rounded-3">

{{ $errors->first() }}

</div>

@endif





<form action="{{ route('login') }}" method="POST" id="loginForm">

@csrf



<div class="mb-4">


<label class="form-label">

Email

</label>


<input

type="email"

name="email"

class="form-control"

placeholder="nama@email.com"

required>


</div>





<div class="mb-4">


<label class="form-label">

Password

</label>


<input

type="password"

name="password"

class="form-control"

placeholder="Masukkan password"

required>


</div>





<button type="submit" class="btn btn-login w-100" id="loginBtn">

<i class="bi bi-box-arrow-in-right me-2"></i>

<span>Masuk</span>

</button>




</form>




<div class="text-center mt-4">


<span class="register-text">

Belum memiliki akun?

</span>


<a href="{{ route('register') }}"
class="register-link"
id="goToRegister">

Daftar sekarang

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


    const loginBtn = document.getElementById("loginBtn");
    const loginForm = document.getElementById("loginForm");

    if (loginBtn && loginForm) {

        loginBtn.addEventListener("click", function (event) {

            const rect = loginBtn.getBoundingClientRect();

            const ripple = document.createElement("span");
            ripple.className = "btn-ripple";

            const size = Math.max(rect.width, rect.height);

            ripple.style.width = size + "px";
            ripple.style.height = size + "px";
            ripple.style.left = (event.clientX - rect.left - size / 2) + "px";
            ripple.style.top = (event.clientY - rect.top - size / 2) + "px";

            loginBtn.appendChild(ripple);

            setTimeout(function () {
                ripple.remove();
            }, 650);

            loginBtn.classList.add("is-loading");

            if (loginForm.checkValidity()) {

                event.preventDefault();

                playTransition(event.clientX, event.clientY, function () {
                    loginForm.submit();
                });

            }

        });
    }


    const goToRegister = document.getElementById("goToRegister");

    if (goToRegister) {

        goToRegister.addEventListener("click", function (event) {

            event.preventDefault();

            const href = goToRegister.getAttribute("href");

            playTransition(event.clientX, event.clientY, function () {
                window.location.href = href;
            });

        });
    }

});

</script>


@endsection