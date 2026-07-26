@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-body">

            <h2 class="mb-3">
                Dashboard Admin
            </h2>

            <p>
                Selamat datang, {{ Auth::user()->name }}
            </p>


            <div class="row mt-4">

                <div class="col-md-4">

                    <div class="card bg-primary text-white">
                        <div class="card-body">

                            <h5>Total User</h5>

                            <h2>
                                {{ $totalUser ?? 0 }}
                            </h2>

                        </div>
                    </div>

                </div>


                <div class="col-md-4">

                    <div class="card bg-success text-white">
                        <div class="card-body">

                            <h5>Kelola Buku</h5>

                            <a href="{{ route('books.index') }}"
                               class="btn btn-light">

                                Lihat Buku

                            </a>

                        </div>
                    </div>

                </div>

            </div>


            <form action="{{ route('logout') }}" method="POST" class="mt-4">

                @csrf

                <button class="btn btn-danger">
                    Logout
                </button>

            </form>


        </div>

    </div>

</div>

@endsection