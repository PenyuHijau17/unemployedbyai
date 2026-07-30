@extends('admin.layouts.app')

@section('title','Tambah User')

@section('content')

<div class="page-header fade-up">

    <div>

        <h2>Tambah User</h2>

        <p>Tambahkan akun pengguna baru ke dalam sistem.</p>

    </div>

    <a href="{{ route('users.index') }}" class="btn btn-light">

        <i class="bi bi-arrow-left"></i>

        Kembali

    </a>

</div>

@if ($errors->any())

<div class="alert alert-danger fade-up">

    <ul class="mb-0">

        @foreach ($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach

    </ul>

</div>

@endif

<div class="form-card fade-up">

<form action="{{ route('users.store') }}" method="POST">

    @csrf

    <div class="row">

        <div class="col-md-6">

            <div class="mb-4">

                <label class="form-label">

                    Nama Lengkap

                </label>

                <input
                    type="text"
                    name="name"
                    class="form-control"
                    value="{{ old('name') }}"
                    placeholder="Masukkan nama lengkap">

            </div>

        </div>

        <div class="col-md-6">

            <div class="mb-4">

                <label class="form-label">

                    Email

                </label>

                <input
                    type="email"
                    name="email"
                    class="form-control"
                    value="{{ old('email') }}"
                    placeholder="Masukkan email">

            </div>

        </div>

    </div>

    <div class="row">

        <div class="col-md-6">

            <div class="mb-4">

                <label class="form-label">

                    Password

                </label>

                <input
                    type="password"
                    name="password"
                    class="form-control"
                    placeholder="Masukkan password">

            </div>

        </div>

        <div class="col-md-6">

            <div class="mb-4">

                <label class="form-label">

                    Role

                </label>

                <select name="role" class="form-select">

                    <option value="admin">Admin</option>

                    <option value="customer">Customer</option>

                </select>

            </div>

        </div>

    </div>

    <div class="d-flex gap-2">

        <button class="btn btn-primary btn-modern">

            <i class="bi bi-check-circle-fill me-1"></i>

            Simpan User

        </button>

        <a href="{{ route('users.index') }}" class="btn btn-secondary">

            Batal

        </a>

    </div>

</form>

</div>

@endsection