<!--
 Layout utama dashboard
 UI oleh : Putri Nabila
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inventory Skincare</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        /* =======================
           GLOBAL BACKGROUND
        ======================= */
        body {
            background: linear-gradient(120deg, #ffe6f0, #fff);
            font-family: 'Segoe UI', sans-serif;
        }

        /* =======================
           SIDEBAR
        ======================= */
        .sidebar {
            width: 230px;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            background-color: #f8d7e3;
            padding: 20px;
            overflow-y: auto;
            animation: slideIn 0.7s ease;
        }

        @keyframes slideIn {
            from { transform: translateX(-100%); }
            to { transform: translateX(0); }
        }

        .sidebar a {
            color: #4a4a4a;
            font-weight: 500;
            border-radius: 12px;
            padding: 10px 15px;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: 0.3s ease;
        }

        .sidebar a:hover {
            background-color: #ffb6d5;
            color: white;
            transform: translateX(6px);
        }

        .sidebar .active {
            background-color: #ff85c2 !important;
            color: white !important;
        }

        /* =======================
           CONTENT
        ======================= */
        .content-area {
            margin-left: 230px;
            padding: 24px;
            animation: fadeUp 0.8s ease;
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* =======================
           CARD ANIMATION
        ======================= */
        .card {
            border-radius: 16px;
            transition: 0.3s ease;
        }

        .card:hover {
            transform: translateY(-6px) scale(1.02);
            box-shadow: 0 15px 30px rgba(255,105,180,0.25);
        }

        /* =======================
           ICON ANIMATION
        ======================= */
        .icon-bounce {
            animation: bounce 1.5s infinite;
        }

        @keyframes bounce {
            0%,100% { transform: translateY(0); }
            50% { transform: translateY(-6px); }
        }

        /* =======================
           LOGO EFFECT
        ======================= */
        .logo-img {
            transition: 0.4s ease;
        }

        .logo-img:hover {
            transform: rotate(-6deg) scale(1.05);
        }
    </style>
</head>

<body>

<!-- =======================
     SIDEBAR
======================= -->
<div class="sidebar">

    <!-- LOGO -->
    <div class="text-center mb-4">
        <img src="{{ asset('images/logo.jpeg') }}"
             class="logo-img"
             alt="Logo"
             style="width: 85px; height:85px; border-radius: 50%;
                    object-fit:cover; border:3px solid white;">

        <h5 class="mt-3 fw-semibold text-dark">
            Inventory Skincare
        </h5>
    </div>

    <ul class="nav flex-column">

        <li class="nav-item mb-2">
            <a href="{{ route('dashboard') }}"
               class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="bi bi-speedometer2 icon-bounce"></i> Dashboard
            </a>
        </li>

        <li class="nav-item mb-2">
            <a href="{{ route('products.index') }}"
               class="nav-link {{ request()->routeIs('products.*') ? 'active' : '' }}">
                <i class="bi bi-bag"></i> Produk
            </a>
        </li>

        <li class="nav-item mb-2">
            <a href="{{ route('categories.index') }}"
               class="nav-link {{ request()->routeIs('categories.*') ? 'active' : '' }}">
                <i class="bi bi-tags"></i> Kategori
            </a>
        </li>

        @if(auth()->user()->role === 'admin')
        <li class="nav-item mb-2">
            <a href="{{ route('reports.stock') }}"
               class="nav-link {{ request()->routeIs('reports.*') ? 'active' : '' }}">
                <i class="bi bi-graph-up"></i> Laporan
            </a>
        </li>
        @endif

        <li class="nav-item mt-4">
            <a href="{{ route('profile.edit') }}"
               class="nav-link {{ request()->routeIs('profile.*') ? 'active' : '' }}">
                <i class="bi bi-person-circle"></i> Profil
            </a>
        </li>

    </ul>
</div>

<!-- =======================
     CONTENT AREA
======================= -->
<div class="content-area">

    <!-- TOP BAR -->
    <div class="d-flex justify-content-end align-items-center mb-4">
        <span class="me-3 fw-semibold">
            <i class="bi bi-heart-fill text-danger"></i>
            {{ auth()->user()->name }}
        </span>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="btn btn-outline-danger btn-sm">
                Logout
            </button>
        </form>
    </div>

    @yield('content')

</div>

</body>
</html>
