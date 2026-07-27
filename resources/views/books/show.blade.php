@extends('layouts.app')

@section('title', 'Detail Buku')


@section('content')


<div class="container mt-5">


    <div class="card shadow">


        <div class="card-header bg-primary text-white">

            <h3 class="mb-0">

                <i class="bi bi-book"></i>

                Detail Buku

            </h3>

        </div>



        <div class="card-body">


            <div class="row">


                <!-- GAMBAR -->

                <div class="col-md-4 text-center">


                    @if($book->gambar)


                        <img 
                            src="{{ asset('storage/'.$book->gambar) }}"
                            class="img-fluid rounded shadow"
                            style="max-height:400px"
                        >


                    @else


                        <div class="alert alert-secondary">

                            Tidak ada gambar

                        </div>


                    @endif


                </div>




                <!-- DETAIL -->

                <div class="col-md-8">


                    <h2 class="fw-bold">

                        {{ $book->judul }}

                    </h2>



                    <hr>



                    <p>

                        <strong>Kategori :</strong>

                        {{ $book->category->nama_kategori ?? '-' }}

                    </p>



                    <p>

                        <strong>Penulis :</strong>

                        {{ $book->penulis }}

                    </p>



                    <p>

                        <strong>Penerbit :</strong>

                        {{ $book->penerbit }}

                    </p>



                    <p>

                        <strong>Tahun Terbit :</strong>

                        {{ $book->tahun_terbit }}

                    </p>



                    <p>

                        <strong>Harga :</strong>


                        <span class="text-success fw-bold">

                            Rp {{ number_format($book->harga,0,',','.') }}

                        </span>


                    </p>




                    <p>

                        <strong>Stok :</strong>


                        @if($book->stok > 0)


                            <span class="badge bg-success">

                                {{ $book->stok }}

                            </span>


                        @else


                            <span class="badge bg-danger">

                                Habis

                            </span>


                        @endif


                    </p>




                    <p>

                        <strong>Deskripsi :</strong>

                    </p>


                    <p>

                        {{ $book->deskripsi ?? 'Tidak ada deskripsi' }}

                    </p>




                    <hr>



                    @if($book->stok > 0)


                    <!-- TAMBAH KERANJANG -->


                    <form action="{{ route('cart.add',$book->id) }}" method="POST">


                        @csrf



                        <div class="mb-3">


                            <label class="form-label fw-bold">

                                Jumlah Pembelian

                            </label>



                            <input 
                                type="number"
                                name="jumlah"
                                class="form-control"
                                value="1"
                                min="1"
                                max="{{ $book->stok }}"
                            >


                        </div>




                        <button class="btn btn-success">


                            <i class="bi bi-cart-plus"></i>


                            Tambahkan ke Keranjang


                        </button>



                    </form>


                    @else


                        <button class="btn btn-secondary" disabled>

                            Stok Habis

                        </button>


                    @endif



                    <br>



                    <a href="{{ route('books.index') }}" 
                       class="btn btn-dark mt-3">


                        <i class="bi bi-arrow-left"></i>

                        Kembali


                    </a>



                </div>


            </div>


        </div>


    </div>



</div>



@endsection