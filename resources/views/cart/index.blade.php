<!DOCTYPE html>
<html>

<head>

    <title>Keranjang Buku</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>


<body class="bg-light">


<div class="container py-5">


    <div class="card shadow border-0">


        <div class="card-header bg-success text-white">

            <h3 class="mb-0">

                <i class="bi bi-cart-fill"></i>

                Keranjang Buku

            </h3>

        </div>



        <div class="card-body">


            @if($carts->count() > 0)


                <div class="table-responsive">


                    <table class="table table-bordered align-middle">


                        <thead class="table-success">


                            <tr>

                                <th>No</th>

                                <th>Judul Buku</th>

                                <th>Harga</th>

                                <th>Jumlah</th>

                                <th>Subtotal</th>

                                <th>Aksi</th>

                            </tr>


                        </thead>



                        <tbody>


                            @foreach($carts as $cart)


                            <tr>


                                <td>

                                    {{ $loop->iteration }}

                                </td>



                                <td>

                                    <strong>

                                        {{ $cart->book->judul }}

                                    </strong>

                                </td>



                                <td>

                                    Rp {{ number_format($cart->book->harga,0,',','.') }}

                                </td>



                                <td>

                                    {{ $cart->jumlah }}

                                </td>



                                <td>

                                    Rp {{ number_format($cart->subtotal,0,',','.') }}

                                </td>



                                <td>


                                    <form action="{{ route('cart.destroy',$cart->id) }}"
                                    method="POST">


                                        @csrf

                                        @method('DELETE')


                                        <button type="submit"
                                        class="btn btn-danger btn-sm">


                                            <i class="bi bi-trash"></i>

                                            Hapus


                                        </button>


                                    </form>


                                </td>


                            </tr>


                            @endforeach


                        </tbody>


                    </table>


                </div>



                <div class="d-flex justify-content-between">


                    <a href="{{ route('books.index') }}"
                    class="btn btn-secondary">


                        <i class="bi bi-arrow-left"></i>

                        Lanjut Belanja


                    </a>



                    <a href="#"
                    class="btn btn-primary">


                        <i class="bi bi-credit-card"></i>

                        Checkout


                    </a>


                </div>



            @else


                <div class="alert alert-warning text-center">


                    <i class="bi bi-cart-x"></i>

                    Keranjang masih kosong.


                </div>



                <div class="text-center">


                    <a href="{{ route('books.index') }}"
                    class="btn btn-primary">


                        Pilih Buku


                    </a>


                </div>


            @endif



        </div>


    </div>


</div>


</body>

</html>