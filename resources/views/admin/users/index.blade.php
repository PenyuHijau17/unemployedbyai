@extends('admin.layouts.app')

@section('title', 'Data User')

@section('content')

<div class="admin-page users-page">

    {{-- PAGE HERO --}}
    <section class="crud-hero user-hero fade-up">

        <div class="crud-hero-content">

            <div class="crud-eyebrow">
                <span></span>
                USER MANAGEMENT
            </div>

            <h1>
                Pengguna Sistem
            </h1>

            <p>
                Kelola akun administrator dan customer
                yang terdaftar di Pustaka Nusantara.
            </p>

        </div>

        <div class="crud-hero-meta">

            <div class="hero-count">

                <strong>
                    {{ $users->count() }}
                </strong>

                <span>
                    pengguna
                </span>

            </div>

            <a
                href="{{ route('users.create') }}"
                class="crud-primary-btn"
            >
                <i class="bi bi-person-plus-fill"></i>
                Tambah User
            </a>

        </div>

    </section>


    {{-- SUCCESS --}}
    @if(session('success'))

        <div class="admin-alert admin-alert-success fade-up">

            <div class="admin-alert-icon">
                <i class="bi bi-check-lg"></i>
            </div>

            <div>

                <strong>
                    Berhasil
                </strong>

                <span>
                    {{ session('success') }}
                </span>

            </div>

            <button
                type="button"
                class="admin-alert-close"
                onclick="this.parentElement.remove()"
            >
                <i class="bi bi-x"></i>
            </button>

        </div>

    @endif


    {{-- USER SUMMARY --}}
    <div class="user-summary-grid fade-up">

        <div class="user-summary-card">

            <div class="user-summary-icon">
                <i class="bi bi-people-fill"></i>
            </div>

            <div>
                <span>Total Pengguna</span>
                <strong>{{ $users->count() }}</strong>
            </div>

        </div>


        <div class="user-summary-card">

            <div class="user-summary-icon admin">
                <i class="bi bi-shield-fill-check"></i>
            </div>

            <div>
                <span>Administrator</span>

                <strong>
                    {{ $users->where('role', 'admin')->count() }}
                </strong>

            </div>

        </div>


        <div class="user-summary-card">

            <div class="user-summary-icon customer">
                <i class="bi bi-person-fill"></i>
            </div>

            <div>
                <span>Customer</span>

                <strong>
                    {{ $users->where('role', 'customer')->count() }}
                </strong>

            </div>

        </div>

    </div>


    {{-- DATA PANEL --}}
    <section class="data-panel fade-up">

        <div class="data-panel-header">

            <div>

                <span class="panel-eyebrow">
                    ACCOUNT DIRECTORY
                </span>

                <h3>
                    Semua Pengguna
                </h3>

            </div>

            <div class="panel-indicator">

                <span></span>

                Sistem aktif

            </div>

        </div>


        <div class="table-responsive">

            <table class="admin-table user-table">

                <thead>

                    <tr>

                        <th class="user-number">
                            No
                        </th>

                        <th>
                            Pengguna
                        </th>

                        <th>
                            Email
                        </th>

                        <th>
                            Role
                        </th>

                        <th class="user-action">
                            Aksi
                        </th>

                    </tr>

                </thead>


                <tbody>

                @forelse($users as $user)

                    <tr>

                        {{-- NUMBER --}}
                        <td>

                            <span class="user-number-badge">
                                {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                            </span>

                        </td>


                        {{-- USER --}}
                        <td>

                            <div class="user-table-info">

                                <div class="user-table-avatar">

                                    {{ strtoupper(substr($user->name, 0, 1)) }}

                                </div>

                                <div class="user-table-name">

                                    <strong>
                                        {{ $user->name }}
                                    </strong>

                                    <small>
                                        ID #{{ $user->id }}
                                    </small>

                                </div>

                            </div>

                        </td>


                        {{-- EMAIL --}}
                        <td>

                            <span class="user-email">
                                <i class="bi bi-envelope"></i>
                                {{ $user->email }}
                            </span>

                        </td>


                        {{-- ROLE --}}
                        <td>

                            @if($user->role == 'admin')

                                <span class="user-role-pill role-admin">

                                    <span></span>

                                    <i class="bi bi-shield-fill-check"></i>

                                    Admin

                                </span>

                            @else

                                <span class="user-role-pill role-customer">

                                    <span></span>

                                    <i class="bi bi-person-fill"></i>

                                    Customer

                                </span>

                            @endif

                        </td>


                        {{-- ACTION --}}
                        <td>

                            <div class="table-actions">

                                <a
                                    href="{{ route('users.edit',$user->id) }}"
                                    class="table-action edit"
                                    title="Edit user"
                                >
                                    <i class="bi bi-pencil"></i>
                                </a>


                                <form
                                    action="{{ route('users.destroy',$user->id) }}"
                                    method="POST"
                                >

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="table-action delete"
                                        title="Hapus user"
                                        onclick="return confirm('Hapus user ini?')"
                                    >
                                        <i class="bi bi-trash3"></i>
                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td
                            colspan="5"
                            class="empty-table"
                        >

                            <div class="empty-state">

                                <div class="empty-state-icon">
                                    <i class="bi bi-people"></i>
                                </div>

                                <h4>
                                    Belum ada user
                                </h4>

                                <p>
                                    Belum terdapat akun pengguna
                                    di dalam sistem.
                                </p>

                                <a
                                    href="{{ route('users.create') }}"
                                    class="crud-primary-btn"
                                >
                                    <i class="bi bi-person-plus-fill"></i>
                                    Tambah User
                                </a>

                            </div>

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </section>

</div>

@endsection