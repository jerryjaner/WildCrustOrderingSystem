<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    protected $fillable = ['order_id', 'method', 'amount', 'status', 'transaction_id'];

    // Payment belongs to an order
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
