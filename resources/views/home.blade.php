<!DOCTYPE html>
<html>
<head>
    <title>Home</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2>Home Customer</h2>

    @auth

        <p>Selamat datang, {{ Auth::user()->name }}</p>

        <form action="{{ route('logout') }}" method="POST">

            @csrf

            <button class="btn btn-danger">
                Logout
            </button>

        </form>

    @else

        <a href="/login" class="btn btn-primary">
            Login
        </a>

    @endauth

</div>

</body>
</html>