@extends('admin.layouts.app')

@section('title','Edit Buku')

@section('content')

<div class="page-header fade-up">

    <div>

        <h2>Edit Buku</h2>

        <p>Perbarui informasi buku yang tersedia.</p>

    </div>

    <a href="{{ route('books.index') }}" class="btn btn-light">

        <i class="bi bi-arrow-left"></i>

        Kembali

    </a>

</div>

@if ($errors->any())

<div class="alert alert-danger fade-up">

    <ul class="mb-0">

        @foreach ($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach

    </ul>

</div>

@endif

<div class="form-card fade-up">

<form action="{{ route('books.update',$book) }}"
      method="POST"
      enctype="multipart/form-data">

@csrf
@method('PUT')

<div class="row">

    <div class="col-md-6">

        <div class="mb-4">

            <label class="form-label">

                Kategori

            </label>

            <select name="category_id" class="form-select">

                @foreach($categories as $category)

                    <option value="{{ $category->id }}"
                        {{ $book->category_id == $category->id ? 'selected' : '' }}>

                        {{ $category->nama_kategori }}

                    </option>

                @endforeach

            </select>

        </div>

    </div>

    <div class="col-md-6">

        <div class="mb-4">

            <label class="form-label">

                Judul Buku

            </label>

            <input
                type="text"
                name="judul"
                class="form-control"
                value="{{ old('judul',$book->judul) }}">

        </div>

    </div>

</div>


<div class="row">

    <div class="col-md-6">

        <div class="mb-4">

            <label class="form-label">

                Penulis

            </label>

            <input
                type="text"
                name="penulis"
                class="form-control"
                value="{{ old('penulis',$book->penulis) }}">

        </div>

    </div>

    <div class="col-md-6">

        <div class="mb-4">

            <label class="form-label">

                Penerbit

            </label>

            <input
                type="text"
                name="penerbit"
                class="form-control"
                value="{{ old('penerbit',$book->penerbit) }}">

        </div>

    </div>

</div>


<div class="row">

    <div class="col-md-4">

        <div class="mb-4">

            <label class="form-label">

                Tahun Terbit

            </label>

            <input
                type="number"
                name="tahun_terbit"
                class="form-control"
                value="{{ old('tahun_terbit',$book->tahun_terbit) }}">

        </div>

    </div>

    <div class="col-md-4">

        <div class="mb-4">

            <label class="form-label">

                Harga

            </label>

            <input
                type="number"
                name="harga"
                class="form-control"
                value="{{ old('harga',$book->harga) }}">

        </div>

    </div>

    <div class="col-md-4">

        <div class="mb-4">

            <label class="form-label">

                Stok

            </label>

            <input
                type="number"
                name="stok"
                class="form-control"
                value="{{ old('stok',$book->stok) }}">

        </div>

    </div>

</div>


<div class="row">

    <div class="col-md-4">

        <div class="mb-4">

            <label class="form-label">

                Cover Saat Ini

            </label>

            <div class="current-cover">

                @if($book->gambar)

                    <img
                        src="{{ asset('storage/'.$book->gambar) }}"
                        class="book-cover-large">

                @else

                    <div class="book-placeholder-large">

                        <i class="bi bi-book-half"></i>

                    </div>

                @endif

            </div>

        </div>

    </div>

    <div class="col-md-8">

        <div class="mb-4">

            <label class="form-label">

                Ganti Cover Buku

            </label>

            <input
                type="file"
                name="gambar"
                class="form-control"
                accept="image/*">

        </div>

    </div>

</div>


<div class="mb-4">

    <label class="form-label">

        Deskripsi

    </label>

    <textarea
        name="deskripsi"
        rows="5"
        class="form-control">{{ old('deskripsi',$book->deskripsi) }}</textarea>

</div>


<div class="d-flex gap-2">

    <button class="btn btn-primary btn-modern">

        <i class="bi bi-check-circle-fill me-1"></i>

        Update Buku

    </button>

    <a href="{{ route('books.index') }}" class="btn btn-secondary">

        Batal

    </a>

</div>

</form>

</div>

@endsection