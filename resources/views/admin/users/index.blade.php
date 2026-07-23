@extends('admin.layouts.app')

@section('title', 'Data User')

@section('content')

<div class="container mt-4">

    <h2>Data User</h2>

    <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">
    Tambah User
    </a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
            </tr>
        </thead>

        <tbody>

        @forelse ($users as $user)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role ?? '-' }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center">
                    Belum ada data user
                </td>
            </tr>
        @endforelse

        </tbody>

    </table>

</div>

@endsection