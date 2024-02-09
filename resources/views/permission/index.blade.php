@extends('layouts.app')


@section('content')
    @include('Admin.flash-message')
    <style>
        .page1 {
            margin-bottom: 30px;
        }

        .modal {
            top: 54px !important;
        }

        @media (max-width: 575.98px) {
            /* Add a class to the table container to make it responsive */
            .responsive-table {
                overflow-x: auto;
            }

            .modal {
                width: 192% !important;
            }
        }
    </style>
    <main class="app-content {{user_theme_get()}}">
        <div class="app-title">

            <div>
                <h1><i class="fa fa-th-list"></i>Show All Permission</h1>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-12 float-right mb-5">
            <span class="pull-right float-right">&nbsp;&nbsp;
{{-- <a class="btn btn-sm btn-shadow btn-outline-primary btn-hover-shine" href="{{ route('permission.create') }}" style="float: right">--}}
                {{--                + Add--}}
                {{--            </a>--}}
                                               <button type="button"
                                                       class="btn btn-sm btn-shadow btn-outline-primary btn-hover-shine"
                                                       data-bs-toggle="modal"
                                                       data-bs-target="#add_permission">
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
                                <th>Guard Name</th>
                                <th width="280px">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($permissions as $permission)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $permission->name }}</td>
                                    <td>
                                        <label class="badge badge-success">{{ $permission->guard_name }}</label>
                                    </td>
                                    <td>
                                        @can('permission-edit')
                                            <button type="button"
                                                    class="btn btn-sm btn-shadow btn-outline-info btn-hover-shine"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#edit_permission{{$permission->id}}">
                                                <i class="fa fa-edit"></i>
                                            </button>

                                            {{--                                                <a class="btn btn-sm btn-shadow btn-outline-info btn-hover-shine"--}}
                                            {{--                                                   href="{{ route('permission.edit',$permission->id) }}"><i class="fa fa-edit"></i></a>--}}

                                        <!-- Add Permission Modal -->
                                            <div class="modal fade" id="edit_permission{{$permission->id}}"
                                                 data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                 aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" style="max-width: 50%;">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit Permission</h5>
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
                                                            <form id="edit_form_{{ $permission->id }}"
                                                                  action="{{route('permission.update',$permission->id)}}"
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
                                                                                   value="{{$permission->name}}"
                                                                                   class="form-control @error('name') is-invalid @enderror"
                                                                                   id="oldPasswordInput"
                                                                                   placeholder="Enter Full Name">
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
                                                                            data-permission-id="{{ $permission->id }}">
                                                                        Update
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endcan

                                        @can('permission-delete')
                                            <button
                                                class="btn btn-sm btn-shadow btn-outline-danger btn-hover-shine delete-permission"
                                                data-delete-id="{{ $permission->id }}">
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
        </div>

        <!-- Add Permission Modal -->
        <div class="modal fade" id="add_permission" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
             aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" style="max-width: 50%;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Permission</h5>
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
                        <form id="add_form"
                              action="{{route('permission.store')}}"
                              method="post"
                              enctype="multipart/form-data">
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
                            </div>
                            <div class="modal-footer">
                                <button type="button"
                                        class="btn btn-sm btn-shadow btn-outline-secondary btn-hover-shine"
                                        data-bs-dismiss="modal">Close
                                </button>
                                <button type="submit" id="submitBtn"
                                        class="btn btn-sm btn-shadow btn-outline-primary btn-hover-shine">Save changes
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <p class="text-center text-primary"><small>Developer Name :-<b style="color: red">Dushyant Chhatraliya</b></small>
    </p>

@endsection
@push('page_scripts')
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
                        $('#add_permission').modal('hide'); // Close the modal
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: 'Your permission was created successfully.',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload(); // Reload the page
                            }
                        });
                    },
                    error: function (xhr) {
                        // Remove all existing error messages and classes before displaying new ones
                        $('.invalid-feedback').remove();
                        $('.is-invalid').removeClass('is-invalid');

                        // Handle validation errors (e.g., display error messages)
                        var errors = xhr.responseJSON.errors;

                        for (var field in errors) {
                            var errorMessages = errors[field]; // Array of error messages
                            var inputField = $('[name="' + field + '"]');

                            // Add Bootstrap's is-invalid class and append the first error message after input field
                            if (errorMessages.length > 0) {
                                inputField.addClass('is-invalid');
                                var errorMessage = errorMessages[0]; // Take only the first error message
                                inputField.after('<div class="invalid-feedback">' + errorMessage + '</div>');
                            }
                        }
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
                var resumeId = $(this).data('permission-id');
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
                        $('#edit_permission' + resumeId).modal('hide');

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
                        // Remove all existing error messages and classes before displaying new ones
                        $('.invalid-feedback').remove();
                        $('.is-invalid').removeClass('is-invalid');

                        // Handle validation errors (e.g., display error messages)
                        var errors = xhr.responseJSON.errors;

                        for (var field in errors) {
                            var errorMessages = errors[field]; // Array of error messages
                            var inputField = $('[name="' + field + '"]');

                            // Add Bootstrap's is-invalid class and append the first error message after input field
                            if (errorMessages.length > 0) {
                                inputField.addClass('is-invalid');
                                var errorMessage = errorMessages[0]; // Take only the first error message
                                inputField.after('<div class="invalid-feedback">' + errorMessage + '</div>');
                            }
                        }
                    }
                });
            });
        });
    </script>

    {{--   Delete Record With Js --}}
    <script>
        $(document).ready(function () {
            // Add click event listener to the delete button
            $(document).on('click', '.delete-permission', function () {
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
                            url: '{{ route('permission.destroy', ['permission' => 'id']) }}' + id,
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
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
@endpush
