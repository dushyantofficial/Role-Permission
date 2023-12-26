@extends('layouts.app')
@section('content')
    <style>
        #modelPopup {
            /* Define the styles for the model pop-up */
            display: none;
        }

        .visible {
            display: block;
        }

    </style>
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-edit"></i>Verify Email</h1>
                {{-- <p>Sample forms</p> --}}
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <h3 class="tile-title"></h3>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="control-label">Email</label>
                                <input name="email" type="email" value="{{old('email')}}"
                                       class="form-control @error('name') is-invalid @enderror" id="verify_email"
                                       placeholder="Enter Email">
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                        Open modal
                    </button>
                </div>
            </div>


        </div>
    </main>


    <div id="modelPopup" class="hidden">
        <!-- The Modal -->
        <div class="modal-dialog modal-dialog-centered" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Modal Heading</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        Modal body..
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>

    </div>
    </div>


@endsection
@push('page_scripts')
    <script>
        // Get the email input and model pop-up elements
        const emailInput = document.getElementById('verify_email');
        const modelPopup = document.getElementById('modelPopup');

        // Add event listener for the mouseout event on the email input
        emailInput.addEventListener('mouseout', () => {
            // Show the model pop-up
            modelPopup.classList.add('visible');
        });

        // Add event listener for the mouseover event on the model pop-up
        modelPopup.addEventListener('mouseover', () => {
            // Hide the model pop-up
            modelPopup.classList.remove('visible');
        });

    </script>
@endpush
