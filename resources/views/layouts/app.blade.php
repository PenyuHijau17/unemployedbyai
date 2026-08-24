<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Gaji Habis Buat Buku')</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.css"
    >

    <link
        rel="stylesheet"
        href="{{ asset('css/style.css') }}"
    >

    <style>

        html,
        body {
            width: 100%;
            min-height: 100%;
            margin: 0;
            padding: 0;
        }

        body {
            overflow-x: hidden;
        }

        main {
            width: 100%;
        }

        /*
        ==========================================================
        NAVBAR SCROLL SPACER
        ==========================================================
        */

        body.navbar-is-fixed {
            padding-top: 90px;
        }

        /*
        ==========================================================
        SMOOTH SCROLL
        ==========================================================
        */

        html {
            scroll-behavior: smooth;
        }

        /*
        ==========================================================
        REDUCE MOTION
        ==========================================================
        */

        @media (prefers-reduced-motion: reduce) {

            html {
                scroll-behavior: auto;
            }

            *,
            *::before,
            *::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
            }

        }

    </style>

    @stack('styles')

</head>

<body>

    @include('partials.navbar')

    <main class="container py-4">

        @yield('content')

    </main>

    @include('partials.footer')

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js">
    </script>

    <script src="{{ asset('js/script.js') }}"></script>

    @stack('scripts')

</body>

</html>