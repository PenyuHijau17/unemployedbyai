@extends('admin.layouts.app')

@section('title','Detail Buku')

@section('content')

<div class="page-header fade-up">

    <div>

        <h2>Detail Buku</h2>

        <p>Informasi lengkap mengenai buku.</p>

    </div>

    <a href="{{ route('books.index') }}" class="btn btn-light">

        <i class="bi bi-arrow-left"></i>

        Kembali

    </a>

</div>

<div class="detail-card fade-up">

    <div class="row align-items-start">

        <div class="col-lg-4 text-center">

            @if($book->gambar)

                <img
                    src="{{ asset('storage/'.$book->gambar) }}"
                    class="book-detail-cover">

            @else

                <div class="book-placeholder-detail">

                    <i class="bi bi-book-half"></i>

                </div>

            @endif

        </div>

        <div class="col-lg-8">

            <h3 class="mb-3 fw-bold">

                {{ $book->judul }}

            </h3>

            <table class="table table-borderless detail-table">

                <tr>
                    <th width="180">Kategori</th>
                    <td>
                        <span class="badge-category">
                            {{ $book->category->nama_kategori ?? '-' }}
                        </span>
                    </td>
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
                    <th>Tahun Terbit</th>
                    <td>{{ $book->tahun_terbit }}</td>
                </tr>

                <tr>
                    <th>Harga</th>
                    <td>

                        <strong class="text-primary">

                            Rp {{ number_format($book->harga,0,',','.') }}

                        </strong>

                    </td>
                </tr>

                <tr>

                    <th>Stok</th>

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

                </tr>

                <tr>

                    <th>Deskripsi</th>

                    <td>{{ $book->deskripsi ?: '-' }}</td>

                </tr>

            </table>

            <div class="mt-4">

                <a href="{{ route('books.edit',$book->id) }}"
                    class="btn btn-warning">

                    <i class="bi bi-pencil-square"></i>

                    Edit Buku

                </a>

                <a href="{{ route('books.index') }}"
                    class="btn btn-secondary">

                    <i class="bi bi-arrow-left"></i>

                    Kembali

                </a>

            </div>

        </div>

    </div>

</div>

@endsection