    @extends('layouts.admin')

    @section('title', 'Food Product Management')
    @section('breadcrumb', 'Product Management')

    @section('content')

        <div class="container" id="kt_content_container">

            <div class="row g-xxl-8">
                <div class="col-xxl-12">

                    <div class="card card-xxl-stretch mb-5 mb-xxl-8">
                        <div class="card-header border-0 pt-5 pb-3">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-boldest text-gray-800 fs-2">Food Product Record</span>
                            </h3>
                            <div class="card-toolbar">
                                <div class="pe-6 my-1">
                                    <a href="#" class="btn btn-sm btn-success my-2" data-bs-toggle="modal"
                                        data-bs-target="#Create_Food_Product_Modal">
                                        <i class="fa-duotone fa-solid fa-plus"></i>Create Food Product
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body border-bottom py-4">
                            <div class="row g-4">
                                <div class="col-md-4 mt-2">
                                    <select id="filter_category" class="form-select">
                                        <option value="">All Categories</option>
                                        @foreach ($data as $category)
                                            <option value="{{ $category->category_name }}">{{ $category->category_name }}
                                            </option>
                                        @endforeach
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
                                        <option value="available">Available</option>
                                        <option value="unavailable">Unavailable</option>
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
                            <div class="table-responsive" id="product_record">
                                <!-- AJAX-loaded table will appear here -->
                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>

        <!-- Create Product Modal -->
        <div class="modal fade" id="Create_Food_Product_Modal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static"
            data-bs-keyboard="false">
            <div class="modal-dialog mw-650px modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header pb-0 border-0 justify-content-end">
                        <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close"
                            id="close_header_btn"></button>
                    </div>
                    <div class="modal-body scroll-y pt-0 pb-15">
                        <h1 class="text-center mb-5">Create Product</h1>
                        <form action="{{ route('admin.products.store') }}" method="POST" id="CreateFoodProduct">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Product Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="product_name" placeholder="Product Name">
                                <span class="text-danger error-text product_name_error"></span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Category <span class="text-danger">*</span></label>

                                <select class="form-select" name="category_id">
                                    <option value="">Select Category</option>
                                    @foreach ($data as $category)
                                        <option value="{{ $category->id }}">
                                            {{ $category->category_name }}
                                        </option>
                                    @endforeach
                                </select>

                                <span class="text-danger error-text category_id_error"></span>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Description <span class="text-danger">*</span></label>
                                <textarea class="form-control" name="description" placeholder="Description"></textarea>
                                <span class="text-danger error-text description_error"></span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Product Price <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" min="0.01" step="0.01" name="price"
                                    placeholder="Product Price">
                                <span class="text-danger error-text price_error"></span>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Product Stock <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" min="1" name="stock"
                                    placeholder="Product Stock">
                                <span class="text-danger error-text stock_error"></span>
                            </div>
                            <div class="mb-5">
                                <label class="form-label">Status <span class="text-danger">*</span></label>
                                <select class="form-select" name="status">
                                    <option value="">Select Status</option>
                                    <option value="available">Available</option>
                                    <option value="unavailable">Unavailable</option>
                                </select>
                                <span class="text-danger error-text status_error"></span>
                            </div>
                            <div class="mb-3 ">
                                <div class="fv-row mb-8">
                                    <div class="dropzone dz-clickable" id="foodImageDropzone">
                                        <div class="dz-message needsclick">
                                            <i class="ki-duotone ki-file-up fs-3hx text-white">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                            <div class="ms-4">
                                                <h3 class="dfs-3 fw-bold text-gray-900 mb-1">Drop your food image here or
                                                    click to upload</h3>
                                                <span class="fw-semibold fs-4 text-muted">Upload Pictures Here</span>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="text-danger mt-1 error-text product_image_error"></span>
                                </div>

                            </div>
                            <div class="text-end">
                                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"
                                    id="close_btn">Close</button>
                                <button type="submit" class="btn btn-primary btn-sm" id="btn_submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- View Product Modal -->
        <div class="modal fade" id="View_Food_Product_Modal" tabindex="-1" aria-hidden="true"
            data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog mw-650px modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header pb-0 border-0 justify-content-end">
                        <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close"
                            id="close_header_btn"></button>
                    </div>
                    <div class="modal-body scroll-y pt-0 pb-15">
                        <h1 class="text-center mb-5">View Product</h1>
                        <form>
                            @csrf
                            <div class="mb-3 text-center">
                                <img id="view_product_image" src="" alt="Product Image"
                                    class="img-fluid rounded border" style="max-height: 200px; width: auto;">
                            </div>
                            <div class="mb-3" hidden>
                                <label class="form-label">Product ID <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="id" placeholder="Product ID"
                                    id="view_product_id" readonly>
                                <span class="text-danger error-text id_error"></span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Product Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="product_name"
                                    placeholder="Product Name" id="view_product_name" readonly>
                                <span class="text-danger error-text product_name_error"></span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Category <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="category" placeholder="Category"
                                    id="view_category" readonly>
                                <span class="text-danger error-text category_id_error"></span>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Description <span class="text-danger">*</span></label>
                                <textarea class="form-control" name="description" rows="4" placeholder="Description" id="view_description"
                                    readonly></textarea>
                                <span class="text-danger error-text description_error"></span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Product Price <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" min="0.01" step="0.01" name="price"
                                    placeholder="Product Price" id="view_price" readonly>
                                <span class="text-danger error-text price_error"></span>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Product Stock <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" min="1" name="stock"
                                    placeholder="Product Stock" id="view_stock" readonly>
                                <span class="text-danger error-text stock_error"></span>
                            </div>
                            <div class="mb-5">
                                <label class="form-label">Status <span class="text-danger">*</span></label>
                                <select class="form-select" name="status" id="view_status" disabled>
                                    <option value="">Select Status</option>
                                    <option value="available">Available</option>
                                    <option value="unavailable">Unavailable</option>
                                </select>
                                <span class="text-danger error-text status_error"></span>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Product Modal -->
        <div class="modal fade" id="Edit_Food_Product_Modal" tabindex="-1" aria-hidden="true"
            data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog mw-650px modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header pb-0 border-0 justify-content-end">
                        <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close"
                            id="close_header_btn"></button>
                    </div>
                    <div class="modal-body scroll-y pt-0 pb-15">
                        <h1 class="text-center mb-5">View Product</h1>
                        <form action="{{ route('admin.products.update', ':id') }}" method="POST" id="EditFoodProduct">
                            @csrf
                            @method('PUT')
                            <div class="mb-3 text-center">
                                <img id="edit_product_image" src="" alt="Product Image"
                                    class="img-fluid rounded border" style="max-height: 200px; width: auto;">
                            </div>
                            <div class="mb-3" hidden>
                                <label class="form-label">Product ID <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="id" placeholder="Product ID"
                                    id="edit_product_id" readonly>
                                <span class="text-danger error-text id_error"></span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Product Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="product_name"
                                    placeholder="Product Name" id="edit_product_name">
                                <span class="text-danger error-text product_name_error"></span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Category <span class="text-danger">*</span></label>
                                <select class="form-select" name="category_id" id="edit_category">
                                    <option value="">Select Category</option>
                                    @foreach ($data as $category)
                                        <option value="{{ $category->id }}">
                                            {{ $category->category_name }}
                                        </option>
                                    @endforeach
                                </select>

                                <span class="text-danger error-text category_id_error"></span>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Description <span class="text-danger">*</span></label>
                                <textarea class="form-control" name="description" rows="4" placeholder="Description" id="edit_description"></textarea>
                                <span class="text-danger error-text description_error"></span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Product Price <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" min="0.01" step="0.01" name="price"
                                    placeholder="Product Price" id="edit_price">
                                <span class="text-danger error-text price_error"></span>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Product Stock <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" min="1" name="stock"
                                    placeholder="Product Stock" id="edit_stock">
                                <span class="text-danger error-text stock_error"></span>
                            </div>
                            <div class="mb-5">
                                <label class="form-label">Status <span class="text-danger">*</span></label>
                                <select class="form-select" name="status" id="edit_status">
                                    <option value="">Select Status</option>
                                    <option value="available">Available</option>
                                    <option value="unavailable">Unavailable</option>
                                </select>
                                <span class="text-danger error-text status_error"></span>
                            </div>
                            <div class="mb-3 ">
                                <div class="fv-row mb-8">
                                    <div class="dropzone dz-clickable" id="UpdatefoodImageDropzone">
                                        <div class="dz-message needsclick">
                                            <i class="ki-duotone ki-file-up fs-3hx text-white">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                            <div class="ms-4">
                                                <h3 class="dfs-3 fw-bold text-gray-900 mb-1">Drop your food image here or
                                                    click to upload</h3>
                                                <span class="fw-semibold fs-4 text-muted">Upload Pictures Here</span>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="text-danger mt-1 error-text product_image_error"></span>
                                </div>

                            </div>
                            <div class="text-end">
                                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"
                                    id="edit_close_btn">Close</button>
                                <button type="submit" class="btn btn-primary btn-sm"
                                    id="edit_btn_submit">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    @endsection

    @push('scripts')
        <script type="text/javascript">
            Dropzone.autoDiscover = false;
            $(document).ready(function() {

                function GetProductRecord(category_name = '', price_from = '', price_to = '', status = '') {
                    $.ajax({
                        url: "{{ route('admin.products.record') }}",
                        method: 'GET',
                        data: {
                            category_name: category_name,
                            price_from: price_from,
                            price_to: price_to,
                            status: status
                        },
                        success: function(response) {
                            $("#product_record").html(response);
                            $("#product_record_table").DataTable({
                                "order": [
                                    [0, "asc"]
                                ],
                                destroy: true
                            });
                        }
                    });
                }

                GetProductRecord(); // Initial call to load all records

                $('#filter').on('click', function() {
                    let category_name = $('#filter_category').val();
                    let price_from = $('#filter_price_from').val();
                    let price_to = $('#filter_price_to').val();
                    let status = $('#filter_status').val();

                    GetProductRecord(category_name, price_from, price_to, status);
                });

                // Reset filter
                $('#filter_reset').on('click', function() {
                    $('#filter_category').val('');
                    $('#filter_price_from').val('');
                    $('#filter_price_to').val('');
                    $('#filter_status').val('');
                    GetProductRecord();
                });

                // Dropzone configuration for food image upload in Create Product Modal
                const dz = new Dropzone("#foodImageDropzone", {
                    url: '{{ route('admin.products.store') }}',
                    paramName: 'food_image',
                    autoProcessQueue: false,
                    uploadMultiple: false,
                    maxFiles: 1,
                    acceptedFiles: 'image/*',
                    addRemoveLinks: true,
                    init: function() {
                        let myDropzone = this;

                        this.on("removedfile", function(file) {
                            if (this.files.length < this.options.maxFiles) {
                                this.options.dictMaxFilesExceeded =
                                    "You can not upload any more files.";
                            }
                        });

                        $('#CreateFoodProduct').on('submit', function(e) {
                            e.preventDefault();
                            $("#btn_submit").html(
                                'Submitting <span class="spinner-border spinner-border-sm align-middle ms-2"></span>'
                            );
                            $("#btn_submit").attr("disabled", true);
                            let form = this;
                            let formData = new FormData(form);

                            if (myDropzone.getAcceptedFiles().length > 0) {
                                formData.append('product_image', myDropzone.getAcceptedFiles()[0]);
                            }

                            $.ajax({
                                url: $(form).attr('action'),
                                method: $(form).attr('method'),
                                data: formData,
                                processData: false,
                                contentType: false,
                                success: function(response) {
                                    if (response.status == 422) {
                                        $("#btn_submit").text('Submit').prop("disabled",
                                            false);
                                        $.each(response.error, function(prefix, val) {
                                            $(form).find('span.' + prefix +
                                                '_error').text(val[0]);
                                        });

                                        if (myDropzone.getAcceptedFiles().length ===
                                            0) {
                                            $(form).find('span.product_image_error')
                                                .text(
                                                    'Product image is required.');
                                        }
                                    } else {
                                        form.reset();
                                        myDropzone.removeAllFiles();
                                        $("#btn_submit").text('Submit').prop("disabled",
                                            false);
                                        $('#Create_Food_Product_Modal').modal('hide');

                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Food Product Created Successfully!',
                                            showConfirmButton: false,
                                            timer: 3000,
                                        }).then((result) => {
                                            GetProductRecord();
                                        });

                                    }
                                },
                                error: function() {
                                    $("#btn_submit").text('Submit').prop("disabled",
                                        false);
                                }
                            });
                        });

                        $('#Create_Food_Product_Modal').on('hidden.bs.modal', function() {
                            myDropzone.removeAllFiles();
                            $('#CreateFoodProduct').find('span.text-danger').text('');
                            $('#CreateFoodProduct')[0].reset();
                        });
                    }
                });

                // View Product Details
                $(document).on('click', '.product_view', function(e) {
                    e.preventDefault();
                    let id = $(this).attr('id');


                    let url = '{{ route('admin.products.show', ':id') }}'.replace(':id', id);
                    $.ajax({
                        url: url,
                        method: 'GET',
                        data: {
                            id: id,
                            _token: '{{ csrf_token() }}'
                        },

                        success: function(response) {

                            $("#view_product_id").val(response.id);
                            $("#view_product_name").val(response.product_name);
                            $("#view_category").val(response.category.category_name);
                            $("#view_price").val(response.price);
                            $("#view_stock").val(response.stock);
                            $("#view_description").val(response.description);
                            $("#view_status").val(response.status);
                            let imagePath = response.product_image ?
                                "{{ asset('storage') }}/" + response.product_image :
                                "{{ asset('images/no-image.png') }}";

                            $("#view_product_image").attr('src', imagePath);

                        }
                    });
                });

                // Edit Product Details
                $(document).on('click', '.product_edit', function(e) {
                    e.preventDefault();
                    let id = $(this).attr('id');


                    let url = '{{ route('admin.products.edit', ':id') }}'.replace(':id', id);
                    $.ajax({
                        url: url,
                        method: 'GET',
                        data: {
                            id: id,
                            _token: '{{ csrf_token() }}'
                        },

                        success: function(response) {

                            $("#edit_product_id").val(response.id);
                            $("#edit_product_name").val(response.product_name);
                            $("#edit_category").val(response.category.id);
                            $("#edit_price").val(response.price);
                            $("#edit_stock").val(response.stock);
                            $("#edit_description").val(response.description);
                            $("#edit_status").val(response.status);
                            let imagePath = response.product_image ?
                                "{{ asset('storage') }}/" + response.product_image :
                                "{{ asset('images/no-image.png') }}";

                            $("#edit_product_image").attr('src', imagePath);

                            let updateUrl = "{{ route('admin.products.update', ':id') }}";
                              updateUrl = updateUrl.replace(':id', response.id);
                            $('#EditFoodProduct').attr('action', updateUrl);
                        }
                    });
                });

                //Edit Product Form Submission
                let updateDz;
                updateDz = new Dropzone("#UpdatefoodImageDropzone", {
                    url: '#',
                    autoProcessQueue: false,
                    maxFiles: 1,
                    acceptedFiles: 'image/*',
                    addRemoveLinks: true,
                });

                $('#EditFoodProduct').on('submit', function(e) {
                    e.preventDefault();

                    let form = this;
                    let formData = new FormData(form);

                    if (updateDz.getAcceptedFiles().length > 0) {
                        formData.append('product_image', updateDz.getAcceptedFiles()[0]);
                    }

                    $("#edit_btn_submit")
                        .html('Updating <span class="spinner-border spinner-border-sm ms-2"></span>')
                        .prop('disabled', true);

                    $.ajax({
                        url: $(form).attr('action'),
                        method: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            $("#edit_btn_submit").text('Update').prop('disabled', false);
                            $('#Edit_Food_Product_Modal').modal('hide');
                            updateDz.removeAllFiles();
                            GetProductRecord();

                            Swal.fire({
                                icon: 'success',
                                title: 'Product Updated Successfully!',
                                showConfirmButton: false,
                                timer: 3000,
                            });
                        }
                    });
                });

                // Reset Edit Modal on close
                $('#Edit_Food_Product_Modal').on('hidden.bs.modal', function() {
                    updateDz.removeAllFiles();
                    $('#EditFoodProduct')[0].reset();
                    $('#EditFoodProduct').find('span.text-danger').text('');
                });

                $(document).on('click', '.product_delete', function(e) {

                    e.preventDefault();
                    let id = $(this).attr('id');
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
                                url: '{{ route('admin.products.destroy', ':id') }}'.replace(
                                    ':id', id),
                                method: 'DELETE',
                                data: {
                                    id: id,
                                    _token: csrf
                                },
                                success: function(response) {
                                    console.log(response);

                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Product Deleted Successfully.',
                                        showConfirmButton: false,
                                        timer: 3000,
                                    });

                                    GetProductRecord();

                                }
                            });
                        }
                    })
                });

            });
        </script>
    @endpush
