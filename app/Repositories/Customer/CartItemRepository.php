<?php

namespace App\Repositories\Customer;
use App\Models\CartItem;

class CartItemRepository
{
    public function find(int $cartId, int $productId): ?CartItem
    {
        return CartItem::where('cart_id', $cartId)
            ->where('product_id', $productId)
            ->first();
    }

    public function create(array $data): CartItem
    {
        return CartItem::create($data);
    }
}
