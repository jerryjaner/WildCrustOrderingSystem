<?php

namespace App\Services\Customer;

use App\Models\Order;

class PaymentService
{
    /**
     * Process payment based on method
     */
    public function processPayment(Order $order, string $method): string|null
    {
        $method = match($method) {
            'cod'   => 'cash_on_delivery',
            'gcash' => 'gcash',
            'card'  => 'credit_card',
            default => throw new \Exception('Payment method not supported'),
        };

        $order->payment()->create([
            'method' => $method,
            'amount' => $order->total,
            'status' => 'pending',
        ]);

        // Only online payments need a URL
        return $method === 'cash_on_delivery' ? null : match($method) {
            'gcash' => $this->gcashPayment($order),
            'credit_card' => $this->cardPayment($order),
        };
    }


    /**
     * GCash payment link generator
     */
    protected function gcashPayment(Order $order): string
    {
        // Replace with actual GCash API integration
        return "https://sandbox.gcash.com/pay?amount={$order->total}&order_id={$order->id}";
    }

    /**
     * Card payment link generator (Stripe/PayMongo)
     */
    protected function cardPayment(Order $order): string
    {
        // Replace with actual card payment API
        return "https://checkout.stripe.com/pay/your_session_id_here";
    }

    /**
     * Handle callback/webhook from gateway
     */
    public function handleCallback(array $data): void
    {
        $order = Order::findOrFail($data['order_id']);
        $payment = $order->payment;

        if ($data['status'] === 'paid') {
            $payment->update(['status' => 'paid']);
            $order->update(['status' => 'processing']); // or 'completed' based on flow
        } else {
            $payment->update(['status' => 'failed']);
            $order->update(['status' => 'pending']);
        }
    }
}
