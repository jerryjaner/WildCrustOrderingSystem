<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DeliveryAddress extends Model
{
    protected $fillable = [
        'user_id', 'full_name', 'phone', 'street', 'barangay',
        'city', 'province', 'postal_code', 'is_default'
    ];

    // Each address belongs to a user
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // An address can be used in many orders
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
