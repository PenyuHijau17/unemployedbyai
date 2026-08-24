@extends('admin.layouts.app')

@section('title', 'Laporan Penjualan')

@section('content')

<div class="admin-page reports-page">

    {{-- =====================================================
        PAGE HERO
    ====================================================== --}}
    <section class="crud-hero report-hero fade-up">

        <div class="crud-hero-content">

            <div class="crud-eyebrow">
                <span></span>
                BUSINESS REPORT
            </div>

            <h1>
                Laporan Penjualan
            </h1>

            <p>
                Pantau riwayat transaksi dan performa penjualan
                Pustaka Nusantara secara terpusat.
            </p>

        </div>


        <div class="crud-hero-meta">

            <div class="hero-count">

                <strong>
                    {{ $orders->count() }}
                </strong>

                <span>
                    transaksi
                </span>

            </div>

        </div>

    </section>


    {{-- =====================================================
        REPORT SUMMARY
    ====================================================== --}}
    <div class="report-summary-grid fade-up">

        <div class="report-summary-card">

            <div class="report-summary-icon">
                <i class="bi bi-graph-up-arrow"></i>
            </div>

            <div>

                <span>Total Penjualan</span>

                <strong>
                    Rp {{ number_format($orders->sum('total'),0,',','.') }}
                </strong>

            </div>

        </div>


        <div class="report-summary-card">

            <div class="report-summary-icon gold">
                <i class="bi bi-receipt"></i>
            </div>

            <div>

                <span>Total Transaksi</span>

                <strong>
                    {{ $orders->count() }}
                </strong>

            </div>

        </div>


        <div class="report-summary-card">

            <div class="report-summary-icon">
                <i class="bi bi-calculator"></i>
            </div>

            <div>

                <span>Rata-rata Transaksi</span>

                <strong>

                    Rp
                    {{ number_format(
                        $orders->count()
                            ? $orders->sum('total') / $orders->count()
                            : 0,
                        0,
                        ',',
                        '.'
                    ) }}

                </strong>

            </div>

        </div>

    </div>


    {{-- =====================================================
        REPORT PANEL
    ====================================================== --}}
    <section class="data-panel report-panel fade-up">

        <div class="data-panel-header">

            <div>

                <span class="panel-eyebrow">
                    SALES HISTORY
                </span>

                <h3>
                    Riwayat Penjualan
                </h3>

            </div>


            <div class="panel-indicator">

                <span></span>

                Data terbaru

            </div>

        </div>


        <div class="table-responsive">

            <table class="admin-table report-table">

                <thead>

                    <tr>

                        <th>
                            Pesanan
                        </th>

                        <th>
                            Customer
                        </th>

                        <th>
                            Tanggal
                        </th>

                        <th>
                            Nilai Transaksi
                        </th>

                    </tr>

                </thead>


                <tbody>

                @forelse($orders as $order)

                    <tr>

                        {{-- ORDER --}}
                        <td>

                            <div class="report-order">

                                <div class="report-order-icon">
                                    <i class="bi bi-receipt-cutoff"></i>
                                </div>

                                <div>

                                    <strong>
                                        #{{ $order->id }}
                                    </strong>

                                    <small>
                                        Sales transaction
                                    </small>

                                </div>

                            </div>

                        </td>


                        {{-- USER --}}
                        <td>

                            <div class="report-user">

                                <div class="report-avatar">

                                    {{ strtoupper(
                                        substr($order->user->name ?? 'U', 0, 1)
                                    ) }}

                                </div>

                                <span>
                                    {{ $order->user->name ?? 'User' }}
                                </span>

                            </div>

                        </td>


                        {{-- DATE --}}
                        <td>

                            <div class="report-date">

                                <i class="bi bi-calendar3"></i>

                                {{ $order->tanggal }}

                            </div>

                        </td>


                        {{-- TOTAL --}}
                        <td>

                            <strong class="report-total">

                                Rp {{ number_format(
                                    $order->total,
                                    0,
                                    ',',
                                    '.'
                                ) }}

                            </strong>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td
                            colspan="4"
                            class="empty-table"
                        >

                            <div class="empty-state">

                                <div class="empty-state-icon">
                                    <i class="bi bi-bar-chart"></i>
                                </div>

                                <h4>
                                    Belum ada laporan
                                </h4>

                                <p>
                                    Data penjualan akan muncul
                                    setelah terdapat transaksi.
                                </p>

                            </div>

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </section>


    {{-- =====================================================
        REPORT FOOTER
    ====================================================== --}}
    <div class="report-footer fade-up">

        <div class="report-footer-icon">
            <i class="bi bi-shield-check"></i>
        </div>

        <div>

            <strong>
                Ringkasan penjualan
            </strong>

            <span>
                Data dihitung berdasarkan seluruh transaksi
                yang tersedia di sistem.
            </span>

        </div>

    </div>

</div>

@endsection