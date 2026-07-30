@extends('admin.layouts.app')

@section('title', 'Kategori')

@section('content')

<div class="page-header fade-up">

    <div>
        <h2>Daftar Kategori</h2>
        <p>Kelola seluruh kategori buku yang tersedia.</p>
    </div>

    <a href="{{ route('categories.create') }}" class="btn btn-primary btn-modern">
        <i class="bi bi-plus-circle-fill me-1"></i>
        Tambah Kategori
    </a>

</div>

<div class="table-card fade-up">

    <table class="table table-modern align-middle">

        <thead>

            <tr>

                <th width="80">No</th>

                <th>Nama Kategori</th>

                <th>Deskripsi</th>

                <th width="170">Aksi</th>

            </tr>

        </thead>

        <tbody>

        @forelse($categories as $category)

            <tr>

                <td>{{ $loop->iteration }}</td>

                <td>
                    <span class="badge-category">
                        {{ $category->nama_kategori }}
                    </span>
                </td>

                <td>{{ $category->deskripsi }}</td>

                <td>

                    <a href="{{ route('categories.edit',$category->id) }}"
                        class="btn btn-warning btn-sm">

                        <i class="bi bi-pencil-square"></i>

                    </a>

                    <form
                        action="{{ route('categories.destroy',$category->id) }}"
                        method="POST"
                        class="d-inline">

                        @csrf
                        @method('DELETE')

                        <button
                            class="btn btn-danger btn-sm"
                            onclick="return confirm('Yakin ingin menghapus kategori ini?')">

                            <i class="bi bi-trash-fill"></i>

                        </button>

                    </form>

                </td>

            </tr>

        @empty

            <tr>

                <td colspan="4" class="text-center py-5">

                    Belum ada kategori.

                </td>

            </tr>

        @endforelse

        </tbody>

    </table>

</div>

@endsection