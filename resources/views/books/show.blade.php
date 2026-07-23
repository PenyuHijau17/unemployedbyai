<!DOCTYPE html>
<html>
<head>
    <title>Detail Buku</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">

    <h2>Detail Buku</h2>

    <div class="card mt-4">

        <div class="card-body">

            <h4 class="card-title">
                {{ $book->judul }}
            </h4>


            <p>
                <strong>Kategori:</strong>
                {{ $book->category->nama_kategori ?? '-' }}
            </p>


            <p>
                <strong>Penulis:</strong>
                {{ $book->penulis }}
            </p>


            <p>
                <strong>Penerbit:</strong>
                {{ $book->penerbit }}
            </p>


            <p>
                <strong>Tahun Terbit:</strong>
                {{ $book->tahun_terbit }}
            </p>


            <p>
                <strong>Harga:</strong>
                Rp {{ number_format($book->harga,0,',','.') }}
            </p>


            <p>
                <strong>Stok:</strong>
                {{ $book->stok }}
            </p>


            <p>
                <strong>Deskripsi:</strong>
                <br>
                {{ $book->deskripsi ?? '-' }}
            </p>


            <a href="{{ route('books.index') }}"
            class="btn btn-secondary">
                Kembali
            </a>


        </div>

    </div>

</div>

</body>
</html>