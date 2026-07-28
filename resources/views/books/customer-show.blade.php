@extends('layouts.app')


@section('title',$book->judul)


@section('content')


<div class="container mt-5">


<div class="card shadow border-0 rounded-4">


<div class="row g-0">



<div class="col-md-5 p-4 text-center">


@if($book->gambar)


<img src="{{ asset('storage/'.$book->gambar) }}"
style="
width:100%;
height:420px;
object-fit:contain;
background:#f8f9fa;
border-radius:15px;
">



@else


<div class="bg-light rounded p-5">

📖

</div>


@endif



</div>





<div class="col-md-7">


<div class="p-5">


<h2 class="fw-bold">

{{ $book->judul }}

</h2>



<p>

✍️ Penulis :

{{ $book->penulis }}

</p>



<p>

🏢 Penerbit :

{{ $book->penerbit }}

</p>



<p>

📅 Tahun :

{{ $book->tahun_terbit }}

</p>




<h3 class="text-primary">

Rp {{ number_format($book->harga,0,',','.') }}

</h3>




<p>

{{ $book->deskripsi }}

</p>




<form action="{{ route('cart.add',$book->id) }}"
method="POST">


@csrf



<label>

Jumlah

</label>


<input type="number"
name="jumlah"
value="1"
min="1"
max="{{ $book->stok }}"
class="form-control mb-3">


<button class="btn btn-success">

🛒 Tambahkan Keranjang

</button>


</form>




</div>


</div>


</div>


</div>


</div>


@endsection