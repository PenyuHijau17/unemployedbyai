<div class="sidebar">

    <div class="sidebar-header">
        <h4>Admin Panel</h4>
        <small>UnemployedByAI</small>
    </div>

    <div class="sidebar-menu">

        <a href="{{ route('admin.dashboard') }}"
            class="sidebar-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="bi bi-grid-1x2-fill"></i>
            <span>Dashboard</span>
        </a>

        <a href="{{ route('categories.index') }}"
            class="sidebar-item {{ request()->routeIs('categories.*') ? 'active' : '' }}">
            <i class="bi bi-tags-fill"></i>
            <span>Kategori</span>
        </a>

        <a href="{{ route('books.index') }}"
            class="sidebar-item {{ request()->routeIs('books.*') ? 'active' : '' }}">
            <i class="bi bi-book-fill"></i>
            <span>Buku</span>
        </a>

        <a href="{{ route('users.index') }}"
            class="sidebar-item {{ request()->routeIs('users.*') ? 'active' : '' }}">
            <i class="bi bi-people-fill"></i>
            <span>User</span>
        </a>

        <a href="{{ route('orders.index') }}"
            class="sidebar-item {{ request()->routeIs('orders.*') ? 'active' : '' }}">
            <i class="bi bi-cart-fill"></i>
            <span>Pesanan</span>
        </a>

        <a href="{{ route('reports.index') }}"
            class="sidebar-item {{ request()->routeIs('reports.*') ? 'active' : '' }}">
            <i class="bi bi-bar-chart-fill"></i>
            <span>Laporan</span>
        </a>

    </div>

    <div class="sidebar-footer">

        <form action="{{ route('logout') }}" method="POST">
            @csrf

            <button type="submit" class="logout-btn">
                <i class="bi bi-box-arrow-right"></i>
                Logout
            </button>

        </form>

    </div>

</div>