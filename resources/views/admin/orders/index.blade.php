@extends('admin.layouts.app')

@section('title', 'Daftar Pesanan')

@section('content')

<div class="container mt-4 fade-up">

    <div class="page-header d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2>Daftar Pesanan</h2>
            <p class="text-muted mb-0">Kelola seluruh pesanan pelanggan.</p>
        </div>
    </div>

    <div class="table-card">

        <div class="table-responsive">

            <table class="table modern-table align-middle mb-0">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Tanggal</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th width="120">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                @forelse($orders as $order)

                    <tr>

                        <td>#{{ $order->id }}</td>

                        <td>{{ $order->user->name }}</td>

                        <td>{{ $order->tanggal }}</td>

                        <td>Rp {{ number_format($order->total,0,',','.') }}</td>

                        <td>

                            @if($order->status=='pending')
                                <span class="badge badge-pending">Pending</span>
                            @elseif($order->status=='diproses')
                                <span class="badge badge-process">Diproses</span>
                            @elseif($order->status=='selesai')
                                <span class="badge badge-success-custom">Selesai</span>
                            @else
                                <span class="badge bg-secondary">{{ $order->status }}</span>
                            @endif

                        </td>

                        <td>

                            <a href="{{ route('orders.show',$order->id) }}" class="btn btn-modern btn-sm">
                                <i class="bi bi-eye"></i> Detail
                            </a>

                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="6" class="text-center py-5 text-muted">
                            Belum ada pesanan.
                        </td>
                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection