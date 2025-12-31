<?php
namespace App\Repositories\Customer;
use App\Models\Cart;

class CartRepository
{
    /*
        * Get or create a cart for a given user ID.
     */
    public function getOrCreate(int $userId): Cart
    {
        return Cart::firstOrCreate(['user_id' => $userId]);
    }
}
