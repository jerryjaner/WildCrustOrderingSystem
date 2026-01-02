    @extends('layouts.admin')

    @section('title', 'Customer Order Management')
    @section('breadcrumb', 'Customer Order Management')

    @section('content')

        <div class="container" id="kt_content_container">

            <div class="row g-xxl-8">
                <div class="col-xxl-12">

                    <div class="card card-xxl-stretch mb-5 mb-xxl-8">
                        <div class="card-header border-0 pt-5 pb-3">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-boldest text-gray-800 fs-2">Customer Order Record</span>
                            </h3>
                        </div>
                        <div class="card-body border-bottom py-4">
                            <div class="row g-4">
                                <div class="col-md-4 mt-2">
                                    <select id="filter_payment_method" class="form-select">
                                        <option value="">All Categories</option>

                                            <option value="cash_on_delivery">Cash on delivery</option>
                                            <option value="gcash">Gcash </option>
                                            <option value="card">Card </option>

                                    </select>
                                </div>
                                <div class="col-md-2 mt-2">
                                    <input type="number" min="0" step="0.01" id="filter_price_from"
                                        class="form-control" placeholder="Price From">
                                </div>
                                <div class="col-md-2 mt-2">
                                    <input type="number" min="0" step="0.01" id="filter_price_to"
                                        class="form-control" placeholder="Price To">
                                </div>

                                <div class="col-md-2 mt-2">
                                    <select id="filter_status" class="form-select">
                                        <option value="">All Status</option>
                                        <option value="pending">Pending</option>
                                        <option value="processing">Processing</option>
                                        <option value="completed">Completed</option>
                                        <option value="cancelled">Cancelled</option>

                                    </select>
                                </div>
                                <div class="col-md-2 d-flex mt-2">
                                    <button id="filter" class="btn btn-secondary btn-sm me-2">
                                        <i class="fas fa-filter me-2"></i> Filter Product
                                    </button>
                                </div>
                            </div>
                        </div>


                        <div class="card-body py-0">
                            <div class="table-responsive" id="orders_record">
                                <!-- AJAX-loaded table will appear here -->
                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>

        <div class="modal fade" id="orderItemsModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Order Items</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <div id="orderItemsContent" class="text-center py-5">
                    <span class="spinner-border"></span>
                </div>
            </div>

        </div>
    </div>
</div>

    @endsection

    @push('scripts')
        <script type="text/javascript">
            Dropzone.autoDiscover = false;
            $(document).ready(function() {

              function GetCustomerOrdersRecord(payment_method = '', price_from = '', price_to = '', status = '') {
    $.get("{{ route('admin.orders.record') }}", {
        payment_method, price_from, price_to, status
    }, function (response) {
        $('#orders_record').html(response);
        $('#orders_record_table').DataTable({
            destroy: true,
            order: [[0, 'asc']]
        });
    });
}

GetCustomerOrdersRecord();

$('#filter').on('click', function () {
    GetCustomerOrdersRecord(
        $('#filter_payment_method').val(),
        $('#filter_price_from').val(),
        $('#filter_price_to').val(),
        $('#filter_status').val()
    );
});

$(document).on('click', '.view-order-items', function () {

    let orderId = $(this).data('id');

    $('#orderItemsModal').modal('show');
    $('#orderItemsContent').html('<span class="spinner-border"></span>');

    $.get("{{ route('admin.orders.items', ':id') }}".replace(':id', orderId),
        function (response) {
            $('#orderItemsContent').html(response);
        }
    );
});







            });
        </script>
    @endpush
