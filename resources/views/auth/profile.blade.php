@extends('layouts.app')

@section('content')
    <style>
        .camera-icon {
            position: absolute;
            bottom: 0px;
            right: 0px;
            background-color: rgba(0, 0, 0, 0.6);
            color: #fff;
            padding: 5px;
            /*border-radius: 50%;*/
            cursor: pointer;
            display: none;
        }
        #profilePic:hover .camera-icon {
            display: block;
            object-fit: cover;
            max-width: 100%;
            width: 100%;
            border-radius: 50%;
            height: 79%;
            margin: 17% 0%;
        }
        .user .profile .info {
            padding: 53px 59px;
            text-align: center;
            background-color: #fff;
            white-space: nowrap;
            background-color: rgba(100, 100, 100, 0.9);
            color: #fff;
            position: absolute;
            top: -30px;
            bottom: 0;
            left: -23px;
        }
    </style>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <main class="app-content {{user_theme_get()}}">
        @php
            $user = \Illuminate\Support\Facades\Auth::user();
        @endphp
        @include('Admin.flash-message')
        <div class="row user">
            <div class="col-md-12">
                <div class="profile">
                    <div class="info">
                            <div class="avatar avatar-md mb-3 position-relative" id="profilePic">
                                @if($user->profile_pic == '')
                                    <img class="user-img" src="{{asset('admin/images/dummy_img.png')}}" alt="user" width="105px" height="100px">
                                @else
                                    <img class="user-img" src="{{asset('storage/images/'.$user->profile_pic)}}" width="105px" height="100px">

                                @endif
                                <div class="camera-icon" id="cameraIcon">
                                    <i class="fa fa-pencil" style="margin: 35px !important;"></i>
                                </div>
                                <input type="file" name="profile_pic" id="profile-picture-input" style="display: none;">
                            </div>

                        <h4>{{$user->name}}</h4>
                        <p>{{$user->role}}</p>
                    </div>
                    <div class="cover-image"></div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="tile p-0">
                    <ul class="nav flex-column nav-tabs user-tabs">
                        <li class="nav-item"><a class="nav-link active" href="#user-timeline"
                                                data-toggle="tab">Profile</a></li>
                        <li class="nav-item"><a class="nav-link " href="#theme-color" id="theme_color"
                                                data-toggle="tab">Change Theme Color</a></li>
                        <li class="nav-item"><a class="nav-link " href="#user-settings" id="password"
                                                data-toggle="tab">Change Password</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9">
                <div class="tab-content">
                    <div class="tab-pane active" id="user-timeline">
                        <div class="tile user-settings">
                            <h4 class="line-head">Profile</h4>
                            <form action="{{route('profile-update')}}" id="update_form" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-6">
                                        <label class="control-label">Full Name:</label>
                                        <div class="input-group mb-3">
                                            <input class="form-control  @error('name') is-invalid @enderror" type="text"
                                                   name="name"
                                                   value="{{$user->name}}" placeholder="Enter Full Name" autofocus>
                                            <div class="input-group-append">
                                                <div class="input-group-text"><span class="fa fa-user"></span></div>
                                            </div>
                                        </div>
                                        @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>
                                    <div class="col-md-6">
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
                                </div>
                                <br>
                                <div class="row mb-10">
                                    <div class="col-md-12">
                                        <button class="btn btn-sm btn-shadow btn-outline-info btn-hover-shine update-btn" type="button"><i
                                                class="fa fa-fw fa-lg fa-check-circle"></i>Update
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="user-settings">
                        <div class="tile user-settings">
                            <h4 class="line-head">Password Update</h4>
                            <form action="{{route('change-password')}}" id="password_form" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-8 mb-4">
                                        <label>Old Password</label>

                                        <div class="input-group mb-3">
                                            <input class="form-control @error('current_password') is-invalid @enderror"
                                                   id="current_password" name="current_password" type="password"
                                                   placeholder="Old Password">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                            <span class="toggle-password"
                                  onclick="togglePasswordVisibility('current_password')">
    <i class="fa fa-eye-slash" aria-hidden="true"></i>
</span>
                                                </div>
                                            </div>
                                            @error('current_password')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="clearfix"></div>
                                    <div class="col-md-8 mb-4">
                                        <label>New Password</label>
                                        <div class="input-group mb-3">
                                            <input class="form-control @error('new_password') is-invalid @enderror"
                                                   id="new_password" name="new_password" type="password"
                                                   placeholder="New Password">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                            <span class="toggle-password2"
                                  onclick="toggleNewPasswordVisibility('new_password')">
    <i class="fa fa-eye-slash" aria-hidden="true"></i>
</span>
                                                </div>
                                            </div>
                                            @error('new_password')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="clearfix"></div>
                                    <div class="col-md-8 mb-4">
                                        <label>Confirm Password</label>
                                        <div class="input-group mb-3">
                                            <input class="form-control @error('conform_password') is-invalid @enderror"
                                                   id="confirm_password" name="conform_password" type="password"
                                                   placeholder="Comfirm Password">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                            <span class="conform-password"
                                  onclick="toggleConformPasswordVisibility('confirm_password')">
    <i class="fa fa-eye-slash" aria-hidden="true"></i>
</span>
                                                </div>
                                            </div>
                                            @error('confirm_password')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="row mb-10">
                                    <div class="col-md-12">
                                        <button
                                            class="btn btn-sm btn-shadow btn-outline-info btn-hover-shine update-password"
                                            type="button"><i
                                                class="fa fa-fw fa-lg fa-check-circle"></i> Update
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="theme-color">
                        <div class="tile user-settings">
                            <h4 class="line-head">Theme Color Update</h4>
                            <form action="{{route('change-theme')}}" id="theme_form" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-6">
                                        <label>Font Color</label>

                                        <div class="input-group mb-3">
                                            <input class="colorpicker form-control @error('font_color') is-invalid @enderror"
                                                   id="font_color" name="font_color" value="{{$user->theme_color}}" type="text"
                                                   placeholder="">
                                            @error('font_color')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="clearfix"></div>
                                    <div class="col-md-6">
                                        <label>Theme Color</label>
                                        <div class="input-group mb-3">
                                            <input class="colorpicker form-control @error('background_color') is-invalid @enderror"
                                                   id="background_color" name="background_color" value="{{$user->background_color}}" type="text"
                                                   placeholder="">
                                            @error('background_color')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="row mb-10">
                                    <div class="col-md-12">
                                        <button
                                            class="btn btn-sm btn-shadow btn-outline-info btn-hover-shine update-theme-color"
                                            type="button"><i
                                                class="fa fa-fw fa-lg fa-check-circle"></i> Update
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
@push('page_scripts')

{{--  Color Picker  --}}
<script>
    $('.colorpicker').colorpicker();
</script>

    @php
        $doc = request('document');
    @endphp
    <script>
        $(document).ready(function () {
            var password = '<?php echo $doc; ?>';
            if (password == 'password') {
                $('#password').trigger('click');
            }else if (password == 'theme_color'){
                $('#theme_color').trigger('click');
            }
        });
    </script>
    <script>
        let fileInputOpened = false;

        document.getElementById('cameraIcon').addEventListener('click', function() {
            // Check if the file input has not been opened yet
            if (!fileInputOpened) {
                // Trigger the file input click event
                document.getElementById('profile-picture-input').click();
                // Set the flag to indicate that the file input has been opened
                fileInputOpened = true;
            }
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#profile-picture-input').on('change', function () {
                const formData = new FormData();
                formData.append('profile_pic', this.files[0]);
                $.ajax({
                    type: 'POST',
                    url: '{{ route('updateProfilePicture') }}',
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        // Handle the API response, e.g., show a success message
                        //console.log(data.message);
                        // Update the displayed profile picture if needed
                        $('#profile-picture').attr('src', data.updatedImageUrl);
                        Swal.fire({
                            icon: 'success',
                            title: 'Profile Update!',
                            text: 'Your profile updated successfully.',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload(); // Reload the page
                            }
                        });
                    },
                    error: function (xhr, textStatus, errorThrown) {
                        // Handle errors, e.g., display an error message
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>

{{--  Password Hide/Show --}}
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
        function toggleNewPasswordVisibility(inputId) {
            var passwordInput = document.getElementById(inputId);
            var toggleIcon = document.querySelector('.toggle-password2 i');
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
        function toggleConformPasswordVisibility(inputId) {
            var passwordInput = document.getElementById(inputId);
            var toggleIcon = document.querySelector('.conform-password i');

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

{{--  Profile details update api  --}}
    <script>
        $(document).ready(function () {
            $('.update-btn').click(function (e) {
                e.preventDefault();
                // Get the CSRF token value from the meta tag
                var csrfToken = $('meta[name="csrf-token"]').attr('content');

                // Add the CSRF token to the headers of the AJAX request
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    }
                });

                var formData = new FormData($('#update_form')[0]);

                $.ajax({
                    type: 'POST',
                    url: $('#update_form').attr('action'),
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (data) {

                        Swal.fire({
                            icon: 'success',
                            title: 'Update!',
                            text: 'Profile Updated SuccessFully.',
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

    {{--  Change Password api  --}}
    <script>
        $(document).ready(function () {
            $('.update-password').click(function (e) {
                e.preventDefault();
                // Get the CSRF token value from the meta tag
                var csrfToken = $('meta[name="csrf-token"]').attr('content');

                // Add the CSRF token to the headers of the AJAX request
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    }
                });

                var formData = new FormData($('#password_form')[0]);

                $.ajax({
                    type: 'POST',
                    url: $('#password_form').attr('action'),
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (data) {

                        Swal.fire({
                            icon: 'success',
                            title: 'Update!',
                            text: 'Password Updated SuccessFully.',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $('#current_password').val('');
                                $('#new_password').val('');
                                $('#confirm_password').val('');
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

{{--  Change Theme Color api  --}}
<script>
    $(document).ready(function () {
        $('.update-theme-color').click(function (e) {
            e.preventDefault();
            // Get the CSRF token value from the meta tag
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            // Add the CSRF token to the headers of the AJAX request
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                }
            });

            var formData = new FormData($('#theme_form')[0]);

            $.ajax({
                type: 'POST',
                url: $('#theme_form').attr('action'),
                data: formData,
                processData: false,
                contentType: false,
                success: function (data) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Update!',
                        text: 'Theme Updated SuccessFully.',
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
@endpush
