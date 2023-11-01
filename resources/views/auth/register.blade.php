<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/main.css')}}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Role Permission App</title>
</head>
<body>
<section class="material-half-bg">
    <div class="cover"></div>
</section>

<section class="login-content">
    @include('Admin.languages')
    <div class="logo">
        <h1>Role Permission App</h1>
    </div>
    @include('Admin.flash-message')
    <div class="col-md-4">
        <div class="card">
            <h2 class="card-header text-center"><i class="fa fa-lg fa-fw fa-user"></i>SIGN UP</h2>

            <div class="card-body">
                <form id="add_form" class="login-form" action="{{ route('register') }}" method="POST"
                      enctype="multipart/form-data">
                    @csrf

                    <label class="control-label">Full Name:</label>
                    <div class="input-group mb-3">
                        <input class="form-control  @error('name') is-invalid @enderror" type="text" name="name"
                               value="{{old('name')}}" placeholder="Enter Full Name" autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text"><span class="fa fa-user"></span></div>
                        </div>
                    </div>

                    <label class="control-label">Profile Picture:</label>
                    <div class="input-group mb-3">
                        <input type="file"
                               name="profile_pic"
                               value=""
                               placeholder=""
                               class="form-control">
                        <div class="input-group-append">
                            <div class="input-group-text"><span class="fa fa-image"></span></div>
                        </div>
                    </div>

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

                    <label class="control-label">Confirm Password:</label>
                    <div class="input-group mb-3">
                        <input id="password_confirmation"
                               class="form-control @error('password_confirmation') is-invalid @enderror" type="password"
                               name="password_confirmation" placeholder="Enter Your Confirm Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <span class="confirm-password"
                                  onclick="toggleConfirmPasswordVisibility('password_confirmation')">
    <i class="fa fa-eye-slash" aria-hidden="true"></i>
</span>
                            </div>
                        </div>
                        @error('password_confirmation')
                        <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror

                    </div>


                    <div class="form-group">
                        <label class="control-label">ReCaptcha:</label>
                        <center>
                            <div class="g-recaptcha @error('g-recaptcha-response') is-invalid @enderror"
                                 data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}"></div>
                            @error('g-recaptcha-response')
                            <span class="text-danger" role="alert">
                                        {{ $message }}
                                    </span>
                        @enderror
                        </center>
                    </div>
                    <div class="form-group">
                        <div class="utility">
                            <p class="semibold-text mb-2"><a href="{{route('login')}}">I already have a membership</a>
                            </p>
                        </div>
                    </div>
                    <div class="form-group btn-container">
                        <button type="submit" class="btn btn-primary btn-block"><i
                                class="fa fa-sign-in fa-lg fa-fw"></i>SIGN UP
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Essential javascripts for application to work-->
<script src="{{asset('admin/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('admin/js/popper.min.js')}}"></script>
<script src="{{asset('admin/js/bootstrap.min.js')}}"></script>
<script src="{{asset('admin/js/main.js')}}"></script>
<!-- The javascript plugin to display page loading on top-->
<script src="{{asset('admin/js/plugins/pace.min.js')}}"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>
<script type="text/javascript" src="{{asset('admin/js/sweetalert.js')}}"></script>
<script type="text/javascript">
    // Login Page Flipbox control
    $('.login-content [data-toggle="flip"]').click(function() {
        $('.login-box').toggleClass('flipped');
        return false;
    });
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


{{--  Login With Ajax  --}}
<script>
    var usersRoute = "{{ route('home') }}";
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
                        text: 'User register successfully.',
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

</body>
</html>

