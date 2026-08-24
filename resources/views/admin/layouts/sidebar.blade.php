<aside class="sidebar" id="adminSidebar">

    {{-- Sidebar Header --}}
    <div class="sidebar-header">

        <div class="sidebar-brand">
            <div class="sidebar-brand-icon">
                <i class="bi bi-book-half"></i>
            </div>

            <div class="sidebar-brand-text">
                <h4>Admin Panel</h4>
                <small>Pustaka Nusantara</small>
            </div>
        </div>

        {{-- Desktop Collapse --}}
        <button
            type="button"
            class="sidebar-toggle"
            id="sidebarToggle"
            aria-label="Collapse sidebar"
            title="Collapse sidebar"
        >
            <i class="bi bi-chevron-left"></i>
        </button>

    </div>


    {{-- Mobile Close --}}
    <button
        type="button"
        class="mobile-sidebar-close"
        id="mobileSidebarClose"
        aria-label="Tutup menu"
    >
        <i class="bi bi-x-lg"></i>
    </button>


    {{-- Menu --}}
    <div class="sidebar-menu">

        <div class="sidebar-section-label">
            MENU UTAMA
        </div>

        <a
            href="{{ route('admin.dashboard') }}"
            class="sidebar-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
            data-tooltip="Dashboard"
        >
            <i class="bi bi-grid-1x2-fill"></i>
            <span>Dashboard</span>
        </a>


        <a
            href="{{ route('categories.index') }}"
            class="sidebar-item {{ request()->routeIs('categories.*') ? 'active' : '' }}"
            data-tooltip="Kategori"
        >
            <i class="bi bi-tags-fill"></i>
            <span>Kategori</span>
        </a>


        <a
            href="{{ route('books.index') }}"
            class="sidebar-item {{ request()->routeIs('books.*') ? 'active' : '' }}"
            data-tooltip="Buku"
        >
            <i class="bi bi-book-fill"></i>
            <span>Buku</span>
        </a>


        <a
            href="{{ route('users.index') }}"
            class="sidebar-item {{ request()->routeIs('users.*') ? 'active' : '' }}"
            data-tooltip="User"
        >
            <i class="bi bi-people-fill"></i>
            <span>User</span>
        </a>


        <a
            href="{{ route('orders.index') }}"
            class="sidebar-item {{ request()->routeIs('orders.*') ? 'active' : '' }}"
            data-tooltip="Pesanan"
        >
            <i class="bi bi-cart-fill"></i>
            <span>Pesanan</span>
        </a>


        <a
            href="{{ route('reports.index') }}"
            class="sidebar-item {{ request()->routeIs('reports.*') ? 'active' : '' }}"
            data-tooltip="Laporan"
        >
            <i class="bi bi-bar-chart-fill"></i>
            <span>Laporan</span>
        </a>

    </div>


    {{-- Sidebar Footer --}}
    <div class="sidebar-footer">

        <div class="sidebar-footer-line"></div>

        <form
            action="{{ route('logout') }}"
            method="POST"
            data-loading
        >
            @csrf

            <button
                type="submit"
                class="logout-btn"
                data-tooltip="Logout"
            >
                <i class="bi bi-box-arrow-right"></i>
                <span>Logout</span>
            </button>

        </form>

    </div>

</aside>