@extends('layouts.app')

@section('title', 'Keranjang Belanja' ) @section('content') <div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold mb-1">
                Keranjang Belanja
            </h2>

            <p class="text-muted mb-0">
                Periksa buku yang ingin kamu beli.
            </p>

        </div>

        <a href="{{ route('books.customer') }}" class="btn btn-outline-primary">
            ← Lanjut Belanja
        </a>

    </div>


    @if(session('success'))

    <div class="alert alert-success">
        {{ session('success') }}
    </div>

    @endif


    @if(session('error'))

    <div class="alert alert-danger">
        {{ session('error') }}
    </div>

    @endif


    @if($carts->count() > 0)

    <div class="row g-4">


        {{-- DAFTAR KERANJANG --}}

        <div class="col-lg-8">

            <div class="card shadow-sm border-0">

                <div class="card-header bg-white py-3">

                    <h5 class="mb-0 fw-bold">
                        Isi Keranjang
                    </h5>

                </div>


                <div class="card-body">

                    @foreach($carts as $cart)

                    <div class="row align-items-center border-bottom py-4">


                        {{-- GAMBAR --}}

                        <div class="col-md-2">

                            @if($cart->book && $cart->book->gambar)

                            <img src="{{ asset('storage/' . $cart->book->gambar) }}" alt="{{ $cart->book->judul }}"
                                class="img-fluid rounded" style="
                                                height:100px;
                                                width:75px;
                                                object-fit:cover;
                                            ">

                            @else

                            <div class="bg-light rounded d-flex align-items-center justify-content-center" style="
                                                height:100px;
                                                width:75px;
                                            ">
                                📖
                            </div>

                            @endif

                        </div>


                        {{-- INFORMASI --}}

                        <div class="col-md-4">

                            <h5 class="fw-bold mb-1">
                                {{ $cart->book->judul }}
                            </h5>

                            <p class="text-muted mb-1">
                                {{ $cart->book->penulis }}
                            </p>

                            <p class="text-primary fw-semibold mb-0">
                                Rp{{ number_format($cart->book->harga, 0, ',', '.') }}
                            </p>

                        </div>


                        {{-- JUMLAH --}}

                        <div class="col-md-3">

                            <form action="{{ route('cart.update', $cart->id) }}" method="POST">

                                @csrf
                                @method('PATCH')

                                <label class="form-label small text-muted">
                                    Jumlah
                                </label>

                                <div class="input-group">

                                    <input type="number" name="jumlah" value="{{ $cart->jumlah }}" min="1"
                                        max="{{ $cart->book->stok }}" class="form-control" required>

                                    <button type="submit" class="btn btn-outline-primary">
                                        Update
                                    </button>

                                </div>

                                <small class="text-muted">
                                    Stok tersedia:
                                    {{ $cart->book->stok }}
                                </small>

                            </form>

                        </div>


                        {{-- SUBTOTAL --}}

                        <div class="col-md-3 text-md-end">

                            <div class="fw-bold mb-2">

                                Rp{{ number_format($cart->subtotal, 0, ',', '.') }}

                            </div>


                            <form action="{{ route('cart.destroy', $cart->id) }}" method="POST">

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-sm btn-outline-danger"
                                    onclick="return confirm('Hapus buku ini dari keranjang?')">
                                    Hapus
                                </button>

                            </form>

                        </div>

                    </div>

                    @endforeach

                </div>

            </div>

        </div>


        {{-- RINGKASAN --}}

        <div class="col-lg-4">

            <div class="card shadow-sm border-0">

                <div class="card-header bg-white py-3">

                    <h5 class="mb-0 fw-bold">
                        Ringkasan Belanja
                    </h5>

                </div>


                <div class="card-body">

                    <div class="d-flex justify-content-between mb-3">

                        <span>
                            Total Item
                        </span>

                        <span class="fw-semibold">
                            {{ $carts->sum('jumlah') }}
                        </span>

                    </div>


                    <hr>


                    <div class="d-flex justify-content-between align-items-center mb-4">

                        <span class="fw-bold">
                            Total
                        </span>

                        <span class="fw-bold text-primary fs-5">
                            Rp{{ number_format($total, 0, ',', '.') }}
                        </span>

                    </div>


                    <a href="{{ route('checkout') }}" class="btn btn-primary w-100">
                        Lanjut ke Checkout
                    </a>

                </div>

            </div>

        </div>

    </div>

    @else

    <div class="card shadow-sm border-0">

        <div class="card-body text-center py-5">

            <div style="font-size:60px;">
                🛒
            </div>

            <h4 class="fw-bold mt-3">
                Keranjang Masih Kosong
            </h4>

            <p class="text-muted">
                Belum ada buku yang kamu masukkan ke keranjang.
            </p>

            <a href="{{ route('books.customer') }}" class="btn btn-primary">
                Mulai Belanja
            </a>

        </div>

    </div>

    @endif

</div>

=======
@section('title','Keranjang Belanja')


@section('content')


<div class="container mt-5">


    <div class="card shadow border-0 rounded-4">


        <div class="card-header bg-primary text-white">

            <h3 class="mb-0">

                🛒 Keranjang Belanja

            </h3>

        </div>




        <div class="card-body">



            @if(empty($cart) || count($cart) == 0)



            <div class="text-center p-5">


                <h4 class="text-muted">

                    Keranjang masih kosong

                </h4>



                <p>

                    Silahkan pilih buku terlebih dahulu.

                </p>




                <a href="{{ route('books.customer') }}" class="btn btn-primary btn-lg">


                    📚 Pilih Buku


                </a>



            </div>




            @else




            <div class="table-responsive">


                <table class="table table-bordered align-middle">


                    <thead class="table-dark">


                        <tr>


                            <th>
                                Buku
                            </th>


                            <th>
                                Harga
                            </th>


                            <th>
                                Jumlah
                            </th>


                            <th>
                                Subtotal
                            </th>


                            <th>
                                Aksi
                            </th>


                        </tr>


                    </thead>



                    <tbody>



                        @php

                        $total = 0;

                        @endphp




                        @foreach($cart as $id => $item)



                        @php

                        $subtotal = $item['harga'] * $item['jumlah'];

                        $total += $subtotal;

                        @endphp




                        <tr>


                            <td>


                                <strong>

                                    {{ $item['judul'] }}

                                </strong>


                            </td>




                            <td>

                                Rp {{ number_format($item['harga'],0,',','.') }}

                            </td>




                            <td>

                                {{ $item['jumlah'] }}

                            </td>




                            <td>

                                Rp {{ number_format($subtotal,0,',','.') }}

                            </td>




                            <td>


                                <form action="{{ route('cart.remove',$id) }}" method="POST">


                                    @csrf

                                    @method('DELETE')



                                    <button class="btn btn-danger btn-sm">

                                        Hapus

                                    </button>


                                </form>


                            </td>



                        </tr>




                        @endforeach



                    </tbody>


                </table>


            </div>






            <div class="d-flex justify-content-between align-items-center mt-4">





                <a href="{{ route('books.customer') }}" class="btn btn-primary">


                    📚 Tambah Buku Lagi


                </a>







                <div class="text-end">


                    <h4>

                        Total :

                        <span class="text-success">

                            Rp {{ number_format($total,0,',','.') }}

                        </span>


                    </h4>





                    <a href="{{ route('payment.index') }}" class="btn btn-success btn-lg">


                        💳 Lanjut Payment


                    </a>



                </div>



            </div>




            @endif




        </div>



    </div>


</div>



@endsection