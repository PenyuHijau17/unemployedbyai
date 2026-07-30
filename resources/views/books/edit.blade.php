<!DOCTYPE html>
<html>

<head>
    <title>Edit Buku</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">

        <div class="card shadow">

            <div class="card-header bg-warning">

                <h3>Edit Buku</h3>

            </div>

            {{-- Menampilkan Error Validasi --}}
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="card shadow">

                <div class="card-header bg-warning">
                    <h3>Edit Buku</h3>
                </div>


                <div class="card-body">

                    <form action="{{ route('books.update',$book->id) }}" method="POST" enctype="multipart/form-data">

                        <form action="{{ route('books.update', $book) }}" method="POST" enctype="multipart/form-data">


                            @csrf
                            @method('PUT')

                            <div class="mb-3">

                                <label class="form-label">Kategori</label>

                                <div class="mb-3">
                                    <label class="form-label">Kategori</label>


                                    <select name="category_id" class="form-control">

                                        @foreach($categories as $category)@foreach($categories as
                                        $category)
                                        <option value="{{ $category->id }}"
                                            {{ $book->category_id == $category->id ? 'selected' : '' }}>
                                            {{ $category->nama_kategori }}
                                        </option>
                                        @endforeach
                                    </select>

                                </div>

                                <div class="mb-3">

                                    <label class="form-label">Judul Buku</label>

                                    <input type="text" name="judul" class="form-control" value="{{ $book->judul }}">

                                </div>

                                <div class="mb-3">

                                    <label class="form-label">Penulis</label>

                                    <input type="text" name="penulis" class="form-control" value="{{ $book->penulis }}">

                                </div>

                                <div class="mb-3">

                                    <label class="form-label">Penerbit</label>

                                    <input type="text" name="penerbit" class="form-control"
                                        value="{{ $book->penerbit }}">

                                </div>

                                <div class="mb-3">

                                    <label class="form-label">Tahun Terbit</label>

                                    <input type="number" name="tahun_terbit" class="form-control"
                                        value="{{ $book->tahun_terbit }}">

                                </div>

                                <div class="mb-3">

                                    <label class="form-label">Harga</label>

                                    <input type="number" name="harga" class="form-control" value="{{ $book->harga }}">

                                </div>

                                <div class="mb-3">

                                    <label class="form-label">Stok</label>

                                    <input type="number" name="stok" class="form-control" value="{{ $book->stok }}">

                                </div>

                                <div class="mb-3">

                                    <label class="form-label">
                                        Gambar Saat Ini
                                    </label>

                                    <br>

                                    @if($book->gambar)

                                    <img src="{{ asset('storage/'.$book->gambar) }}" width="150"
                                        class="img-thumbnail mb-2">

                                    @else

                                    <p class="text-muted">
                                        Belum ada gambar.
                                    </p>

                                    @endif

                                </div>

                                <div class="mb-3">

                                    <label class="form-label">
                                        Ganti Gambar
                                    </label>

                                    <input type="file" name="gambar" class="form-control" accept="image/*">

                                </div>

                                <div class="mb-3">

                                    <label class="form-label">
                                        Deskripsi
                                    </label>

                                    <textarea name="deskripsi" class="form-control"
                                        rows="4">{{ $book->deskripsi }}</textarea>

                                </div>

                                <button class="btn btn-success">

                                    Update Buku

                                </button>

                                <a href="{{ route('books.customer') }}" class="btn btn-secondary">

                                    Kembali

                                </a>

                                @endforeach

                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Judul Buku</label>

                                <input type="text" name="judul" class="form-control"
                                    value="{{ old('judul', $book->judul) }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Penulis</label>

                                <input type="text" name="penulis" class="form-control"
                                    value="{{ old('penulis', $book->penulis) }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Penerbit</label>

                                <input type="text" name="penerbit" class="form-control"
                                    value="{{ old('penerbit', $book->penerbit) }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Tahun Terbit</label>

                                <input type="number" name="tahun_terbit" class="form-control"
                                    value="{{ old('tahun_terbit', $book->tahun_terbit) }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Harga</label>

                                <input type="number" name="harga" class="form-control"
                                    value="{{ old('harga', $book->harga) }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Stok</label>

                                <input type="number" name="stok" class="form-control"
                                    value="{{ old('stok', $book->stok) }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Gambar Saat Ini</label>
                                <br>

                                @if($book->gambar)
                                <img src="{{ asset('storage/'.$book->gambar) }}" width="150" class="img-thumbnail mb-2">
                                @else
                                <p class="text-muted">Belum ada gambar.</p>
                                @endif
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Ganti Gambar</label>

                                <input type="file" name="gambar" class="form-control" accept="image/*">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Deskripsi</label>

                                <textarea name="deskripsi" class="form-control"
                                    rows="4">{{ old('deskripsi', $book->deskripsi) }}</textarea>
                            </div>

                            <button type="submit" class="btn btn-success">
                                Update Buku
                            </button>

                            <a href="{{ route('books.index') }}" class="btn btn-secondary">
                                Kembali
                            </a>


                        </form>

                </div>

            </div>

        </div>

</body>

</html>