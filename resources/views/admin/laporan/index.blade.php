@extends('admin.layouts.app')

@section('title', 'Laporan Penjualan')

@section('content')

<div class="container mt-4 fade-up">

    <div class="page-header d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2>Laporan Penjualan</h2>
            <p class="text-muted mb-0">
                Rekap seluruh transaksi yang telah dilakukan.
            </p>
        </div>

    </div>

    <div class="table-card">

        <div class="table-responsive">

            <table class="table modern-table align-middle mb-0">

                <thead>

                    <tr>
                        <th>ID Pesanan</th>
                        <th>User</th>
                        <th>Tanggal</th>
                        <th>Total</th>
                    </tr>

                </thead>

                <tbody>

                @forelse($orders as $order)

                    <tr>

                        <td>#{{ $order->id }}</td>

                        <td>{{ $order->user->name }}</td>

                        <td>{{ $order->tanggal }}</td>

                        <td>
                            Rp {{ number_format($order->total,0,',','.') }}
                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="4" class="text-center py-5 text-muted">

                            <i class="bi bi-receipt fs-1 d-block mb-2"></i>

                            Belum ada laporan penjualan.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection