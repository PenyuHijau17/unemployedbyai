<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Toko Buku</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">

        <div class="row justify-content-center">

            <div class="col-md-6">

                <div class="card shadow">

                    <div class="card-header text-center">
                        <h3>Login</h3>
                    </div>

                    <div class="card-body">

                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif

                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <form action="{{ route('login') }}" method="POST">

                            @csrf

                            <div class="mb-3">
                                <label class="form-label">Email</label>

                                <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Password</label>

                                <input type="password" name="password" class="form-control" required>
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

                                        <input type="email" name="email" class="form-control" required>

                                    </div>


                                    <div class="mb-3">

                                        <label>Password</label>

                                        <input type="password" name="password" class="form-control" required>

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

</body>

</html>

</div>


@endsection