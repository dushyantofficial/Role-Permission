@extends('layouts.app')


@section('content')
    <style>
        #container {
            background: #eff3f7;
            margin: 0 auto;
            font-size: 0;
            border-radius: 5px;
            overflow: hidden;
        }

        .aside {
            width: 260px;
            height: 800px;
            background-color: #3b3e49;
            display: inline-block !important;
            vertical-align: top;
        }

        .div1 {
            width: 873px;
            height: 800px;
            display: inline-block;
            font-size: 15px;
            vertical-align: top;
        }

        .aside header {
            padding: 30px 20px;
        }

        .aside input {
            width: 100%;
            height: 50px;
            line-height: 50px;
            padding: 0 50px 0 20px;
            background-color: #5e616a;
            border: none;
            border-radius: 3px;
            color: #fff;
            background-image: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/1940306/ico_search.png);
            background-repeat: no-repeat;
            background-position: 170px;
            background-size: 40px;
            font-size: 15px;
        }

        .aside input::placeholder {
            color: #fff;
        }

        .aside ul {
            padding-left: 0;
            margin: 0;
            list-style-type: none;
            overflow-y: scroll;
            height: 690px;
        }

        .aside li {
            padding: 10px 0;
        }

        .aside li:hover {
            background-color: #5e616a;
        }

        h2, h3 {
            margin: 0;
        }

        .aside li img {
            border-radius: 50%;
            margin-left: 20px;
            margin-right: 8px;
            width: 55px;
            height: 55px;
        }

        .aside li div {
            display: inline-block;
            vertical-align: top;
            margin-top: 12px;
        }

        .aside li h2 {
            font-size: 14px;
            color: #fff;
            font-weight: normal;
            margin-bottom: 5px;
        }

        .aside li h3 {
            font-size: 12px;
            color: #7e818a;
            font-weight: normal;
        }

        .status {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            display: inline-block;
            margin-right: 7px;
        }

        .green {
            background-color: #58b666;
        }

        .orange {
            background-color: #ff725d;
        }

        .blue {
            background-color: #6fbced;
            margin-right: 0;
            margin-left: 7px;
        }

        .div1 header {
            height: 110px;
            padding: 30px 20px 30px 40px;
        }

        .div1 header > * {
            display: inline-block;
            vertical-align: top;
        }

        .div1 header img:first-child {
            border-radius: 50%;
        }

        .div1 header img:last-child {
            width: 55px;
            margin-top: -5px;
            height: 55px
        }

        .div1 header div {
            margin-left: 10px;
            margin-right: 60px;
        }

        .div1 header h2 {
            font-size: 15px;
            margin-bottom: 5px;
        }

        .div1 header h3 {
            font-size: 14px;
            font-weight: normal;
            color: #7e818a;
        }

        #chat {
            padding-left: 0;
            margin: 0;
            list-style-type: none;
            overflow-y: scroll;
            height: 535px;
            border-top: 2px solid #fff;
            border-bottom: 2px solid #fff;
        }

        #chat li {
            padding: 10px 30px;
        }

        #chat h2, #chat h3 {
            display: inline-block;
            font-size: 13px;
            font-weight: normal;
        }

        #chat h3 {
            color: #bbb;
        }

        #chat .entete {
            margin-bottom: 5px;
        }

        #chat .message {
            padding: 20px;
            color: #fff;
            line-height: 25px;
            max-width: 90%;
            display: inline-block;
            text-align: left;
            border-radius: 5px;
        }

        #chat .me {
            text-align: right;
        }

        #chat .you .message {
            background-color: #58b666;
        }

        #chat .me .message {
            background-color: #6fbced;
        }

        #chat .triangle {
            width: 0;
            height: 0;
            border-style: solid;
            border-width: 0 10px 10px 10px;
        }

        #chat .you .triangle {
            border-color: transparent transparent #58b666 transparent;
            margin-left: 15px;
        }

        #chat .me .triangle {
            border-color: transparent transparent #6fbced transparent;
            margin-left: 760px;
        }

        .div1 footer {
            height: 155px;
            padding: 20px 30px 10px 20px;
        }

        .div1 footer textarea {
            resize: none;
            border: none;
            display: block;
            width: 100%;
            height: 80px;
            border-radius: 3px;
            padding: 20px;
            font-size: 13px;
            margin-bottom: 13px;
        }

        .div1 footer textarea::placeholder {
            color: #ddd;
        }

        .div1 footer img {
            height: 30px;
            cursor: pointer;
        }
    </style>
    <style>
        .profile-container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .profile-header {
            background-color: #007bff;
            color: #fff;
            text-align: center;
            padding: 20px;
        }

        .profile-content {
            display: flex;
            padding: 20px;
        }

        .profile-image {
            flex: 1;
            text-align: center;
        }

        .profile-image img {
            max-width: 100%;
            border-radius: 50%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .profile-details {
            flex: 2;
            padding-left: 20px;
        }

        .profile-details h2 {
            color: #007bff;
        }

        .profile-details p {
            margin: 10px 0;
        }

        .active {
            background: #0d1214;
            border-left-color: #009688;
        }
        #container {
            transition: transform 0.5s;
            transform-origin: top left;
        }

        .rotate-90 {
            transform: rotate(90deg);
        }

        .rotate-0 {
            transform: rotate(0deg);
        }

        #scrollToTop {
            display: none;
            width: 35px;
            height: 35px;
            position: absolute;
            bottom: 190px;
            right: 25px;
            background-color: #009688;
            border-radius: 50%;
            cursor: pointer;
            z-index: 10;
            transition: 0.2s;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /*#scrollToTop :hover {*/
        /*    background-color: #009688;*/
        /*}*/
    </style>
    <main class="app-content {{user_theme_get()}}">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-th-list"></i>User Chatting</h1>
            </div>
            <span class="pull-right float-right">&nbsp;
                <a href="{{route('users.index')}}" class="btn btn-sm btn-shadow btn-outline-secondary btn-hover-shine">Back</a>
            </span>
        </div>
        <div id="container">
            <div class="aside">
                <header>
                    <input type="text" id="search_field" placeholder="search">
                </header>
                <ul id="demonames">
                    <li class="app-menu__item {{ request('id') == $receiver_record->id ? 'active' : '' }}">
                        <a href="{{route('user-chat')}}?id={{$receiver_record->id}}">
                            @if($receiver_record->profile_pic != null)
                                <img src="{{asset('storage/images/'.$receiver_record->profile_pic)}}" alt=""
                                     width="55px">
                            @else
                                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/1940306/chat_avatar_04.jpg"
                                     alt="">
                            @endif
                            <div>
                                <h2 class="demoname">{{$receiver_record->name}}</h2>
                                @if($receiver_record->user_status == 'online')
                                    <h3>
                                        <span class="status green"></span>
                                        <strong>online</strong>
                                    </h3>
                                @else
                                    <h3>
                                        <span class="status orange"></span>
                                        <strong>offline</strong>
                                    </h3>
                                @endif
                            </div>
                        </a>
                    </li>
                    @foreach($all_users as $all_user)
                        <li class="app-menu__item {{ request('id') == $all_user->id ? 'active' : '' }}">
                            <a href="{{route('user-chat')}}?id={{$all_user->id}}">
                                @if($all_user->profile_pic != null)
                                    <img src="{{asset('storage/images/'.$all_user->profile_pic)}}" alt="" width="55px">
                                @else
                                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/1940306/chat_avatar_04.jpg"
                                         alt="">
                                @endif
                                <div>
                                    <h2 class="demoname">{{$all_user->name}}</h2>
                                    @if($all_user->user_status == 'online')
                                        <h3>
                                            <span class="status green"></span>
                                            <strong>online</strong>
                                        </h3>
                                    @else
                                        <h3>
                                            <span class="status orange"></span>
                                            <strong>offline</strong>
                                        </h3>
                                    @endif
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="div1" id="div1">
                <header>
                    @if($receiver_record->profile_pic != null)
                        <a href="{{asset('storage/images/'.$receiver_record->profile_pic)}}"
                           data-lightbox="profile-pic">
                            <img src="{{asset('storage/images/'.$receiver_record->profile_pic)}}" alt="" width="55px">
                        </a>
                    @else
                        <a href="https://s3-us-west-2.amazonaws.com/s.cdpn.io/1940306/chat_avatar_04.jpg"
                           data-lightbox="profile-pic">
                            <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/1940306/chat_avatar_04.jpg" alt="">
                        </a>
                    @endif
                    <div>
                        <h2>Chat with {{$receiver_record->name}}</h2>
                        <h3>already {{$user_chats->count()}} messages</h3>
                    </div>
                    <div>
                        <form action="{{ route('user-chat') }}" id="filter_date" class="d-flex">
                            @csrf
                            <input id="reportrange" name="date" value=""
                                   class="pull-left form-control daterange"
                                   placeholder="Select Date">
                            <div class="d-flex">
                                <button type="button"
                                        class="btn btn-sm btn-shadow btn-outline-success btn-hover-shine rotate-button"
                                        id="datefiltersubmitBtn">
                                    <i
                                        class="fa fa-filter" aria-hidden="true"></i></button>
                            </div>
                        </form>
                    </div>
                    <button class="btn btn-sm btn-shadow btn-outline-danger btn-hover-shine rotate-button"
                            id="reloadButton" style="margin-left: -15%;padding: 7px"><i
                            class="fa fa-refresh fa-spin" aria-hidden="true"></i></button>
                    <button class="btn btn-sm btn-shadow btn-outline-danger btn-hover-shine" data-bs-toggle="modal"
                            data-bs-target="#show_profile" style="float: inline-end;">View Profile
                    </button>
                </header>
                <ul id="chat">

                </ul>
                <div id="scrollToTop">
                    <svg fill="#ffffff" height="48" viewBox="0 0 24 24" width="48" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.41 15.41L12 10.83l4.59 4.58L18 14l-6-6-6 6z"/>
                        <path d="M0 0h24v24H0z" fill="none"/>
                    </svg>
                </div>
                <button class="btn btn-sm btn-shadow btn-outline-danger btn-hover-shine"
                        style="position: absolute;bottom: 38px;left: 38%;" onclick="checkAndLoadChatData()"><i
                        class="fa fa-refresh" aria-hidden="true"></i></button>
                <footer>
                    <form id="add_data" action="{{ route('user-chat-send') }}" enctype="multipart/form-data">
                        @csrf
                        <textarea name="message" id="message" placeholder="Type your message"></textarea>
                        <div class="form-group" style="width: 251px;margin-left: 6%;">
                            <div class="custom-file">
                                <input type="file" name="document[]" class="custom-file-input" multiple id="document"
                                       style="cursor: pointer;">
                                <label class="custom-file-label" for="customFile">Upload Document</label>
                            </div>
                        </div>
                        <input class="form-control" type="hidden" name="receiver_id" value="{{ $receiver_record->id }}">
                        <button type="button" id="sendsubmitBtn"
                                class="btn btn-sm btn-shadow btn-outline-primary btn-hover-shine"
                                style="display: none;float: inline-end;margin-top: -6%;">
                            <span id="loader" style="display: none;"><i
                                    class="fa fa-spinner fa-spin"></i> Loading...</span>
                            Send
                        </button>
                    </form>
                </footer>
            </div>
        </div>


        {{--Show Profile Model--}}
        <div class="modal fade" id="show_profile" tabindex="-1"
             aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" style="max-width: 50%;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">View Profile</h5>
                    </div>
                    @php
                        $user = $receiver_record
                    @endphp
                    <div class="modal-body">
                        <div class="profile-container">
                            <div class="profile-header">
                                <h1>User Profile</h1>
                            </div>
                            <div class="profile-content">
                                <div class="profile-image">
                                    <!-- Replace 'your_image_url' with the actual URL of the user's profile picture -->
                                    @if($user->profile_pic == '')
                                        <img class="user-img" src="{{asset('admin/images/dummy_img.png')}}" alt="user"
                                             width="100px" height="100px">
                                    @else
                                        <img class="user-img" src="{{asset('storage/images/'.$user->profile_pic)}}"
                                             width="100px" height="100px">

                                    @endif
                                </div>
                                <div class="profile-details">
                                    <h2>{{$user->name}}</h2>
                                    <p>Email: {{$user->email}}</p>
                                    <p>Status:
                                        @if($user->status == 'active')
                                            <label class="badge badge-success">{{ucfirst($user->status)}}</label>
                                        @else
                                            <label class="badge badge-danger">{{ucfirst($user->status)}}</label>
                                        @endif

                                    </p>
                                    <p>Role:
                                        @if($user->getRoleNames()->count() > 0)
                                            @foreach($user->getRoleNames() as $v)
                                                <label class="badge badge-success">{{ $v }}</label>
                                            @endforeach
                                        @else
                                            <label class="badge badge-danger">No Role Define</label>
                                        @endif
                                    </p>

                                    <!-- Add more details as needed -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
@push('page_scripts')
    <!-- Add this in your HTML head section -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>

    <script>
        lightbox.option({
            'resizeDuration': 200,
            'wrapAround': true
        });
    </script>

    {{--  Search name  --}}
    <script>
        // SEARCH FUNCTION
        var btsearch = {
            init: function (search_field, searchable_elements, searchable_text_class) {
                $(search_field).keyup(function (e) {
                    e.preventDefault();
                    var query = $(this).val().toLowerCase();
                    if (query) {
                        // loop through all elements to find match
                        $.each($(searchable_elements), function () {
                            var title = $(this).find(searchable_text_class).text().toLowerCase();
                            if (title.indexOf(query) == -1) {
                                $(this).hide();
                            } else {
                                $(this).show();
                            }
                        });
                    } else {
                        // empty query so show everything
                        $(searchable_elements).show();
                    }
                });
            }
        }

        // INIT
        $(function () {
            // USAGE: btsearch.init(('search field element', 'searchable children elements', 'searchable text class');
            btsearch.init('#search_field', '#demonames li', '.demoname');
        });
    </script>

    {{--Button show hide--}}
    <script>
        $(document).ready(function () {
            function updateSendButtonVisibility() {
                var hasText = $('#message').val().trim() !== '';
                var hasImage = $('#document')[0].files.length > 0;

                // Show or hide the upload and send buttons based on whether there is text or an image
                $('#uploadBtn').toggle(!hasText && hasImage);
                $('#sendsubmitBtn').toggle(hasText || hasImage);
            }

            // Check if there is text or an image to show/upload buttons
            $('#message, #document').on('input change', function () {
                updateSendButtonVisibility();
            });

            // Your other JavaScript code here...

            // For example, you might want to trigger a click event on the hidden file input
            $('#uploadBtn').click(function () {
                $('#document').click();
            });
        });
    </script>

    {{--  Message send with ajax  --}}
    <script>
        $(document).ready(function () {
            $('#sendsubmitBtn').click(function (e) {
                e.preventDefault();

                var hasImage = $('#document')[0].files.length > 0;
                if (hasImage) {
                    //File upload validation
                    var maxSize = 50 * 1024 * 1024; // 50 MB
                    var fileSize = $('#document')[0].files[0].size;

                    if (fileSize > maxSize) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'File size exceeds the maximum limit of 50 MB.',
                        });
                        return false;
                    }
                    // File format validation (client-side)
                    var allowedFormats = ['jpeg', 'bmp', 'png', 'jpg', 'zip', 'doc', 'mp4', 'webp', 'xlsx', 'csv', 'pdf', 'docx'];
                    var fileName = $('#document')[0].files[0].name;
                    var fileExtension = fileName.split('.').pop().toLowerCase();

                    if (allowedFormats.indexOf(fileExtension) === -1) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'Invalid file format. Allowed formats are PNG, JPG, JPEG, ZIP, PDF, MP4, CSV, XLSX, MBP, DOC, WEBP, DOCX.',
                        });
                        return false;
                    }
                }

                // Show loading spinner inside the button
                $('#loader').show();
                $('#sendsubmitBtn').attr('disabled', true); // Disable the button during loading


                var formData = new FormData($('#add_data')[0]);
                $.ajax({
                    type: 'POST',
                    url: $('#add_data').attr('action'),
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        // Update the chat messages with the new data
                        $('#chat').scrollTop($('#chat')[0].scrollHeight);
                        // Clear the textarea and file input values
                        $('#message').val('');
                        $('#document').val('');
                        $('#sendsubmitBtn').hide();
                        loadChatData()
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
                    },
                    complete: function () {
                        // Hide loading spinner inside the button
                        $('#loader').hide();
                        $('#sendsubmitBtn').attr('disabled', false); // Enable the button after loading
                    }
                });
            });
        });
    </script>

    <script>

        function loadChatData() {
            var userId = {{ $receiver_record->id }}; // Assuming you can get the user ID from your view
            var authId = {{\Illuminate\Support\Facades\Auth::user()->id}};

            // Get the selected date range value
            var dateValue = $("#reportrange").val();
            if (dateValue != '') {
                // Get the current form action
                var formAction = $('#filter_date').attr('action');
                // Add the "date" parameter to the form action
                formAction += '?id={{ request('id') }}&date=' + encodeURIComponent(dateValue);

                // Update the form action
                $('#filter_date').attr('action', formAction);
            } else {
                var formAction = $('#filter_date').attr('action');
                formAction += '?id=' + encodeURIComponent(userId);

                // Update the form action
                $('#filter_date').attr('action', formAction);
            }
            $.ajax({
                url: formAction,
                method: 'GET',
                success: function (data) {
                    console.log(data.user_chats)
                    // Handle the received data
                    if (data.error) {
                        console.error('Error: ' + data.error);
                    } else {
                        {{--var renderedContent = {!! json_encode(view("admin.chat.user_chat_render", ['user_chats' => $user_chats, 'all_users' => $all_users, 'receiver_record' => $receiver_record])->render()) !!};--}}
                        var dataList = '';

                        data.user_chats.forEach(function (userChat, index) {
                            if (userChat.sender_id == authId) {
                                dataList += `
<li class="me" id="me">
                <div class="entete">
                    <h3>${userChat.date}, ${userChat.time}</h3>
                    <span class="status blue"></span>
                </div>
                ${userChat.message != null ? `
                    <div class="triangle"></div>
                    <div class="message">
                        ${userChat.message}
                    </div>
                    <br>
                ` : ''}

                ${userChat.document != null ? `
                    <div class="images-container">
    ${userChat.document.map((document, documentIndex) => {
                                    const file_extension = document.split('.').pop().toLowerCase();
                                    let fileElement;

                                    if (['csv', 'xlsx'].includes(file_extension)) {
                                        fileElement = `<a href="storage/admin/document/${document}" target="_blank"><i style="font-size: xxx-large" class="fa fa-file-excel-o" aria-hidden="true"></i></a>`;
                                    } else if (file_extension === 'mp4') {
                                        fileElement = `<a href="storage/admin/document/${document}" target="_blank"><i style="font-size: xxx-large" class="fa fa-video-camera" aria-hidden="true"></i></a>`;
                                    } else if (file_extension === 'pdf') {
                                        fileElement = `<a href="storage/admin/document/${document}" target="_blank"><i style="font-size: xxx-large" class="fa fa-file-pdf-o" aria-hidden="true"></i></a>`;
                                    } else if (file_extension === 'zip') {
                                        fileElement = `<a href="storage/admin/document/${document}" target="_blank"><i style="font-size: xxx-large" class="fa fa-file-archive-o" aria-hidden="true"></i></a>`;
                                    } else if (['doc', 'docx'].includes(file_extension)) {
                                        fileElement = `<a href="storage/admin/document/${document}" target="_blank"><i style="font-size: xxx-large" class="fa fa-file" aria-hidden="true"></i></a>`;
                                    } else {
                                        fileElement = `<img src="storage/admin/document/${document}" alt="Image" width="50px" style="cursor: zoom-out;" data-toggle="modal" data-target="#imageModal${index}_${documentIndex}">`;
                                    }

                                    // Add line break after every fourth file
                                    if ((documentIndex + 1) % 4 === 0 && documentIndex + 1 < userChat.document.length) {
                                        fileElement += '<br>';
                                    }

                                    return fileElement;
                                }).join('')}
</div>
                ` : ''}

                ${userChat.document != null ? `
                    <!-- Modal -->
                   ${userChat.document.map((document, documentIndex) => `
    <div class="modal fade" id="imageModal${index}_${documentIndex}" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- Close button -->
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <center>
                        <img src="storage/admin/document/${document}" class="img-fluid" alt="Image">
                    </center>
                    <!-- Download Button -->
                    <div class="mt-2 text-center">
                        <a href="storage/admin/document/${document}" download="image.jpg" class="btn btn-sm btn-shadow btn-outline-primary btn-hover-shine">
                            Download
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
`).join('')}

                ` : ''}
        </li>`;
                            } else {
                                dataList += `
<li class="you" id="you">
                           <div class="entete">
<span class="status green"></span>
                    <h3>${userChat.date}, ${userChat.time}</h3>
                </div>
                ${userChat.message != null ? `
                    <div class="triangle"></div>
                    <div class="message">
                        ${userChat.message}
                    </div>
                    <br>
                ` : ''}

                ${userChat.document != null ? `
                    <div class="images-container">
    ${userChat.document.map((document, documentIndex) => {
                                    const file_extension = document.split('.').pop().toLowerCase();
                                    let fileElement;

                                    if (['csv', 'xlsx'].includes(file_extension)) {
                                        fileElement = `<a href="storage/admin/document/${document}" target="_blank"><i style="font-size: xxx-large" class="fa fa-file-excel-o" aria-hidden="true"></i></a>`;
                                    } else if (file_extension === 'mp4') {
                                        fileElement = `<a href="storage/admin/document/${document}" target="_blank"><i style="font-size: xxx-large" class="fa fa-video-camera" aria-hidden="true"></i></a>`;
                                    } else if (file_extension === 'pdf') {
                                        fileElement = `<a href="storage/admin/document/${document}" target="_blank"><i style="font-size: xxx-large" class="fa fa-file-pdf-o" aria-hidden="true"></i></a>`;
                                    } else if (file_extension === 'zip') {
                                        fileElement = `<a href="storage/admin/document/${document}" target="_blank"><i style="font-size: xxx-large" class="fa fa-file-archive-o" aria-hidden="true"></i></a>`;
                                    } else if (['doc', 'docx'].includes(file_extension)) {
                                        fileElement = `<a href="storage/admin/document/${document}" target="_blank"><i style="font-size: xxx-large" class="fa fa-file" aria-hidden="true"></i></a>`;
                                    } else {
                                        fileElement = `<img src="storage/admin/document/${document}" alt="Image" width="50px" style="cursor: zoom-out;" data-toggle="modal" data-target="#imageModal${index}_${documentIndex}">`;
                                    }

                                    // Add line break after every fourth file
                                    if ((documentIndex + 1) % 4 === 0 && documentIndex + 1 < userChat.document.length) {
                                        fileElement += '<br>';
                                    }

                                    return fileElement;
                                }).join('')}
</div>
                ` : ''}

                ${userChat.document != null ? `
                    <!-- Modal -->
                  ${userChat.document.map((document, documentIndex) => `
    <div class="modal fade" id="imageModal${index}_${documentIndex}" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- Close button -->
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <center>
                        <img src="storage/admin/document/${document}" class="img-fluid" alt="Image">
                    </center>
                    <!-- Download Button -->
                    <div class="mt-2 text-center">
                        <a href="storage/admin/document/${document}" download="image.jpg" class="btn btn-sm btn-shadow btn-outline-primary btn-hover-shine">
                            Download
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
`).join('')}

                ` : ''}
        </li>`;
                            }
                        });

                        // Append HTML to the elements
                        newDataLoaded = true;
                        $('#chat').append(dataList);
                        //  document.getElementById('chat').innerHTML += dataList;
                        if (newDataLoaded) {
                            $('#chat').scrollTop($('#chat')[0].scrollHeight);
                        }

                        // loadChatData();
                        // Reload chat data every 5 seconds
                        // Note: You don't need to compare to true explicitly
                    }
                },
                error: function (error) {
                    console.error('Ajax request failed: ' + error.statusText);
                }
            });
        }

        $(document).ready(function () {
            var userChatCount = @json($user_chat_count);
            loadChatData();
        });

    </script>


    <script>
        function checkAndLoadChatData() {
            // Reset the date value in the datepicker
            $("#reportrange").datepicker('setDate', null);

            // Clear the chat area
            $("#chat").empty();

            // Call the function to load all data
            loadChatData();
        }

        $(document).ready(function () {
            // Initialize your datepicker, assuming it's using Bootstrap Datepicker
            $('#reportrange').datepicker({
                // Datepicker configuration options...
            });

            $('#reloadButton').click(function (e) {
                e.preventDefault();
                // Call the function to check and load chat data
                checkAndLoadChatData();
            });

            // Rest of your existing JavaScript code, including the loadChatData() function
        });
    </script>


    <script>
        jQuery(document).ready(function () {

//fixed scroll header
            $(window).scroll(function () {
                if ($(this).scrollTop() > 1) {
                    $('header').addClass('sticky');
                } else {
                    $('header').removeClass('sticky');
                }
            });

//fixed table head
            var tableFixed = function () {
                var doc = $(document),
                    fixed = false,
                    anchor = $('.anchor'),
                    content = $('.heading');

                var onScroll = function () {
                    var docTop = doc.scrollTop() + 50,
                        anchorTop = anchor.offset().top;

                    if (docTop > anchorTop) {
                        if (!fixed) {
                            anchor.height(content.outerHeight());
                            content.addClass('fixed');
                            fixed = true;
                        }
                    } else {
                        if (fixed) {
                            anchor.height(0);
                            content.removeClass('fixed');
                            fixed = false;
                        }
                    }
                };
                $(window).on('scroll', onScroll);
            };
            var demo = new tableFixed($('#chat'));

//button top
            $(window).scroll(function () {
                if ($(this).scrollTop() > 100) {
                    $('#scrollToTop').fadeIn();
                } else {
                    $('#scrollToTop').fadeOut();
                }
            });

            $('#scrollToTop').click(function () {
                $('#chat').animate({scrollTop: 0}, 800);
                return false;
            });

//scroll to element
            $('.button_a').click(function () {
                $('#chat').animate({
                        scrollTop: $('#chat').position().top
                    }, 300
                );
            });


        });
    </script>

    {{--  Date Picker  --}}
    <script type="text/javascript">

        $(function () {
            var start_date = null;
            var end_date = null;

            function cb(start, end) {
                start_date = start.format('DD-MM-YYYY');
                end_date = end.format('DD-MM-YYYY');
                var formattedDateRange = start_date + ' - ' + end_date;
                $('#reportrange span').html(formattedDateRange);
                $('.filter').trigger('change');
            }

            $('#reportrange').daterangepicker({
                startDate: moment(),
                endDate: moment(),
                autoUpdateInput: false,
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                locale: {
                    format: 'DD-MM-YYYY',
                    cancelLabel: 'Clear'
                }
            }, cb);

            $('#reportrange').on('apply.daterangepicker', function (ev, picker) {
                $(this).val(picker.startDate.format('DD-MM-YYYY') + ' - ' + picker.endDate.format('DD-MM-YYYY'));
            });

            $('#reportrange').on('cancel.daterangepicker', function () {
                $(this).val('');
                start_date = null;
                end_date = null;
            });

            // Trigger date range selection if start_date and end_date are provided
            if (start_date && end_date) {
                $('#reportrange').data('daterangepicker').setStartDate(moment(start_date, 'DD-MM-YYYY'));
                $('#reportrange').data('daterangepicker').setEndDate(moment(end_date, 'DD-MM-YYYY'));
                cb(moment(start_date, 'DD-MM-YYYY'), moment(end_date, 'DD-MM-YYYY'));
            }
        });

    </script>


    {{--  Date filter with ajax  --}}
    <script>
        $(document).ready(function () {
            $('#datefiltersubmitBtn').click(function (e) {
                e.preventDefault();
                // Get the selected date range value
                // Get the selected date range value
                var dateValue = $("#reportrange").val();

                // Get the current form action
                var formAction = $('#filter_date').attr('action');

                // Add the "date" parameter to the form action
                formAction += '?id={{ request('id') }}&date=' + encodeURIComponent(dateValue);

                // Update the form action
                $('#filter_date').attr('action', formAction);

                // Create FormData
                var formData = new FormData($('#filter_date')[0]);
                $.ajax({
                    type: 'GET',
                    url: $('#filter_date').attr('action'),
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        $("#chat").empty();
                        loadChatData();
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
                    },
                });
            });
        });
    </script>

@endpush
