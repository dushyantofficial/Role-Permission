@extends('layouts.app')


@section('content')

    @include('Admin.flash-message')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 46px;
            height: 21px;
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
            height: 13px;
            width: 14px;
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
            width: 13px;
            height: 14px;
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
                <h1><i class="fa fa-th-list"></i>Show All Professional Skills</h1>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-12 float-right mb-5">
            <span class="pull-right float-right">&nbsp;
                <button type="button" class="btn btn-sm btn-shadow btn-outline-primary btn-hover-shine"
                        data-bs-toggle="modal"
                        data-bs-target="#add_professional_skills">
 + Add
                </button></span>

                <!-- Modal -->
            </div>
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body sortableTable__container table-responsive" id="my_report">
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Employee Name</th>
                                <th>Skill</th>
                                <th>Percentage</th>
                                <th>Status</th>
                                {{--                                <th width="280px">Action</th>--}}
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($Professional_Skills as $key => $Professional_Skill)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        @if(isset($Professional_Skill->resume_name))
                                            {{ $Professional_Skill->resume_name->name }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>{{ $Professional_Skill->professional_skills }}</td>
                                    <td>{{ $Professional_Skill->professional_per }}%</td>
                                    <td>
                                        <label class="switch">
                                            <input type="checkbox" class="statuss"
                                                   data-id="{{$Professional_Skill->id}}"
                                                   id="statusToggle" {{ $Professional_Skill->status === 'active' ? 'checked' : '' }}>
                                            <span class="slider round"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <button type="button"
                                                class="btn btn-sm btn-shadow btn-outline-info btn-hover-shine"
                                                data-bs-toggle="modal"
                                                data-bs-target="#edit_professional_skills{{$Professional_Skill->id}}">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button
                                            class="btn btn-sm btn-shadow btn-outline-danger btn-hover-shine delete-skill"
                                            data-delete-id="{{ $Professional_Skill->id }}">
                                            <i class="fa fa-trash" aria-hidden="true"></i></button>
                                    </td>
                                </tr>

                                <!-- Edit Professional_Skill Modal -->
                                <div class="modal fade" id="edit_professional_skills{{$Professional_Skill->id}}"
                                     data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                     aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" style="max-width: 50%;">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Professional Skills</h5>
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
                                                <form id="edit_form_{{ $Professional_Skill->id }}"
                                                      action="{{route('professional_skills.update',$Professional_Skill->id)}}"
                                                      method="post"
                                                      enctype="multipart/form-data">
                                                    @csrf
                                                    @method('patch')


                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Employee Name</label><span
                                                                    class="text-danger"><b>*</b></span>
                                                                <select class="form-control" name="resume_id" id="">
                                                                    <option value="">---Select Employee Name---</option>
                                                                    @foreach($resumes as $resume)
                                                                        <option
                                                                            value="{{$resume->id}}" @if(isset($Professional_Skill)) {{$Professional_Skill->resume_id == $resume->id  ? 'selected' : ''}} @endif>{{$resume->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Skill</label><span
                                                                    class="text-danger"><b>*</b></span>
                                                                <select class="form-control" name="professional_skills"
                                                                        id="">
                                                                    <option value="">---Select Skill---</option>
                                                                    @foreach(config('constants.SKILL') as $key => $skill)
                                                                        <option
                                                                            value="{{$skill}}" @if(isset($Professional_Skill)) {{$Professional_Skill->professional_skills == $skill  ? 'selected' : ''}} @endif>{{$key}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Color</label><span
                                                                    class="text-danger"><b>*</b></span>
                                                                <select class="form-control" name="color" id="">
                                                                    <option value="">---Select COLOR---</option>
                                                                    @foreach(config('constants.COLOR') as $key => $color)
                                                                        <option
                                                                            value="{{$color}}" @if(isset($Professional_Skill)) {{$Professional_Skill->color == $color  ? 'selected' : ''}} @endif>{{$key}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Percentage</label><span
                                                                    class="text-danger"><b>*</b></span>
                                                                <input type="number"
                                                                       class="form-control" id="professional_per"
                                                                       value="{{$Professional_Skill->professional_per}}"
                                                                       minlength="10"
                                                                       min="1" name="professional_per"
                                                                       placeholder="Enter Professional Per...">
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
                                                                data-resume-id="{{ $Professional_Skill->id }}">Update
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>

        <!-- Add Professional_Skill Modal -->
        <div class="modal fade" id="add_professional_skills" data-bs-backdrop="static" data-bs-keyboard="false"
             tabindex="-1"
             aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" style="max-width: 50%;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Professional Skills</h5>
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
                        <form id="add_form" action="{{route('professional_skills.store')}}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="control-label">Employee Name</label><span
                                            class="text-danger"><b>*</b></span>
                                        <select class="form-control" name="resume_id" id="">
                                            <option value="">---Select Employee Name---</option>
                                            @foreach($resumes as $resume)
                                                <option value="{{$resume->id}}">{{$resume->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="control-label">Skill</label><span
                                            class="text-danger"><b>*</b></span>
                                        <select class="form-control" name="professional_skills" id="">
                                            <option value="">---Select Skill---</option>
                                            @foreach(config('constants.SKILL') as $key => $skill)
                                                <option value="{{$key}}">{{$skill}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="control-label">Color</label><span
                                            class="text-danger"><b>*</b></span>
                                        <select class="form-control" name="color" id="">
                                            <option value="">---Select COLOR---</option>
                                            @foreach(config('constants.COLOR') as $key => $color)
                                                <option value="{{$color}}">{{$key}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="control-label">Percentage</label><span
                                            class="text-danger"><b>*</b></span>
                                        <input type="number"
                                               class="form-control" id="professional_per"
                                               value="{{old('professional_per')}}" minlength="10"
                                               min="1" name="professional_per" placeholder="Enter Professional Per...">
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

    <p class="text-center text-primary"><small>Developer Name :- <b style="color: red">Dushyant Chhatraliya</b></small>
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
                        $('#add_professional_skills').modal('hide'); // Close the modal
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: 'Your record was created successfully.',
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
                var resumeId = $(this).data('resume-id');

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
                        // Close the modal for the specific record
                        $('#edit_professional_skills' + resumeId).modal('hide');

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
    <script>
        $('.statuss').change(function () {
            var status = $(this).prop('checked') == true ? 'active' : 'De-Active';
            var id = $(this).data('id');
            $.ajax({
                type: "GET",
                dataType: "json",
                url: '{{ route('professional_skillsStatus') }}',
                data: {'status': status, 'id': id},
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

    {{--   Delete Record With Js --}}
    <script>
        $(document).ready(function () {
            // Add click event listener to the delete button
            $(document).on('click', '.delete-skill', function () {
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
                            url: '{{ route('professional_skills.destroy', ['professional_skill' => 'id']) }}' + id,
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
