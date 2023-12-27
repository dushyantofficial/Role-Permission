@extends('layouts.app')

@section('content')
    <main class="app-content {{user_theme_get()}}">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-edit"></i>Image Resize</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <h3 class="tile-title"></h3>
                    <div class="tile-body">


                    </div>
                    <div class="row">
                        <div class="col-2">
                            <label class="control-label">Default Image:</label>
                            <div class="input-group mb-3">
                                <input type="radio" data-bs-toggle="modal"
                                       name="image_button" data-bs-target="#default_image">
                            </div>
                        </div>
                        <div class="col-2">
                            <label class="control-label">Resize Image:</label>
                            <div class="input-group mb-3">
                                <input type="radio" data-bs-toggle="modal"
                                       name="image_button" data-bs-target="#resize_image">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="tile-body sortableTable__container table-responsive" id="my_report">
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Image</th>
                                <th>Image Type</th>
                                <th style="width: 112.719px;">Image Original Width/Height</th>
                                <th style="width: 105.438px">Image Width/Height</th>
                                <th style="width: 82.1719px">Original Image Size</th>
                                <th style="width: 83.3906px;">Compress Image Size</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($images as $image)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td><img src="{{asset('storage/resize_images/'.$image->image)}}" width="50px"
                                             height="50px" alt=""></td>
                                    <td>
                                        @if($image->image_type == 'default_image')
                                            <label class="badge badge-success">Default Image</label>
                                        @else
                                            <label class="badge badge-danger">Resize Image</label>
                                        @endif
                                    </td>
                                    <td>
                                        @if($image->image_original_width != null)
                                            {{$image->image_original_width}}
                                        @else
                                            -
                                        @endif
                                        /
                                        @if($image->image_original_height != null)
                                            {{$image->image_original_height}}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        @if($image->image_width != null)
                                            {{$image->image_width}}
                                        @else
                                            -
                                        @endif
                                        /
                                        @if($image->image_height != null)
                                            {{$image->image_height}}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        @if($image->image_size != null)
                                            {{number_format($image->image_size,2)}}KB
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        @if($image->compress_image_size != null)
                                            {{number_format($image->compress_image_size,2)}}KB
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-shadow btn-outline-info btn-hover-shine"
                                           data-toggle="modal" data-target="#imageModal_{{$image->id}}">
                                            <i class="fa fa-image"></i></a>
                                        <a href="{{asset('storage/resize_images/'.$image->image)}}" download="image.jpg"
                                           class="btn btn-sm btn-shadow btn-outline-primary btn-hover-shine">
                                            <i class="fa fa-download"></i></a>
                                        </a>
                                        <!-- Modal Structure -->
                                        <div class="modal" id="imageModal_{{$image->id}}" tabindex="-1" role="dialog"
                                             data-bs-backdrop="static" data-bs-keyboard="false">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Image Preview</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- Add your modal content here -->
                                                        <img src="{{ asset('storage/resize_images/'.$image->image) }}"
                                                             alt="user-avatar" class="img-fluid rounded">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button"
                                                                class="btn btn-sm btn-shadow btn-outline-secondary btn-hover-shine"
                                                                data-dismiss="modal">Close
                                                        </button>
                                                        <a href="{{asset('storage/resize_images/'.$image->image)}}"
                                                           download="image.jpg"
                                                           class="btn btn-sm btn-shadow btn-outline-danger btn-hover-shine">
                                                            Download</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button
                                            class="btn btn-sm btn-shadow btn-outline-danger btn-hover-shine delete-image"
                                            data-delete-id="{{ $image->id }}">
                                            <i class="fa fa-trash" aria-hidden="true"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>


            </div>


            {{--       Default image model     --}}
            <div class="modal fade" id="default_image" data-bs-backdrop="static" data-bs-keyboard="false"
                 tabindex="-1"
                 aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" style="max-width: 50%;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Image</h5>
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
                            <form action="{{route('image-resize-store')}}" method="POST" enctype="multipart/form-data"
                                  id="default_image_form">
                                @csrf
                                <input type="hidden" name="image_type" value="default_image">
                                <div class="row">
                                    <div class="col-6">
                                        <label class="control-label">Image:</label><span
                                            class="text-danger"><b>*</b></span>
                                        <div class="input-group mb-3">
                                            <input class="form-control  @error('image') is-invalid @enderror"
                                                   type="file"
                                                   name="image"
                                                   id="image_default" value="{{old('image')}}"
                                                   placeholder="Enter Full Name" autofocus>
                                            <div class="input-group-append">
                                                <div class="input-group-text"><span class="fa fa-image"></span></div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button"
                                            class="btn btn-sm btn-shadow btn-outline-secondary btn-hover-shine"
                                            data-bs-dismiss="modal">Close
                                    </button>
                                    <button type="submit" id="defaultsubmitBtn"
                                            class="btn btn-sm btn-shadow btn-outline-primary btn-hover-shine">Default
                                        Image
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            {{--       Resize image model     --}}
            <div class="modal fade" id="resize_image" data-bs-backdrop="static" data-bs-keyboard="false"
                 tabindex="-1"
                 aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" style="max-width: 50%;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Image</h5>
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
                            <form action="{{route('image-resize-store')}}" method="POST" enctype="multipart/form-data"
                                  id="resize_image_form">
                                @csrf
                                <input type="hidden" name="image_type" value="resize_image">
                                <div class="row">
                                    <div class="col-12">
                                        <label class="control-label">Image:</label><span
                                            class="text-danger"><b>*</b></span>
                                        <div class="input-group mb-3">
                                            <input class="form-control  @error('image') is-invalid @enderror"
                                                   type="file"
                                                   id="image_resize" name="image"
                                                   value="{{old('image')}}" placeholder="Enter Full Name" autofocus>
                                            <div class="input-group-append">
                                                <div class="input-group-text"><span class="fa fa-image"></span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label class="control-label">Image Width:</label><span
                                            class="text-danger"><b>*</b></span>
                                        <div class="input-group mb-3">
                                            <input class="form-control  @error('image_width') is-invalid @enderror"
                                                   type="number"
                                                   name="image_width" min="1"
                                                   value="{{old('image_width')}}" placeholder="Enter Image Width"
                                                   autofocus>
                                        </div>

                                    </div>
                                    <div class="col-6">
                                        <label class="control-label">Image Height:</label><span
                                            class="text-danger"><b>*</b></span>
                                        <div class="input-group mb-3">
                                            <input class="form-control  @error('image_height') is-invalid @enderror"
                                                   type="number"
                                                   name="image_height" min="1"
                                                   value="{{old('image_height')}}" placeholder="Enter Image Height"
                                                   autofocus>
                                        </div>

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button"
                                            class="btn btn-sm btn-shadow btn-outline-secondary btn-hover-shine"
                                            data-bs-dismiss="modal">Close
                                    </button>
                                    <button type="submit" id="resizesubmitBtn"
                                            class="btn btn-sm btn-shadow btn-outline-primary btn-hover-shine">Resize
                                        Image
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        </div>
    </main>
@endsection
@push('page_scripts')
    {{--  Default Image   --}}
    <script>
        $(document).ready(function () {
            $('#defaultsubmitBtn').click(function (e) {
                e.preventDefault();

                // Validate file type
                const allowedFileTypes = ['image/png', 'image/jpeg', 'image/jpg', 'image/webp'];
                const selectedFileType = $('#image_default').prop('files')[0].type;

                if (allowedFileTypes.indexOf(selectedFileType) === -1) {
                    showError('Invalid File Type', 'Please select a valid image file (png, jpg, jpeg, webp).');
                    return;
                }

                // Validate file size (in bytes)
                const maxSize = 5 * 1024 * 1024; // 5 MB
                const selectedFileSize = $('#image_default').prop('files')[0].size;

                if (selectedFileSize > maxSize) {
                    showError('File Size Exceeded', 'Please select an image file smaller than 5 MB.');
                    return;
                }

                var formData = new FormData($('#default_image_form')[0]);

                $.ajax({
                    type: 'POST',
                    url: $('#default_image_form').attr('action'),
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        $('#default_image').modal('hide');
                        showSuccess('Success!', 'Default image successfully.');
                    },
                    error: function (xhr) {
                        // Handle validation errors
                        var errors = xhr.responseJSON.errors;
                        var errorMessages = [];

                        for (var field in errors) {
                            errorMessages.push(errors[field][0]);
                        }

                        showError('Error!', errorMessages.join('<br>') + '<br>');
                    }
                });
            });

            function showError(title, message) {
                Swal.fire({
                    icon: 'error',
                    title: title,
                    html: message,
                    confirmButtonColor: '#d33',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Optionally, you can add additional logic after the user clicks "OK"
                    }
                });
            }

            function showSuccess(title, message) {
                Swal.fire({
                    icon: 'success',
                    title: title,
                    text: message,
                    confirmButtonColor: '#28a745',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.reload(); // Reload the page
                    }
                });
            }
        });
    </script>

    {{-- Resize Image--}}
    <script>
        $(document).ready(function () {
            $('#resizesubmitBtn').click(function (e) { // Change 'submitBtn' to the actual ID of your button
                e.preventDefault();

                // Validate file type
                const allowedFileTypes = ['image/png', 'image/jpeg', 'image/jpg', 'image/webp'];
                const selectedFileType = $('#image_resize').prop('files')[0].type;

                if (allowedFileTypes.indexOf(selectedFileType) === -1) {
                    showError('Invalid File Type', 'Please select a valid image file (png, jpg, jpeg, webp).');
                    return;
                }

                // Validate file size (in bytes)
                const maxSize = 5 * 1024 * 1024; // 5 MB
                const selectedFileSize = $('#image_resize').prop('files')[0].size;

                if (selectedFileSize > maxSize) {
                    showError('File Size Exceeded', 'Please select an image file smaller than 5 MB.');
                    return;
                }

                var formData = new FormData($('#resize_image_form')[0]); // Use the form ID 'add_form'

                $.ajax({
                    type: 'POST',
                    url: $('#resize_image_form').attr('action'), // Use the form's action attribute
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        $('#resize_image').modal('hide');
                        showSuccess('Success!', 'Image resize successfully.');
                    },
                    error: function (xhr) {
                        // Handle validation errors
                        var errors = xhr.responseJSON.errors;
                        var errorMessages = [];

                        for (var field in errors) {
                            errorMessages.push(errors[field][0]);
                        }

                        showError('Error!', errorMessages.join('<br>') + '<br>');
                    }
                });
            });

            function showError(title, message) {
                Swal.fire({
                    icon: 'error',
                    title: title,
                    html: message,
                    confirmButtonColor: '#d33',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Optionally, you can add additional logic after the user clicks "OK"
                    }
                });
            }

            function showSuccess(title, message) {
                Swal.fire({
                    icon: 'success',
                    title: title,
                    text: message,
                    confirmButtonColor: '#28a745',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.reload(); // Reload the page
                    }
                });
            }
        });

    </script>

    {{--   Delete Record With Js --}}
    <script>
        $(document).ready(function () {
            // Add click event listener to the delete button
            $(document).on('click', '.delete-image', function () {
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
                            type: 'GET',
                            url: '/role-permissions-blog/public/image-resize-delete/' + id,
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
