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

}


/* LEFT */

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



/* RIGHT */

.register-area{

    width:55%;

    display:flex;

    justify-content:center;

    align-items:center;

    padding:40px;

}


.register-card{

    width:100%;

    max-width:500px;

    background:white;

    padding:45px;

    border-radius:30px;

    box-shadow:
    0 20px 50px rgba(0,0,0,.12);

}


.register-card h2{

    color:var(--primary-dark);

    font-size:36px;

    font-weight:700;

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

}



.form-control:focus{

    border-color:var(--primary);

    box-shadow:
    0 0 0 .2rem rgba(0,91,170,.2);

}



.btn-register{

    height:55px;

    background:var(--primary);

    color:white;

    border-radius:30px;

    font-weight:600;

    border:none;

}



.btn-register:hover{

    background:var(--primary-dark);

    color:white;

}



.login-link{

    color:var(--primary);

    text-decoration:none;

    font-weight:600;

}



.login-link:hover{

    color:var(--primary-dark);

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


<div class="register-card">


<h2>

Buat Akun

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





<form action="{{ route('register') }}" method="POST">

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





<button class="btn btn-register w-100">

<i class="bi bi-person-plus me-2"></i>

Daftar Sekarang

</button>




</form>




<div class="text-center mt-4">


<span class="text-muted">

Sudah punya akun?

</span>


<a href="{{ route('login') }}"
class="login-link">

Masuk

</a>


</div>



</div>


</div>


</div>


@endsection