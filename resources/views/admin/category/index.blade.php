    @extends('layouts.admin')

    @section('title', 'Food Category Management')
    @section('breadcrumb', 'Category Management')

    @section('content')
        <div class="container" id="kt_content_container">

            <div class="row g-xxl-8">
                <div class="col-xxl-12">

                    <div class="card card-xxl-stretch mb-5 mb-xxl-8">
                        <div class="card-header border-0 pt-5 pb-3">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-boldest text-gray-800 fs-2">Food Category Record</span>
                            </h3>
                            <div class="card-toolbar">
                                <div class="pe-6 my-1">
                                    <a href="#" class="btn btn-sm btn-success my-2" data-bs-toggle="modal"
                                        data-bs-target="#Create_Food_Category_Modal">
                                        <i class="fa-duotone fa-solid fa-plus"></i>Create Food Category
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body border-bottom py-4">
                            <div class="row g-4">
                                <div class="col-md-6 mt-2">
                                    <input type="text" id="filter_name" class="form-control"
                                        placeholder="Search category name">
                                </div>
                                <div class="col-md-4 mt-2">
                                    <select id="filter_status" class="form-select">
                                        <option value="">All Status</option>
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </div>
                                <div class="col-md-2 d-flex mt-2">
                                  <button id="filter" class="btn btn-secondary btn-sm me-2">
                                    <i class="fas fa-filter me-2"></i> Filter Category
                                </button>

                                    {{-- <button id="filter_reset" class="btn btn-secondary btn-sm">Reset</button> --}}
                                </div>
                            </div>
                        </div>


                        <div class="card-body py-0">
                            <div class="table-responsive" id="category_record">
                                <!-- AJAX-loaded table will appear here -->
                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>

        <!-- Create Category Modal -->
        <div class="modal fade" id="Create_Food_Category_Modal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static"
            data-bs-keyboard="false">
            <div class="modal-dialog mw-650px modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header pb-0 border-0 justify-content-end">
                        <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close"
                            id="close_header_btn"></button>
                    </div>
                    <div class="modal-body scroll-y pt-0 pb-15">
                        <h1 class="text-center mb-5">Create Category</h1>
                        <form action="{{ route('admin.categories.store') }}" method="POST" id="CreateFoodCategory">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Category Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="category_name" placeholder="Category Name">
                                <span class="text-danger error-text category_name_error"></span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" name="description" placeholder="Description"></textarea>
                                <span class="text-danger error-text description_error"></span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Status <span class="text-danger">*</span></label>
                                <select class="form-select" name="status">
                                    <option value="">Select Status</option>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                                <span class="text-danger error-text status_error"></span>
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

        <!-- View Category Modal -->
        <div class="modal fade" id="View_Category_Modal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static"
            data-bs-keyboard="false">
            <div class="modal-dialog mw-650px modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header pb-0 border-0 justify-content-end">
                        <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close"
                            id="close_header_btn"></button>
                    </div>
                    <div class="modal-body scroll-y pt-0 pb-15">
                        <h1 class="text-center mb-5">View Category</h1>
                        <form id="ViewCategoryForm">
                            @csrf
                            <div class="mb-3" hidden>
                                <label class="form-label">Category ID</label>
                                <input type="text" class="form-control" name="id" id="view_category_id"
                                    readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Category Name</label>
                                <input type="text" class="form-control" name="category_name" id="view_category_name"
                                    readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" name="description" id="view_description" readonly></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <input type="text" class="form-control" name="status" id="view_status" readonly>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!--Edit Category Modal -->
        <div class="modal fade" id="Edit_Category_Modal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static"
            data-bs-keyboard="false">
            <div class="modal-dialog mw-650px modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header pb-0 border-0 justify-content-end">
                        <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close"
                            id="close_header_btn"></button>
                    </div>
                    <div class="modal-body scroll-y pt-0 pb-15">
                        <h1 class="text-center mb-5">Edit Category</h1>
                        <form action="{{ route('admin.categories.update', ':id') }}" method="POST"
                            id="UpdateFoodCategory">
                            @csrf
                            @method('PUT')
                            <div class="mb-3" hidden>
                                <label class="form-label">Category ID</label>
                                <input type="text" class="form-control" name="id" id="edit_category_id">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Category Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="category_name"
                                    placeholder="Category Name" id="edit_category_name">
                                <span class="text-danger error-text category_name_error"></span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" name="description" placeholder="Description" id="edit_description"></textarea>
                                <span class="text-danger error-text description_error"></span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Status <span class="text-danger">*</span></label>
                                <select class="form-select" name="status" id="edit_status">
                                    <option value="">Select Status</option>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                                <span class="text-danger error-text status_error"></span>
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
            $(document).ready(function() {

                function GetCategoryRecord(name = '', status = '') {
                    $.ajax({
                        url: "{{ route('admin.categories.record') }}",
                        method: 'GET',
                        data: {
                            name: name,
                            status: status
                        },
                        success: function(response) {
                            $("#category_record").html(response);
                            $("#category_record_table").DataTable({
                                "order": [
                                    [0, "asc"]
                                ],
                                destroy: true
                            });
                        }
                    });
                }

                // Initial load
                GetCategoryRecord();

                // --- Filter ---
                $('#filter').on('click', function() {
                    let name = $('#filter_name').val();
                    let status = $('#filter_status').val();
                    GetCategoryRecord(name, status);
                });

                // Reset filter
                $('#filter_reset').on('click', function() {
                    $('#filter_name').val('');
                    $('#filter_status').val('');
                    GetCategoryRecord();
                });


                // Create Category AJAX Submission
                $("#CreateFoodCategory").on('submit', function(e) {
                    e.preventDefault();
                    $("#btn_submit").html(
                        'Submitting <span class="fas fa-spinner fa-spin align-middle ms-2"></span>');
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

                                //Reload The Table Here
                                GetCategoryRecord();

                                $("#Create_Food_Category_Modal").modal('hide'); //Hiding the modal

                                Swal.fire({
                                    icon: 'success',
                                    title: 'Category Created Successfully.',
                                    showConfirmButton: false,
                                    timer: 3000,
                                });

                            }

                            $('#close_btn').on('click', function() {
                                $("#CreateFoodCategory").find('span.text-danger').text('');
                            });

                            $('#close_header_btn').on('click', function() {
                                $("#CreateFoodCategory").find('span.text-danger').text('');
                            });

                        }
                    });
                });

                // View Category AJAX
                $(document).on('click', '.category_view', function(e) {
                    e.preventDefault();
                    let id = $(this).attr('id');


                    let url = '{{ route('admin.categories.show', ':id') }}'.replace(':id', id);
                    $.ajax({
                        url: url,
                        method: 'GET',
                        data: {
                            id: id,
                            _token: '{{ csrf_token() }}'
                        },

                        success: function(response) {

                            $("#view_category_id").val(response.id);
                            $("#view_category_name").val(response.category_name);
                            $("#view_description").val(response.description);
                            $("#view_status").val(response.status);

                        }
                    });
                });

                // Edit Category AJAX
                $(document).on('click', '.category_edit', function(e) {
                    e.preventDefault();

                    let id = $(this).attr('id');

                    // SET UPDATE ACTION CORRECTLY
                    let updateUrl = '{{ route('admin.categories.update', ':id') }}';
                    updateUrl = updateUrl.replace(':id', id);
                    $('#UpdateFoodCategory').attr('action', updateUrl);

                    // Fetch category data
                    let editUrl = '{{ route('admin.categories.edit', ':id') }}';
                    editUrl = editUrl.replace(':id', id);

                    $.ajax({
                        url: editUrl,
                        method: 'GET',
                        success: function(response) {
                            $("#edit_category_id").val(response.id);
                            $("#edit_category_name").val(response.category_name);
                            $("#edit_description").val(response.description);
                            $("#edit_status").val(response.status);
                        }
                    });
                });

                // Update Category AJAX Submission
                $("#UpdateFoodCategory").on('submit', function(e) {
                    e.preventDefault();
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "Do you want to update this category record?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, update it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $("#edit_btn_submit").html(
                                'Updating <span class="fas fa-spinner fa-spin align-middle ms-2"></span>'
                            );
                            $('#edit_btn_submit').attr("disabled", true);
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
                                        $('#edit_btn_submit').removeAttr("disabled");
                                        $.each(response.error, function(prefix, val) {
                                            $(form).find('span.' + prefix +
                                                '_error').text(val[0]);
                                        });
                                        $("#edit_btn_submit").text('Update');
                                    } else {
                                        $(form)[0].reset();
                                        $('#edit_btn_submit').removeAttr("disabled");
                                        $('#edit_btn_submit').text('Update');
                                        GetCategoryRecord();
                                        $("#Edit_Category_Modal").modal(
                                            'hide'); // Hide the modal

                                        // SWEETALERT for success
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Category Updated Successfully',
                                            showConfirmButton: false,
                                            timer: 3000,
                                        });
                                    }

                                    // Event binding for close button inside modal
                                    $('#edit_close_btn').on('click', function() {
                                        $("#UpdateFoodCategory").find(
                                            'span.text-danger').text('');
                                    });

                                    $('#edit_close_header_btn').on('click', function() {
                                        $("#UpdateFoodCategory").find(
                                            'span.text-danger').text('');
                                    });
                                }
                            });
                        } else {
                            // User canceled the action
                            $('#edit_btn_submit').removeAttr("disabled");
                            $("#edit_btn_submit").text('Update');
                        }
                    });
                });


                // Delete Category AJAX
                $(document).on('click', '.category_delete', function(e) {

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
                                url: '{{ route('admin.categories.destroy', ':id') }}'.replace(
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
                                        title: 'Category Deleted Successfully.',
                                        showConfirmButton: false,
                                        timer: 3000,
                                    });

                                    GetCategoryRecord();

                                }
                            });
                        }
                    })
                });


            });
        </script>
    @endpush
