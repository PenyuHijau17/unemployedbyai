@extends('admin.layouts.app')

@section('title', 'Detail Pesanan')

@section('content')

<div class="admin-page order-detail-page">

    {{-- =====================================================
        ORDER HERO
    ====================================================== --}}
    <section class="order-detail-hero fade-up">

        <div class="order-detail-heading">

            <a
                href="{{ route('orders.index') }}"
                class="back-link"
            >
                <i class="bi bi-arrow-left"></i>
                Kembali ke Pesanan
            </a>

            <div class="detail-eyebrow">
                ORDER DETAILS
            </div>

            <h1>
                Pesanan #{{ $order->id }}
            </h1>

            <p>
                Informasi lengkap transaksi pelanggan.
            </p>

        </div>


        {{-- STATUS HERO --}}
        <div class="detail-order-meta">

            <div class="detail-date">
                <i class="bi bi-calendar3"></i>
                {{ $order->tanggal }}
            </div>


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

        </div>

    </section>


    {{-- =====================================================
        CUSTOMER + ORDER INFO
    ====================================================== --}}
    <div class="detail-info-grid fade-up">


        {{-- CUSTOMER --}}
        <div class="detail-info-card">

            <div class="detail-card-heading">

                <div class="detail-card-icon">
                    <i class="bi bi-person-fill"></i>
                </div>

                <div>

                    <span>
                        CUSTOMER
                    </span>

                    <h3>
                        Informasi Pelanggan
                    </h3>

                </div>

            </div>


            <div class="customer-profile">

                <div class="customer-large-avatar">

                    {{ strtoupper(
                        substr($order->user->name ?? 'U', 0, 1)
                    ) }}

                </div>


                <div>

                    <strong>
                        {{ $order->user->name ?? 'User' }}
                    </strong>

                    <small>
                        {{ $order->user->email ?? '-' }}
                    </small>

                </div>

            </div>

        </div>


        {{-- ORDER INFORMATION --}}
        <div class="detail-info-card">

            <div class="detail-card-heading">

                <div class="detail-card-icon gold">
                    <i class="bi bi-receipt"></i>
                </div>

                <div>

                    <span>
                        TRANSACTION
                    </span>

                    <h3>
                        Informasi Pesanan
                    </h3>

                </div>

            </div>


            <div class="transaction-grid">


                <div>

                    <span>
                        ID Pesanan
                    </span>

                    <strong>
                        #{{ $order->id }}
                    </strong>

                </div>


                <div>

                    <span>
                        Metode
                    </span>

                    <strong>
                        {{ $order->metode ?? '-' }}
                    </strong>

                </div>


                <div>

                    <span>
                        Tanggal
                    </span>

                    <strong>
                        {{ $order->tanggal }}
                    </strong>

                </div>


                <div>

                    <span>
                        Total
                    </span>

                    <strong class="transaction-total">

                        Rp {{ number_format(
                            $order->total,
                            0,
                            ',',
                            '.'
                        ) }}

                    </strong>

                </div>

            </div>

        </div>

    </div>


    {{-- =====================================================
        ORDER ITEMS
    ====================================================== --}}
    <section class="detail-items-panel fade-up">


        <div class="data-panel-header">

            <div>

                <span class="panel-eyebrow">
                    ORDER ITEMS
                </span>

                <h3>
                    Buku yang Dipesan
                </h3>

            </div>


            <div class="item-count">

                <i class="bi bi-book"></i>

                {{ $order->orderDetails->count() }} item

            </div>

        </div>


        <div class="order-items-list">


            @forelse($order->orderDetails as $detail)


                <div class="order-item-row">


                    {{-- BOOK --}}
                    <div class="order-book-info">

                        <div class="order-book-icon">
                            <i class="bi bi-book-half"></i>
                        </div>


                        <div>

                            <strong>
                                {{ $detail->book->judul }}
                            </strong>

                            <small>
                                Buku Pustaka Nusantara
                            </small>

                        </div>

                    </div>


                    {{-- QUANTITY --}}
                    <div class="order-item-column">

                        <span>
                            Jumlah
                        </span>

                        <strong>
                            {{ $detail->jumlah }}x
                        </strong>

                    </div>


                    {{-- PRICE --}}
                    <div class="order-item-column">

                        <span>
                            Harga
                        </span>

                        <strong>

                            Rp {{ number_format(
                                $detail->harga,
                                0,
                                ',',
                                '.'
                            ) }}

                        </strong>

                    </div>


                    {{-- SUBTOTAL --}}
                    <div class="order-item-column subtotal">

                        <span>
                            Subtotal
                        </span>

                        <strong>

                            Rp {{ number_format(
                                $detail->subtotal,
                                0,
                                ',',
                                '.'
                            ) }}

                        </strong>

                    </div>

                </div>


            @empty


                <div class="detail-empty">

                    <i class="bi bi-book"></i>

                    <strong>
                        Tidak ada item
                    </strong>

                    <span>
                        Detail buku untuk pesanan ini belum tersedia.
                    </span>

                </div>


            @endforelse

        </div>


        {{-- TOTAL --}}
        <div class="order-total-section">

            <span>
                Total Pesanan
            </span>

            <strong>

                Rp {{ number_format(
                    $order->total,
                    0,
                    ',',
                    '.'
                ) }}

            </strong>

        </div>

    </section>


    {{-- =====================================================
        UPDATE STATUS
    ====================================================== --}}
    <section class="status-update-card fade-up">


        <div class="status-update-heading">

            <div class="detail-card-icon">
                <i class="bi bi-arrow-repeat"></i>
            </div>


            <div>

                <span>
                    ORDER CONTROL
                </span>

                <h3>
                    Perbarui Status
                </h3>

                <p>
                    Ubah status pesanan sesuai perkembangan transaksi.
                </p>

            </div>

        </div>


        <form
            action="{{ route('orders.updateStatus', $order->id) }}"
            method="POST"
            class="status-form"
        >

            @csrf
            @method('PUT')


            <div class="status-select-wrapper">

                <label for="status">
                    Status Pesanan
                </label>


                <div class="custom-select-wrapper">

                    <i class="bi bi-circle-fill"></i>


                    <select
                        name="status"
                        id="status"
                        class="custom-admin-select"
                    >

                        <option
                            value="pending"
                            {{ $order->status == 'pending' ? 'selected' : '' }}
                        >
                            Pending
                        </option>


                        <option
                            value="diproses"
                            {{ $order->status == 'diproses' ? 'selected' : '' }}
                        >
                            Diproses
                        </option>


                        <option
                            value="dikirim"
                            {{ $order->status == 'dikirim' ? 'selected' : '' }}
                        >
                            Dikirim
                        </option>


                        <option
                            value="selesai"
                            {{ $order->status == 'selesai' ? 'selected' : '' }}
                        >
                            Selesai
                        </option>


                        <option
                            value="dibatalkan"
                            {{ $order->status == 'dibatalkan' ? 'selected' : '' }}
                        >
                            Dibatalkan
                        </option>

                    </select>

                </div>

            </div>


            <button
                type="submit"
                class="status-update-btn"
            >

                <i class="bi bi-check2-circle"></i>

                Update Status

            </button>

        </form>

    </section>

</div>

@endsection