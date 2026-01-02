<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('admin.orders.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function record(Request $request)
{
    $query = Order::with(['user', 'orderItems', 'payment']);

    // Filters
    // if ($request->filled('category_name')) {
    //     $query->whereHas('orderItems.product.category', function ($q) use ($request) {
    //         $q->where('category_name', $request->category_name);
    //     });
    // }

    if ($request->filled('payment_method')) {
        $query->whereHas('payment', function ($q) use ($request) {
            $q->where('method', $request->payment_method);
        });
    }

    if ($request->filled('price_from')) {
        $query->where('total', '>=', $request->price_from);
    }

    if ($request->filled('price_to')) {
        $query->where('total', '<=', $request->price_to);
    }

    if ($request->filled('status')) {
        $query->where('status', $request->status);
    }

    $orders = $query->latest()->get();

    if ($orders->isEmpty()) {
        return response('<h4 class="text-center mt-5">No orders found</h4>');
    }

    $output = '
    <table class="table table-striped table-row-bordered gy-5 gs-7" id="orders_record_table">
        <thead>
            <tr>
                <th>#</th>
                <th>Order ID</th>
                <th>Customer</th>
                <th>Total</th>
                <th>Items</th>
                <th>Status</th>
                <th>Payment</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
    ';

    $i = 1;
    foreach ($orders as $order) {

        $badge = match ($order->status) {
            'pending' => 'warning',
            'processing' => 'info',
            'completed' => 'success',
            'cancelled' => 'danger',
            default => 'secondary'
        };

        $status = "<span class='badge bg-$badge'>".ucfirst($order->status)."</span>";

        // ✅ Safe payment check
        if ($order->payment) {
            $payment_method = match($order->payment->method) {
                'cash_on_delivery' => 'Cash on Delivery',
                'gcash' => 'Gcash',
                'card' => 'Card',
                default => $order->payment->method,
            };
        } else {
            $payment_method = '<span class="text-muted">No Payment</span>';
        }

        // Dropdown menu
        $actionDropdown = '
        <div class="dropdown">
            <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="actionMenu'.$order->id.'" data-bs-toggle="dropdown" aria-expanded="false">
                Actions
            </button>
            <ul class="dropdown-menu" aria-labelledby="actionMenu'.$order->id.'">
                <li><a class="dropdown-item view-order-items" href="#" data-id="'.$order->id.'" data-bs-toggle="modal" data-bs-target="#View_Order_Items_Modal">
                    <i class="fas fa-eye me-1"></i> View Items
                </a></li>
                <li><a class="dropdown-item edit-order" href="#" data-id="'.$order->id.'" data-bs-toggle="modal" data-bs-target="#Edit_Order_Modal">
                    <i class="fas fa-edit me-1"></i> Edit
                </a></li>
                <li><a class="dropdown-item delete-order" href="#" data-id="'.$order->id.'">
                    <i class="fas fa-trash me-1"></i> Delete
                </a></li>
            </ul>
        </div>
        ';

        $output .= '
        <tr>
            <td>'.$i++.'</td>
            <td>#'.$order->id.'</td>
            <td>'.$order->user->name.'</td>
            <td>₱'.number_format($order->total, 2).'</td>
            <td>'.$order->orderItems->sum('quantity').'</td>
            <td>'.$status.'</td>
            <td>'.$payment_method.'</td>
            <td>'.$actionDropdown.'</td>
        </tr>';
    }

    $output .= '</tbody></table>';

    return response($output);
}




    public function items(Order $order)
    {
        $order->load('orderItems.product');

        if ($order->orderItems->isEmpty()) {
            return response('<p class="text-center text-muted">No items found.</p>');
        }

        $output = '
        <table class="table align-middle table-hover">
            <thead class="table-light">
                <tr>
                    <th>Product</th>
                    <th class="text-center">Qty</th>
                    <th class="text-end">Price</th>
                    <th class="text-end">Subtotal</th>
                </tr>
            </thead>
            <tbody>
        ';

        foreach ($order->orderItems as $item) {

            if (!$item->product) continue;

           $image = $item->product->product_image
    ? asset('storage/' . $item->product->product_image)
    : asset('images/no-image.png');


            $output .= '
            <tr>
                <td>
                    <div class="d-flex align-items-center gap-3">
                        <img src="'.$image.'"
                            class="rounded border"
                            style="width:60px;height:60px;object-fit:cover;">
                        <div>
                            <div class="fw-semibold">'.$item->product->product_name.'</div>
                            <small class="text-muted">
                                '.$item->product->category->category_name.'
                            </small>
                        </div>
                    </div>
                </td>

                <td class="text-center">
                    <span class="badge bg-primary">'.$item->quantity.'</span>
                </td>

                <td class="text-end">
                    ₱'.number_format($item->product_price, 2).'
                </td>

                <td class="text-end fw-semibold">
                    ₱'.number_format($item->price, 2).'
                </td>
            </tr>';
        }

        $output .= '
            </tbody>
        </table>

        <div class="d-flex justify-content-end mt-3">
            <h5>Total: <span class="text-success">
                ₱'.number_format($order->total, 2).'
            </span></h5>
        </div>';

        return response($output);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
