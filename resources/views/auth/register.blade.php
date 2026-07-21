<!DOCTYPE html>
<html>
<head>
    <title>Register</title>

    <style>
        body{
            font-family:Arial;
            background:#f5f5f5;
        }

        .card{
            width:400px;
            margin:50px auto;
            background:white;
            padding:20px;
            border-radius:10px;
            box-shadow:0 0 10px rgba(0,0,0,.1);
        }

        input{
            width:100%;
            padding:10px;
            margin-top:5px;
            margin-bottom:15px;
        }

        button{
            width:100%;
            padding:10px;
            background:#0d6efd;
            color:white;
            border:none;
            cursor:pointer;
        }

        .error{
            color:red;
            margin-bottom:10px;
        }
    </style>

</head>
<body>

<div class="card">

<h2>Daftar Akun</h2>

@if($errors->any())
<div class="error">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="/register" method="POST">

@csrf

<label>Nama</label>

<input
type="text"
name="name"
value="{{ old('name') }}"
>

<label>Email</label>

<input
type="email"
name="email"
value="{{ old('email') }}"
>

<label>Password</label>

<input
type="password"
name="password"
>

<label>Konfirmasi Password</label>

<input
type="password"
name="password_confirmation"
>

<button type="submit">
Daftar
</button>

</form>

</div>

</body>
</html>