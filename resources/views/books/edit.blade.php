<!DOCTYPE html>
<html>
<head>
    <title>Edit Buku</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">

    <h2 class="mb-4">
        Edit Buku
    </h2>


    <form action="{{ route('books.update',$book->id) }}" method="POST">

        @csrf
        @method('PUT')


        <div class="mb-3">

            <label class="form-label">
                Kategori
            </label>

            <select name="category_id" class="form-control">

                @foreach($categories as $category)

                    <option value="{{ $category->id }}"
                    {{ $book->category_id == $category->id ? 'selected' : '' }}>

                        {{ $category->nama_kategori }}

                    </option>

                @endforeach

            </select>

        </div>



        <div class="mb-3">

            <label class="form-label">
                Judul Buku
            </label>

            <input type="text"
            name="judul"
            class="form-control"
            value="{{ $book->judul }}">

        </div>



        <div class="mb-3">

            <label class="form-label">
                Penulis
            </label>

            <input type="text"
            name="penulis"
            class="form-control"
            value="{{ $book->penulis }}">

        </div>



        <div class="mb-3">

            <label class="form-label">
                Penerbit
            </label>

            <input type="text"
            name="penerbit"
            class="form-control"
            value="{{ $book->penerbit }}">

        </div>



        <div class="mb-3">

            <label class="form-label">
                Tahun Terbit
            </label>

            <input type="number"
            name="tahun_terbit"
            class="form-control"
            value="{{ $book->tahun_terbit }}">

        </div>



        <div class="mb-3">

            <label class="form-label">
                Harga
            </label>

            <input type="number"
            name="harga"
            class="form-control"
            value="{{ $book->harga }}">

        </div>



        <div class="mb-3">

            <label class="form-label">
                Stok
            </label>

            <input type="number"
            name="stok"
            class="form-control"
            value="{{ $book->stok }}">

        </div>



        <div class="mb-3">

            <label class="form-label">
                Deskripsi
            </label>

            <textarea name="deskripsi"
            class="form-control">{{ $book->deskripsi }}</textarea>

        </div>



        <button class="btn btn-success">
            Update
        </button>


        <a href="{{ route('books.index') }}"
        class="btn btn-secondary">
            Kembali
        </a>


    </form>

</div>

</body>
</html>