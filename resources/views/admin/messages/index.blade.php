@extends('layouts.admin')

@section('title', 'Contact Inquiries - Admin Ocean Delight')

@section('content')

<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
    <div>
        <h1 style="font-family: var(--font-heading); font-size: 1.85rem; color: var(--color-ocean-dark);">
            Contact Messages & Inquiries
        </h1>
        <p style="color: var(--color-text-muted); font-size: 0.9rem;">
            Customer inquiries submitted through the contact page
        </p>
    </div>
</div>

<div class="card-box">
    @if($messages->count() > 0)
        <div style="overflow-x: auto;">
            <table class="cart-table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Sender Name</th>
                        <th>Email / Phone</th>
                        <th>Subject</th>
                        <th>Message Content</th>
                        <th>Read</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($messages as $msg)
                        <tr style="{{ !$msg->is_read ? 'background-color: #F0F9FF;' : '' }}">
                            <td style="font-size: 0.8rem; color: var(--color-text-muted);">
                                {{ $msg->created_at->format('M d, Y h:i A') }}
                            </td>
                            <td><strong>{{ $msg->name }}</strong></td>
                            <td style="font-size: 0.85rem;">
                                {{ $msg->email }}<br>
                                <span style="color: var(--color-text-muted);">{{ $msg->phone }}</span>
                            </td>
                            <td><strong>{{ $msg->subject }}</strong></td>
                            <td style="font-size: 0.875rem; max-width: 300px; line-height: 1.4;">
                                {{ $msg->message }}
                            </td>
                            <td>
                                @if($msg->is_read)
                                    <span class="stock-badge stock-in">Read</span>
                                @else
                                    <span class="stock-badge stock-out">New</span>
                                @endif
                            </td>
                            <td>
                                <div style="display: flex; gap: 0.5rem;">
                                    @if(!$msg->is_read)
                                        <form action="{{ route('admin.messages.read', $msg->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-ocean">Mark Read</button>
                                        </form>
                                    @endif
                                    <form action="{{ route('admin.messages.destroy', $msg->id) }}" method="POST" onsubmit="return confirm('Delete message?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-white" style="color: var(--color-danger); border-color: var(--color-danger);">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div style="margin-top: 1.5rem;">
            {{ $messages->links() }}
        </div>
    @else
        <p style="text-align: center; color: var(--color-text-muted); padding: 3rem 0;">
            No contact messages received yet.
        </p>
    @endif
</div>

@endsection
