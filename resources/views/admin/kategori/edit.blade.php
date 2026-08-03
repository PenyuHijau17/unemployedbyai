@extends('admin.layouts.app')

@section('title','Edit Kategori')

@section('content')

<div class="page-header">

    <div>

        <h2>Edit Kategori</h2>

        <p>Perbarui data kategori.</p>

    </div>

</div>

<div class="form-card">

<form
action="{{ route('categories.update',$category->id) }}"
method="POST">

@csrf
@method('PUT')

<div class="mb-4">

<label class="form-label">

Nama Kategori

</label>

<input
type="text"
name="nama_kategori"
value="{{ $category->nama_kategori }}"
class="form-control">

</div>

<div class="mb-4">

<label class="form-label">

Deskripsi

</label>

<textarea
name="deskripsi"
rows="5"
class="form-control">{{ $category->deskripsi }}</textarea>

</div>

<button class="btn btn-primary btn-modern">

<i class="bi bi-check-circle"></i>

Update

</button>

<a href="{{ route('categories.index') }}"
class="btn btn-light">

Kembali

</a>

</form>

</div>

@endsection