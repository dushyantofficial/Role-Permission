@extends('layouts.app')

{{--<link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.dataTables.min.css">--}}


@section('content')
    <style>
        .modal {
            top: 54px !important;
        }

        .model_fix_size {
            max-width: 60% !important;
        }

        @media (max-width: 575.98px) {
            /* Add a class to the table container to make it responsive */
            .responsive-table {
                overflow-x: auto;
            }

            .modal {
                width: 192% !important;
            }

            .model_fix_size {
                max-width: 50% !important;
            }
        }
    </style>
    @include('Admin.flash-message')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <main class="app-content {{user_theme_get()}}">
        <div class="app-title">

            <div>
                <h1><i class="fa fa-th-list"></i>Show All Product</h1>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-12 float-right mb-5">
            <span class="pull-right float-right">&nbsp;&nbsp;
{{-- <a class="btn btn-sm btn-shadow btn-outline-primary btn-hover-shine" href="{{ route('products.create') }}"--}}
                {{--    style="float: right">--}}
                {{--                + Add--}}
                {{--            </a>--}}
                                <button type="button" class="btn btn-sm btn-shadow btn-outline-primary btn-hover-shine"
                                        data-bs-toggle="modal"
                                        data-bs-target="#add_product">
 + Add
                </button>
            </span>
                <!-- Modal -->
            </div>

            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body sortableTable__container responsive-table" id="my_report">
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Details</th>
                                <th>Font-End-look</th>
                                <th width="">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($products as $product)
                                <tr id="{{ $product->id }}">
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->detail }}</td>
                                    <td>
                                        <button type="button"
                                                class="btn btn-sm btn-shadow btn-outline-primary btn-hover-shine"
                                                data-toggle="modal" data-target=".bd-example-modal-lg">Front-End-Look
                                        </button>
                                        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
                                             aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg model_fix_size">
                                                <div class="modal-content">
                                                    <!-- Modal content goes here -->
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="myLargeModalLabel">
                                                            Front-End-Look</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- Add your content here -->
                                                        <iframe
                                                            src="{{url("https://app.acwanet.ntb.one/index.html?id=4")}}"
                                                            width="100%" height="500" frameborder="0"></iframe>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-shadow btn-outline-warning btn-hover-shine"
                                           href="{{ route('products.show',$product->id) }}">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        @can('product-edit')
                                            <button type="button"
                                                    class="btn btn-sm btn-shadow btn-outline-info btn-hover-shine"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#edit_product{{$product->id}}">
                                                <i class="fa fa-edit"></i>
                                            </button>


                                            <!-- Edit Product Modal -->
                                            <div class="modal fade" id="edit_product{{$product->id}}"
                                                 data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                 aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" style="max-width: 50%;">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit Product</h5>
                                                            <div class="submitter" style="
          font-family: 'Open Sans';
          font-size: 16px;
          font-weight: 700;
          color: #e60101;
          line-height: 29.96px;
          padding-bottom: 15px;
        ">
                                                                All fields are mandatory(*)
                                                            </div>
                                                            <button type="button" class="close" data-bs-dismiss="modal"
                                                                    aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form id="edit_form_{{ $product->id }}"
                                                                  action="{{route('products.update',$product->id)}}"
                                                                  method="post"
                                                                  enctype="multipart/form-data">
                                                                @csrf
                                                                @method('patch')

                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            <label
                                                                                class="control-label">Name</label><span
                                                                                class="text-danger"><b>*</b></span>
                                                                            <input name="name" type="text"
                                                                                   value="{{$product->name}}"
                                                                                   class="form-control @error('name') is-invalid @enderror"
                                                                                   id="oldPasswordInput"
                                                                                   placeholder="Enter Full Name">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            <label
                                                                                class="control-label">Detail</label><span
                                                                                class="text-danger"><b>*</b></span>
                                                                            <textarea name="detail" type="text"
                                                                                      class="form-control @error('detail') is-invalid @enderror"
                                                                                      placeholder="Enter Detail">{{$product->detail}}</textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button"
                                                                            class="btn btn-sm btn-shadow btn-outline-secondary btn-hover-shine"
                                                                            data-bs-dismiss="modal">Close
                                                                    </button>
                                                                    <button type="button"
                                                                            class="btn btn-sm btn-shadow btn-outline-info btn-hover-shine update-btn"
                                                                            data-product-id="{{ $product->id }}">
                                                                        Update
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>


                                        @endcan
                                        @can('product-delete')
                                            <button
                                                class="btn btn-sm btn-shadow btn-outline-danger btn-hover-shine delete-product"
                                                data-delete-id="{{ $product->id }}">
                                                <i class="fa fa-trash" aria-hidden="true"></i></button>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Add Product Modal -->
            <div class="modal fade" id="add_product" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                 aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" style="max-width: 50%;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Product</h5>
                            <div class="submitter" style="
          font-family: 'Open Sans';
          font-size: 16px;
          font-weight: 700;
          color: #e60101;
          line-height: 29.96px;
          padding-bottom: 15px;
        ">
                                All fields are mandatory(*)
                            </div>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data"
                                  id="add_form">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label
                                                class="control-label">Name</label><span
                                                class="text-danger"><b>*</b></span>
                                            <input name="name" type="text"
                                                   value=""
                                                   class="form-control @error('name') is-invalid @enderror"
                                                   id="oldPasswordInput"
                                                   placeholder="Enter Full Name">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="control-label">Detail</label><span
                                                class="text-danger"><b>*</b></span>
                                            <textarea name="detail" type="text"
                                                      class="form-control @error('detail') is-invalid @enderror"
                                                      placeholder="Enter Detail"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button"
                                            class="btn btn-sm btn-shadow btn-outline-secondary btn-hover-shine"
                                            data-bs-dismiss="modal">Close
                                    </button>
                                    <button type="submit" id="submitBtn"
                                            class="btn btn-sm btn-shadow btn-outline-primary btn-hover-shine">Save
                                        changes
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <p class="text-center text-primary"><small>Developer Name :-<b style="color: red">Dushyant Chhatraliya</b></small>
    </p>

@endsection
@push('page_scripts')
    {{--    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>--}}
    <script>
        $(document).ready(function () {
            var table = $('#sampleTable').DataTable({
                "order": [], // Disable initial sorting
                "columnDefs": [
                    {"orderable": false, "targets": [0, 3]}, // Disable sorting on specific columns
                ],
            });

            $("#sampleTable tbody").sortable({
                helper: fixHelperModified,
                update: function (event, ui) {
                    var newOrder = $(this).sortable('toArray', {attribute: 'id'});
                    updateRowOrder(newOrder);
                },
            }).disableSelection();

            function fixHelperModified(e, tr) {
                var $originals = tr.children();
                var $helper = tr.clone();
                $helper.children().each(function (index) {
                    $(this).width($originals.eq(index).width());
                });
                return $helper;
            }

            function updateRowOrder(newOrder) {
                var csrfToken = $('meta[name="csrf-token"]').attr('content'); // Get the CSRF token

                $.ajax({
                    url: '{{ route('update-row-order') }}',
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken // Include the CSRF token in the headers
                    },
                    data: {newOrder: newOrder},
                    success: function (response) {
                        location.reload();
                    },
                    error: function (error) {
                        console.error(error);
                    }
                });
            }
        });

    </script>

    <script>
        $(document).ready(function () {
            $('#submitBtn').click(function (e) { // Change 'submitBtn' to the actual ID of your button
                e.preventDefault();
                var formData = new FormData($('#add_form')[0]); // Use the form ID 'add_form'

                $.ajax({
                    type: 'POST',
                    url: $('#add_form').attr('action'), // Use the form's action attribute
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        $('#add_project').modal('hide'); // Close the modal
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: 'Your product was created successfully.',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload(); // Reload the page
                            }
                        });
                    },
                    error: function (xhr) {
                        // Handle validation errors (e.g., display error messages)
                        var errors = xhr.responseJSON.errors;
                        var errorMessages = [];

                        for (var field in errors) {
                            errorMessages.push(errors[field][0]);
                        }

                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            html: errorMessages.join('<br>') + '<br>', // Join error messages with <br> tags
                        });
                    }
                });
            });
        });

    </script>

    <script>
        $(document).ready(function () {
            $('.update-btn').click(function (e) {
                e.preventDefault();

                // Get the resume ID from the data attribute
                var resumeId = $(this).data('product-id');
                // Build the form selector dynamically based on the resume ID
                var formSelector = '#edit_form_' + resumeId;

                // Get the CSRF token value from the meta tag
                var csrfToken = $('meta[name="csrf-token"]').attr('content');

                // Add the CSRF token to the headers of the AJAX request
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    }
                });

                var formData = new FormData($(formSelector)[0]);

                $.ajax({
                    type: 'POST',
                    url: $(formSelector).attr('action'),
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        $('#edit_product' + resumeId).modal('hide');

                        Swal.fire({
                            icon: 'success',
                            title: 'Update!',
                            text: 'Your record updated successfully.',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload(); // Reload the page
                            }
                        });
                    },
                    error: function (xhr) {
                        var errors = xhr.responseJSON.errors;
                        var errorMessages = [];

                        for (var field in errors) {
                            errorMessages.push(errors[field][0]);
                        }

                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            html: errorMessages.join('<br>') + '<br>',
                        });
                    }
                });
            });
        });
    </script>

    {{--   Delete Record With Js --}}
    <script>
        $(document).ready(function () {
            // Add click event listener to the delete button
            $(document).on('click', '.delete-product', function () {
                var id = $(this).data('delete-id');

                // Show a SweetAlert confirmation dialog
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'You won\'t be able to revert this!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Send an AJAX request to delete the resource record
                        $.ajax({
                            type: 'DELETE',
                            url: '{{ route('products.destroy', ['product' => 'id']) }}' + id,
                            data: {
                                _token: '{{ csrf_token() }}',
                            },
                            success: function (response) {
                                // Handle the success response (e.g., reload the page or remove the deleted item from the DOM)
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Delete!',
                                    text: 'Your record deleted successfully.',
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        location.reload(); // Reload the page
                                    }
                                });
                            },
                            error: function (error) {
                                // Handle the error response (e.g., show an error message)
                                Swal.fire('Error', 'An error occurred while deleting the record.', 'error');
                            }
                        });
                    }
                });
            });
        });
    </script>
@endpush
