<!DOCTYPE html>
<html>
<head>
    <title>Detail Buku</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body class="bg-light">

<div class="container py-5">

    <div class="card shadow-lg border-0">

        <div class="card-header bg-primary text-white">

            <h3 class="mb-0">
                <i class="bi bi-book-half"></i>
                Detail Buku
            </h3>

        </div>

        <div class="card-body">

            <div class="row">

                <!-- Gambar Buku -->

                <div class="col-md-4 text-center">

                    @if($book->gambar)

                        <img
                            src="{{ asset('storage/'.$book->gambar) }}"
                            class="img-fluid rounded shadow"
                            style="max-height:450px; object-fit:cover;">

                    @else

                        <div class="border rounded p-5 bg-light">

                            <i class="bi bi-image text-secondary"
                            style="font-size:90px;"></i>

                            <p class="mt-3 text-muted">

                                Tidak Ada Gambar

                            </p>

                        </div>

                    @endif

                </div>

                <!-- Detail Buku -->

                <div class="col-md-8">

                    <h2 class="fw-bold">

                        {{ $book->judul }}

                    </h2>

                    <hr>

                    <table class="table table-borderless">

                        <tr>

                            <th width="180">

                                <i class="bi bi-tags-fill text-primary"></i>

                                Kategori

                            </th>

                            <td>

                                <span class="badge bg-primary fs-6">

                                    {{ $book->category->nama_kategori ?? '-' }}

                                </span>

                            </td>

                        </tr>

                        <tr>

                            <th>

                                <i class="bi bi-person-fill text-success"></i>

                                Penulis

                            </th>

                            <td>

                                {{ $book->penulis }}

                            </td>

                        </tr>

                        <tr>

                            <th>

                                <i class="bi bi-building text-warning"></i>

                                Penerbit

                            </th>

                            <td>

                                {{ $book->penerbit }}

                            </td>

                        </tr>

                        <tr>

                            <th>

                                <i class="bi bi-calendar-event text-danger"></i>

                                Tahun Terbit

                            </th>

                            <td>

                                {{ $book->tahun_terbit }}

                            </td>

                        </tr>

                        <tr>

                            <th>

                                <i class="bi bi-cash-stack text-success"></i>

                                Harga

                            </th>

                            <td>

                                <h3 class="text-success fw-bold">

                                    Rp {{ number_format($book->harga,0,',','.') }}

                                </h3>

                            </td>

                        </tr>

                        <tr>

                            <th>

                                <i class="bi bi-box-seam text-info"></i>

                                Stok

                            </th>

                            <td>

                                @if($book->stok > 10)

                                    <span class="badge bg-success fs-6">

                                        {{ $book->stok }} Tersedia

                                    </span>

                                @elseif($book->stok > 0)

                                    <span class="badge bg-warning text-dark fs-6">

                                        Stok Tinggal {{ $book->stok }}

                                    </span>

                                @else

                                    <span class="badge bg-danger fs-6">

                                        Stok Habis

                                    </span>

                                @endif

                            </td>

                        </tr>

                    </table>

                </div>

            </div>

            <hr>

            <h4>

                <i class="bi bi-card-text"></i>

                Deskripsi Buku

            </h4>

            <div class="p-3 bg-light rounded border">

                {{ $book->deskripsi ?? 'Belum ada deskripsi.' }}

            </div>

            <div class="mt-4">

                <a href="{{ route('books.index') }}"
                class="btn btn-secondary">

                    <i class="bi bi-arrow-left"></i>

                    Kembali

                </a>

                <a href="{{ route('books.edit',$book->id) }}"
                class="btn btn-warning">

                    <i class="bi bi-pencil-square"></i>

                    Edit Buku

                </a>

            </div>

        </div>

    </div>

</div>

</body>
</html>