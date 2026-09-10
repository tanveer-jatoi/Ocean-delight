<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard - Ocean Delight')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        .admin-nav-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem 1rem;
            color: rgba(255, 255, 255, 0.8);
            border-radius: var(--radius-sm);
            font-weight: 500;
            margin-bottom: 0.25rem;
        }
        .admin-nav-item:hover, .admin-nav-item.active {
            background-color: var(--color-ocean-blue);
            color: white;
        }
    </style>
</head>
<body style="background-color: #F1F5F9;">

<div class="admin-layout">
    <!-- Admin Sidebar -->
    <aside class="admin-sidebar">
        <div style="margin-bottom: 2rem;">
            <a href="{{ route('home') }}" class="logo-brand" style="color: white; font-size: 1.35rem;">
                Ocean <span style="color: var(--color-sand-gold);">Delight</span>
            </a>
            <div style="font-size: 0.75rem; color: var(--color-sand-accent); margin-top: 0.2rem;">ADMIN PORTAL</div>
        </div>

        <nav>
            <a href="{{ route('admin.dashboard') }}" class="admin-nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                📊 Dashboard
            </a>
            <a href="{{ route('admin.products.index') }}" class="admin-nav-item {{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
                🐟 Products
            </a>
            <a href="{{ route('admin.categories.index') }}" class="admin-nav-item {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                📁 Categories
            </a>
            <a href="{{ route('admin.orders.index') }}" class="admin-nav-item {{ request()->routeIs('admin.orders.*') ? 'active' : '' }}">
                📦 Orders
            </a>
            <a href="{{ route('admin.customers.index') }}" class="admin-nav-item {{ request()->routeIs('admin.customers.*') ? 'active' : '' }}">
                👥 Customers
            </a>
            <a href="{{ route('admin.messages.index') }}" class="admin-nav-item {{ request()->routeIs('admin.messages.*') ? 'active' : '' }}">
                💬 Messages
            </a>
            <a href="{{ route('admin.settings.index') }}" class="admin-nav-item {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                ⚙ Settings
            </a>

            <div style="margin-top: 3rem; border-top: 1px solid rgba(255,255,255,0.1); padding-top: 1rem;">
                <a href="{{ route('home') }}" class="admin-nav-item" target="_blank">
                    🌐 View Website
                </a>
                <form action="{{ route('logout') }}" method="POST" style="margin-top: 0.5rem;">
                    @csrf
                    <button type="submit" class="admin-nav-item" style="width: 100%; border: none; background: none; text-align: left; cursor: pointer; color: #F87171;">
                        🚪 Logout
                    </button>
                </form>
            </div>
        </nav>
    </aside>

    <!-- Admin Main Body -->
    <main class="admin-main">
        @if(session('success'))
            <div class="alert alert-success">✓ {{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-error">✕ {{ session('error') }}</div>
        @endif

        @yield('content')
    </main>
</div>

</body>
</html>
