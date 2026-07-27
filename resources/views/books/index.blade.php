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


        <div class="card-header bg-primary text-white">

            <h3 class="mb-0">
                <i class="bi bi-book"></i>
                Koleksi Buku
            </h3>

        </div>



        <div class="card-body">


            @if(session('success'))

                <div class="alert alert-success">

                    {{ session('success') }}

                </div>

            @endif



            <form action="{{ route('books.index') }}" method="GET" class="mb-4">

                <div class="input-group">

                    <input
                    type="text"
                    name="search"
                    class="form-control"
                    placeholder="Cari buku..."
                    value="{{ request('search') }}">


                    <button class="btn btn-primary">

                        <i class="bi bi-search"></i>
                        Cari

                    </button>

                </div>

            </form>



            <div class="row g-4">


            @forelse($books as $book)


                <div class="col-md-4 col-lg-3">


                    <div class="card shadow h-100">


                        @if($book->gambar)

                            <img
                            src="{{ asset('storage/'.$book->gambar) }}"
                            class="card-img-top"
                            style="height:300px;object-fit:cover;">


                        @else

                            <div class="text-center p-5 bg-secondary text-white">

                                No Image

                            </div>

                        @endif



                        <div class="card-body">


                            <h5 class="fw-bold">

                                {{ $book->judul }}

                            </h5>



                            <p class="text-muted mb-1">

                                {{ $book->penulis }}

                            </p>



                            <p>

                                {{ $book->category->nama_kategori ?? '-' }}

                            </p>



                            <h5 class="text-success">

                                Rp {{ number_format($book->harga,0,',','.') }}

                            </h5>



                            <a href="{{ route('books.show',$book->id) }}"
                               class="btn btn-primary w-100">

                                <i class="bi bi-cart"></i>

                                Pilih Buku

                            </a>



                        </div>


                    </div>


                </div>


            @empty


                <div class="text-center text-muted">

                    Belum ada buku.

                </div>


            @endforelse



            </div>


        </div>


    </div>


</div>


</body>
</html>