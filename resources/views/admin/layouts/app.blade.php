<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Admin Dashboard')</title>

    {{-- Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    {{-- Bootstrap --}}
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    {{-- Bootstrap Icons --}}
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.css"
    >

    {{-- Admin CSS --}}
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

    {{-- Admin JS --}}
    <script src="{{ asset('js/admin.js') }}" defer></script>

    @stack('styles')
</head>

<body>

    <div class="wrapper">

        {{-- Sidebar --}}
        @include('admin.layouts.sidebar')

        {{-- Main Content --}}
        <div class="main-content">

            {{-- Navbar --}}
            @include('admin.layouts.navbar')

            {{-- Page Content --}}
            <main class="content">
                @yield('content')
            </main>

        </div>

    </div>

    {{-- Global UI Elements --}}
    <div id="admin-toast-container"></div>

    <button
        type="button"
        id="backToTop"
        class="back-to-top"
        aria-label="Kembali ke atas"
    >
        <i class="bi bi-arrow-up"></i>
    </button>

    {{-- Bootstrap JS --}}
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js">
    </script>

    @stack('scripts')

</body>

</html>