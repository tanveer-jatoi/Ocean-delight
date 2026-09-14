@extends('layouts.admin')

@section('title', 'Website & Delivery Settings - Admin Ocean Delight')
@section('page_title', 'Store & Delivery Settings')

@section('content')

<div class="admin-card" style="max-width: 800px;">
    <div class="admin-card-header">
        <div>
            <h3 class="admin-card-title">Delivery & Contact Configuration</h3>
            <p style="color: var(--color-text-muted); font-size: 0.85rem; margin-top: 0.25rem;">Configure Karachi delivery fees, minimum order threshold, delivery zones, and customer support channels</p>
        </div>
    </div>

    <form action="{{ route('admin.settings.update') }}" method="POST">
        @csrf

        <h4 style="font-family: var(--font-heading); font-size: 1.1rem; color: var(--color-ocean-blue); margin-bottom: 1rem; border-bottom: 1px solid var(--color-border); padding-bottom: 0.5rem;">
            1. Karachi Delivery Parameters
        </h4>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 1.25rem; margin-bottom: 1.25rem;">
            <div class="form-group">
                <label class="form-label" style="font-weight: 600; font-size: 0.85rem;">Delivery Fee (PKR) *</label>
                <input type="number" step="0.01" name="delivery_fee" class="form-control" value="{{ old('delivery_fee', $settings['delivery_fee'] ?? 250) }}" required>
            </div>

            <div class="form-group">
                <label class="form-label" style="font-weight: 600; font-size: 0.85rem;">Minimum Order Amount (PKR) *</label>
                <input type="number" step="0.01" name="min_order_amount" class="form-control" value="{{ old('min_order_amount', $settings['min_order_amount'] ?? 1000) }}" required>
            </div>
        </div>

        <div class="form-group" style="margin-bottom: 1.75rem;">
            <label class="form-label" style="font-weight: 600; font-size: 0.85rem;">Supported Karachi Localities (Comma Separated) *</label>
            <textarea name="supported_areas" rows="3" class="form-control" required>{{ old('supported_areas', $settings['supported_areas'] ?? 'DHA, Clifton, Gulshan-e-Iqbal, PECHS, North Nazimabad, Saddar, Bahria Town, Korangi, Malir, Federal B Area, Defence View, Tariq Road, SMCHS, Bath Island') }}</textarea>
            <div style="font-size: 0.75rem; color: var(--color-text-muted); margin-top: 0.35rem;">
                These localities populate the checkout delivery area selector for customers.
            </div>
        </div>

        <h4 style="font-family: var(--font-heading); font-size: 1.1rem; color: var(--color-ocean-blue); margin-bottom: 1rem; border-bottom: 1px solid var(--color-border); padding-bottom: 0.5rem;">
            2. Customer Support & Contact Info
        </h4>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 1.25rem; margin-bottom: 1.25rem;">
            <div class="form-group">
                <label class="form-label" style="font-weight: 600; font-size: 0.85rem;">Support Phone Number *</label>
                <input type="text" name="contact_phone" class="form-control" value="{{ old('contact_phone', $settings['contact_phone'] ?? '+92 300 8282363') }}" required>
            </div>

            <div class="form-group">
                <label class="form-label" style="font-weight: 600; font-size: 0.85rem;">Support Email Address *</label>
                <input type="email" name="contact_email" class="form-control" value="{{ old('contact_email', $settings['contact_email'] ?? 'support@oceandelight.pk') }}" required>
            </div>
        </div>

        <div class="form-group" style="margin-bottom: 1.75rem;">
            <label class="form-label" style="font-weight: 600; font-size: 0.85rem;">Fishery / Office Address *</label>
            <input type="text" name="contact_address" class="form-control" value="{{ old('contact_address', $settings['contact_address'] ?? 'Dockyard Road, Near Fishery Wharf, Karachi, Pakistan') }}" required>
        </div>

        <div style="margin-top: 2rem;">
            <button type="submit" class="btn btn-sand" style="padding: 0.75rem 2rem;">
                💾 Save Configuration Settings
            </button>
        </div>
    </form>
</div>

@endsection
