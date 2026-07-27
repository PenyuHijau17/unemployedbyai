<!DOCTYPE html>
<html>
<head>
    <title>Daftar Buku</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">

            <h3 class="mb-0">
                <i class="bi bi-book-half"></i>
                Daftar Buku
            </h3>

            <a href="{{ route('books.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i>
                Tambah Buku
            </a>

        </div>

        <div class="card-body">

            @if(session('success'))

                <div class="alert alert-success">

                    {{ session('success') }}

                </div>

            @endif


            <form action="{{ route('books.index') }}" method="GET" class="mb-3">

                <div class="input-group">

                    <input
                        type="text"
                        name="search"
                        class="form-control"
                        placeholder="Cari judul buku..."
                        value="{{ request('search') }}">

                    <button class="btn btn-primary">

                        <i class="bi bi-search"></i>

                        Cari

                    </button>

                </div>

            </form>


            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead class="table-dark text-center">

                        <tr>

                            <th>No</th>

                            <th>Gambar</th>

                            <th>Judul</th>

                            <th>Kategori</th>

                            <th>Penulis</th>

                            <th>Penerbit</th>

                            <th>Harga</th>

                            <th>Stok</th>

                            <th>Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                    @forelse($books as $book)

                        <tr>

                            <td class="text-center">

                                {{ $loop->iteration }}

                            </td>

                            <td class="text-center">

                                @if($book->gambar)

                                    <img
                                        src="{{ asset('storage/'.$book->gambar) }}"
                                        width="80"
                                        height="110"
                                        style="
                                        object-fit:cover;
                                        border-radius:10px;
                                        border:1px solid #ddd;
                                        box-shadow:0 2px 6px rgba(0,0,0,.2);
                                        ">

                                @else

                                    <span class="badge bg-secondary">

                                        No Image

                                    </span>

                                @endif

                            </td>

                            <td>

                                <strong>

                                    {{ $book->judul }}

                                </strong>

                            </td>

                            <td>

                                {{ $book->category->nama_kategori ?? '-' }}

                            </td>

                            <td>

                                {{ $book->penulis }}

                            </td>

                            <td>

                                {{ $book->penerbit }}

                            </td>

                            <td>

                                <strong class="text-success">

                                    Rp {{ number_format($book->harga,0,',','.') }}

                                </strong>

                            </td>

                            <td class="text-center">

                                @if($book->stok > 10)

                                    <span class="badge bg-success">

                                        {{ $book->stok }}

                                    </span>

                                @elseif($book->stok > 0)

                                    <span class="badge bg-warning text-dark">

                                        {{ $book->stok }}

                                    </span>

                                @else

                                    <span class="badge bg-danger">

                                        Habis

                                    </span>

                                @endif

                            </td>

                            <td class="text-center">

                                <a href="{{ route('books.show',$book->id) }}"
                                   class="btn btn-info btn-sm">

                                    <i class="bi bi-eye"></i>

                                </a>

                                <a href="{{ route('books.edit',$book->id) }}"
                                   class="btn btn-warning btn-sm">

                                    <i class="bi bi-pencil"></i>

                                </a>

                                <form action="{{ route('books.destroy',$book->id) }}"
                                      method="POST"
                                      class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin hapus buku?')">

                                        <i class="bi bi-trash"></i>

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="9" class="text-center text-muted">

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

</body>
</html>