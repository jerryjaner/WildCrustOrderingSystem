<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Services\Customer\CartService;
use App\Http\Requests\Customer\CartRequest;
use App\Models\DeliveryAddress;

class CartController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }
    public function cartCount()
    {
        $cartCount = Auth::check() && Auth::user()->cart
            ? Auth::user()->cart->cartItems->sum('quantity')
            : 0;

        return response()->json(['cart_count' => $cartCount]);
    }

    public function index()
    {
        $addresses = DeliveryAddress::where('user_id', Auth::id())->get();
        $cart = Auth::user()->cart()->with('cartItems.product')->first();
        return view('customer.cart.index', compact('cart', 'addresses'));
    }

    public function storeToCart(CartRequest $request)
    {
        $this->cartService->addToCart($request->product_id, $request->quantity);
        return response()->json(['message'=>'Product added to cart']);
    }

    public function checkout(Request $request)
    {
        $request->validate([
            'address_id' => 'required|exists:delivery_addresses,id,user_id,' . Auth::id(),
            'payment_method' => 'required|in:gcash,card,cod',
            'selected_items' => 'required|string'
        ]);

        $selectedItems = explode(',', $request->selected_items);

        $result = $this->cartService->checkout(
            $request->only('address_id', 'payment_method'),
            $selectedItems
        );

        if ($result['payment_url']) {
            return response()->json([
                'message' => 'Redirect to payment gateway',
                'payment_url' => $result['payment_url']
            ]);
        }

        return response()->json([
            'message' => 'Order placed successfully. Pay on delivery.',
            'order_id' => $result['order']->id,
        ]);
    }

    public function removeItem(Request $request)
    {
        $request->validate([
            'item_id' => 'required|integer',
        ]);

        $cart = Auth::user()->cart;

        if (!$cart) {
            return response()->json(['message' => 'Cart not found'], 404);
        }

        $item = $cart->cartItems()->where('id', $request->item_id)->first();

        if (!$item) {
            return response()->json(['message' => 'Item not found in cart'], 404);
        }

        $item->delete();

        // Delete cart if no items left
        if ($cart->cartItems()->count() === 0) {
            $cart->delete();
        }

        return response()->json(['status'=>200,'message' => 'Item removed from cart']);
    }
}
