@extends('layouts.app')

@section('title', 'Detail Pesanan')

@section('content')

<div class="container py-5">


    {{-- HEADER --}}

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold mb-1">
                Detail Pesanan #{{ $order->id }}
            </h2>

            <p class="text-muted mb-0">
                Pesanan dibuat pada
                {{ $order->tanggal->format('d/m/Y') }}
            </p>

        </div>

        <a href="{{ route('orders.index') }}" class="btn btn-outline-primary">
            ← Riwayat Pesanan
        </a>

    </div>


    {{-- SUCCESS --}}

    @if(session('success'))

    <div class="alert alert-success">
        {{ session('success') }}
    </div>

    @endif


    {{-- INFORMASI PESANAN --}}

    <div class="card shadow-sm border-0 mb-4">

        <div class="card-header bg-white">

            <h5 class="fw-bold mb-0">
                Informasi Pesanan
            </h5>

        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-4 mb-3">

                    <small class="text-muted">
                        Nomor Pesanan
                    </small>

                    <div class="fw-bold">
                        #{{ $order->id }}
                    </div>

                </div>


                <div class="col-md-4 mb-3">

                    <small class="text-muted">
                        Tanggal Pesanan
                    </small>

                    <div class="fw-bold">
                        {{ $order->tanggal->format('d/m/Y') }}
                    </div>

                </div>


                <div class="col-md-4 mb-3">

                    <small class="text-muted">
                        Status
                    </small>

                    <div>

                        @if($order->status === 'Menunggu')

                        <span class="badge bg-warning text-dark">
                            Menunggu
                        </span>

                        @elseif($order->status === 'Diproses')

                        <span class="badge bg-info">
                            Diproses
                        </span>

                        @elseif($order->status === 'Selesai')

                        <span class="badge bg-success">
                            Selesai
                        </span>

                        @elseif($order->status === 'Dibatalkan')

                        <span class="badge bg-danger">
                            Dibatalkan
                        </span>

                        @else

                        <span class="badge bg-secondary">
                            {{ $order->status }}
                        </span>

                        @endif

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- ITEM PESANAN --}}

    <div class="card shadow-sm border-0">

        <div class="card-header bg-white">

            <h5 class="fw-bold mb-0">
                Buku yang Dibeli
            </h5>

        </div>


        <div class="card-body">


            @forelse($order->orderDetails as $detail)

            <div class="row align-items-center border-bottom py-4">


                {{-- GAMBAR --}}

                <div class="col-md-2">

                    @if($detail->book && $detail->book->gambar)

                    <img src="{{ asset('storage/' . $detail->book->gambar) }}" alt="{{ $detail->book->judul }}"
                        class="rounded" style="
                                    width:75px;
                                    height:100px;
                                    object-fit:cover;
                                ">

                    @else

                    <div class="bg-light rounded d-flex align-items-center justify-content-center" style="
                                    width:75px;
                                    height:100px;
                                ">
                        📖
                    </div>

                    @endif

                </div>


                {{-- BUKU --}}

                <div class="col-md-4">

                    @if($detail->book)

                    <h5 class="fw-bold mb-1">
                        {{ $detail->book->judul }}
                    </h5>

                    <p class="text-muted mb-0">
                        {{ $detail->book->penulis }}
                    </p>

                    @else

                    <h5 class="text-danger">
                        Buku tidak ditemukan
                    </h5>

                    @endif

                </div>


                {{-- HARGA --}}

                <div class="col-md-2">

                    <small class="text-muted d-block">
                        Harga
                    </small>

                    Rp{{ number_format($detail->harga, 0, ',', '.') }}

                </div>


                {{-- JUMLAH --}}

                <div class="col-md-2">

                    <small class="text-muted d-block">
                        Jumlah
                    </small>

                    {{ $detail->jumlah }}

                </div>


                {{-- SUBTOTAL --}}

                <div class="col-md-2 text-end">

                    <small class="text-muted d-block">
                        Subtotal
                    </small>

                    <strong>
                        Rp{{ number_format($detail->subtotal, 0, ',', '.') }}
                    </strong>

                </div>

            </div>

            @empty

            <div class="text-center py-5">

                <div style="font-size: 50px;">
                    📦
                </div>

                <h5 class="fw-bold mt-3">
                    Detail pesanan kosong
                </h5>

                <p class="text-muted">
                    Tidak ada item yang tersimpan pada pesanan ini.
                </p>

            </div>

            @endforelse


            {{-- TOTAL --}}

            <div class="row justify-content-end mt-4">

                <div class="col-md-5">

                    <div class="d-flex justify-content-between mb-2">

                        <span>
                            Total Item
                        </span>

                        <strong>
                            {{ $order->orderDetails->sum('jumlah') }}
                        </strong>

                    </div>


                    <hr>


                    <div class="d-flex justify-content-between">

                        <span class="fw-bold fs-5">
                            Total Pembayaran
                        </span>

                        <span class="fw-bold text-primary fs-5">
                            Rp{{ number_format($order->total, 0, ',', '.') }}
                        </span>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- BUTTON --}}

    <div class="mt-4">

        <a href="{{ route('books.customer') }}" class="btn btn-primary">
            ← Belanja Lagi
        </a>

    </div>

</div>

@endsection