@extends('layouts.app')


@section('title','Pembayaran Berhasil')


@section('content')


<div class="container mt-5">


<div class="row justify-content-center">


<div class="col-md-8">


<div class="card shadow">


<div class="card-body text-center p-5">



<h1 style="font-size:80px">

✅

</h1>



<h2 class="text-success fw-bold">

Pembayaran Berhasil!

</h2>



<p class="lead mt-3">

Terima kasih sudah berbelanja di Toko Buku Online.

</p>



<div class="alert alert-success mt-4">


<h5>

Detail Pembayaran

</h5>


<hr>



<p>

Metode Pembayaran:

<strong>

{{ $metode }}

</strong>


</p>



</div>




<p class="text-muted">

Pesanan kamu sedang diproses.

</p>




<div class="mt-4">


<a href="{{ route('books.index') }}"
class="btn btn-primary btn-lg me-2">

📚 Belanja Lagi

</a>



<a href="{{ route('home') }}"
class="btn btn-secondary btn-lg">

🏠 Home

</a>



</div>



</div>


</div>


</div>


</div>


</div>


@endsection