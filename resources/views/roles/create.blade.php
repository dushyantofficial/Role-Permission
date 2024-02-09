@extends('layouts.app')
@section('content')
    <style>

        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            display: -webkit-inline-box;
            display: -ms-inline-flexbox;
            display: inline-flex;
            background-color: #31c3af;
            border: 1px solid #ced4da;
            border-radius: 2px;
            cursor: default;
            float: left;
            margin-right: 9px;
            margin-top: 7px;
            padding: 0 5px;
        }

        .select2-container--open .select2-dropdown--below {
            margin-top: -49px !important;
        }
    </style>
    <main class="app-content {{user_theme_get()}}">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-edit"></i>Create New Role</h1>
                {{-- <p>Sample forms</p> --}}
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <h3 class="tile-title"></h3>
                    <div class="tile-body">
                        <form action="{{route('roles.store')}}" method="POST" enctype="multipart/form-data"
                              id="add_form">
                        @csrf


                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="control-label">Name</label>
                                <input name="name" type="text" value="{{old('name')}}"
                                       class="form-control @error('name') is-invalid @enderror" id="oldPasswordInput"
                                       placeholder="Enter Full Name">
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <strong>Permission:</strong><br>
                                <select class="mul-select form-control @error('permission') is-invalid @enderror"
                                        name="permission[]" multiple="true">
                                    @foreach($permission as $value)
                                        <option
                                            value="{{$value->id}}" {{ in_array($value->id, old('permission', [])) ? 'selected' : '' }}>{{ $value->name }}</option>
                                    @endforeach
                                </select>
                                @error('permission')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <br>
                    <button type="submit" id="submitBtn"
                            class="btn btn-sm btn-shadow btn-outline-primary btn-hover-shine">Add
                    </button>
                    <a href="{{route('roles.index')}}"
                       class="btn btn-sm btn-shadow btn-outline-secondary btn-hover-shine">Back</a>
                    </form>
                </div>


            </div>
        </div>


        </div>
    </main>



@endsection
@push('page_scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>

    <script>
        $(document).ready(function () {
            $(".mul-select").select2({
                placeholder: "Select Permission",
                tags: true,
            });
        })
    </script>
    {{--  Create Roles With Ajax  --}}
    <script>
        var usersRoute = "{{ route('roles.index') }}";
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
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: 'Your record was created successfully.',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Go back to the specific URL
                                window.location.href = usersRoute;

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
@endpush
