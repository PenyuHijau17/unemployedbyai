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

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2>Dashboard Admin</h2>

    <p>Selamat datang, {{ Auth::user()->name }}</p>

    <form action="{{ route('logout') }}" method="POST">
        @csrf

        <button class="btn btn-danger">
            Logout
        </button>
    </form>

</div>

</body>
</html>
