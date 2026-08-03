@extends('layouts.app')

@section('title', 'Akun Saya')

@section('content')

<div class="account-page">

    <div class="account-header">

        <div class="account-profile">

            <div class="profile-avatar">
                <i class="bi bi-person-fill"></i>
            </div>

            <div class="profile-info">

                <h2>{{ $user->name }}</h2>

                <p>
                    <i class="bi bi-envelope-fill"></i>
                    {{ $user->email }}
                </p>

                <span class="badge bg-success px-3 py-2">
                    Customer
                </span>

            </div>

        </div>

        <a href="{{ route('customer.account.edit') }}" class="btn btn-warning rounded-pill px-4">
            <i class="bi bi-pencil-square"></i>
            Edit Profil
        </a>

    </div>



    <div class="row mt-4">

        <div class="col-lg-4 mb-4">

            <div class="account-card">

                <h5>
                    <i class="bi bi-person-circle"></i>
                    Informasi Akun
                </h5>

                <hr>

                <p>
                    <strong>Nama</strong><br>
                    {{ $user->name }}
                </p>

                <p>
                    <strong>Email</strong><br>
                    {{ $user->email }}
                </p>

                <p>
                    <strong>Role</strong><br>

                    @if(Auth::user()->role=='admin')
                        Admin
                    @else
                        Customer
                    @endif

                </p>

            </div>

        </div>



        <div class="col-lg-8">

            <div class="row">

                <div class="col-md-3 mb-3">

                    <div class="status-card">

                        <i class="bi bi-hourglass-split"></i>

                        <h3>0</h3>

                        <p>Pending</p>

                    </div>

                </div>



                <div class="col-md-3 mb-3">

                    <div class="status-card">

                        <i class="bi bi-box-seam"></i>

                        <h3>0</h3>

                        <p>Diproses</p>

                    </div>

                </div>



                <div class="col-md-3 mb-3">

                    <div class="status-card">

                        <i class="bi bi-truck"></i>

                        <h3>0</h3>

                        <p>Dikirim</p>

                    </div>

                </div>



                <div class="col-md-3 mb-3">

                    <div class="status-card">

                        <i class="bi bi-check-circle-fill"></i>

                        <h3>0</h3>

                        <p>Selesai</p>

                    </div>

                </div>

            </div>



            <div class="account-card mt-3">

                <h5>

                    <i class="bi bi-box-seam"></i>

                    Aktivitas Akun

                </h5>

                <hr>

                <div class="list-group">

    <a href="{{ route('customer.orders.index') }}"
        class="list-group-item list-group-item-action">

        <i class="bi bi-box"></i>

        Pesanan Saya

    </a>


    <a href="{{ route('customer.address.index') }}"
        class="list-group-item list-group-item-action">

        <i class="bi bi-geo-alt"></i>

        Alamat

    </a>


    <a href="{{ route('customer.account.edit') }}"
        class="list-group-item list-group-item-action">

        <i class="bi bi-pencil"></i>

        Edit Profil

    </a>

</div>

            </div>

        </div>

    </div>

</div>

@endsection