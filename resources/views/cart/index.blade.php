@extends('layouts.app')

@section('title','Keranjang Belanja')

@section('content')

<style>

body{

    background:#F8F6F2;

}

.cart-card{

    background:white;

    border:none;

    border-radius:28px;

    overflow:hidden;

    box-shadow:0 12px 30px rgba(0,0,0,.08);

}

.cart-header{

    background:#F2ECE2;

    padding:30px 35px;

    border-bottom:1px solid #E6DAC9;

}

.cart-header h2{

    color:#4E392B;

    font-weight:700;

    margin:0;

}

.cart-header p{

    color:#777;

    margin-top:8px;

    margin-bottom:0;

}

.table{

    margin-bottom:0;

}

.table thead{

    background:#6A513B;

    color:white;

}

.table thead th{

    border:none;

    padding:18px;

}

.table td{

    vertical-align:middle;

    padding:18px;

}

.book-title{

    font-weight:600;

    color:#4E392B;

}

.price{

    color:#A8844F;

    font-weight:700;

}

.total-card{

    background:#F7F1E8;

    border-radius:20px;

    padding:30px;

}

.total-label{

    color:#666;

    font-size:18px;

}

.total-price{

    color:#6A513B;

    font-size:34px;

    font-weight:700;

}

.btn-shop{

    background:#6A513B;

    color:white;

    border:none;

    border-radius:30px;

    padding:12px 26px;

}

.btn-shop:hover{

    background:#523E2E;

    color:white;

}

.btn-payment{

    background:#B08A4A;

    color:white;

    border:none;

    border-radius:30px;

    padding:14px 34px;

    font-weight:600;

}

.btn-payment:hover{

    background:#8E6D3D;

    color:white;

}

.btn-delete{

    border-radius:30px;

    padding:8px 18px;

}

.empty-cart{

    padding:80px 30px;

    text-align:center;

}

.empty-cart i{

    font-size:90px;

    color:#A8844F;

}

.empty-cart h3{

    color:#4E392B;

    margin-top:25px;

}

.empty-cart p{

    color:#777;

}

</style>



<div class="container py-5">

<div class="cart-card">

<div class="cart-header">

<h2>

<i class="bi bi-cart3 me-2"></i>

Keranjang Belanja

</h2>

<p>

Periksa kembali buku yang akan dibeli.

</p>

</div>

<div class="card-body p-4">

@if(empty($cart) || count($cart)==0)

<div class="empty-cart">

<i class="bi bi-cart-x"></i>

<h3>

Keranjang Masih Kosong

</h3>

<p>

Belum ada buku yang ditambahkan ke keranjang.

</p>

<a href="{{ route('books.customer') }}"
class="btn btn-shop mt-3">

<i class="bi bi-book-half me-2"></i>

Mulai Belanja

</a>

</div>

@else

<div class="table-responsive">

<table class="table align-middle">

<thead>

<tr>

<th>Buku</th>

<th>Harga</th>

<th>Jumlah</th>

<th>Subtotal</th>

<th>Aksi</th>

</tr>

</thead>

<tbody>

@php

$total=0;

@endphp

@foreach($cart as $id=>$item)

@php

$subtotal=$item['harga']*$item['jumlah'];

$total+=$subtotal;

@endphp

<tr>

<td>

<div class="book-title">

{{ $item['judul'] }}

</div>

</td>

<td class="price">

Rp {{ number_format($item['harga'],0,',','.') }}

</td>

<td>

{{ $item['jumlah'] }}

</td>

<td class="price">

Rp {{ number_format($subtotal,0,',','.') }}

</td>

<td>

<form action="{{ route('cart.remove',$id) }}"
method="POST">

@csrf

@method('DELETE')

<button class="btn btn-danger btn-delete">

<i class="bi bi-trash"></i>

</button>

</form>

</td>

</tr>

@endforeach

</tbody>

</table>

</div>

<div class="row mt-5">

<div class="col-lg-6 mb-3">

<a href="{{ route('books.customer') }}"
class="btn btn-shop">

<i class="bi bi-arrow-left me-2"></i>

Lanjut Belanja

</a>

</div>

<div class="col-lg-6">

<div class="total-card text-end">

<div class="total-label">

Total Belanja

</div>

<div class="total-price">

Rp {{ number_format($total,0,',','.') }}

</div>

<a href="{{ route('payment.index') }}"
class="btn btn-payment mt-3">

<i class="bi bi-credit-card me-2"></i>

Lanjut ke Pembayaran

</a>

</div>

</div>

</div>

@endif

</div>

</div>

</div>

@endsection