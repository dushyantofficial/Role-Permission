@extends('layouts.app')
@section('content')
    <style>
        .check_color_name{
            color: red;
        }
        .color_name{
            color: red;
        }
    </style>
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
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-edit"></i>Create User</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <h3 class="tile-title"></h3>
                    <div class="tile-body">
                        <form action="{{route('users.store')}}" method="POST" enctype="multipart/form-data"
                              id="add_form">
                        @csrf


                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label class="control-label">Full Name:</label>
                            <div class="input-group mb-3">
                                <input class="form-control  @error('name') is-invalid @enderror" type="text" name="name"
                                       value="{{old('name')}}" placeholder="Enter Full Name" autofocus>
                                <div class="input-group-append">
                                    <div class="input-group-text"><span class="fa fa-user"></span></div>
                                </div>
                            </div>

                        </div>

                        <div class="col-6">
                            <label class="control-label">Email:</label>
                            <div class="input-group mb-3">
                                <input type="email"
                                       name="email"
                                       value="{{ old('email') }}"
                                       placeholder="Enter Your Email"
                                       class="form-control @error('email') is-invalid @enderror">
                                <div class="input-group-append">
                                    <div class="input-group-text"><span class="fa fa-envelope"></span></div>
                                </div>
                                @error('email')
                                <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-6">
                            <label class="control-label">Password:</label>
                            <div class="input-group mb-3">
                                <input name="password" type="password"
                                       class="form-control @error('password') is-invalid @enderror"
                                       id="password"
                                       placeholder="Enter Your Password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                            <span class="toggle-password"
                                  onclick="togglePasswordVisibility('password')">
    <i class="fa fa-eye-slash" aria-hidden="true"></i>
</span>
                                    </div>
                                </div>
                                @error('password')
                                <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror

                            </div>
                        </div>

                        <div class="col-6">
                            <label class="control-label">Confirm Password</label>
                            <div class="input-group mb-3">
                                <input name="confirm-password" type="password" value="{{old('confirm-password')}}"
                                       id="confirm_password"
                                       class="form-control @error('confirm-password') is-invalid @enderror"
                                       placeholder="Enter User Password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                            <span class="confirm-password"
                                  onclick="toggleConfirmPasswordVisibility('confirm_password')">
    <i class="fa fa-eye-slash" aria-hidden="true"></i>
</span>
                                    </div>
                                </div>
                                @error('confirm-password')
                                <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror

                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label class="control-label">Roles</label>
                                <select class="mul-select form-control @error('roles') is-invalid @enderror"
                                        name="roles[]" multiple="true">
                                    @foreach($roles as $role)
                                        <option
                                            value="{{$role->id}}" {{ in_array($role->id, old('roles', [])) ? 'selected' : '' }}>{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                @error('roles')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                    </div>

                    <br>


                    <button type="submit" id="submitBtn"
                            class="btn btn-sm btn-shadow btn-outline-primary btn-hover-shine">Add
                    </button>
                    <a href="{{route('users.index')}}" class="btn btn-sm btn-shadow btn-outline-secondary btn-hover-shine">Back</a>
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
                placeholder: "Select Roles",
                tags: true,
            });
        })
    </script>
    <script>
        function togglePasswordVisibility(inputId) {
            var passwordInput = document.getElementById(inputId);
            var toggleIcon = document.querySelector('.toggle-password i');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            }
        }
    </script>
    <script>
        function toggleConfirmPasswordVisibility(inputId) {
            var passwordInput = document.getElementById(inputId);
            var toggleIcon = document.querySelector('.confirm-password i');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            }
        }
    </script>

    {{--  Create User With Ajax  --}}
    <script>
        var usersRoute = "{{ route('users.index') }}";
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
@endpush

