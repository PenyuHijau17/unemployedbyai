@extends('admin.layouts.app')

@section('title', 'Data Buku')

@section('content')

<div class="admin-page books-page">

    {{-- PAGE INTRO --}}
    <section class="crud-hero fade-up">

        <div class="crud-hero-content">

            <div class="crud-eyebrow">
                <span></span>
                BOOK MANAGEMENT
            </div>

            <h1>
                Koleksi Buku
            </h1>

            <p>
                Kelola seluruh koleksi buku Pustaka Nusantara
                dengan mudah dan terorganisir.
            </p>

        </div>

        <div class="crud-hero-meta">

            <div class="hero-count">
                <strong>{{ $books->count() }}</strong>
                <span>koleksi</span>
            </div>

            <a
                href="{{ route('books.create') }}"
                class="crud-primary-btn"
            >
                <i class="bi bi-plus-lg"></i>
                Tambah Buku
            </a>

        </div>

    </section>


    {{-- SUCCESS --}}
    @if(session('success'))

        <div class="admin-alert admin-alert-success fade-up">

            <div class="admin-alert-icon">
                <i class="bi bi-check-lg"></i>
            </div>

            <div>
                <strong>Berhasil</strong>
                <span>{{ session('success') }}</span>
            </div>

            <button
                type="button"
                class="admin-alert-close"
                onclick="this.parentElement.remove()"
            >
                <i class="bi bi-x"></i>
            </button>

        </div>

    @endif


    {{-- TOOLBAR --}}
    <section class="data-toolbar fade-up">

        <div class="toolbar-heading">

            <span class="toolbar-label">
                DATABASE
            </span>

            <h3>
                Daftar Buku
            </h3>

        </div>


        <form
            action="{{ route('books.index') }}"
            method="GET"
            class="data-search"
        >

            <i class="bi bi-search"></i>

            <input
                type="text"
                name="search"
                placeholder="Cari judul, penulis, penerbit..."
                value="{{ request('search') }}"
            >

            @if(request('search'))

                <a
                    href="{{ route('books.index') }}"
                    class="search-clear"
                    title="Reset pencarian"
                >
                    <i class="bi bi-x"></i>
                </a>

            @endif

            <button type="submit">
                Cari
            </button>

        </form>

    </section>


    {{-- TABLE --}}
    <section class="data-panel fade-up">

        <div class="data-panel-header">

            <div>

                <span class="panel-eyebrow">
                    COLLECTION
                </span>

                <h3>
                    Semua Buku
                </h3>

            </div>

            <div class="panel-indicator">
                <span></span>
                Data aktif
            </div>

        </div>


        <div class="table-responsive">

            <table class="admin-table">

                <thead>

                    <tr>

                        <th class="cover-column">
                            Cover
                        </th>

                        <th>
                            Buku
                        </th>

                        <th>
                            Kategori
                        </th>

                        <th>
                            Penulis
                        </th>

                        <th>
                            Penerbit
                        </th>

                        <th>
                            Harga
                        </th>

                        <th>
                            Stok
                        </th>

                        <th class="action-column">
                            Aksi
                        </th>

                    </tr>

                </thead>


                <tbody>

                @forelse($books as $book)

                    <tr>

                        {{-- COVER --}}
                        <td>

                            @if($book->gambar)

                                <div class="book-cover-wrapper">

                                    <img
                                        src="{{ asset('storage/'.$book->gambar) }}"
                                        class="book-cover"
                                        alt="{{ $book->judul }}"
                                    >

                                </div>

                            @else

                                <div class="book-placeholder">

                                    <i class="bi bi-book-half"></i>

                                </div>

                            @endif

                        </td>


                        {{-- BOOK --}}
                        <td>

                            <div class="book-info">

                                <strong>
                                    {{ $book->judul }}
                                </strong>

                                <small>
                                    ID #{{ $book->id }}
                                </small>

                            </div>

                        </td>


                        {{-- CATEGORY --}}
                        <td>

                            <span class="category-pill">
                                <i class="bi bi-bookmark-fill"></i>
                                {{ $book->category->nama_kategori ?? '-' }}
                            </span>

                        </td>


                        {{-- AUTHOR --}}
                        <td>
                            <span class="table-secondary-text">
                                {{ $book->penulis }}
                            </span>
                        </td>


                        {{-- PUBLISHER --}}
                        <td>
                            <span class="table-secondary-text">
                                {{ $book->penerbit }}
                            </span>
                        </td>


                        {{-- PRICE --}}
                        <td>

                            <strong class="book-price">
                                Rp {{ number_format($book->harga,0,',','.') }}
                            </strong>

                        </td>


                        {{-- STOCK --}}
                        <td>

                            @if($book->stok > 10)

                                <span class="stock-pill stock-good">
                                    <span></span>
                                    {{ $book->stok }}
                                </span>

                            @elseif($book->stok > 0)

                                <span class="stock-pill stock-warning">
                                    <span></span>
                                    {{ $book->stok }}
                                </span>

                            @else

                                <span class="stock-pill stock-danger">
                                    <span></span>
                                    Habis
                                </span>

                            @endif

                        </td>


                        {{-- ACTION --}}
                        <td>

                            <div class="table-actions">

                                <a
                                    href="{{ route('books.show',$book->id) }}"
                                    class="table-action view"
                                    title="Lihat"
                                >
                                    <i class="bi bi-eye"></i>
                                </a>

                                <a
                                    href="{{ route('books.edit',$book->id) }}"
                                    class="table-action edit"
                                    title="Edit"
                                >
                                    <i class="bi bi-pencil"></i>
                                </a>

                                <form
                                    action="{{ route('books.destroy',$book->id) }}"
                                    method="POST"
                                    data-loading
                                >

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="table-action delete"
                                        title="Hapus"
                                        data-confirm-delete="Hapus buku '{{ $book->judul }}'?"
                                    >
                                        <i class="bi bi-trash3"></i>
                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td
                            colspan="8"
                            class="empty-table"
                        >

                            <div class="empty-state">

                                <div class="empty-state-icon">
                                    <i class="bi bi-book"></i>
                                </div>

                                <h4>
                                    Belum ada buku
                                </h4>

                                <p>
                                    Koleksi buku kamu masih kosong.
                                </p>

                                <a
                                    href="{{ route('books.create') }}"
                                    class="crud-primary-btn"
                                >
                                    <i class="bi bi-plus-lg"></i>
                                    Tambah Buku
                                </a>

                            </div>

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </section>

</div>

@endsection