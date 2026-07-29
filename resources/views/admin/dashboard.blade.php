@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="welcome-card fade-up">

    <h2>Selamat Datang, {{ Auth::user()->name }} 👋</h2>

    <p>
        Kelola data toko buku dengan mudah melalui dashboard admin.
    </p>

</div>


<div class="row">

    <!-- Total Buku -->
    <div class="col-lg-3 col-md-6 mb-4">

        <div class="card stat-card">

            <div class="card-body">

                <div class="stat-content">

                    <small>Total Buku</small>

                    <h2>{{ $totalBook }}</h2>

                    <div class="stat-footer">
                        <i class="bi bi-book-fill"></i>
                        Seluruh buku
                    </div>

                </div>


                <div class="stat-icon">
                    <i class="bi bi-book-fill"></i>
                </div>


            </div>

        </div>

    </div>



    <!-- Total User -->
    <div class="col-lg-3 col-md-6 mb-4">

        <div class="card stat-card">

            <div class="card-body">

                <div class="stat-content">

                    <small>Total User</small>

                    <h2>{{ $totalUser }}</h2>

                    <div class="stat-footer">
                        <i class="bi bi-people-fill"></i>
                        Pengguna aktif
                    </div>

                </div>


                <div class="stat-icon">
                    <i class="bi bi-people-fill"></i>
                </div>


            </div>

        </div>

    </div>



    <!-- Total Pesanan -->
    <div class="col-lg-3 col-md-6 mb-4">

        <div class="card stat-card">

            <div class="card-body">

                <div class="stat-content">

                    <small>Total Pesanan</small>

                    <h2>{{ $totalOrder }}</h2>

                    <div class="stat-footer">
                        <i class="bi bi-cart-fill"></i>
                        Semua pesanan
                    </div>

                </div>


                <div class="stat-icon">
                    <i class="bi bi-cart-fill"></i>
                </div>


            </div>

        </div>

    </div>



    <!-- Pendapatan -->
    <div class="col-lg-3 col-md-6 mb-4">

        <div class="card stat-card">

            <div class="card-body">


                <div class="stat-content">

                    <small>Pendapatan</small>

                    <h2>
                        <span class="currency">Rp</span>
                        {{ number_format($totalIncome,0,',','.') }}
                    </h2>


                    <div class="stat-footer">

                        <i class="bi bi-cash-stack"></i>

                        Total pemasukan

                    </div>


                </div>



                <div class="stat-icon">

                    <i class="bi bi-cash-stack"></i>

                </div>



            </div>

        </div>

    </div>


</div>

@endsection