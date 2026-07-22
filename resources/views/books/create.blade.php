<!DOCTYPE html>
<html>
<head>
    <title>Tambah Buku</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">

    <h2 class="mb-4">Tambah Buku</h2>


    <form action="{{ route('books.store') }}" method="POST">

        @csrf


        <div class="mb-3">
            <label class="form-label">
                Kategori
            </label>

            <select name="category_id" class="form-control">

                @foreach($categories as $category)

                    <option value="{{ $category->id }}">
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
            class="form-control">

        </div>



        <div class="mb-3">

            <label class="form-label">
                Penulis
            </label>

            <input type="text"
            name="penulis"
            class="form-control">

        </div>



        <div class="mb-3">

            <label class="form-label">
                Penerbit
            </label>

            <input type="text"
            name="penerbit"
            class="form-control">

        </div>



        <div class="mb-3">

            <label class="form-label">
                Tahun Terbit
            </label>

            <input type="number"
            name="tahun_terbit"
            class="form-control">

        </div>



        <div class="mb-3">

            <label class="form-label">
                Harga
            </label>

            <input type="number"
            name="harga"
            class="form-control">

        </div>



        <div class="mb-3">

            <label class="form-label">
                Stok
            </label>

            <input type="number"
            name="stok"
            class="form-control">

        </div>



        <div class="mb-3">

            <label class="form-label">
                Deskripsi
            </label>

            <textarea name="deskripsi"
            class="form-control"></textarea>

        </div>



        <button class="btn btn-success">
            Simpan
        </button>


        <a href="{{ route('books.index') }}"
        class="btn btn-secondary">
            Kembali
        </a>


    </form>

</div>


</body>
</html>