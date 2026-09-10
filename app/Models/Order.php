<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_number',
        'user_id',
        'customer_name',
        'customer_email',
        'customer_phone',
        'delivery_area',
        'delivery_address',
        'order_notes',
        'subtotal',
        'delivery_fee',
        'grand_total',
        'payment_method',
        'order_status',
    ];

    protected $casts = [
        'subtotal' => 'decimal:2',
        'delivery_fee' => 'decimal:2',
        'grand_total' => 'decimal:2',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function getFormattedTotalAttribute()
    {
        return 'PKR ' . number_format($this->grand_total, 0);
    }

    public function getStatusBadgeClassAttribute()
    {
        return match ($this->order_status) {
            'Pending' => 'badge-pending',
            'Confirmed' => 'badge-confirmed',
            'Preparing' => 'badge-preparing',
            'Out for Delivery' => 'badge-delivery',
            'Delivered' => 'badge-delivered',
            'Cancelled' => 'badge-cancelled',
            default => 'badge-secondary',
        };
    }
}
