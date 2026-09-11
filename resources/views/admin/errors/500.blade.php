@extends('layouts.app')

@section('title', '500 - Internal Server Error | Ocean Delight')

@section('content')
<div class="container" style="padding-top: 5rem; padding-bottom: 5rem; text-align: center;">
    <div style="font-size: 5rem; font-family: var(--font-heading); color: var(--color-ocean-dark); line-height: 1;">500</div>
    <h1 style="font-family: var(--font-heading); font-size: 2rem; color: var(--color-ocean-dark); margin-top: 1rem; margin-bottom: 0.5rem;">
        Server Error
    </h1>
    <p style="color: var(--color-text-muted); margin-bottom: 2rem;">
        Something went wrong on our server. Our Karachi technical team has been notified.
    </p>
    <a href="{{ route('home') }}" class="btn btn-ocean">Return to Homepage</a>
</div>
@endsection
