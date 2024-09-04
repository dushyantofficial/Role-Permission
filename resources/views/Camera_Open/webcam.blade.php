@extends('layouts.app')

@section('content')
    <style type="text/css">
        #results {
            padding: 20px;
            border: 1px solid;
            background: #ccc;
        }
    </style>
    <main class="app-content {{user_theme_get()}}">
        <div class="app-title">

            <div>
                <h1><i class="fa fa-camera"></i>Camera</h1>
            </div>

        </div>
        <h1 class="text-center">Laravel webcam capture image and save from camera</h1>
        <input type="text" class="form-control" id="decimalInput" oninput="formatDecimal(this)">
        <div id="camera"></div>
        <button id="capture-btn">Capture Image</button>
        <img id="captured-image" style="display: none;">

    </main>
@endsection
@push('page_scripts')
    <script>
        function formatDecimal(input) {
            // Remove any non-numeric and non-dot characters
            let sanitizedValue = input.value.replace(/[^0-9.]/g, '');

            // Split the value into integer and decimal parts
            let parts = sanitizedValue.split('.');

            // Allow only up to two decimal places
            if (parts.length > 1) {
                parts[1] = parts[1].slice(0, 2);
            }

            // Join the integer and decimal parts back together
            let formattedValue = parts.join('.');

            // Update the input value
            input.value = formattedValue;
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
    {{--    <script>--}}
    {{--        // Set up webcam--}}
    {{--        Webcam.set({--}}
    {{--            width: 640,--}}
    {{--            height: 480,--}}
    {{--            dest_width: 640,--}}
    {{--            dest_height: 480,--}}
    {{--            image_format: 'jpeg',--}}
    {{--            jpeg_quality: 90,--}}
    {{--            flip_horiz: true--}}
    {{--        });--}}

    {{--        Webcam.attach('#camera');--}}

    {{--        // Capture image--}}
    {{--        document.getElementById('capture-btn').addEventListener('click', function () {--}}
    {{--            Webcam.snap(function (data_uri) {--}}
    {{--                document.getElementById('captured-image').src = data_uri;--}}
    {{--                document.getElementById('captured-image').style.display = 'block';--}}

    {{--                // Save the image to the server using AJAX--}}
    {{--                saveImage(data_uri);--}}
    {{--            });--}}
    {{--        });--}}

    {{--        // Save image to the server--}}
    {{--        function saveImage(data_uri) {--}}
    {{--            // Send image data to Laravel backend for processing--}}
    {{--            axios.post('/save-image', {image: data_uri})--}}
    {{--                .then(response => {--}}
    {{--                    console.log(response.data);--}}
    {{--                })--}}
    {{--                .catch(error => {--}}
    {{--                    console.error(error);--}}
    {{--                });--}}
    {{--        }--}}
    {{--    </script>--}}

@endpush
