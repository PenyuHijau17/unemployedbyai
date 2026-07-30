@extends('layouts.app')

@section('title','Checkout')

@section('content')

<style>

body{
    background:#F8F6F2;
}

.checkout-title{
    color:#4E392B;
    font-weight:700;
}

.checkout-card{
    background:white;
    border:none;
    border-radius:22px;
    box-shadow:0 10px 25px rgba(0,0,0,.06);
}

.order-item{
    border-bottom:1px solid #eee;
    padding:18px 0;
}

.order-item:last-child{
    border-bottom:none;
}

.book-icon{
    width:65px;
    height:65px;
    border-radius:16px;
    background:#F3ECE4;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:28px;
    color:#A8844F;
}

.total-box{
    background:#F3ECE4;
    border-radius:18px;
    padding:20px;
}

.summary-card{
    background:white;
    border:none;
    border-radius:22px;
    box-shadow:0 10px 25px rgba(0,0,0,.06);
    position:sticky;
    top:100px;
}

.summary-row{
    display:flex;
    justify-content:space-between;
    margin-bottom:12px;
}

.btn-pay{
    background:#6A513B;
    color:white;
    border:none;
    border-radius:40px;
    padding:14px;
    font-weight:600;
}

.btn-pay:hover{
    background:#523E2E;
    color:white;
}

.btn-back{
    border-radius:40px;
}

.form-select{
    border-radius:12px;
    padding:12px;
}

.empty-box{
    background:white;
    border-radius:20px;
    padding:80px;
    text-align:center;
    box-shadow:0 10px 25px rgba(0,0,0,.05);
}

</style>

<div class="container py-5">

@if(count($cart)==0)

<div class="empty-box">

<i class="bi bi-cart-x display-1 text-secondary"></i>

<h3 class="mt-4">
Keranjang masih kosong
</h3>

<p class="text-muted">
Silakan pilih buku terlebih dahulu.
</p>

<a href="{{ route('books.customer') }}" class="btn btn-pay px-5">
Lihat Koleksi Buku
</a>

</div>

@else

<h2 class="checkout-title mb-4">

<i class="bi bi-credit-card-2-front me-2"></i>

Checkout

</h2>

<div class="row g-4">

<div class="col-lg-8">

<div class="checkout-card p-4">

<h4 class="mb-4">

<i class="bi bi-bag-check me-2"></i>

Ringkasan Pesanan

</h4>

@foreach($cart as $item)

<div class="order-item d-flex">

<div class="book-icon me-3">

<i class="bi bi-book"></i>

</div>

<div class="flex-grow-1">

<h5 class="fw-bold mb-1">

{{ $item['judul'] }}

</h5>

<div class="text-muted">

Jumlah :
{{ $item['jumlah'] }}

</div>

<div class="text-muted">

Harga :

Rp {{ number_format($item['harga'],0,',','.') }}

</div>

</div>

<div class="text-end">

<strong>

Rp {{ number_format($item['harga']*$item['jumlah'],0,',','.') }}

</strong>

</div>

</div>

@endforeach

</div>

</div>

<div class="col-lg-4">

<div class="summary-card p-4">

<h4 class="mb-4">

Ringkasan Pembayaran

</h4>

<div class="summary-row">

<span>Subtotal</span>

<span>

Rp {{ number_format($total,0,',','.') }}

</span>

</div>

<div class="summary-row">

<span>Ongkir</span>

<span class="text-success">

Gratis

</span>

</div>

<hr>

<div class="total-box mb-4">

<div class="d-flex justify-content-between">

<h5>Total</h5>

<h4 class="text-success">

Rp {{ number_format($total,0,',','.') }}

</h4>

</div>

</div>

<form action="{{ route('payment.process') }}" method="POST">

@csrf

<div class="mb-4">

<label class="form-label fw-semibold">

Metode Pembayaran

</label>

<select
name="metode"
class="form-select"
required>

<option value="">
Pilih Metode
</option>

<option value="Transfer Bank">

🏦 Transfer Bank

</option>

<option value="E-Wallet">

📱 E-Wallet

</option>

<option value="COD">

🚚 COD

</option>

</select>

</div>

<button class="btn btn-pay w-100 mb-3">

<i class="bi bi-shield-check me-2"></i>

Bayar Sekarang

</button>

<a href="{{ route('cart.index') }}"
class="btn btn-outline-secondary w-100 btn-back">

Kembali ke Keranjang

</a>

</form>

</div>

</div>

</div>

@endif

</div>

@endsection