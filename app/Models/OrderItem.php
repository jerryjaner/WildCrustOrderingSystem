<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model
{
    protected $fillable = [
        'order_id', 'product_id', 'product_name', 'product_price', 'quantity', 'price'
    ];

    public function order():BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    // optional: link to product if it still exists
    public function product():BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
