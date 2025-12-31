
@extends('layouts.customer')

@section('title', 'WildCrust')

@section('contents')

<section id="menu" class="food_section layout_padding-bottom">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>Our Menu</h2>
        </div>

        {{-- Filters Menu --}}
        <ul class="filters_menu">
            <li class="active" data-filter="*">All</li>
            @foreach ($categories as $category)
                <li data-filter=".{{ Str::slug($category->category_name) }}">
                    {{ $category->category_name }}
                </li>
            @endforeach
        </ul>

        <div class="filters-content">
            <div class="row grid">
                @foreach ($categories as $category)
                    @foreach ($category->products as $product)
                        <div class="col-sm-6 col-lg-4 all {{ Str::slug($category->category_name) }}">
                            <div class="box">
                                <div>
                                    <div class="img-box">
                                        <img src="{{ asset('storage/' . $product->product_image) }}"
                                            alt="{{ $product->product_name }}">
                                    </div>
                                    <div class="detail-box">
                                        <h5>{{ $product->product_name }}</h5>
                                        <p>{{ $product->description }}</p>
                                        <div class="options">
                                            <h6>₱ {{ number_format($product->price, 2) }}</h6>
                                            <a class="btn btn-primary" type="button" data-toggle="modal"
                                                data-target="#cartModal{{ $product->id }}">
                                                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                    viewBox="0 0 456.029 456.029"
                                                    style="enable-background:new 0 0 456.029 456.029;"
                                                    xml:space="preserve">
                                                    <g>
                                                        <g>
                                                            <path
                                                                d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
                                                            c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z" />
                                                        </g>
                                                    </g>
                                                    <g>
                                                        <g>
                                                            <path d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
                                                            C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
                                                            c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
                                                            C457.728,97.71,450.56,86.958,439.296,84.91z" />
                                                        </g>
                                                    </g>
                                                    <g>
                                                        <g>
                                                            <path
                                                                d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
                                                            c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z" />
                                                        </g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                    <g>
                                                    </g>
                                                </svg>
                                            </a>

                                            <!-- Modal for this product -->
                                            <div class="modal fade" id="cartModal{{ $product->id }}" tabindex="-1"
                                                role="dialog">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content" style="border-radius: 15px;">

                                                        <form class="add-to-cart-form" method="POST"
                                                            action="{{ route('customer.cart.store') }}">

                                                            @csrf

                                                            <!-- HEADER -->
                                                            <div class="modal-header bg-dark text-white">
                                                                <h5 class="modal-title">{{ $product->product_name }}
                                                                </h5>
                                                                <button type="button" class="close text-white"
                                                                    data-dismiss="modal">
                                                                    <span>&times;</span>
                                                                </button>
                                                            </div>

                                                            <!-- BODY -->
                                                            <div class="modal-body text-dark">

                                                                <input type="hidden" name="product_id"
                                                                    value="{{ $product->id }}">

                                                                <img src="{{ asset('storage/' . $product->product_image) }}"
                                                                    class="img-fluid rounded mb-3"
                                                                    alt="{{ $product->product_name }}">

                                                                <p>{{ $product->description }}</p>

                                                                <h6>
                                                                    Price:
                                                                    <strong>₱
                                                                        {{ number_format($product->price, 2) }}</strong>
                                                                </h6>

                                                                <!-- QTY -->
                                                                <div class="d-flex align-items-center mt-3">
                                                                    <span class="mr-3 font-weight-bold">Qty</span>

                                                                    <div class="input-group" style="width:140px;">
                                                                        <div class="input-group-prepend">
                                                                            <button
                                                                                class="btn btn-outline-secondary qty-btn"
                                                                                type="button" data-change="-1">
                                                                                −
                                                                            </button>
                                                                        </div>

                                                                        <input type="text"
                                                                            class="form-control text-center qty-input"
                                                                            name="quantity" value="1" readonly>

                                                                        <div class="input-group-append">
                                                                            <button
                                                                                class="btn btn-outline-secondary qty-btn"
                                                                                type="button" data-change="1">
                                                                                +
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <!-- FOOTER -->
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary btn-sm"
                                                                    data-dismiss="modal">
                                                                    Close
                                                                </button>

                                                                <button type="submit" id="btn-submit"
                                                                    class="btn btn-warning btn-sm btn-submit"
                                                                    style="background-color:#FFBE33;">
                                                                    Add to Cart
                                                                </button>
                                                            </div>

                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>

        <div class="btn-box">
            <a href="#">View More</a>
        </div>
    </div>

</section>

@push('scripts')
<script>
    $(document).ready(function() {

        // QTY +/- buttons
        $(document).on('click', '.qty-btn', function() {
            const input = $(this).closest('.input-group').find('.qty-input');
            let qty = parseInt(input.val());
            const change = parseInt($(this).data('change'));
            qty += change;
            if (qty < 1) qty = 1;
            input.val(qty);
        });

        window.routes = { login: "{{ route('login') }}" };

        // Function to fetch cart count
        function updateCartCount() {
            $.get('{{ route("customer.cart.count") }}', function(response) {
                if(response.cart_count !== undefined) {
                    $('#cartItemCount').text(response.cart_count);
                }
            });
        }

        // Add to cart AJAX
        $(document).on('submit', '.add-to-cart-form', function(e) {
            e.preventDefault();
            const form = $(this);
            const btn = form.find('.btn-submit');

            btn.prop('disabled', true).text('Adding...');

            $.ajax({
                url: form.attr('action'),
                method: form.attr('method'),
                data: form.serialize(),
                dataType: 'json',
                success: function(response) {
                    btn.prop('disabled', false).text('Add to Cart');
                    form.find('.qty-input').val(1);
                    form.closest('.modal').modal('hide');

                    // Update header cart count dynamically
                    updateCartCount();

                    Swal.fire({
                        icon:'success',
                        title: response.message,
                        timer:1500,
                        showConfirmButton:false
                    });
                },
                error: function(xhr) {
                    btn.prop('disabled', false).text('Add to Cart');
                    if(xhr.status === 401) {
                        Swal.fire({
                            icon:'warning',
                            title:'Login Required',
                            text:'Please login first.'
                        }).then(() => {
                            window.location.href = window.routes.login;
                        });
                    } else {
                        Swal.fire({
                            icon:'error',
                            title:'Something went wrong'
                        });
                    }
                }
            });
        });

        // Fetch cart count on page load
        updateCartCount();
    });
</script>
@endpush



@endsection
