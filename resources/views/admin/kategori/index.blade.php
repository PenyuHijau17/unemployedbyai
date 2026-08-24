@extends('admin.layouts.app')

@section('title', 'Kategori')

@section('content')

<div class="admin-page categories-page">

    {{-- =====================================================
        PAGE HERO
    ====================================================== --}}
    <section class="crud-hero category-hero fade-up">

        <div class="crud-hero-content">

            <div class="crud-eyebrow">
                <span></span>
                CATEGORY MANAGEMENT
            </div>

            <h1>
                Kategori Buku
            </h1>

            <p>
                Atur dan kelola kategori untuk menjaga koleksi
                buku tetap terorganisir.
            </p>

        </div>


        <div class="crud-hero-meta">

            <div class="hero-count">

                <strong>
                    {{ $categories->count() }}
                </strong>

                <span>
                    kategori
                </span>

            </div>


            <a
                href="{{ route('categories.create') }}"
                class="crud-primary-btn"
            >
                <i class="bi bi-plus-lg"></i>
                Tambah Kategori
            </a>

        </div>

    </section>


    {{-- =====================================================
        SUCCESS ALERT
    ====================================================== --}}
    @if(session('success'))

        <div class="admin-alert admin-alert-success fade-up">

            <div class="admin-alert-icon">
                <i class="bi bi-check-lg"></i>
            </div>

            <div>

                <strong>
                    Berhasil
                </strong>

                <span>
                    {{ session('success') }}
                </span>

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


    {{-- =====================================================
        DATA PANEL
    ====================================================== --}}
    <section class="data-panel category-data-panel fade-up">

        <div class="data-panel-header">

            <div>

                <span class="panel-eyebrow">
                    CLASSIFICATION
                </span>

                <h3>
                    Semua Kategori
                </h3>

            </div>


            <div class="panel-indicator">

                <span></span>

                Data aktif

            </div>

        </div>


        <div class="table-responsive">

            <table class="admin-table category-table">

                <thead>

                    <tr>

                        <th class="category-number">
                            No
                        </th>

                        <th>
                            Kategori
                        </th>

                        <th>
                            Deskripsi
                        </th>

                        <th class="category-action">
                            Aksi
                        </th>

                    </tr>

                </thead>


                <tbody>

                @forelse($categories as $category)

                    <tr>

                        {{-- NUMBER --}}
                        <td>

                            <span class="category-number-badge">
                                {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                            </span>

                        </td>


                        {{-- CATEGORY --}}
                        <td>

                            <div class="category-name">

                                <div class="category-icon">
                                    <i class="bi bi-bookmark-fill"></i>
                                </div>

                                <strong>
                                    {{ $category->nama_kategori }}
                                </strong>

                            </div>

                        </td>


                        {{-- DESCRIPTION --}}
                        <td>

                            @if($category->deskripsi)

                                <span class="category-description">
                                    {{ $category->deskripsi }}
                                </span>

                            @else

                                <span class="category-description empty">
                                    Tidak ada deskripsi
                                </span>

                            @endif

                        </td>


                        {{-- ACTION --}}
                        <td>

                            <div class="table-actions">

                                <a
                                    href="{{ route('categories.edit',$category->id) }}"
                                    class="table-action edit"
                                    title="Edit kategori"
                                >
                                    <i class="bi bi-pencil"></i>
                                </a>


                                <form
                                    action="{{ route('categories.destroy',$category->id) }}"
                                    method="POST"
                                >

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="table-action delete"
                                        title="Hapus kategori"
                                        onclick="return confirm('Yakin ingin menghapus kategori ini?')"
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
                            colspan="4"
                            class="empty-table"
                        >

                            <div class="empty-state">

                                <div class="empty-state-icon">
                                    <i class="bi bi-tags"></i>
                                </div>

                                <h4>
                                    Belum ada kategori
                                </h4>

                                <p>
                                    Tambahkan kategori pertama untuk
                                    mengorganisir koleksi buku.
                                </p>

                                <a
                                    href="{{ route('categories.create') }}"
                                    class="crud-primary-btn"
                                >
                                    <i class="bi bi-plus-lg"></i>
                                    Tambah Kategori
                                </a>

                            </div>

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </section>


    {{-- =====================================================
        BOTTOM INFO
    ====================================================== --}}
    <div class="category-info-row fade-up">

        <div class="category-info-card">

            <div class="category-info-icon">
                <i class="bi bi-info-circle"></i>
            </div>

            <div>

                <strong>
                    Struktur kategori
                </strong>

                <span>
                    Gunakan kategori yang jelas agar koleksi
                    buku lebih mudah ditemukan.
                </span>

            </div>

        </div>


        <div class="category-total">

            <span>
                TOTAL KATEGORI
            </span>

            <strong>
                {{ $categories->count() }}
            </strong>

        </div>

    </div>

</div>

@endsection