@extends('layouts.admin')

@section('title', 'Contact Messages - Admin Ocean Delight')
@section('page_title', 'Contact Messages')

@section('content')

<div class="admin-card">
    <div class="admin-card-header">
        <div>
            <h3 class="admin-card-title">Customer Inquiries & Feedback</h3>
            <p style="color: var(--color-text-muted); font-size: 0.85rem; margin-top: 0.25rem;">Messages submitted via the contact form</p>
        </div>
    </div>

    @if($messages->count() > 0)
        <div class="admin-table-wrapper">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Sender Name</th>
                        <th>Contact Details</th>
                        <th>Subject</th>
                        <th>Message Content</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($messages as $msg)
                        <tr style="{{ !$msg->is_read ? 'background-color: #F0F9FF;' : '' }}">
                            <td style="font-size: 0.8rem; color: var(--color-text-muted); white-space: nowrap;">
                                {{ $msg->created_at->format('M d, Y h:i A') }}
                            </td>
                            <td><strong style="color: var(--color-ocean-dark);">{{ $msg->name }}</strong></td>
                            <td style="font-size: 0.85rem;">
                                <div>{{ $msg->email }}</div>
                                <div style="color: var(--color-text-muted); font-size: 0.75rem;">{{ $msg->phone }}</div>
                            </td>
                            <td><strong>{{ $msg->subject }}</strong></td>
                            <td style="font-size: 0.85rem; max-width: 320px; line-height: 1.4;">
                                {{ $msg->message }}
                            </td>
                            <td>
                                @if($msg->is_read)
                                    <span class="admin-badge secondary">Read</span>
                                @else
                                    <span class="admin-badge warning">New</span>
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
                                        <button type="submit" class="btn btn-sm btn-outline-ocean" style="color: var(--color-danger); border-color: var(--color-danger);">Delete</button>
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
