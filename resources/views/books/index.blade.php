@extends('layouts.app')

@section('title','Data Buku')

@section('content')

<div class="container-fluid">

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="card shadow">

        <div class="card-header d-flex justify-content-between align-items-center">

            <h4 class="mb-0">
                <i class="bi bi-book"></i>
                Data Buku
            </h4>

            <a href="{{ route('books.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i>
                Tambah Buku
            </a>

        </div>

        <div class="card-body">

            <form action="{{ route('books.customer') }}" method="GET" class="mb-4">

                <div class="input-group">

                    <input type="text" name="search" class="form-control" placeholder="Cari judul, penulis, penerbit..."
                        value="{{ request('search') }}">

                    <button class="btn btn-primary">
                        <i class="bi bi-search"></i>
                        Cari
                    </button>

                </div>

            </form>

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead class="table-dark">

                        <tr>

                            <th width="70">Cover</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Penulis</th>
                            <th>Penerbit</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th width="220">Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($books as $book)

                        <tr>

                            <td class="text-center">

                                @if($book->gambar)

                                <img src="{{ asset('storage/'.$book->gambar) }}" width="60" height="80"
                                    style="object-fit:cover" class="rounded">

                                @else

                                <span class="text-muted">
                                    -
                                </span>

                                @endif

                            </td>

                            <td>{{ $book->judul }}</td>

                            <td>{{ $book->category->nama_kategori ?? '-' }}</td>

                            <td>{{ $book->penulis }}</td>

                            <td>{{ $book->penerbit }}</td>

                            <td>
                                Rp {{ number_format($book->harga,0,',','.') }}
                            </td>

                            <td>{{ $book->stok }}</td>

                            <td>

                                <a href="{{ route('books.show',$book->id) }}" class="btn btn-info btn-sm">

                                    <i class="bi bi-eye"></i>

                                </a>

                                <a href="{{ route('books.edit',$book->id) }}" class="btn btn-warning btn-sm">

                                    <i class="bi bi-pencil"></i>

                                </a>

                                <form action="{{ route('books.destroy',$book->id) }}" method="POST" class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus buku ini?')">

                                        <i class="bi bi-trash"></i>

                                    </button>

                                </form>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="8" class="text-center text-muted">

                                Belum ada data buku.

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection