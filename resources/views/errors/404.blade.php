@extends('layouts.app')

@section('title', '404 - Page Not Found | Ocean Delight')

@section('content')
<div class="container" style="padding-top: 5rem; padding-bottom: 5rem; text-align: center;">
    <div style="font-size: 5rem; font-family: var(--font-heading); color: var(--color-ocean-blue); line-height: 1;">404</div>
    <h1 style="font-family: var(--font-heading); font-size: 2rem; color: var(--color-ocean-dark); margin-top: 1rem; margin-bottom: 0.5rem;">
        Seafood Page Not Found
    </h1>
    <p style="color: var(--color-text-muted); margin-bottom: 2rem;">
        The requested page could not be located on our Karachi seafood server.
    </p>
    <a href="{{ route('home') }}" class="btn btn-ocean">Return to Homepage</a>
</div>
@endsection
