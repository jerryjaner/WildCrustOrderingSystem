<?php

namespace App\Services\Customer;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Services\Customer\PaymentService;
use App\Repositories\Customer\CartRepository;
use App\Repositories\Customer\CartItemRepository;

class CartService
{
    protected CartRepository $cartRepo;
    protected CartItemRepository $itemRepo;

    public function __construct(CartRepository $cartRepo, CartItemRepository $itemRepo)
    {
        $this->cartRepo = $cartRepo;
        $this->itemRepo = $itemRepo;
    }

    public function addToCart(int $productId, int $quantity): void
    {
        $product = Product::findOrFail($productId);
        $cart = $this->cartRepo->getOrCreate(Auth::id());

        $item = $this->itemRepo->find($cart->id, $productId);

        if ($item) {
            $item->increment('quantity', $quantity);
        } else {
            $this->itemRepo->create([
                'cart_id'    => $cart->id,
                'product_id' => $productId,
                'quantity'   => $quantity,
                'price'      => $product->price,
            ]);
        }
    }

    public function checkout(array $data, array $selectedItems)
    {
        $user = Auth::user();
        $cart = $user->cart;

        if (!$cart || $cart->cartItems->isEmpty()) {
            return response()->json(['message' => 'Your cart is empty'], 400);
        }

        return DB::transaction(function() use ($user, $cart, $data, $selectedItems) {

            $orderItems = $cart->cartItems()->whereIn('id', $selectedItems)->get();

            if ($orderItems->isEmpty()) {
                return response()->json(['message' => 'No valid items selected'], 400);
            }

            $order = $user->orders()->create([
                'delivery_address_id' => $data['address_id'] ?? null,
                'total' => $orderItems->sum(fn($i) => $i->price * $i->quantity),
                'status' => 'pending',
            ]);

            foreach ($orderItems as $item) {
                $order->orderItems()->create([
                    'product_id' => $item->product_id,
                    'product_name' => $item->product_name ?? ($item->product?->product_name ?? 'Deleted Product'),
                    'product_price' => $item->price,
                    'quantity' => $item->quantity,
                    'price' => $item->price * $item->quantity,
                ]);
            }

            $paymentService = new PaymentService();
            $paymentUrl = $paymentService->processPayment($order, $data['payment_method']);

            // Only remove the selected items
            $cart->cartItems()->whereIn('id', $selectedItems)->delete();

            // Delete cart if empty
            if ($cart->cartItems()->count() === 0) {
                $cart->delete();
            }

            return ['order' => $order, 'payment_url' => $paymentUrl];
        });
    }
}
