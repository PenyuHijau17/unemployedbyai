@extends('admin.layouts.app')

@section('title','Data Buku')

@section('content')

@if(session('success'))
<div class="alert alert-success fade-up">
    {{ session('success') }}
</div>
@endif

<div class="page-header fade-up">

    <div>
        <h2>Daftar Buku</h2>
        <p>Kelola seluruh data buku yang tersedia.</p>
    </div>

    <a href="{{ route('books.create') }}" class="btn btn-primary btn-modern">
        <i class="bi bi-plus-circle-fill me-1"></i>
        Tambah Buku
    </a>

</div>

<div class="table-card fade-up">

    <form action="{{ route('books.index') }}" method="GET" class="mb-4">

        <div class="search-box">

            <i class="bi bi-search"></i>

            <input
                type="text"
                name="search"
                class="form-control"
                placeholder="Cari judul, penulis, penerbit..."
                value="{{ request('search') }}">

        </div>

    </form>

    <div class="table-responsive">

        <table class="table table-modern align-middle">

            <thead>

                <tr>

                    <th width="80">Cover</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th width="180">Aksi</th>

                </tr>

            </thead>

            <tbody>

            @forelse($books as $book)

                <tr>

                    <td>

                        @if($book->gambar)

                            <img
                                src="{{ asset('storage/'.$book->gambar) }}"
                                class="book-cover">

                        @else

                            <div class="book-placeholder">

                                <i class="bi bi-book-half"></i>

                            </div>

                        @endif

                    </td>

                    <td>

                        <strong>{{ $book->judul }}</strong>

                    </td>

                    <td>

                        <span class="badge-category">

                            {{ $book->category->nama_kategori ?? '-' }}

                        </span>

                    </td>

                    <td>{{ $book->penulis }}</td>

                    <td>{{ $book->penerbit }}</td>

                    <td>

                        <strong>

                            Rp {{ number_format($book->harga,0,',','.') }}

                        </strong>

                    </td>

                    <td>

                        @if($book->stok > 10)

                            <span class="badge-stock success">

                                {{ $book->stok }}

                            </span>

                        @elseif($book->stok > 0)

                            <span class="badge-stock warning">

                                {{ $book->stok }}

                            </span>

                        @else

                            <span class="badge-stock danger">

                                Habis

                            </span>

                        @endif

                    </td>

                    <td>

                        <a href="{{ route('books.show',$book->id) }}"
                           class="btn btn-info btn-sm">

                            <i class="bi bi-eye"></i>

                        </a>

                        <a href="{{ route('books.edit',$book->id) }}"
                           class="btn btn-warning btn-sm">

                            <i class="bi bi-pencil-square"></i>

                        </a>

                        <form
                            action="{{ route('books.destroy',$book->id) }}"
                            method="POST"
                            class="d-inline">

                            @csrf
                            @method('DELETE')

                            <button
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Hapus buku ini?')">

                                <i class="bi bi-trash-fill"></i>

                            </button>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="8" class="text-center py-5">

                        Belum ada data buku.

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection