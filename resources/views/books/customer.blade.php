@extends('layouts.app')

@section('title','Daftar Buku')


@section('content')


<div class="container mt-5">


<h2 class="text-center fw-bold mb-5">

📚 Koleksi Buku

</h2>



<form action="{{ route('books.customer') }}"
method="GET"
class="mb-4">


<div class="input-group">


<input type="text"
name="search"
value="{{ request('search') }}"
class="form-control"
placeholder="Cari buku...">


<button class="btn btn-primary">

Cari

</button>


</div>


</form>




<div class="row g-4">



@foreach($books as $book)



<div class="col-lg-3 col-md-4 col-sm-6">



<div class="card shadow border-0 rounded-4 h-100">



<div class="text-center p-3">


@if($book->gambar)


<img src="{{ asset('storage/'.$book->gambar) }}"
style="
width:160px;
height:220px;
object-fit:contain;
">


@else


<div style="
width:160px;
height:220px;
margin:auto;
background:#eee;
display:flex;
align-items:center;
justify-content:center;
font-size:50px;
">

📖

</div>


@endif



</div>




<div class="card-body">


<h5 class="fw-bold">

{{ $book->judul }}

</h5>


<p class="text-muted">

✍️ {{ $book->penulis }}

</p>



<p>

{{ $book->category->nama_kategori ?? '-' }}

</p>



<h5 class="text-primary fw-bold">

Rp {{ number_format($book->harga,0,',','.') }}

</h5>




<a href="{{ route('books.customer.show',$book->id) }}"
class="btn btn-warning w-100">

Lihat Detail

</a>



</div>


</div>


</div>


@endforeach



</div>


</div>


@endsection