<!DOCTYPE html>
<html>
<head>
    <title>Daftar Buku</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">

    <h2 class="mb-4">Daftar Buku</h2>

    <a href="{{ route('books.create') }}" class="btn btn-primary mb-3">
        Tambah Buku
    </a>


    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif


    <table class="table table-bordered table-striped">

        <thead class="table-dark">

            <tr>
                <th>No</th>
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

            @foreach($books as $book)

            <tr>

                <td>{{ $loop->iteration }}</td>

                <td>{{ $book->judul }}</td>

                <td>
                    {{ $book->category->nama_kategori ?? '-' }}
                </td>

                <td>{{ $book->penulis }}</td>

                <td>{{ $book->penerbit }}</td>

                <td>
                    Rp {{ number_format($book->harga,0,',','.') }}
                </td>

                <td>{{ $book->stok }}</td>


                <td>

                    <a href="{{ route('books.show',$book->id) }}"
                    class="btn btn-info btn-sm">
                        Detail
                    </a>


                    <a href="{{ route('books.edit',$book->id) }}"
                    class="btn btn-warning btn-sm">
                        Edit
                    </a>


                    <form action="{{ route('books.destroy',$book->id) }}"
                    method="POST"
                    class="d-inline">

                        @csrf
                        @method('DELETE')

                        <button type="submit"
                        class="btn btn-danger btn-sm"
                        onclick="return confirm('Yakin hapus buku?')">
                            Hapus
                        </button>

                    </form>


                </td>

            </tr>

            @endforeach

        </tbody>

    </table>

</div>

</body>
</html>