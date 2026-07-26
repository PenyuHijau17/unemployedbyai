@extends('admin.layouts.app')

@section('title', 'Dashboard Admin')

@section('content')

<h2>Dashboard Admin</h2>

<div class="row">

    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                Total Buku
                <h3>0</h3>
            </div>
        </div>
    </div>

   <div class="col-md-3">
    <div class="card">
        <div class="card-body">
            <h5>Total User</h5>
            <h3>{{ $totalUser }}</h3>
        </div>
    </div>
   </div>

    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                Total Pesanan
                <h3>0</h3>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                Pendapatan
                <h3>Rp0</h3>
            </div>
        </div>
    </div>

</div>

@endsection