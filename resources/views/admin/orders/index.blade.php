@extends('admin.layouts.app')

@section('title', 'Daftar Pesanan')

@section('content')

<div class="admin-page orders-page">

    {{-- =====================================================
        PAGE HERO
    ====================================================== --}}
    <section class="crud-hero order-hero fade-up">

        <div class="crud-hero-content">

            <div class="crud-eyebrow">
                <span></span>
                ORDER MANAGEMENT
            </div>

            <h1>
                Pesanan Pelanggan
            </h1>

            <p>
                Pantau dan kelola seluruh transaksi pelanggan
                Pustaka Nusantara dari satu tempat.
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
        ORDER SUMMARY
    ====================================================== --}}
    <div class="order-summary-grid fade-up">

        <div class="order-summary-card">

            <div class="order-summary-icon">
                <i class="bi bi-receipt"></i>
            </div>

            <div>
                <span>Total Pesanan</span>
                <strong>{{ $orders->count() }}</strong>
            </div>

        </div>


        <div class="order-summary-card">

            <div class="order-summary-icon pending">
                <i class="bi bi-hourglass-split"></i>
            </div>

            <div>
                <span>Pending</span>

                <strong>
                    {{ $orders->where('status','pending')->count() }}
                </strong>

            </div>

        </div>


        <div class="order-summary-card">

            <div class="order-summary-icon process">
                <i class="bi bi-box-seam"></i>
            </div>

            <div>
                <span>Diproses</span>

                <strong>
                    {{ $orders->where('status','diproses')->count() }}
                </strong>

            </div>

        </div>


        <div class="order-summary-card">

            <div class="order-summary-icon complete">
                <i class="bi bi-check2-circle"></i>
            </div>

            <div>
                <span>Selesai</span>

                <strong>
                    {{ $orders->where('status','selesai')->count() }}
                </strong>

            </div>

        </div>

    </div>


    {{-- =====================================================
        DATA PANEL
    ====================================================== --}}
    <section class="data-panel fade-up">

        <div class="data-panel-header">

            <div>

                <span class="panel-eyebrow">
                    TRANSACTION DIRECTORY
                </span>

                <h3>
                    Semua Pesanan
                </h3>

            </div>

            <div class="panel-indicator">

                <span></span>

                Monitoring aktif

            </div>

        </div>


        <div class="table-responsive">

            <table class="admin-table order-table">

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
                            Total
                        </th>

                        <th>
                            Status
                        </th>

                        <th class="order-action">
                            Aksi
                        </th>

                    </tr>

                </thead>


                <tbody>

                @forelse($orders as $order)

                    <tr>

                        {{-- ORDER ID --}}
                        <td>

                            <div class="order-id">

                                <div class="order-icon">
                                    <i class="bi bi-receipt-cutoff"></i>
                                </div>

                                <div>

                                    <strong>
                                        #{{ $order->id }}
                                    </strong>

                                    <small>
                                        Transaction
                                    </small>

                                </div>

                            </div>

                        </td>


                        {{-- USER --}}
                        <td>

                            <div class="order-customer">

                                <div class="order-avatar">

                                    {{ strtoupper(
                                        substr($order->user->name ?? 'U', 0, 1)
                                    ) }}

                                </div>

                                <div>

                                    <strong>
                                        {{ $order->user->name ?? 'User' }}
                                    </strong>

                                    <small>
                                        Customer
                                    </small>

                                </div>

                            </div>

                        </td>


                        {{-- DATE --}}
                        <td>

                            <div class="order-date">

                                <i class="bi bi-calendar3"></i>

                                <span>
                                    {{ $order->tanggal }}
                                </span>

                            </div>

                        </td>


                        {{-- TOTAL --}}
                        <td>

                            <strong class="order-total">
                                Rp {{ number_format($order->total,0,',','.') }}
                            </strong>

                        </td>

                        {{-- STATUS --}}
<td>

    @if($order->status == 'pending')

        <span class="order-status status-pending">
            <span></span>
            <i class="bi bi-hourglass-split"></i>
            Pending
        </span>

    @elseif($order->status == 'diproses')

        <span class="order-status status-process">
            <span></span>
            <i class="bi bi-box-seam"></i>
            Diproses
        </span>

    @elseif($order->status == 'dikirim')

        <span class="order-status status-process">
            <span></span>
            <i class="bi bi-truck"></i>
            Dikirim
        </span>

    @elseif($order->status == 'selesai')

        <span class="order-status status-complete">
            <span></span>
            <i class="bi bi-check2-circle"></i>
            Selesai
        </span>

    @elseif($order->status == 'dibatalkan')

        <span class="order-status status-other">
            <span></span>
            <i class="bi bi-x-circle"></i>
            Dibatalkan
        </span>

    @else

        <span class="order-status status-other">
            <span></span>
            <i class="bi bi-question-circle"></i>
            {{ ucfirst($order->status) }}
        </span>

    @endif

</td>

                        {{-- ACTION --}}
                        <td>

                            <a
                                href="{{ route('orders.show',$order->id) }}"
                                class="order-detail-btn"
                            >

                                <i class="bi bi-arrow-up-right"></i>

                                Detail

                            </a>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td
                            colspan="6"
                            class="empty-table"
                        >

                            <div class="empty-state">

                                <div class="empty-state-icon">
                                    <i class="bi bi-receipt"></i>
                                </div>

                                <h4>
                                    Belum ada pesanan
                                </h4>

                                <p>
                                    Transaksi pelanggan akan muncul
                                    di halaman ini.
                                </p>

                            </div>

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </section>

</div>

@endsection