@extends('layouts.customer')

@section('title', 'WildCrust | Cart')

@section('contents')
<section class="food_section py-5">
    <div class="container" id="cartContainer">

        <div class="text-center mb-4">
            <h2>Your Food Cart 🍕</h2>
        </div>

        @if (!$cart || $cart->cartItems->isEmpty())
            <div class="alert alert-info text-center py-5">
                Your cart is empty. Go back to the menu and add some food 🍔
            </div>
        @else
            <div class="row">
                <!-- Cart Items -->
                <div class="col-lg-6 col-md-12 mb-4" id="cartItemsContainer">
                    @foreach ($cart->cartItems as $item)
                        <div class="cart-item-card" data-id="{{ $item->id }}">
                            <div class="cart-item-left">
                                <input type="checkbox" class="checkout-item" value="{{ $item->id }}">
                                <img src="{{ $item->product?->product_image ? asset('storage/' . $item->product->product_image) : asset('images/placeholder.png') }}" alt="{{ $item->product->product_name }}" class="cart-item-image">
                                <div class="cart-item-details">
                                    <h5>{{ $item->product->product_name ?? 'Deleted Product' }}</h5>
                                    <small>₱{{ number_format($item->price, 2) }}</small>
                                </div>
                            </div>
                            <div class="cart-item-right">
                                <span class="cart-item-qty">Qty: {{ $item->quantity }}</span>
                                <span class="cart-item-total">₱{{ number_format($item->price * $item->quantity, 2) }}</span>
                                <button class="delete-cart-item" data-id="{{ $item->id }}"><i class="bi bi-trash"></i></button>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Order Summary -->
                <div class="col-lg-6 col-md-12 mb-4">
                    <div class="order-summary-card">
                        <h4>Order Summary</h4>
                        <form method="POST" action="{{ route('customer.cart.checkout') }}" id="CheckOutOrder">
                            @csrf
                            <input type="hidden" name="selected_items" id="selected_items">

                            <div class="custom-select-wrapper">
                                <label>Shipping Address</label>
                                <select name="address_id" id="Selectaddress" class="custom-select">
                                    <option value="" disabled selected hidden>Select your address</option>
                                    @foreach ($addresses as $address)
                                        <option value="{{ $address->id }}">
                                            {{ $address->street }}, {{ $address->barangay }},
                                            {{ $address->city }}, {{ $address->province }} - {{ $address->postal_code }}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="text-danger address_id_error"></span>
                            </div>

                            <div class="custom-select-wrapper">
                                <label>Payment Method</label>
                                <select name="payment_method" id="payment_method" class="custom-select">
                                    <option value="" disabled selected hidden>Select a payment method</option>
                                    <option value="gcash">GCash</option>
                                    <option value="card">Credit/Debit Card</option>
                                    <option value="cod">Cash on Delivery</option>
                                </select>
                                <span class="text-danger payment_method_error"></span>
                            </div>

                            <div class="summary-container">
                                <div class="summary-row">
                                    <span>Total Items</span>
                                    <strong id="totalItems">0</strong>
                                </div>
                                <div class="summary-row">
                                    <span>Total Price</span>
                                    <strong id="totalPrice">₱0.00</strong>
                                </div>
                            </div>

                            <button type="submit" id="cart_btn_submit">Submit Order</button>
                        </form>
                    </div>
                </div>
            </div>
        @endif

    </div>
</section>

<style>
</style>

@push('scripts')
<script>
$(document).ready(function() {

    // Function to update cart totals
    function updateTotals() {
        let totalQty = 0, totalPrice = 0;
        $('.checkout-item:checked').each(function() {
            const $row = $(this).closest('.cart-item-card');
            const qty = parseInt($row.find('.cart-item-qty').text().replace('Qty: ', '')) || 0;
            const price = parseFloat($row.find('.cart-item-total').text().replace('₱', '').replace(/,/g, '')) || 0;
            totalQty += qty;
            totalPrice += price;
        });
        $('#totalItems').text(totalQty);
        $('#totalPrice').text('₱' + totalPrice.toLocaleString('en-PH', {minimumFractionDigits:2, maximumFractionDigits:2}));

        // Update cart icon badge
        updateCartBadge();
    }

    // Function to update cart badge in header
    function updateCartBadge() {
        let totalQty = 0;
        $('.cart-item-qty').each(function(){
            totalQty += parseInt($(this).text().replace('Qty: ', '')) || 0;
        });
        $('#cartItemCount').text(totalQty);
    }

    // Initial update on page load
    $('.checkout-item').prop('checked', false);
    updateTotals();

    // Update totals when checkbox changes
    $(document).on('change', '.checkout-item', updateTotals);

    // Delete cart item
    $('#cartContainer').on('click', '.delete-cart-item', function() {
        const id = $(this).data('id');
        const token = '{{ csrf_token() }}';

        Swal.fire({
            title: 'Are you sure?',
            text: "This item will be removed from your cart!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if(result.isConfirmed) {
                $.post('{{ route('customer.cart.removeItem') }}', { item_id:id, _token:token }, function(res){
                    if(res.status === 200 || !res.status){
                        $(`.cart-item-card[data-id="${id}"]`).remove();
                        Swal.fire('Deleted!', res.message, 'success');
                        updateTotals();
                        if($('#cartItemsContainer').find('.cart-item-card').length === 0){
                            $('#cartContainer').html('<div class="alert alert-info text-center py-5">Your cart is empty. Go back to the menu and add some food 🍔</div>');
                            $('#totalItems').text('0');
                            $('#totalPrice').text('₱0.00');
                            $('#cartItemCount').text('0');
                        }
                    }
                });
            }
        });
    });

    // Checkout form submit
    $('#CheckOutOrder').on('submit', function(e){
        e.preventDefault();
        const selectedItems = $('.checkout-item:checked').map(function(){ return $(this).val(); }).get();
        if(selectedItems.length===0){ Swal.fire('Error','Please select at least one item to checkout','error'); return; }
        $('#selected_items').val(selectedItems.join(','));
        var form = this;
        $('#btn_submit').html('Submitting ...').attr("disabled", true);
        $.ajax({
            url: $(form).attr('action'),
            method: $(form).attr('method'),
            data: new FormData(form),
            processData:false, contentType:false, dataType:'json',
            success:function(response){
                if(response.status==422){
                    $('#btn_submit').removeAttr("disabled").text('Submit');
                    $.each(response.errors, function(prefix, val){ $(form).find('span.'+prefix+'_error').text(val[0]); });
                }else{
                    $('.checkout-item:checked').closest('.cart-item-card').remove();
                    updateTotals();
                    if($('#cartItemsContainer').find('.cart-item-card').length===0){
                        $('#cartContainer').html('<div class="alert alert-info text-center py-5">Your cart is empty. Go back to the menu and add some food 🍔</div>');
                        $('#totalItems').text('0');
                        $('#totalPrice').text('₱0.00');
                        $('#cartItemCount').text('0');
                    }
                    $('#btn_submit').removeAttr("disabled").text('Submit');
                    Swal.fire({icon:'success',title:'Order Placed Successfully.',showConfirmButton:false,timer:3000});
                }
            },
            error:function(xhr){
                console.error(xhr);
                let errorMsg='Something went wrong. Please try again.';
                if(xhr.status===422 && xhr.responseJSON.errors){
                    errorMsg = Object.values(xhr.responseJSON.errors).map(e=>e.join(' ')).join('<br>');
                } else if(xhr.responseJSON && xhr.responseJSON.message){
                    errorMsg = xhr.responseJSON.message;
                }
                Swal.fire({icon:'error',title:'Error',html:errorMsg});
                $('#btn_submit').removeAttr("disabled").text('Submit');
            }
        });
    });

});
</script>

@endpush
@endsection
