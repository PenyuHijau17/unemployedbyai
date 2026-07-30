@extends('admin.layouts.app')

@section('title','Detail Buku')

@section('content')

<div class="container-fluid">

    <div class="card shadow">

        <div class="card-header">
            <h4>Detail Buku</h4>
        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-4 text-center">

                    @if($book->gambar)
                    <img src="{{ asset('storage/'.$book->gambar) }}" class="img-fluid rounded"
                        style="max-height:350px;object-fit:contain;">
                    @else
                    <div class="alert alert-secondary">
                        Tidak ada gambar
                    </div>

                    <img src="{{ asset('storage/'.$book->gambar) }}" class="img-fluid rounded"
                        style="max-height:350px;object-fit:contain;">
                    @else
                    <div class="alert alert-secondary">
                        Tidak ada gambar
                    </div>
                    origin/books
                    @endif

                </div>

                <div class="col-md-8">

                    <table class="table">

                        <tr>
                            <th width="180">Judul</th>
                            <td>{{ $book->judul }}</td>
                        </tr>

                        <tr>
                            <th>Kategori</th>
                            <td>{{ $book->category->nama_kategori ?? '-' }}</td>
                        </tr>

                        <tr>
                            <th>Penulis</th>
                            <td>{{ $book->penulis }}</td>
                        </tr>

                        <tr>
                            <th>Penerbit</th>
                            <td>{{ $book->penerbit }}</td>
                        </tr>

                        <tr>
                            <th>Tahun</th>
                            <td>{{ $book->tahun_terbit }}</td>
                        </tr>

                        <tr>
                            <th>Harga</th>
                            <td>Rp {{ number_format($book->harga,0,',','.') }}</td>
                        </tr>

                        <tr>
                            <th>Stok</th>
                            <td>{{ $book->stok }}</td>
                        </tr>

                        <tr>
                            <th>Deskripsi</th>
                            <td>{{ $book->deskripsi }}</td>
                        </tr>

                    </table>

                    <a href="{{ route('books.edit',$book->id) }}" class="btn btn-warning">
                        Edit
                    </a>

                    <a href="{{ route('books.customer') }}" class="btn btn-secondary">

                        <a href="{{ route('books.edit',$book->id) }}" class="btn btn-warning">
                            Edit
                        </a>

                        <a href="{{ route('books.index') }}" class="btn btn-secondary">
                            origin/books
                            Kembali
                        </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection