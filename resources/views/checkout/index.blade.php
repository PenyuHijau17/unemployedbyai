@extends('layouts.app')

@section('title','Checkout')

@section('content')

<div class="container py-5">


<div class="row">


<div class="col-lg-7 mb-4">


<div class="card shadow border-0 rounded-4">


<div class="card-body p-4">


<h3 class="fw-bold mb-4">

<i class="bi bi-geo-alt-fill text-warning"></i>

Alamat Pengiriman

</h3>


@if($address)


<div class="p-3 rounded-4"
style="background:#F8F6F2;">


<h5 class="fw-bold">

{{ $address->nama_penerima }}

</h5>


<p class="mb-1">

<i class="bi bi-telephone"></i>

{{ $address->no_hp }}

</p>


<p class="mb-0">

<i class="bi bi-house"></i>

{{ $address->alamat }}

<br>

{{ $address->kota }},
{{ $address->provinsi }}

{{ $address->kode_pos }}

</p>


</div>


@else


<div class="alert alert-warning">

Belum ada alamat utama.

Silahkan tambahkan alamat terlebih dahulu.

</div>


@endif


<br>


<a href="{{ route('customer.address.index') }}"
class="btn btn-outline-warning rounded-pill">

<i class="bi bi-pencil"></i>

Ganti Alamat

</a>


</div>

</div>


</div>





<div class="col-lg-5">


<div class="card shadow border-0 rounded-4">


<div class="card-body p-4">


<h3 class="fw-bold mb-4">

Ringkasan Belanja

</h3>



@foreach($cart as $item)


<div class="d-flex justify-content-between mb-3">


<div>

<strong>

{{ $item['judul'] }}

</strong>


<br>


<small>

x{{ $item['jumlah'] }}

</small>


</div>



<div>

Rp {{ number_format($item['harga']*$item['jumlah'],0,',','.') }}

</div>


</div>


@endforeach



<hr>


<h4 class="fw-bold">

Total

<br>

Rp {{ number_format($total,0,',','.') }}

</h4>



<a href="{{ route('payment.index') }}"
class="btn btn-payment w-100 mt-4">


<i class="bi bi-credit-card"></i>

Lanjut Pembayaran


</a>


</div>

</div>


</div>


</div>


</div>

@endsection