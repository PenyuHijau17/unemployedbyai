<!DOCTYPE html>
<html>
<head>
    <title>Keranjang Belanja</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body class="bg-light">

<div class="container py-5">

    <div class="card shadow">

        <div class="card-header bg-primary text-white">

            <h3 class="mb-0">
                <i class="bi bi-cart-fill"></i>
                Keranjang Belanja
            </h3>

        </div>

        <div class="card-body">

            @if(session('success'))

                <div class="alert alert-success">

                    {{ session('success') }}

                </div>

            @endif


            @if($carts->count())

                <table class="table table-bordered table-hover align-middle">

                    <thead class="table-dark">

                        <tr>

                            <th>No</th>

                            <th>Judul Buku</th>

                            <th>Harga</th>

                            <th>Jumlah</th>

                            <th>Subtotal</th>

                            <th width="120">
                                Aksi
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @php
                            $total = 0;
                        @endphp

                        @foreach($carts as $cart)

                        @php
                            $total += $cart->subtotal;
                        @endphp

                        <tr>

                            <td>
                                {{ $loop->iteration }}
                            </td>

                            <td>

                                {{ $cart->book->judul }}

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

                                    <button
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Hapus buku dari keranjang?')">

                                        <i class="bi bi-trash"></i>

                                    </button>

                                </form>

                            </td>

                        </tr>

                        @endforeach

                    </tbody>

                    <tfoot>

                        <tr>

                            <th colspan="4" class="text-end">

                                Total

                            </th>

                            <th>

                                Rp {{ number_format($total,0,',','.') }}

                            </th>

                            <th></th>

                        </tr>

                    </tfoot>

                </table>

                <div class="d-flex justify-content-between mt-4">

                    <a href="{{ route('books.index') }}"
                       class="btn btn-secondary">

                        <i class="bi bi-arrow-left"></i>

                        Lanjut Belanja

                    </a>

                    <a href="{{ route('payment.index') }}"
                       class="btn btn-success">

                        <i class="bi bi-credit-card"></i>

                        Lanjut ke Pembayaran

                    </a>

                </div>

            @else

                <div class="alert alert-info text-center">

                    <h5>

                        <i class="bi bi-cart-x"></i>

                        Keranjang masih kosong

                    </h5>

                    <a href="{{ route('books.index') }}"
                       class="btn btn-primary mt-2">

                        Pilih Buku

                    </a>

                </div>

            @endif

        </div>

    </div>

</div>

</body>
</html>