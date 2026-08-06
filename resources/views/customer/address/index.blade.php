@extends('layouts.app')

@section('title','Alamat Saya')

@section('content')

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2 class="fw-bold">
            <i class="bi bi-geo-alt-fill"></i>
            Alamat Saya
        </h2>

        <a href="{{ route('customer.address.create') }}"
           class="btn btn-warning rounded-pill">

            <i class="bi bi-plus-circle"></i>
            Tambah Alamat

        </a>

    </div>


    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif



    <div class="row">

        @forelse($addresses as $address)

        <div class="col-md-6 mb-4">

            <div class="card shadow border-0 rounded-4">

                <div class="card-body p-4">


                    <div class="d-flex justify-content-between">

                        <h5 class="fw-bold">
                            {{ $address->nama_penerima }}
                        </h5>


                        @if($address->utama)

                        <span class="badge bg-warning">
                            Utama
                        </span>

                        @endif


                    </div>


                    <p class="mb-1">

                        <i class="bi bi-telephone"></i>

                        {{ $address->no_hp }}

                    </p>


                    <p>

                        <i class="bi bi-house"></i>

                        {{ $address->alamat }}

                        <br>

                        {{ $address->kota }},
                        {{ $address->provinsi }}

                        <br>

                        {{ $address->kode_pos }}

                    </p>


                    <div class="d-flex gap-2 mt-3">

                        @if(!$address->utama)

                        <form action="{{ route('customer.address.setPrimary', $address) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <button type="submit" class="btn btn-outline-warning btn-sm rounded-pill">
                                <i class="bi bi-check-circle"></i>
                                Jadikan Utama
                            </button>

                        </form>

                        @endif


                        <form action="{{ route('customer.address.destroy', $address) }}" method="POST"
                              onsubmit="return confirm('Hapus alamat ini?');">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-outline-danger btn-sm rounded-pill">
                                <i class="bi bi-trash"></i>
                                Hapus
                            </button>

                        </form>

                    </div>


                </div>

            </div>

        </div>


        @empty


        <div class="alert alert-info">

            Belum ada alamat.

        </div>


        @endforelse


    </div>


</div>

@endsection