@extends('layouts.app')

@section('title','Detail Pesanan')

@section('content')

<div class="container py-4">

    <div class="card shadow border-0 rounded-4">

        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center">

                <div>

                    <h3 class="fw-bold">

                        Detail Pesanan

                    </h3>

                    <small class="text-muted">

                        Invoice #{{ $order->id }}

                    </small>

                </div>

                <span class="badge bg-success">

                    {{ ucfirst($order->status) }}

                </span>

            </div>

            <hr>

            <p>

                <strong>Tanggal :</strong>

                {{ $order->tanggal }}

            </p>

            <p>

                <strong>Metode Pembayaran :</strong>

                {{ $order->metode }}

            </p>

            <p>

<strong>Alamat Pengiriman :</strong>

<br>

{{ $order->address->nama_penerima ?? '-' }}

<br>

{{ $order->address->alamat ?? '-' }}

<br>

{{ $order->address->kota ?? '-' }},
{{ $order->address->provinsi ?? '-' }}

</p>

            <div class="order-tracking mb-5">

    <h5 class="fw-bold mb-4">
        <i class="bi bi-truck"></i>
        Tracking Pesanan
    </h5>


    @php

        $steps = [
            'pending' => 'Pesanan Dibuat',
            'processing' => 'Sedang Diproses',
            'shipped' => 'Sedang Dikirim',
            'completed' => 'Selesai'
        ];

        $statuses = array_keys($steps);

        $current = array_search($order->status, $statuses);

    @endphp


    @foreach($steps as $key => $step)

        @php

            $index = array_search($key, $statuses);

        @endphp


        <div class="tracking-item">

            <div class="tracking-icon 
                {{ $index <= $current ? 'active' : '' }}">

                @if($index < $current)

                    <i class="bi bi-check-lg"></i>

                @elseif($index == $current)

                    <i class="bi bi-circle-fill"></i>

                @else

                    <i class="bi bi-circle"></i>

                @endif

            </div>


            <div class="tracking-text">

                <h6>

                    {{ $step }}

                </h6>


                @if($index <= $current)

                    <small class="text-success">
                        Selesai
                    </small>

                @else

                    <small class="text-muted">
                        Menunggu
                    </small>

                @endif


            </div>

        </div>


    @endforeach


</div>

            <hr>

            <h5>Daftar Buku</h5>

            @foreach($order->orderDetails as $detail)

                <div class="d-flex justify-content-between mb-3">

                    <div>

                        <strong>

                            {{ $detail->book->judul }}

                        </strong>

                        <br>

                        <small>

                            x{{ $detail->jumlah }}

                        </small>

                    </div>

                    <strong>

                        Rp {{ number_format($detail->subtotal,0,',','.') }}

                    </strong>

                </div>

            @endforeach

            <hr>

            <div class="text-end">

                <h4>

                    Total :

                    Rp {{ number_format($order->total,0,',','.') }}

                </h4>

            </div>

        </div>

    </div>

</div>

@endsection