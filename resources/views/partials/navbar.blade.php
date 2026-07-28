<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">

        <a class="navbar-brand fw-bold" href="{{ url('/') }}">
            📚 Toko Buku
        </a>

        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav"
                aria-controls="navbarNav"
                aria-expanded="false"
                aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse pt-3 pt-lg-0" id="navbarNav">

            <ul class="navbar-nav me-auto mb-3 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link active" href="{{ url('/') }}">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('books.index') }}">Daftar Buku</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Kategori</a>
                </li>

            </ul>

            <form action="{{ route('books.index') }}"
            method="GET"
            class="d-flex mt-3 mt-lg-0 me-lg-3">

          <input
              type="search"
              name="search"
              class="form-control form-control-sm"
              placeholder="Cari buku">

          <button class="btn btn-light btn-sm ms-2 px-3">
              Cari
          </button>

      </form>

      <div class="d-flex flex-column flex-lg-row gap-2 mt-3 mt-lg-0">

          <a href="{{ route('login') }}"
             class="btn btn-outline-light btn-sm">
              Login
          </a>

          <a href="{{ route('register') }}"
             class="btn btn-warning btn-sm">
              Register
          </a>

      </div>
            
            </div>

        </div>

    </div>
</nav>