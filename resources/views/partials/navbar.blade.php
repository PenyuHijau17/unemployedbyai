<style>

.navbar-bookstore {
    background: #6A513B;
    box-shadow: 0 2px 12px rgba(0,0,0,.08);
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

    color:#F5E8C7;

    border:1px solid rgba(245,232,199,.5);

    margin-right:15px;

    transition:.3s;

    font-size:20px;

}


.btn-back:hover{

    background:#D4AF6A;

    color:#5A4634;

}





.navbar-brand {

    font-size: 1.5rem;
    font-weight: 700;
    color: #F5E8C7 !important;
    letter-spacing: .5px;

}


.navbar-brand i{

    color:#D4AF6A;

}


.navbar-nav .nav-link{

    color:#F7F4EF !important;
    font-weight:500;
    margin:0 10px;
    transition:.3s;
    position:relative;

}


.navbar-nav .nav-link:hover{

    color:#E8C98B !important;

}


.navbar-nav .nav-link::after{

    content:'';

    position:absolute;

    left:0;

    bottom:-4px;

    width:0;

    height:2px;

    background:#D4AF6A;

    transition:.3s;

}


.navbar-nav .nav-link:hover::after{

    width:100%;

}




.btn-login{

    border:1px solid #E8C98B;

    color:#F7F4EF;

    border-radius:30px;

    padding:8px 18px;

    transition:.3s;

}


.btn-login:hover{

    background:#E8C98B;

    color:#5A4634;

}





.btn-register{

    background:#A8844F;

    color:white;

    border-radius:30px;

    padding:8px 18px;

    border:none;

}


.btn-register:hover{

    background:#8E6D3D;

    color:white;

}





.user-box{
    color:#fff;
    margin-right:15px;
    font-weight:500;
}

/* USER DROPDOWN */

.user-dropdown .dropdown-toggle{
    background:transparent;
    border:none;
    color:#fff;
    font-weight:500;
    padding:0;
    box-shadow:none !important;
}

.user-dropdown .dropdown-toggle:hover,
.user-dropdown .dropdown-toggle:focus{
    color:#F5E8C7;
    background:transparent;
}

.user-dropdown .dropdown-toggle::after{
    margin-left:8px;
}

.user-dropdown .dropdown-menu{
    border:none;
    border-radius:12px;
    overflow:hidden;
    min-width:220px;
    margin-top:12px;
    box-shadow:0 10px 30px rgba(0,0,0,.15);
}

.user-dropdown .dropdown-item{
    padding:12px 18px;
    transition:.25s;
}

.user-dropdown .dropdown-item:hover{
    background:#F5E8C7;
    color:#6A513B;
}

.user-dropdown .dropdown-item i{
    width:22px;
}



.btn-logout{

    background:#A8844F;

    color:white;

    border:none;

    border-radius:30px;

    padding:8px 18px;

}


.btn-logout:hover{

    background:#8E6D3D;

    color:white;

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

    <div class="dropdown user-dropdown me-3">

        <button
            class="btn dropdown-toggle"
            type="button"
            data-bs-toggle="dropdown"
            aria-expanded="false">

            <i class="bi bi-person-circle"></i>
            {{ Auth::user()->name }}

        </button>

        <ul class="dropdown-menu dropdown-menu-end">

            <li>
                <a class="dropdown-item" href="{{ route('customer.account') }}">
                    <i class="bi bi-person me-2"></i>
                    Akun Saya
                </a>
            </li>

            <a class="dropdown-item" href="{{ route('customer.orders.index') }}">
    <i class="bi bi-box-seam me-2"></i>
    Pesanan Saya
</a>
            <a class="dropdown-item" href="{{ route('customer.address.index') }}">
                <i class="bi bi-geo-alt me-2"></i>
                Alamat
            </a>

        </ul>

    </div>

    <form action="{{ route('logout') }}" method="POST">
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