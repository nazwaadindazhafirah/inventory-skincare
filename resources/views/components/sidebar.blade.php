<!-- Sidebar navigation dibuat oleh: Putri Nabila -->

<div class="bg-dark text-white p-3 vh-100" style="width:220px;">
    <h5 class="mb-4">Inventory Skincare</h5>

    <ul class="nav flex-column">

        <!-- Dashboard -->
        <li class="nav-item mb-2">
            <a href="{{ route('dashboard') }}"
               class="nav-link text-white {{ request()->routeIs('dashboard') ? 'active bg-primary' : '' }}">
                <i class="bi bi-speedometer2"></i> Dashboard
            </a>
        </li>

        <!-- Produk -->
        <li class="nav-item mb-2">
            <a href="{{ route('products.index') }}"
               class="nav-link text-white {{ request()->routeIs('products.*') ? 'active bg-primary' : '' }}">
                <i class="bi bi-box-seam"></i> Produk
            </a>
        </li>

        <!-- Kategori -->
        <li class="nav-item mb-2">
            <a href="{{ route('categories.index') }}"
               class="nav-link text-white {{ request()->routeIs('categories.*') ? 'active bg-primary' : '' }}">
                <i class="bi bi-tags"></i> Kategori
            </a>
        </li>

        <!-- Hanya Admin Yang Bisa Melihat Menu Laporan -->
        @if(auth()->user()->role === 'admin')
            <li class="nav-item mb-2">
                <a href="{{ route('reports.stock') }}"
                   class="nav-link text-white {{ request()->routeIs('reports.*') ? 'active bg-primary' : '' }}">
                    <i class="bi bi-graph-up"></i> Laporan Stok
                </a>
            </li>
        @endif

        <!-- Profil -->
        <li class="nav-item mb-2">
            <a href="{{ route('profile.edit') }}"
               class="nav-link text-white {{ request()->routeIs('profile.*') ? 'active bg-primary' : '' }}">
                <i class="bi bi-person-circle"></i> Profil
            </a>
        </li>

        <!-- Logout -->
        <li class="nav-item mt-4">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger w-100">
                    <i class="bi bi-box-arrow-right"></i> Logout
                </button>
            </form>
        </li>

    </ul>
</div>
