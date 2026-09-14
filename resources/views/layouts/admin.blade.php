<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Portal - Ocean Delight')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        @media (max-width: 600px) {
            .hide-mobile { display: none !important; }
        }
    </style>
    @yield('styles')
</head>
<body class="admin-body">

<div class="admin-layout">
    <!-- Backdrop Overlay for Mobile Drawer -->
    <div class="admin-overlay" id="adminOverlay"></div>

    <!-- Admin Responsive Sidebar -->
    <aside class="admin-sidebar" id="adminSidebar">
        <div class="admin-sidebar-header">
            <a href="{{ route('admin.dashboard') }}" class="admin-brand">
                Ocean <span>Delight</span>
            </a>
            <span class="admin-brand-tag">Admin</span>
        </div>

        <div class="admin-user-profile">
            <div class="admin-avatar">
                {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
            </div>
            <div class="admin-user-info">
                <div class="admin-user-name">{{ auth()->user()->name ?? 'Administrator' }}</div>
                <div class="admin-user-role">Super Admin</div>
            </div>
        </div>

        <nav class="admin-nav">
            <div class="admin-nav-label">Management</div>
            
            <a href="{{ route('admin.dashboard') }}" class="admin-nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <span class="nav-icon">📊</span> Dashboard
            </a>
            <a href="{{ route('admin.products.index') }}" class="admin-nav-item {{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
                <span class="nav-icon">🐟</span> Products Catalog
            </a>
            <a href="{{ route('admin.categories.index') }}" class="admin-nav-item {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                <span class="nav-icon">📁</span> Categories
            </a>
            <a href="{{ route('admin.orders.index') }}" class="admin-nav-item {{ request()->routeIs('admin.orders.*') ? 'active' : '' }}">
                <span class="nav-icon">📦</span> Orders
            </a>
            <a href="{{ route('admin.customers.index') }}" class="admin-nav-item {{ request()->routeIs('admin.customers.*') ? 'active' : '' }}">
                <span class="nav-icon">👥</span> Customers
            </a>
            <a href="{{ route('admin.messages.index') }}" class="admin-nav-item {{ request()->routeIs('admin.messages.*') ? 'active' : '' }}">
                <span class="nav-icon">💬</span> Contact Messages
            </a>
            <a href="{{ route('admin.settings.index') }}" class="admin-nav-item {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                <span class="nav-icon">⚙</span> Settings
            </a>

            <div class="admin-sidebar-footer">
                <a href="{{ route('home') }}" class="admin-nav-item" target="_blank">
                    <span class="nav-icon">🌐</span> Visit Storefront
                </a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="admin-nav-item" style="color: #F87171;">
                        <span class="nav-icon">🚪</span> Logout
                    </button>
                </form>
            </div>
        </nav>
    </aside>

    <!-- Main Body & Top Navigation Header -->
    <div class="admin-main-wrapper">
        <header class="admin-top-header">
            <div style="display: flex; align-items: center; gap: 0.85rem;">
                <button class="admin-sidebar-toggle" id="adminSidebarToggle" aria-label="Toggle Sidebar">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="3" y1="12" x2="21" y2="12"></line>
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <line x1="3" y1="18" x2="21" y2="18"></line>
                    </svg>
                </button>
                <h2 class="admin-header-title">@yield('page_title', 'Control Center')</h2>
            </div>

            <div class="admin-header-actions">
                <a href="{{ route('home') }}" class="btn btn-sm btn-outline-ocean" target="_blank">
                    <span>🌐</span> <span class="hide-mobile">Storefront</span>
                </a>
            </div>
        </header>

        <main class="admin-main-content">
            @if(session('success'))
                <div class="alert alert-success" style="margin-bottom: 1.5rem;">✓ {{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="alert alert-error" style="margin-bottom: 1.5rem;">✕ {{ session('error') }}</div>
            @endif
            @if(session('warning'))
                <div class="alert alert-warning" style="margin-bottom: 1.5rem;">⚠ {{ session('warning') }}</div>
            @endif

            @yield('content')
        </main>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const toggleBtn = document.getElementById('adminSidebarToggle');
        const sidebar = document.getElementById('adminSidebar');
        const overlay = document.getElementById('adminOverlay');

        function toggleSidebar() {
            sidebar.classList.toggle('active');
            overlay.classList.toggle('active');
        }

        if (toggleBtn) {
            toggleBtn.addEventListener('click', toggleSidebar);
        }

        if (overlay) {
            overlay.addEventListener('click', toggleSidebar);
        }
    });
</script>

@yield('scripts')
</body>
</html>
