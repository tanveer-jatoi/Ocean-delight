<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>@yield('title', 'Ocean Delight - Fresh Seafood Delivered in Karachi')</title>
    <meta name="description" content="@yield('meta_description', 'Ocean Delight delivers 100% fresh, wild-caught seafood direct to your door in Karachi. Cash on Delivery available across DHA, Clifton, Gulshan & more.')">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph Metadata -->
    <meta property="og:title" content="@yield('title', 'Ocean Delight - Fresh Seafood Delivered in Karachi')">
    <meta property="og:description" content="@yield('meta_description', 'Fresh seafood delivery in Karachi. Cash on Delivery.')">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    
    @yield('styles')
</head>
<body>

    <!-- Top Announcement Bar -->
    <div class="top-bar">
        <div class="container top-bar-flex">
            <div>
                <strong>🚚 Delivery Scope:</strong> Serving <strong>Karachi</strong> only | Express Cold-Chain Delivery
            </div>
            <div>
                <span class="top-bar-badge">Cash on Delivery Only</span>
            </div>
        </div>
    </div>

    <!-- Navigation Header -->
    @include('components.navbar')

    <!-- Main Content Body -->
    <main>
        @if(session('success') || session('error') || session('warning') || session('info'))
            <div class="container" style="margin-top: 1rem;">
                @if(session('success'))
                    <div class="alert alert-success">✓ {{ session('success') }}</div>
                @endif
                @if(session('error'))
                    <div class="alert alert-error">✕ {{ session('error') }}</div>
                @endif
                @if(session('warning'))
                    <div class="alert alert-warning">⚠ {{ session('warning') }}</div>
                @endif
                @if(session('info'))
                    <div class="alert alert-info">ℹ {{ session('info') }}</div>
                @endif
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Footer -->
    @include('components.footer')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')
</body>
</html>
