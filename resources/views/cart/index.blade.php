<!DOCTYPE html>
<html>
<head>
    <title>Keranjang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <h2>Keranjang Belanja</h2>

    @if($carts->count())

        <table class="table table-bordered mt-3">

            <tr>
                <th>Buku</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
                <th>Aksi</th>
            </tr>

            @foreach($carts as $cart)

            <tr>
                <td>{{ $cart->book->judul }}</td>
                <td>{{ $cart->jumlah }}</td>
                <td>
                    Rp {{ number_format($cart->subtotal,0,',','.') }}
                </td>
                <td>
                    <form action="{{ route('cart.destroy',$cart->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger btn-sm">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>

            @endforeach

        </table>

    @else

        <div class="alert alert-info">
            Keranjang kosong
        </div>

    @endif

</div>

</body>
</html>