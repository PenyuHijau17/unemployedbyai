@extends('admin.layouts.app')

@section('title', 'Edit User')

@section('content')

<div class="container mt-4 fade-up">

    <div class="page-header d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2>Edit User</h2>
            <p class="text-muted mb-0">Perbarui informasi pengguna.</p>
        </div>

        <a href="{{ route('users.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="form-card">

        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input
                    type="text"
                    name="name"
                    class="form-control"
                    value="{{ old('name', $user->name) }}"
                    placeholder="Masukkan nama lengkap"
                    required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input
                    type="email"
                    name="email"
                    class="form-control"
                    value="{{ old('email', $user->email) }}"
                    placeholder="Masukkan email"
                    required>
            </div>

            <div class="mb-3">
                <label class="form-label">Password <small class="text-muted">(Opsional)</small></label>
                <input
                    type="password"
                    name="password"
                    class="form-control"
                    placeholder="Kosongkan jika tidak ingin mengubah password">
            </div>

            <div class="mb-4">
                <label class="form-label">Role</label>
                <select name="role" class="form-select" required>
                    <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>
                        Admin
                    </option>
                    <option value="customer" {{ old('role', $user->role) == 'customer' ? 'selected' : '' }}>
                        Customer
                    </option>
                </select>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-modern">
                    <i class="bi bi-check-circle"></i> Update User
                </button>

                <a href="{{ route('users.index') }}" class="btn btn-outline-secondary">
                    Batal
                </a>
            </div>

        </form>

    </div>

</div>

@endsection