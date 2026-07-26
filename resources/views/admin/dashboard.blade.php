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