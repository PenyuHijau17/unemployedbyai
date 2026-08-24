@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="dashboard-page">

    {{-- =====================================================
        WELCOME
    ====================================================== --}}
    <section class="welcome-card fade-up">

        <div class="welcome-content">

            <div class="welcome-label">
                <span class="welcome-dot"></span>
                ADMINISTRATOR
            </div>

            <h1>
                Selamat datang,
                <span>{{ Auth::user()->name }}</span>
            </h1>

            <p>
                Kelola katalog, pengguna, pesanan, dan laporan
                Pustaka Nusantara dari satu tempat.
            </p>

        </div>

        <div class="welcome-visual">

            <div class="welcome-book book-one">
                <i class="bi bi-book"></i>
            </div>

            <div class="welcome-book book-two">
                <i class="bi bi-book-half"></i>
            </div>

            <div class="welcome-book book-three">
                <i class="bi bi-journal-bookmark-fill"></i>
            </div>

            <div class="welcome-orbit"></div>

        </div>

    </section>


    {{-- =====================================================
        STATISTICS
    ====================================================== --}}
    <section class="dashboard-stats">

        {{-- TOTAL BUKU --}}
        <article class="stat-card stat-book">

            <div class="stat-top">

                <div class="stat-label">
                    <span class="stat-index">01</span>
                    TOTAL BUKU
                </div>

                <div class="stat-icon">
                    <i class="bi bi-book-fill"></i>
                </div>

            </div>

            <div class="stat-main">

                <h2 data-counter="{{ $totalBook }}">
                    {{ $totalBook }}
                </h2>

                <span class="stat-description">
                    Koleksi buku tersedia
                </span>

            </div>

            <div class="stat-bottom">

                <span>
                    <i class="bi bi-arrow-up-right"></i>
                    Koleksi
                </span>

                <div class="stat-line">
                    <span></span>
                </div>

            </div>

        </article>


        {{-- TOTAL USER --}}
        <article class="stat-card stat-user">

            <div class="stat-top">

                <div class="stat-label">
                    <span class="stat-index">02</span>
                    TOTAL USER
                </div>

                <div class="stat-icon">
                    <i class="bi bi-people-fill"></i>
                </div>

            </div>

            <div class="stat-main">

                <h2 data-counter="{{ $totalUser }}">
                    {{ $totalUser }}
                </h2>

                <span class="stat-description">
                    Pengguna terdaftar
                </span>

            </div>

            <div class="stat-bottom">

                <span>
                    <i class="bi bi-person-check"></i>
                    Pengguna
                </span>

                <div class="stat-line">
                    <span></span>
                </div>

            </div>

        </article>


        {{-- TOTAL PESANAN --}}
        <article class="stat-card stat-order">

            <div class="stat-top">

                <div class="stat-label">
                    <span class="stat-index">03</span>
                    TOTAL PESANAN
                </div>

                <div class="stat-icon">
                    <i class="bi bi-cart-fill"></i>
                </div>

            </div>

            <div class="stat-main">

                <h2 data-counter="{{ $totalOrder }}">
                    {{ $totalOrder }}
                </h2>

                <span class="stat-description">
                    Pesanan masuk
                </span>

            </div>

            <div class="stat-bottom">

                <span>
                    <i class="bi bi-bag-check"></i>
                    Transaksi
                </span>

                <div class="stat-line">
                    <span></span>
                </div>

            </div>

        </article>


        {{-- PENDAPATAN --}}
        <article class="stat-card stat-income">

            <div class="stat-top">

                <div class="stat-label">
                    <span class="stat-index">04</span>
                    PENDAPATAN
                </div>

                <div class="stat-icon">
                    <i class="bi bi-cash-stack"></i>
                </div>

            </div>

            <div class="stat-main">

                <h2 class="income-number">

                    <span class="currency">Rp</span>

                    {{ number_format($totalIncome, 0, ',', '.') }}

                </h2>

                <span class="stat-description">
                    Total pemasukan
                </span>

            </div>

            <div class="stat-bottom">

                <span>
                    <i class="bi bi-graph-up-arrow"></i>
                    Pendapatan
                </span>

                <div class="stat-line">
                    <span></span>
                </div>

            </div>

        </article>

    </section>


    {{-- =====================================================
        DASHBOARD LOWER SECTION
    ====================================================== --}}
    <section class="dashboard-lower">

        <div class="dashboard-section-heading">

            <div>
                <span class="section-eyebrow">
                    OVERVIEW
                </span>

                <h3>
                    Ringkasan dashboard
                </h3>
            </div>

            <span class="section-status">
                <span></span>
                Sistem aktif
            </span>

        </div>


        <div class="dashboard-empty-panel">

            <div class="empty-panel-icon">
                <i class="bi bi-bar-chart-line"></i>
            </div>

            <div>

                <h4>
                    Data operasional
                </h4>

                <p>
                    Statistik lanjutan dan aktivitas toko
                    dapat ditampilkan di area ini.
                </p>

            </div>

        </div>

    </section>

</div>

@endsection