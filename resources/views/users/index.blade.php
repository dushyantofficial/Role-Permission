@extends('layouts.app')


@section('content')

    @include('Admin.flash-message')
    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: red;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .slider {
            background-color: green;
        }

        input:focus + .slider {
            box-shadow: 0 0 1px green;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
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
                <h1><i class="fa fa-th-list"></i>Show All User</h1>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-12 float-right mb-5">
                 <span class="pull-right float-left">&nbsp;

                <form id="backup_form" action="{{route('backup-run')}}" method="GET">
                    @csrf
                                <button type="button" class="btn btn-sm btn-shadow btn-outline-danger btn-hover-shine"
                                        id="submitBtn"><li class="fa fa-hdd-o"></li></button>
                                 <div id="lazyLoader" style="display: none;color: red">Loading...</div>
                      <div id="downloadTimer" style="display: none">0 seconds</div>
                                    </form>
            </span>
                <span class="pull-right float-right">&nbsp;
                <a href="{{route('users.create')}}" class="btn btn-sm btn-shadow btn-outline-primary btn-hover-shine">+ Add</a>
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
                                <th>Email</th>
                                <th>Roles</th>
                                <th>User Chatting</th>
                                @can('user-block')
                                <th>Status</th>
                                @endcan
                                <th width="280px">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($users as $key => $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if(!empty($user->getRoleNames()))
                                            @foreach($user->getRoleNames() as $v)
                                                <label class="badge badge-success">{{ $v }}</label>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('user-chat')}}?id={{$user->id}}"
                                           class="btn btn-sm btn-shadow btn-outline-danger btn-hover-shine">Chatting</a>
                                    </td>
                                    @can('user-block')
                                        <td>
                                            <label class="switch">
                                                <input type="checkbox" class="statuss"
                                                       data-id="{{$user->id}}"
                                                       id="statusToggle" {{ $user->status === 'active' ? 'checked' : '' }}>
                                                <span class="slider round"></span>
                                            </label>
                                            {{--                                        <input data-id="{{$user->id}}" class="toggle-class statuss" type="checkbox"--}}
                                            {{--                                               onclick="on();"--}}
{{--                                               data-onstyle="success" data-offstyle="danger" data-toggle="toggle"--}}
{{--                                               data-on="Active"--}}
{{--                                               data-off="Block" {{ $user->status=='active' ? 'checked' : '' }}>--}}
                                    </td>
                                    @endcan
                                    <td>
                                        <a class="btn btn-sm btn-shadow btn-outline-warning btn-hover-shine" href="{{ route('users.show',$user->id) }}"><i class="fa fa-eye"></i></a>
                                        <a class="btn btn-sm btn-shadow btn-outline-info btn-hover-shine" href="{{ route('users.edit',$user->id) }}"> <i class="fa fa-edit"></i></a>
                                        <button
                                            class="btn btn-sm btn-shadow btn-outline-danger btn-hover-shine delete-user"
                                            data-delete-id="{{ $user->id }}">
                                            <i class="fa fa-trash" aria-hidden="true"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

{{--                        <div class="page1 pull-right">--}}
{{--                            {!! $data->appends(request()->all())->render('pagination::bootstrap-4') !!}--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>


        <!-- Add User Modal -->
        <div class="modal fade" id="add_user" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
             aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" style="max-width: 50%;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Professional Skills</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('users.store')}}" method="POST" enctype="multipart/form-data"
                              id="add_form">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="control-label">Name</label><span class="text-danger"><b>*</b></span>
                                        <input name="name" type="text" value="{{old('name')}}"
                                               class="form-control @error('name') is-invalid @enderror" id="oldPasswordInput"
                                               placeholder="Enter Full Name">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="control-label">Email</label>
                                        <input name="email" type="text" value="{{old('email')}}"
                                               class="form-control @error('email') is-invalid @enderror"
                                               placeholder="Enter User Email">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="control-label">Password</label>
                                        <input name="password" type="password" value="{{old('password')}}"
                                               id="password"   class="form-control @error('password') is-invalid @enderror"
                                               placeholder="Enter User Password">
                                        <input type="checkbox" id="remember" onclick="NewPassword()" name="remember" {{ old('remember') ? 'checked' : '' }}>&nbsp;&nbsp;
                                        <span class="label-text"><b id="hide_show">Show Password</b></span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="control-label">Confirm Password</label>
                                        <input name="confirm-password" type="password" value="{{old('confirm-password')}}"
                                               id="confirm_password"   class="form-control @error('confirm-password') is-invalid @enderror"
                                               placeholder="Enter User Password">
                                        <input type="checkbox" id="confirm_remember" onclick="ConfirmPassword()" name="confirm_remember" {{ old('confirm_remember') ? 'checked' : '' }}>&nbsp;&nbsp;
                                        <span class="label-text123"><b id="show_hide">Show Password</b></span>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="control-label">Roles</label>
                                        <select class="mul-select form-control @error('roles') is-invalid @enderror" name="roles[]" multiple="true">
                                            @foreach($roles as $role)
                                                <option value="{{$role->id}}" {{ in_array($role->id, old('roles', [])) ? 'selected' : '' }}>{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close
                                </button>
                                <button type="submit" id="submitBtn" class="btn btn-outline-primary">Save changes
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </main>



    <p class="text-center text-primary"><small>Developer Name :- <b style="color: red">Dushyant Chhatraliya</b></small></p>
@endsection
@push('page_scripts')
{{--    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js"></script>
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
    <script>
        $('.statuss').change(function () {
            var status = $(this).prop('checked') == true ? 'active' : 'Block';
            var user_id = $(this).data('id');
            $.ajax({
                type: "GET",
                dataType: "json",
                url: '{{ route('userStatus') }}',
                data: {'status': status, 'user_id': user_id},
                success: function (data) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Your status was updated successfully.',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload(); // Reload the page
                        }
                    });
                }
            });
        })
    </script>

{{--Backup Download With Ajax--}}
<script>
    $(document).ready(function () {
        $('#submitBtn').click(function (e) {
            e.preventDefault();
            var formData = new FormData($('#add_form')[0]);

            Swal.fire({
                title: 'Are you sure?',
                text: 'Do not refresh the page for 35 seconds!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, backup download it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Disable the button to prevent multiple clicks
                    $('#submitBtn').prop('disabled', true);

                    // Show the lazy loader
                    $('#lazyLoader').show();
                    $('#downloadTimer').show();

                    // Start the download timer
                    var startTime = Date.now();
                    var downloadTimerElement = $('#downloadTimer');

                    var downloadInterval = setInterval(function () {
                        var currentTime = Date.now();
                        var elapsedTime = (currentTime - startTime) / 1000; // Convert to seconds
                        downloadTimerElement.text(elapsedTime.toFixed(1) + ' seconds');
                    }, 100); // Update every 100 milliseconds
                    $.ajax({
                        type: 'GET',
                        url: $('#backup_form').attr('action'),
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function (data) {
                            // Close the lazy loader after a successful AJAX response
                            $('#lazyLoader').hide();
                            $('#downloadTimer').hide();
                            Swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                text: 'Backup Download completed in ' + downloadTimerElement.text(),
                            });
                        },
                        error: function (xhr) {
                            // Close the lazy loader on error
                            $('#lazyLoader').hide();
                            $('#downloadTimer').hide();
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
                        },
                        complete: function () {
                            // Enable the button after the request is complete (success or error)
                            $('#submitBtn').prop('disabled', false);

                            // Stop the download timer
                            clearInterval(downloadInterval);
                        }
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
        $(document).on('click', '.delete-user', function () {
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
                        url: '{{ route('users.destroy', ['user' => 'id']) }}' + id,
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
