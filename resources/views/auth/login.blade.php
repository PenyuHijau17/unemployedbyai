@extends('layouts.auth')

@section('title','Login')

@section('content')


<style>

.login-page{

    min-height:100vh;

    display:flex;

    background:#F8F3E9;

}


/* LEFT SIDE */

.login-brand{

    width:55%;

    background:
    linear-gradient(
        rgba(92,64,51,.9),
        rgba(92,64,51,.95)
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

    color:#D6B06A;

}


.brand-title{

    font-size:52px;

    font-weight:700;

    margin-top:20px;

    line-height:1.1;

}


.brand-text{

    color:#EBDCC5;

    font-size:18px;

    line-height:1.8;

    margin-top:25px;

}



.brand-line{

    width:80px;

    height:4px;

    background:#D6B06A;

    margin:25px 0;

}





/* RIGHT SIDE */


.login-area{

    width:45%;

    display:flex;

    align-items:center;

    justify-content:center;

    padding:40px;

}



.login-card{

    width:100%;

    max-width:450px;

    background:white;

    padding:45px;

    border-radius:30px;

    box-shadow:
    0 20px 50px rgba(0,0,0,.12);

}



.login-card h2{

    color:#5C4033;

    font-size:36px;

    font-weight:700;

}



.login-subtitle{

    color:#777;

    margin-bottom:35px;

}




.form-label{

    color:#5C4033;

    font-weight:600;

}



.form-control{

    height:55px;

    border-radius:15px;

    border:1px solid #DED2C2;

    padding-left:18px;

}



.form-control:focus{

    border-color:#C19A5B;

    box-shadow:
    0 0 0 .2rem rgba(193,154,91,.2);

}




.btn-login{

    height:55px;

    border-radius:30px;

    background:#5C4033;

    color:white;

    font-weight:600;

    transition:.3s;

}



.btn-login:hover{

    background:#3F2B20;

    color:white;

}



.register-text{

    color:#777;

}



.register-link{

    color:#B08A4A;

    font-weight:600;

    text-decoration:none;

}



.register-link:hover{

    color:#5C4033;

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


<div class="login-card">


<h2>

Selamat Datang

</h2>


<p class="login-subtitle">

Silakan masuk untuk melanjutkan.

</p>




@if($errors->any())

<div class="alert alert-danger rounded-3">

{{ $errors->first() }}

</div>

@endif





<form action="{{ route('login') }}" method="POST">

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





<button class="btn btn-login w-100">

<i class="bi bi-box-arrow-in-right me-2"></i>

Masuk

</button>




</form>




<div class="text-center mt-4">


<span class="register-text">

Belum memiliki akun?

</span>


<a href="{{ route('register') }}"
class="register-link">

Daftar sekarang

</a>


</div>



</div>


</div>


</div>


@endsection