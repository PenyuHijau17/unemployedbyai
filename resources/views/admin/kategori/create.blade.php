@extends('admin.layouts.app')

@section('title','Tambah Kategori')

@section('content')



<div class="form-card">

<form action="{{ route('categories.store') }}" method="POST">

    @csrf

    <div class="mb-4">

        <label class="form-label">Nama Kategori</label>

        <input
            type="text"
            name="nama_kategori"
            class="form-control">

    </div>

    <div class="mb-4">

        <label class="form-label">Deskripsi</label>

        <textarea
            name="deskripsi"
            rows="5"
            class="form-control"></textarea>

    </div>

    <button class="btn btn-primary btn-modern">

        <i class="bi bi-check-circle"></i>

        Simpan

    </button>

    <a href="{{ route('categories.index') }}"
        class="btn btn-light">

        Kembali

    </a>

</form>

</div>

@endsection