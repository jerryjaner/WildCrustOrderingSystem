@extends('layouts.customer')

@section('title', 'WildCrust | Shipping Addresses')

@section('contents')

    <section class="food_section layout_padding-bottom">
        <div class="container">

            <!-- Heading -->
            <div class="heading_container heading_center mb-4">
                <h2>Your Shipping Addresses</h2>
            </div>

            <!-- Add Button -->
            <div class="d-flex justify-content-end mb-3">
                <button class="btn btn-success" data-toggle="modal" data-target="#addAddressModal">
                    <i class="fa fa-plus"></i> Add Address
                </button>
            </div>

            <!-- Address Table -->
            <div class="card shadow-sm">
                <div class="card-body p-0">
                    <div class="table-responsive" id="shipping_address_record">
                        <!-- AJAX-loaded table will appear here -->
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- ADD ADDRESS MODAL -->
    <div class="modal fade" id="addAddressModal" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Add Shipping Address</h5>
                    <button type="button" class="close" data-dismiss="modal" id="close_header_btn" aria-label="Close">
                        <span>&times;</span>
                    </button>
                </div>

                <form method="POST" action="{{ route('customer.shipping-address.store') }}" id="CreateShippingAddress">
                    @csrf

                    <div class="modal-body">

                        <div class="form-group" hidden>
                            <label>User id</label>
                            <input type="text" name="user_id" class="form-control" value="{{ Auth::user()->id }}">
                        </div>
                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" name="full_name" class="form-control">
                            <span class="text-danger error-text full_name_error"></span>
                        </div>

                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="tel" name="phone" class="form-control">
                            <span class="text-danger error-text phone_error"></span>
                        </div>

                        <div class="form-group">
                            <label>Street</label>
                            <input type="text" name="street" class="form-control">
                            <span class="text-danger error-text street_error"></span>

                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Barangay</label>
                                <input type="text" name="barangay" class="form-control">
                                <span class="text-danger error-text barangay_error"></span>
                            </div>

                            <div class="form-group col-md-6">
                                <label>City</label>
                                <input type="text" name="city" class="form-control">
                                <span class="text-danger error-text city_error"></span>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Province</label>
                                <input type="text" name="province" class="form-control">
                                <span class="text-danger error-text province_error"></span>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Postal Code</label>
                                <input type="text" name="postal_code" class="form-control">
                                <span class="text-danger error-text postal_code_error"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="is_default" value="1" class="custom-control-input"
                                    id="defaultAddress">
                                <label class="custom-control-label" for="defaultAddress">
                                    Set as default address
                                </label>
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close_btn">
                            Cancel
                        </button>
                        <button type="submit" class="btn btn-success" id="btn_submit">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>




    @push('scripts')
        <script>
            $(document).ready(function() {

                function GetShippingAddressRecord() {
                    $.ajax({
                        url: "{{ route('customer.shipping-address.record') }}",
                        method: 'GET',
                        data: {
                            name: name,
                            status: status
                        },
                        success: function(response) {
                            $("#shipping_address_record").html(response);
                            $("#shipping_address_record_table").DataTable({
                                "order": [
                                    [0, "asc"]
                                ],

                            });
                        }
                    });
                }

                // Initial load
                GetShippingAddressRecord()

                $("#CreateShippingAddress").on('submit', function(e) {
                    e.preventDefault();
                    $("#btn_submit").html(
                        'Submitting ...');
                    $('#btn_submit').attr("disabled", true);
                    var form = this;

                    $.ajax({
                        url: $(form).attr('action'),
                        method: $(form).attr('method'),
                        data: new FormData(form),
                        processData: false,
                        dataType: "json",
                        contentType: false,
                        beforeSend: function() {
                            $(form).find('span.error-text').text('');
                        },
                        success: function(response) {

                            if (response.status == 422) {
                                $('#btn_submit').removeAttr("disabled");
                                $.each(response.error, function(prefix, val) {
                                    $(form).find('span.' + prefix + '_error').text(val[0]);
                                });
                                $("#btn_submit").text('Submit');

                            } else {

                                $(form)[0].reset();
                                $('#btn_submit').removeAttr("disabled");
                                $('#btn_submit').text('Submit');

                                // //Reload The Table Here
                                GetShippingAddressRecord();

                                $("#addAddressModal").modal('hide'); //Hiding the modal

                                Swal.fire({
                                    icon: 'success',
                                    title: 'Shipping Address Created Successfully.',
                                    showConfirmButton: false,
                                    timer: 3000,
                                });

                            }

                            $('#close_btn').on('click', function() {
                                $("#CreateShippingAddress").find('span.text-danger').text(
                                    '');
                            });

                            $('#close_header_btn').on('click', function() {
                                $("#CreateShippingAddress").find('span.text-danger').text(
                                    '');
                            });

                        }
                    });
                });

                $(document).on('click', '.shipping_address_delete', function(e) {
                    e.preventDefault();
                    let id = $(this).data('id'); // use data-id
                    let csrf = '{{ csrf_token() }}';

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: '{{ route('customer.shipping-address.destroy', ':id') }}'
                                    .replace(':id', id),
                                method: 'DELETE',
                                data: {
                                    _token: csrf
                                },
                                success: function(response) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: response.message,
                                        showConfirmButton: false,
                                        timer: 2000
                                    });

                                    GetShippingAddressRecord();
                                },
                                error: function(xhr) {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Error deleting address',
                                        text: xhr.responseJSON?.message ||
                                            'Something went wrong'
                                    });
                                }
                            });
                        }
                    });
                });

            });
        </script>
    @endpush


@endsection
