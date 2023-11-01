@extends('layouts.app')



@section('content')
    <style>
        .check_color_name {
            color: red;
        }

        .color_name {
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
                <h1><i class="fa fa-edit"></i>Edit User</h1>
                {{-- <p>Sample forms</p> --}}
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <h3 class="tile-title"></h3>
                    <meta name="csrf-token" content="{{ csrf_token() }}">

                    <div class="tile-body">
                        {!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id],'id' => 'update_form']) !!}

                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label class="control-label">Full Name:</label>
                            <div class="input-group mb-3">
                                <input class="form-control  @error('name') is-invalid @enderror" type="text" name="name"
                                       value="{{$user->name}}" placeholder="Enter Full Name" autofocus>
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
                                       value="{{$user->email}}"
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
                            <div class="form-group">
                                <label class="control-label">Roles</label>
                                <select class="mul-select  form-control @error('roles') is-invalid @enderror"
                                        name="roles[]" multiple="true">
                                    @foreach($userRole as $userRoles)
                                        @foreach($roles as $role)
                                            <option
                                                class="select2-dropdown select2-dropdown--below"
                                                value="{{$role->id}}" {{ $role->id == $userRoles->id ? 'selected' : '' }}>{{ $role->name }}</option>
                                        @endforeach
                                    @endforeach
                                </select>
                                @error('roles')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                    </div>

                    <br>


                    <button type="button" id="editBtn" class="btn btn-sm btn-shadow btn-outline-info btn-hover-shine">Update</button>
                    <a href="{{route('users.index')}}" class="btn btn-sm btn-shadow btn-outline-secondary btn-hover-shine">Back</a>
                    {!! Form::close() !!}
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
        function NewPassword() {
            var x = document.getElementById("password");
            var span = document.querySelector('.label-text');
            var passwordText = document.getElementById("hide_show");
            if (x.type === "password") {
                x.type = "text";
                span.classList.add('check_color_name')
                passwordText.innerText = "Hide Password";
            } else {
                x.type = "password";
                span.classList.remove('check_color_name')
                passwordText.innerText = "Show Password";
            }
        }
    </script>
    <script>
        function ConfirmPassword() {
            var x = document.getElementById("confirm_password");
            var span = document.querySelector('.label-text123');
            var passwordText = document.getElementById("show_hide");
            if (x.type === "password") {
                x.type = "text";
                span.classList.add('color_name')
                passwordText.innerText = "Hide Password";
            } else {
                x.type = "password";
                span.classList.remove('color_name')
                passwordText.innerText = "Show Password";
            }
        }
    </script>

    {{--  Edit User With Ajax  --}}
    <script>
        var usersRoute = "{{ route('users.index') }}";
    </script>
    <script>
        $(document).ready(function () {
            $('#editBtn').click(function (e) { // Change 'submitBtn' to the actual ID of your button
                e.preventDefault();
                var formData = new FormData($('#update_form')[0]); // Use the form ID 'add_form'

                $.ajax({
                    type: 'POST',
                    url: $('#update_form').attr('action'), // Use the form's action attribute
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: 'Your record was updated successfully.',
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
