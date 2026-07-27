@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <h2 class="mb-4">
        Daftar Buku
    </h2>


    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif



    <div class="row">

        @foreach($books as $book)

        <div class="col-md-4 mb-4">

            <div class="card h-100 shadow">


                @if($book->gambar)

                    <img src="{{ asset('storage/'.$book->gambar) }}"
                         class="card-img-top"
                         style="height:250px;object-fit:cover;">

                @else

                    <div class="text-center p-5">
                        Tidak ada gambar
                    </div>

                @endif



                <div class="card-body">


                    <h5 class="card-title">
                        {{ $book->judul }}
                    </h5>


                    <p>
                        Penulis:
                        {{ $book->penulis }}
                    </p>


                    <p>
                        Harga:
                        Rp {{ number_format($book->harga,0,',','.') }}
                    </p>


                    <p>
                        Stok:
                        {{ $book->stok }}
                    </p>



                    {{-- Customer --}}
                    @auth

                    <form action="{{ route('cart.store') }}"
                          method="POST">

                        @csrf

                        <input type="hidden"
                               name="book_id"
                               value="{{ $book->id }}">


                        <button class="btn btn-primary w-100">

                            Pilih Buku

                        </button>

                    </form>


                    @else

                    <a href="{{ route('login') }}"
                       class="btn btn-primary w-100">

                        Login untuk membeli

                    </a>


                    @endauth



                </div>


            </div>

        </div>


        @endforeach


    </div>


</div>

@endsection