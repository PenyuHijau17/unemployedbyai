@extends('layouts.auth')

@section('title','Login')

@section('content')

<div class="row justify-content-center mt-5">

    <div class="col-md-5">

        <div class="card shadow">

            <div class="card-header bg-primary text-white text-center">
                <h3>
                    📚 Login Toko Buku
                </h3>
            </div>


            <div class="card-body">


                @if($errors->any())

                    <div class="alert alert-danger">
                        {{ $errors->first() }}
                    </div>

                @endif


                <form action="{{ route('login') }}" method="POST">

                    @csrf


                    <div class="mb-3">

                        <label>Email</label>

                        <input 
                            type="email"
                            name="email"
                            class="form-control"
                            required>

                    </div>


                    <div class="mb-3">

                        <label>Password</label>

                        <input 
                            type="password"
                            name="password"
                            class="form-control"
                            required>

                    </div>


                    <button class="btn btn-primary w-100">
                        Login
                    </button>


                </form>


                <div class="text-center mt-3">

                    Belum punya akun?

                    <a href="{{ route('register') }}">
                        Register
                    </a>

                </div>


            </div>

        </div>

    </div>

</div>


@endsection