@extends('layouts.app')

@section('title', '419 - Session Expired | Ocean Delight')

@section('content')
<div class="container" style="padding-top: 5rem; padding-bottom: 5rem; text-align: center;">
    <div style="font-size: 5rem; font-family: var(--font-heading); color: var(--color-warning); line-height: 1;">419</div>
    <h1 style="font-family: var(--font-heading); font-size: 2rem; color: var(--color-ocean-dark); margin-top: 1rem; margin-bottom: 0.5rem;">
        Session Expired
    </h1>
    <p style="color: var(--color-text-muted); margin-bottom: 2rem;">
        Your security token has expired. Please refresh the page and submit again.
    </p>
    <a href="{{ url()->previous() }}" class="btn btn-ocean">Go Back & Try Again</a>
</div>
@endsection
