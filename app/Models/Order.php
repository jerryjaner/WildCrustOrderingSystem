<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    protected $fillable = ['user_id', 'delivery_address_id', 'total', 'status'];

    // Order belongs to a user
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Order belongs to a delivery address
    public function deliveryAddress(): BelongsTo
    {
        return $this->belongsTo(DeliveryAddress::class);
    }

    // Order has many order items
    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    // Order has one payment
    public function payment(): HasOne
    {
        return $this->hasOne(Payment::class);
    }
}

