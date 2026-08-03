<style>

.navbar-bookstore {
    background: linear-gradient(90deg, #003A70 0%, #005BAA 100%);
    box-shadow: 0 4px 20px rgba(0,58,112,.18);
    padding: 14px 0;
}


/* BUTTON BACK */

.btn-back{

    width:42px;
    height:42px;

    border-radius:50%;

    display:flex;
    align-items:center;
    justify-content:center;

    color:#EAF4FF;

    border:1px solid rgba(234,244,255,.5);

    margin-right:15px;

    transition:.3s;

    font-size:20px;

}


.btn-back:hover{

    background:#D4AF37;

    color:#003A70;

    border-color:#D4AF37;

}





.navbar-brand {

    font-size: 1.5rem;
    font-weight: 700;
    color: #FFFFFF !important;
    letter-spacing: .5px;

}


.navbar-brand i{

    color:#D4AF37;

}


.navbar-nav .nav-link{

    color:#EAF4FF !important;
    font-weight:500;
    margin:0 10px;
    transition:.3s;
    position:relative;

}


.navbar-nav .nav-link:hover{

    color:#F8E8A8 !important;

}


.navbar-nav .nav-link::after{

    content:'';

    position:absolute;

    left:0;

    bottom:-4px;

    width:0;

    height:2px;

    background:#D4AF37;

    transition:.3s;

}


.navbar-nav .nav-link:hover::after{

    width:100%;

}




.btn-login{

    border:1px solid #F8E8A8;

    color:#FFFFFF;

    border-radius:30px;

    padding:8px 18px;

    transition:.3s;

}


.btn-login:hover{

    background:#F8E8A8;

    color:#003A70;

    border-color:#F8E8A8;

}





.btn-register{

    background:#D4AF37;

    color:#003A70;

    border-radius:30px;

    padding:8px 18px;

    border:none;

    font-weight:700;

    transition:.3s;

}


.btn-register:hover{

    background:#F8E8A8;

    color:#003A70;

}





.user-box{

    color:#fff;

    margin-right:15px;

    font-weight:500;

}




.btn-logout{

    background:#D4AF37;

    color:#003A70;

    border:none;

    border-radius:30px;

    padding:8px 18px;

    font-weight:700;

    transition:.3s;

}


.btn-logout:hover{

    background:#F8E8A8;

    color:#003A70;

}





@media(max-width:991px){


    .navbar-nav{

        margin-top:20px;

        text-align:center;

    }


    .navbar-nav .nav-link{

        margin:10px 0;

    }


    .navbar-auth{

        margin-top:20px;

        display:flex;

        justify-content:center;

    }


    .btn-back{

        margin-right:10px;

    }


}

</style>




<nav class="navbar navbar-expand-lg navbar-bookstore">


<div class="container">



<!-- BACK BUTTON -->

<a href="#"
onclick="goBack(event)"
class="btn-back"
title="Kembali">


<i class="bi bi-arrow-left"></i>


</a>





<a class="navbar-brand" href="{{ route('home') }}">


<i class="bi bi-book-half"></i>

Pustaka Nusantara


</a>





<button

class="navbar-toggler border-0"

type="button"

data-bs-toggle="collapse"

data-bs-target="#navbarNav">


<span class="navbar-toggler-icon"></span>


</button>





<div class="collapse navbar-collapse" id="navbarNav">



<ul class="navbar-nav mx-auto">


<li class="nav-item">

<a class="nav-link" href="{{ route('home') }}">

Home

</a>

</li>



<li class="nav-item">

<a class="nav-link" href="{{ route('books.customer') }}">

Koleksi Buku

</a>

</li>



<li class="nav-item">

<a class="nav-link" href="{{ route('cart.index') }}">

<i class="bi bi-cart3"></i>

Keranjang

</a>

</li>



</ul>







@guest



<div class="navbar-auth d-flex">


<a href="{{ route('login') }}"
class="btn btn-login me-2">

Masuk

</a>



<a href="{{ route('register') }}"
class="btn btn-register">

Daftar

</a>


</div>



@else



<div class="navbar-auth d-flex align-items-center">


<div class="user-box">

<i class="bi bi-person-circle"></i>

{{ Auth::user()->name }}

</div>




<form action="{{ route('logout') }}"
method="POST">


@csrf


<button class="btn btn-logout">

Logout

</button>


</form>



</div>



@endguest




</div>


</div>


</nav>




<script>

function goBack(event){

    event.preventDefault();


    if(document.referrer){

        history.back();

    }else{

        window.location.href="{{ route('home') }}";

    }

}

</script>