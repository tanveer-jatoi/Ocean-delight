@extends('layouts.app')

@section('title', 'Contact Us - Ocean Delight Karachi')
@section('meta_description', 'Get in touch with Ocean Delight Karachi customer team for seafood inquiries, wholesale orders, or delivery support.')

@section('content')

<div class="container" style="padding-top: 2rem; padding-bottom: 4rem;">
    <!-- Breadcrumb -->
    <div style="margin-bottom: 1.5rem; font-size: 0.875rem; color: var(--color-text-muted);">
        <a href="{{ route('home') }}">Home</a> &nbsp;/&nbsp; <strong style="color: var(--color-ocean-dark);">Contact Us</strong>
    </div>

    <div class="checkout-grid">
        <!-- Contact Form -->
        <div class="card-box">
            <h1 class="section-title" style="font-size: 1.85rem; margin-bottom: 0.5rem;">Send Us a Message</h1>
            <p style="color: var(--color-text-muted); font-size: 0.9rem; margin-bottom: 1.5rem;">
                Have questions about seafood availability, custom cuts, or delivery timing in Karachi? Reach out to us.
            </p>

            <form action="{{ route('contact.submit') }}" method="POST">
                @csrf

                <div style="grid-template-columns: 1fr 1fr; gap: 1rem; display: grid;">
                    <div class="form-group">
                        <label for="name" class="form-label">Full Name *</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name', auth()->user()?->name) }}" required>
                        @error('name') <div style="color: var(--color-danger); font-size: 0.8rem;">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', auth()->user()?->phone) }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Email Address *</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email', auth()->user()?->email) }}" required>
                    @error('email') <div style="color: var(--color-danger); font-size: 0.8rem;">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="subject" class="form-label">Subject</label>
                    <input type="text" name="subject" id="subject" class="form-control" value="{{ old('subject') }}" placeholder="e.g. Seafood preparation request / Order inquiry">
                </div>

                <div class="form-group">
                    <label for="message" class="form-label">Your Message *</label>
                    <textarea name="message" id="message" rows="4" class="form-control" required placeholder="Type your message here...">{{ old('message') }}</textarea>
                    @error('message') <div style="color: var(--color-danger); font-size: 0.8rem;">{{ $message }}</div> @enderror
                </div>

                <button type="submit" class="btn btn-ocean" style="padding: 0.85rem 1.75rem;">
                    Submit Inquiry
                </button>
            </form>
        </div>

        <!-- Contact Info Card -->
        <div>
            <div class="card-box" style="position: sticky; top: 90px; background-color: var(--color-ocean-dark); color: white; border: none;">
                <h3 style="font-family: var(--font-heading); font-size: 1.35rem; color: white; margin-bottom: 1.25rem;">
                    Ocean Delight HQ
                </h3>

                <div style="display: flex; flex-direction: column; gap: 1.25rem; font-size: 0.95rem;">
                    <div>
                        <strong style="color: var(--color-sand-accent); display: block; font-size: 0.825rem; text-transform: uppercase;">Karachi Address</strong>
                        <p style="margin-top: 0.2rem; color: rgba(255,255,255,0.9);">
                            {{ $contactAddress }}
                        </p>
                    </div>

                    <div>
                        <strong style="color: var(--color-sand-accent); display: block; font-size: 0.825rem; text-transform: uppercase;">Direct Line</strong>
                        <p style="margin-top: 0.2rem; color: rgba(255,255,255,0.9);">
                            {{ $contactPhone }}
                        </p>
                    </div>

                    <div>
                        <strong style="color: var(--color-sand-accent); display: block; font-size: 0.825rem; text-transform: uppercase;">Support Email</strong>
                        <p style="margin-top: 0.2rem; color: rgba(255,255,255,0.9);">
                            {{ $contactEmail }}
                        </p>
                    </div>

                    <div>
                        <strong style="color: var(--color-sand-accent); display: block; font-size: 0.825rem; text-transform: uppercase;">Operation Hours</strong>
                        <p style="margin-top: 0.2rem; color: rgba(255,255,255,0.9);">
                            Monday &ndash; Sunday: 7:00 AM &ndash; 9:00 PM
                        </p>
                    </div>

                    <div style="border-top: 1px solid rgba(255,255,255,0.15); padding-top: 1rem; font-size: 0.85rem; color: var(--color-sand-light);">
                        🚚 Orders placed before 1:00 PM are delivered same evening across Karachi!
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
