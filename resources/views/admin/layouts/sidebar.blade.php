<div class="bg-dark text-white p-3" style="width:250px; min-height:100vh;">
    <h4>Menu Admin</h4>
    <hr>

    <ul class="nav flex-column">

        <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link text-white">
                Dashboard
            </a>
        </li>

        <li class="nav-item">
             <a href="{{ route('categories.index') }}" class="nav-link text-white">
              Kategori
             </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('users.index') }}" class="nav-link text-white">
                User
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('orders.index') }}" class="nav-link text-white">
                Pesanan
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('reports.index') }}" class="nav-link text-white">
                Laporan
            </a>
        </li>

    </ul>
</div>
