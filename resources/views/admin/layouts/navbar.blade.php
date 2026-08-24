<nav class="top-navbar">

    {{-- =====================================================
        LEFT SIDE
    ====================================================== --}}
    <div class="navbar-left">

        {{-- Mobile Menu --}}
        <button
            type="button"
            class="mobile-sidebar-toggle"
            id="mobileSidebarToggle"
            aria-label="Buka menu"
        >
            <i class="bi bi-list"></i>
        </button>


        {{-- Page Heading --}}
        <div class="page-heading">

            <div class="page-title">
                @yield('title', 'Dashboard')
            </div>

            <small class="page-subtitle">
                Selamat datang kembali 👋
            </small>

        </div>

    </div>


    {{-- =====================================================
        RIGHT SIDE
    ====================================================== --}}
    <div class="navbar-right">

        {{-- =================================================
            USER PROFILE
        ================================================== --}}
        <div class="navbar-user-wrapper">

            <button
                type="button"
                class="navbar-user"
                id="profileButton"
            >

                {{-- Avatar --}}
                <div class="user-avatar">

                    {{ strtoupper(
                        substr(Auth::user()->name, 0, 1)
                    ) }}

                </div>


                {{-- User Info --}}
                <div class="user-info">

                    <div class="user-name">
                        {{ Auth::user()->name }}
                    </div>

                    <small class="user-role">
                        Administrator
                    </small>

                </div>


                {{-- Chevron --}}
                <i class="bi bi-chevron-down user-chevron"></i>

            </button>


            {{-- =================================================
                PROFILE DROPDOWN
            ================================================== --}}
            <div
                class="navbar-dropdown profile-dropdown"
                id="profileDropdown"
            >

                {{-- Profile Header --}}
                <div class="profile-dropdown-header">

                    <div class="user-avatar large">

                        {{ strtoupper(
                            substr(Auth::user()->name, 0, 1)
                        ) }}

                    </div>


                    <div>

                        <strong>
                            {{ Auth::user()->name }}
                        </strong>

                        <small>
                            Administrator
                        </small>

                    </div>

                </div>


                <div class="dropdown-divider"></div>


                {{-- Profile --}}
                <a
                    href="#"
                    class="dropdown-item"
                >

                    <i class="bi bi-person"></i>

                    <span>
                        Profil
                    </span>

                </a>


                {{-- Settings --}}
                <a
                    href="#"
                    class="dropdown-item"
                >

                    <i class="bi bi-gear"></i>

                    <span>
                        Pengaturan
                    </span>

                </a>


                <div class="dropdown-divider"></div>


                {{-- Logout --}}
                <form
                    action="{{ route('logout') }}"
                    method="POST"
                >

                    @csrf

                    <button
                        type="submit"
                        class="dropdown-item dropdown-logout"
                    >

                        <i class="bi bi-box-arrow-right"></i>

                        <span>
                            Logout
                        </span>

                    </button>

                </form>

            </div>

        </div>

    </div>

</nav>