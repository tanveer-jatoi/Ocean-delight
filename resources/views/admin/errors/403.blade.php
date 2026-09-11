@extends('layouts.app')

@section('title', '403 - Forbidden | Ocean Delight')

@section('content')
<div class="container" style="padding-top: 5rem; padding-bottom: 5rem; text-align: center;">
    <div style="font-size: 5rem; font-family: var(--font-heading); color: var(--color-danger); line-height: 1;">403</div>
    <h1 style="font-family: var(--font-heading); font-size: 2rem; color: var(--color-ocean-dark); margin-top: 1rem; margin-bottom: 0.5rem;">
        Access Restricted
    </h1>
    <p style="color: var(--color-text-muted); margin-bottom: 2rem;">
        You do not have administrative permission to view this resource.
    </p>
    <a href="{{ route('home') }}" class="btn btn-ocean">Return to Homepage</a>
</div>
@endsection
