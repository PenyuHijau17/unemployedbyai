@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h2>Edit Kategori</h2>
    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Nama Kategori</label>
            <input type="text" name="nama_kategori" class="form-control" value="{{ $category->nama_kategori }}" required>
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control">{{ $category->deskripsi }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
