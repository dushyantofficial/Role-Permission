<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/main.css')}}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css"
          href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
{{--    <script src='https://www.google.com/recaptcha/api.js'></script>--}}

    <title>Role Permission</title>
</head>
<body>

<section class="material-half-bg">
    <div class="cover"></div>
</section>
<style>
    .login-content .login-box {
        min-height: 469px;
    }
    .check_color_name{
        color: red;
    }
    /*.uncheck_color_name{*/
    /*    color: red;*/
    /*}*/
</style>
<section class="login-content">
    @include('Admin.languages')
    <div class="logo">
        <h1>Role Permission</h1>
    </div>

    <div class="login-box">
        <div class="card-body">
            <form class="login-form" id="add_form" action="{{ route('login') }}" method="POST"
                  style="margin-top: -27px;">
                @csrf
                <h3 class="login-head">
                    <i class="fa fa-lg fa-fw fa-user"></i>SIGN IN
                </h3>

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

                <div class="input-group mb-3">
                    <input name="password" type="password" class="form-control @error('password') is-invalid @enderror"
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

                <div class="form-group mt-4 mb-4">
                    <div class="captcha">
                        <span>{!! captcha_img() !!}</span>
                        <button type="button" class="btn btn-danger" class="reload" id="reload">
                            &#x21bb;
                        </button>
                    </div>
                </div>

                <div class="form-group mb-4">
                    <input id="captcha" type="text" class="form-control  @error('captcha') is-invalid @enderror"
                           placeholder="Enter Captcha" name="captcha">
                    @error('captcha')
                    <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="utility">
                        <p class="semibold-text mb-2"><a href="#" data-toggle="flip">Forgot Password ?</a></p>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group mb-6">
                    <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN
                        IN
                    </button>
                    </div>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;
                    <div class="form-group mb-6">
                    <a href="{{route('register')}}" class="btn btn-primary btn-block"><i class="fa fa-registered"
                                                                                    aria-hidden="true"></i>SIGN UP</a>
                </div>
            </form>
        </div>

        @include('Admin.flash-message')
        <form class="forget-form" id="email_form" method="POST" action="{{ route('password.email') }}">
            @csrf
            <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Forgot Password ?</h3>
            <div class="form-group">
                <label class="control-label">EMAIL</label>
                <input class="form-control @error('email') is-invalid @enderror"  name="email" type="text" placeholder="Email">
                @error('email')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="form-group btn-container">
                <button class="btn btn-primary btn-block" id="sendBtn"><i class="fa fa-unlock fa-lg fa-fw"></i>RESET</button>
            </div>
            <div class="form-group mt-3">
                <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Back to Login</a></p>
            </div>
        </form>
    </div>
</section>

<!-- Essential javascripts for application to work-->
<script src="{{asset('admin/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('admin/js/popper.min.js')}}"></script>
<script src="{{asset('admin/js/bootstrap.min.js')}}"></script>
<script src="{{asset('admin/js/main.js')}}"></script>
<!-- The javascript plugin to display page loading on top-->
<script src="{{asset('admin/js/plugins/pace.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/sweetalert.js')}}"></script>
<script type="text/javascript">
    // Login Page Flipbox control
    $('.login-content [data-toggle="flip"]').click(function() {
        $('.login-box').toggleClass('flipped');
        return false;
    });

</script>
<script type="text/javascript">
    $('#reload').click(function () {
        $.ajax({
            type: 'GET',
            url: 'reload-captcha',
            success: function (data) {
                $(".captcha span").html(data.captcha);
            }
        });
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


{{--Send Link Reset Password--}}
{{--<script>--}}
{{--    $(document).ready(function () {--}}
{{--        $('#sendBtn').click(function (e) { // Change 'submitBtn' to the actual ID of your button--}}
{{--            e.preventDefault();--}}
{{--            var formData = new FormData($('#email_form')[0]); // Use the form ID 'add_form'--}}

{{--            $.ajax({--}}
{{--                type: 'POST',--}}
{{--                url: $('#email_form').attr('action'), // Use the form's action attribute--}}
{{--                data: formData,--}}
{{--                processData: false,--}}
{{--                contentType: false,--}}
{{--                success: function (data) {--}}
{{--                    console.log(data)--}}
{{--                    Swal.fire({--}}
{{--                        icon: 'success',--}}
{{--                        title: 'Success!',--}}
{{--                        text: 'Send mail successfully.',--}}
{{--                    }).then((result) => {--}}
{{--                        if (result.isConfirmed) {--}}
{{--                            // Go back to the specific URL--}}
{{--                           // window.location.href = usersRoute;--}}

{{--                        }--}}
{{--                    });--}}

{{--                },--}}
{{--                error: function (xhr) {--}}
{{--                    // Handle validation errors (e.g., display error messages)--}}
{{--                    var errors = xhr.responseJSON.errors;--}}
{{--                    var errorMessages = [];--}}

{{--                    for (var field in errors) {--}}
{{--                        errorMessages.push(errors[field][0]);--}}
{{--                    }--}}

{{--                    Swal.fire({--}}
{{--                        icon: 'error',--}}
{{--                        title: 'Error!',--}}
{{--                        html: errorMessages.join('<br>') + '<br>', // Join error messages with <br> tags--}}
{{--                    });--}}
{{--                }--}}
{{--            });--}}
{{--        });--}}
{{--    });--}}

{{--</script>--}}
</body>
</html>




