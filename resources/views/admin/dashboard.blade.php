@extends('admin.layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
<p>Selamat datang, {{ Auth::user()->name }}</p>

<div class="row mt-4">
    <div class="col-md-3">
        <div class="card">
            <div class="card-body text-center">
                <h5>Total Buku</h5>
                <h3>{{ $totalBook }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card">
            <div class="card-body text-center">
                <h5>Total User</h5>
                <h3>{{ $totalUser }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card">
            <div class="card-body text-center">
                <h5>Total Pesanan</h5>
                <h3>{{ $totalOrder }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card">
            <div class="card-body text-center">
                <h5>Pendapatan</h5>
                <h3>Rp {{ number_format($totalIncome,0,',','.') }}</h3>
            </div>
        </div>
    </div>
</div>
@endsection
