<nav class="top-navbar">

    <div>

        <h4 class="page-title">
            @yield('title', 'Dashboard')
        </h4>

        <small class="page-subtitle">
            Selamat datang kembali 👋
        </small>

    </div>

    <div class="user-box">

        <div class="user-avatar">
            {{ strtoupper(substr(Auth::user()->name,0,1)) }}
        </div>

        <div>

            <div class="user-name">
                {{ Auth::user()->name }}
            </div>

            <small class="user-role">
                Administrator
            </small>

        </div>

    </div>

</nav>