@extends('layouts.app')

@section('title','Home')

@section('content')

<div class="bg-primary text-white rounded-4 p-5 mb-5">

    <div class="text-center">

        <h1 class="display-4 fw-bold">
            Selamat Datang di Toko Buku Online
        </h1>


        <p class="lead">
            Temukan berbagai koleksi buku terbaik dengan harga terjangkau.
        </p>


        <a href="{{ route('books.customer') }}"
           class="btn btn-warning btn-lg mt-3">

            📚 Jelajahi Buku

        </a>


    </div>

</div>



<h2 class="text-center mb-4">
    Kategori Buku
</h2>



<div class="row g-4">


<div class="col-md-3">

<div class="card shadow text-center">

<div class="card-body">

<h3>📖</h3>

<h5>Novel</h5>

</div>

</div>

</div>



<div class="col-md-3">

<div class="card shadow text-center">

<div class="card-body">

<h3>📚</h3>

<h5>Pendidikan</h5>

</div>

</div>

</div>



<div class="col-md-3">

<div class="card shadow text-center">

<div class="card-body">

<h3>🎨</h3>

<h5>Komik</h5>

</div>

</div>

</div>



<div class="col-md-3">

<div class="card shadow text-center">

<div class="card-body">

<h3>💻</h3>

<h5>Teknologi</h5>

</div>

</div>

</div>



</div>


@endsection