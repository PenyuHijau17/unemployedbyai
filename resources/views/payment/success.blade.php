@extends('layouts.app')

@section('title','Pembayaran Berhasil')

@section('content')

<style>

body{
    background:#F8F6F2;
}

.success-card{
    background:white;
    border:none;
    border-radius:28px;
    box-shadow:0 12px 30px rgba(0,0,0,.08);
    overflow:hidden;
}

.success-header{
    background:linear-gradient(135deg,#6A513B,#8B6A4D);
    color:white;
    padding:45px;
    text-align:center;
}

.success-icon{
    width:120px;
    height:120px;
    background:white;
    color:#28a745;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:65px;
    margin:auto;
    margin-bottom:25px;
    box-shadow:0 8px 20px rgba(0,0,0,.15);
}

.success-body{
    padding:45px;
}

.info-box{
    background:#F5EFE6;
    border-radius:18px;
    padding:25px;
    margin:30px 0;
}

.info-row{
    display:flex;
    justify-content:space-between;
    margin-bottom:15px;
}

.info-row:last-child{
    margin-bottom:0;
}

.status-box{
    background:#EAF8EE;
    color:#198754;
    border-radius:15px;
    padding:18px;
    text-align:center;
    font-weight:600;
}

.btn-shop{
    background:#6A513B;
    color:white;
    border:none;
    border-radius:40px;
    padding:13px 28px;
    font-weight:600;
}

.btn-shop:hover{
    background:#523E2E;
    color:white;
}

.btn-home{
    border-radius:40px;
    padding:13px 28px;
}

</style>

<div class="container py-5">

<div class="row justify-content-center">

<div class="col-lg-8">

<div class="success-card">

<div class="success-header">

<div class="success-icon">

<i class="bi bi-check2-circle"></i>

</div>

<h2 class="fw-bold">

Pembayaran Berhasil!

</h2>

<p class="mb-0 opacity-75">

Terima kasih telah berbelanja di
<strong>Pustaka Nusantara</strong>

</p>

</div>

<div class="success-body">

<p class="lead text-center mb-4">

Pesanan Anda telah berhasil dibuat dan sedang diproses.

</p>

<div class="info-box">

<h5 class="fw-bold mb-4">

<i class="bi bi-receipt me-2"></i>

Detail Pembayaran

</h5>

<div class="info-row">

<span>Metode Pembayaran</span>

<strong>

{{ $metode }}

</strong>

</div>

<div class="info-row">

<span>Status</span>

<span class="badge bg-success">

Berhasil

</span>

</div>

<div class="info-row">

<span>Tanggal</span>

<strong>

{{ now()->format('d M Y') }}

</strong>

</div>

</div>

<div class="status-box">

<i class="bi bi-box-seam me-2"></i>

Pesanan sedang diproses dan akan segera disiapkan.

</div>

<div class="d-grid gap-3 d-md-flex justify-content-center mt-5">

<a href="{{ route('books.customer') }}"
class="btn btn-shop">

<i class="bi bi-bag me-2"></i>

Belanja Lagi

</a>

<a href="{{ route('home') }}"
class="btn btn-outline-secondary btn-home">

<i class="bi bi-house-door me-2"></i>

Kembali ke Home

</a>

</div>

</div>

</div>

</div>

</div>

</div>

@endsection