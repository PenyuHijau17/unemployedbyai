<!DOCTYPE html>
<html>

<head>

    <title>Pembayaran</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>


<body class="bg-light">


<div class="container py-5">


    <div class="card shadow-lg border-0">


        <div class="card-header bg-success text-white">

            <h3 class="mb-0">

                <i class="bi bi-credit-card-fill"></i>

                Pembayaran

            </h3>

        </div>



        <div class="card-body">


            <h5 class="mb-4">

                Detail Pesanan

            </h5>



            <div class="alert alert-info">

                Silahkan lakukan pembayaran untuk menyelesaikan pesanan.

            </div>



            <div class="card border-0 shadow-sm">


                <div class="card-body">


                    <h4>

                        Total Pembayaran

                    </h4>


                    <h2 class="text-success fw-bold">

                        Rp {{ number_format($total,0,',','.') }}

                    </h2>


                </div>


            </div>



            <form action="{{ route('payment.store') }}"
            method="POST"
            class="mt-4">

                @csrf


                <button type="submit"
                class="btn btn-success">

                    <i class="bi bi-check-circle"></i>

                    Bayar Sekarang

                </button>



                <a href="{{ route('books.index') }}"
                    class="btn btn-secondary">

                        <i class="bi bi-book"></i>

                        Lanjut Lihat Buku

                </a>


            </form>



        </div>


    </div>


</div>


</body>

</html>