<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">

        <a class="navbar-brand fw-bold" href="{{ route('home') }}">
            📚 Toko Buku
        </a>

        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav">

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
                    <a class="nav-link" href="{{ route('books.index') }}">
                        Daftar Buku
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link" href="#">
                        Kategori
                    </a>
                </li>


            </ul>


            <form class="d-flex me-3">

                <input
                    class="form-control me-2"
                    type="search"
                    placeholder="Cari buku">

                <button class="btn btn-light">
                    Cari
                </button>

            </form>


            @guest

                <a href="{{ route('login') }}"
                   class="btn btn-outline-light me-2">
                    Login
                </a>


                <a href="{{ route('register') }}"
                   class="btn btn-warning">
                    Register
                </a>

            @else

                <form action="{{ route('logout') }}"
                      method="POST">

                    @csrf

                    <button class="btn btn-danger">
                        Logout
                    </button>

                </form>

            @endguest


        </div>

    </div>
</nav>