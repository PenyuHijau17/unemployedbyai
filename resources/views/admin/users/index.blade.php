@extends('admin.layouts.app')

@section('title','Data User')

@section('content')

@if(session('success'))

<div class="alert alert-success fade-up">
    {{ session('success') }}
</div>

@endif

<div class="page-header fade-up">

    <div>

        <h2>Data User</h2>

        <p>Kelola seluruh akun pengguna sistem.</p>

    </div>

    <a href="{{ route('users.create') }}" class="btn btn-primary btn-modern">

        <i class="bi bi-plus-circle-fill me-1"></i>

        Tambah User

    </a>

</div>

<div class="table-card fade-up">

    <div class="table-responsive">

        <table class="table table-modern align-middle">

            <thead>

                <tr>

                    <th width="70">No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th width="150">Role</th>
                    <th width="170">Aksi</th>

                </tr>

            </thead>

            <tbody>

            @forelse($users as $user)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>

                        <strong>{{ $user->name }}</strong>

                    </td>

                    <td>{{ $user->email }}</td>

                    <td>

                        @if($user->role == 'admin')

                            <span class="badge-role admin">

                                Admin

                            </span>

                        @else

                            <span class="badge-role customer">

                                Customer

                            </span>

                        @endif

                    </td>

                    <td>

                        <a href="{{ route('users.edit',$user->id) }}"
                           class="btn btn-warning btn-sm">

                            <i class="bi bi-pencil-square"></i>

                        </a>

                        <form
                            action="{{ route('users.destroy',$user->id) }}"
                            method="POST"
                            class="d-inline">

                            @csrf
                            @method('DELETE')

                            <button
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Hapus user ini?')">

                                <i class="bi bi-trash-fill"></i>

                            </button>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="5" class="text-center py-5">

                        Belum ada data user.

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection