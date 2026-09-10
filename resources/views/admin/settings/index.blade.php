@extends('layouts.admin')

@section('title', 'Website & Delivery Settings - Admin Ocean Delight')

@section('content')

<div style="margin-bottom: 1.5rem;">
    <h1 style="font-family: var(--font-heading); font-size: 1.85rem; color: var(--color-ocean-dark);">
        Website & Delivery Settings
    </h1>
    <p style="color: var(--color-text-muted); font-size: 0.9rem;">
        Configure Karachi delivery fees, minimum order thresholds, supported delivery localities, and contact information
    </p>
</div>

<div class="card-box" style="max-width: 750px;">
    <form action="{{ route('admin.settings.update') }}" method="POST">
        @csrf

        <h3 style="font-family: var(--font-heading); font-size: 1.2rem; color: var(--color-ocean-blue); margin-bottom: 1rem; border-bottom: 1px solid var(--color-border); padding-bottom: 0.5rem;">
            1. Karachi Delivery Settings
        </h3>

        <div style="grid-template-columns: 1fr 1fr; gap: 1rem; display: grid;">
            <div class="form-group">
                <label class="form-label">Delivery Fee (PKR) *</label>
                <input type="number" step="0.01" name="delivery_fee" class="form-control" value="{{ old('delivery_fee', $settings['delivery_fee'] ?? 250) }}" required>
            </div>

            <div class="form-group">
                <label class="form-label">Minimum Order Amount (PKR) *</label>
                <input type="number" step="0.01" name="min_order_amount" class="form-control" value="{{ old('min_order_amount', $settings['min_order_amount'] ?? 1000) }}" required>
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">Supported Karachi Areas / Localities (Comma separated) *</label>
            <textarea name="supported_areas" rows="3" class="form-control" required>{{ old('supported_areas', $settings['supported_areas'] ?? 'DHA, Clifton, Gulshan-e-Iqbal, PECHS, North Nazimabad, Saddar, Bahria Town, Korangi, Malir, Federal B Area, Defence View, Tariq Road, SMCHS, Bath Island') }}</textarea>
            <div style="font-size: 0.75rem; color: var(--color-text-muted); margin-top: 0.25rem;">
                These areas appear in the checkout locality select dropdown for customers.
            </div>
        </div>

        <h3 style="font-family: var(--font-heading); font-size: 1.2rem; color: var(--color-ocean-blue); margin-top: 2rem; margin-bottom: 1rem; border-bottom: 1px solid var(--color-border); padding-bottom: 0.5rem;">
            2. Store Contact Details
        </h3>

        <div style="grid-template-columns: 1fr 1fr; gap: 1rem; display: grid;">
            <div class="form-group">
                <label class="form-label">Support Phone Number *</label>
                <input type="text" name="contact_phone" class="form-control" value="{{ old('contact_phone', $settings['contact_phone'] ?? '+92 300 8282363') }}" required>
            </div>

            <div class="form-group">
                <label class="form-label">Support Email Address *</label>
                <input type="email" name="contact_email" class="form-control" value="{{ old('contact_email', $settings['contact_email'] ?? 'support@oceandelight.pk') }}" required>
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">Karachi Office / Fishery Address *</label>
            <input type="text" name="contact_address" class="form-control" value="{{ old('contact_address', $settings['contact_address'] ?? 'Dockyard Road, Near Fishery Wharf, Karachi, Pakistan') }}" required>
        </div>

        <div style="margin-top: 2rem;">
            <button type="submit" class="btn btn-sand" style="padding: 0.85rem 2rem;">
                Save Settings
            </button>
        </div>
    </form>
</div>

@endsection
