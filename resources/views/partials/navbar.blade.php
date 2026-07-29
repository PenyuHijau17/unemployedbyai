<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">

        <a class="navbar-brand fw-bold" href="{{ route('home') }}">
            📚 Toko Buku
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav me-auto">

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">
                        Home
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('books.customer') }}">
                        Daftar Buku
                    </a>
                </li>

            </ul>

            @auth

            <a href="{{ route('cart.index') }}" class="btn btn-outline-light me-2">
                Keranjang
            </a>

            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf

                <button type="submit" class="btn btn-warning">
                    Logout
                </button>
            </form>

            @else

            <a href="{{ route('login') }}" class="btn btn-outline-light me-2">
                Login
            </a>

            <a href="{{ route('register') }}" class="btn btn-warning">
                Register
            </a>

            @endauth

        </div>

    </div>
</nav>