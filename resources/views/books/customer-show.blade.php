@extends('layouts.app')

@section('title',$book->judul)

@section('content')


<style>

body{
    background:#F8F6F2;
}


.book-detail{

    background:white;

    border-radius:30px;

    padding:50px;

    box-shadow:0 15px 35px rgba(0,0,0,.08);

}



.book-cover{

    background:#F4EFE7;

    border-radius:25px;

    padding:30px;

    height:500px;

    display:flex;

    align-items:center;

    justify-content:center;

}



.book-cover img{

    max-height:430px;

    max-width:100%;

    object-fit:contain;

}




.no-cover{

    font-size:80px;

    color:#A8844F;

}




.book-title{

    color:#4E392B;

    font-size:40px;

    font-weight:700;

}



.category-badge{

    display:inline-block;

    background:#E8DCC8;

    color:#6A513B;

    padding:8px 18px;

    border-radius:30px;

    margin-bottom:20px;

}



.info-list{

    color:#666;

    font-size:16px;

}


.info-list i{

    color:#A8844F;

    width:25px;

}




.price{

    color:#A8844F;

    font-size:36px;

    font-weight:700;

    margin:25px 0;

}




.stock{

    background:#E9F5E9;

    color:#357A38;

    display:inline-block;

    padding:8px 18px;

    border-radius:20px;

}




.quantity-input{

    width:120px;

    border-radius:12px;

    padding:10px;

    border:1px solid #DDD3C5;

}




.btn-cart{

    background:#6A513B;

    color:white;

    border:none;

    border-radius:30px;

    padding:14px 35px;

    font-weight:600;

}



.btn-cart:hover{

    background:#523E2E;

    color:white;

}



.description-card{

    margin-top:40px;

    background:#F8F3E9;

    padding:30px;

    border-radius:20px;

}



.description-card h4{

    color:#4E392B;

}



@media(max-width:768px){


.book-detail{

    padding:25px;

}


.book-cover{

    height:350px;

}


.book-title{

    font-size:30px;

}


}

</style>




<div class="container py-5">


<div class="book-detail">


<div class="row align-items-center g-5">



<div class="col-lg-5">


<div class="book-cover">


@if($book->gambar)


<img src="{{ asset('storage/'.$book->gambar) }}"
alt="{{ $book->judul }}">


@else


<div class="no-cover">

<i class="bi bi-book"></i>

</div>


@endif


</div>


</div>





<div class="col-lg-7">


<span class="category-badge">

{{ $book->category->nama_kategori ?? 'Umum' }}

</span>



<h1 class="book-title">

{{ $book->judul }}

</h1>



<div class="info-list mt-4">


<p>

<i class="bi bi-person"></i>

{{ $book->penulis }}

</p>



<p>

<i class="bi bi-building"></i>

{{ $book->penerbit }}

</p>



<p>

<i class="bi bi-calendar"></i>

{{ $book->tahun_terbit }}

</p>



</div>




<div class="price">

Rp {{ number_format($book->harga,0,',','.') }}

</div>




<span class="stock">

<i class="bi bi-check-circle"></i>

Stok tersedia : {{ $book->stok }}

</span>





<form action="{{ route('cart.add',$book->id) }}"
method="POST"
class="mt-4">


@csrf



<label class="fw-semibold mb-2">

Jumlah

</label>


<input

type="number"

name="jumlah"

value="1"

min="1"

max="{{ $book->stok }}"

class="quantity-input mb-3 d-block">





<button class="btn btn-cart">


<i class="bi bi-cart-plus me-2"></i>

Tambah ke Keranjang


</button>




</form>


</div>


</div>





<div class="description-card">


<h4>

<i class="bi bi-card-text me-2"></i>

Deskripsi Buku

</h4>


<p class="mb-0 text-muted">

{{ $book->deskripsi ?? 'Belum ada deskripsi.' }}

</p>


</div>



</div>


</div>


@endsection