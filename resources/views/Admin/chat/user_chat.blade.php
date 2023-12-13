@extends('layouts.app')


@section('content')
    <main class="app-content {{user_theme_get()}}">
        <div class="app-title">

            <div>
                <h1><i class="fa fa-th-list"></i>User Chatting</h1>
            </div>

        </div>
        <style>
            #container {
                background: #eff3f7;
                margin: 0 auto;
                font-size: 0;
                border-radius: 5px;
                overflow: hidden;
            }

            aside {
                width: 260px;
                height: 800px;
                background-color: #3b3e49;
                display: inline-block !important;
                font-size: 15px;
                vertical-align: top;
            }

            .div1 {
                width: 873px;
                height: 800px;
                display: inline-block;
                font-size: 15px;
                vertical-align: top;
            }

            aside header {
                padding: 30px 20px;
            }

            aside input {
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
            }

            aside input::placeholder {
                color: #fff;
            }

            aside ul {
                padding-left: 0;
                margin: 0;
                list-style-type: none;
                overflow-y: scroll;
                height: 690px;
            }

            aside li {
                padding: 10px 0;
            }

            aside li:hover {
                background-color: #5e616a;
            }

            h2, h3 {
                margin: 0;
            }

            aside li img {
                border-radius: 50%;
                margin-left: 20px;
                margin-right: 8px;
            }

            aside li div {
                display: inline-block;
                vertical-align: top;
                margin-top: 12px;
            }

            aside li h2 {
                font-size: 14px;
                color: #fff;
                font-weight: normal;
                margin-bottom: 5px;
            }

            aside li h3 {
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
                width: 24px;
                margin-top: 8px;
            }

            .div1 header div {
                margin-left: 10px;
                margin-right: 145px;
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
        <div id="container">
            <aside>
                <header>
                    <input type="text" placeholder="search">
                </header>
                <ul>
                    @foreach($all_users as $all_user)
                        <li>
                            <a href="{{route('user-chat',$all_user->id)}}">
                                @if($all_user->profile_pic != null)
                                    <img src="{{asset('storage/images/'.$all_user->profile_pic)}}" alt="" width="55px">
                                @else
                                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/1940306/chat_avatar_04.jpg"
                                         alt="">
                                @endif
                                <div>
                                    <h2>{{$all_user->name}}</h2>
                                    @if($all_user->user_status == 'online')
                                        <h3>
                                            <span class="status green"></span>
                                            online
                                        </h3>
                                    @else
                                        <h3>
                                            <span class="status orange"></span>
                                            offline
                                        </h3>
                                    @endif
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </aside>
            <div class="div1">
                <header>
                    @if($receiver_record->profile_pic != null)
                        <img src="{{asset('storage/images/'.$receiver_record->profile_pic)}}" alt="" width="55px">
                    @else
                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/1940306/chat_avatar_04.jpg"
                             alt="">
                    @endif
                    <div>
                        <h2>Chat with {{$receiver_record->name}}</h2>
                        <h3>already {{$user_chats->count()}} messages</h3>
                    </div>
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/1940306/ico_star.png" alt="">
                </header>
                <ul id="chat">
                    @foreach($user_chats as $index => $user_chat)
                        @if($user_chat->sender_id == \Illuminate\Support\Facades\Auth::id())
                            <li class="me">
                                <div class="entete">
                                    <h3>{{$user_chat->time}}, Today</h3>
                                    <h2>{{$user_chat->sender_name->name}}</h2>
                                    <span class="status blue"></span>
                                </div>
                                <div class="triangle"></div>
                                <div class="message">
                                    {{$user_chat->message}}
                                </div>
                                <br>
                                @if ($user_chat->document != null)
                                    <div class="images-container">
                                        @foreach ($user_chat->document as $documentIndex => $document)
                                            @php
                                                $file_extension = pathinfo($document, PATHINFO_EXTENSION);
                                            @endphp
                                            @if($file_extension == 'csv' || $file_extension == 'xlsx')
                                                <a href="{{ asset('storage/admin/document/' . $document) }}" target="_blank"><i style="font-size: xxx-large" class="fa fa-file-excel-o" aria-hidden="true"></i></a>
                                            @elseif($file_extension == 'mp4')
                                                <a href="{{ asset('storage/admin/document/' . $document) }}" target="_blank"><i style="font-size: xxx-large" class="fa fa-video-camera" aria-hidden="true"></i></a>
                                            @elseif($file_extension == 'pdf')
                                                <a href="{{ asset('storage/admin/document/' . $document) }}" target="_blank"><i style="font-size: xxx-large" class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
                                            @elseif($file_extension == 'zip')
                                                <a href="{{ asset('storage/admin/document/' . $document) }}" target="_blank"><i style="font-size: xxx-large" class="fa fa-file-archive-o" aria-hidden="true"></i></a>
                                            @elseif($file_extension == 'doc')
                                                <a href="{{ asset('storage/admin/document/' . $document) }}" target="_blank"><i style="font-size: xxx-large" class="fa fa-file" aria-hidden="true"></i></a>
                                            @else
                                                <img src="{{ asset('storage/admin/document/' . $document) }}"
                                                     alt="Image" width="50px"
                                                     data-toggle="modal"
                                                     data-target="#imageModal{{ $index }}_{{ $documentIndex }}">
                                            @endif
                                            <!-- Modal -->
                                            <div class="modal fade" id="imageModal{{ $index }}_{{ $documentIndex }}"
                                                 tabindex="-1" role="dialog" aria-labelledby="imageModalLabel"
                                                 aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <img
                                                                src="{{ asset('storage/admin/document/' . $document) }}"
                                                                class="img-fluid" alt="Image">

                                                            <!-- Download Button -->
                                                            <div class="mt-2 text-center">
                                                                <a href="{{ asset('storage/admin/document/' . $document) }}"
                                                                   download="image.jpg" class="btn btn-primary">
                                                                    Download
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            @if (($documentIndex + 1) % 4 == 0 && $documentIndex + 1 < count($user_chat->document))
                                                <br>
                                            @endif
                                        @endforeach
                                    </div>
                                @endif
                            </li>
                        @else
                            <li class="you">
                                <div class="entete">
                                    <span class="status green"></span>
                                    <h2>{{$user_chat->sender_name->name}}</h2>
                                    <h3>{{$user_chat->time}}, Today</h3>
                                </div>
                                <div class="triangle"></div>
                                <div class="message">
                                    {{$user_chat->message}}
                                </div>
                                <br>
                                @if ($user_chat->document != null)
                                    <div class="images-container">
                                        @foreach ($user_chat->document as $documentIndex => $document)
                                            @php
                                                $file_extension = pathinfo($document, PATHINFO_EXTENSION);
                                            @endphp
                                            @if($file_extension == 'csv' || $file_extension == 'xlsx')
                                                <a href="{{ asset('storage/admin/document/' . $document) }}" target="_blank"><i style="font-size: xxx-large" class="fa fa-file-excel-o" aria-hidden="true"></i></a>
                                            @elseif($file_extension == 'mp4')
                                                <a href="{{ asset('storage/admin/document/' . $document) }}" target="_blank"><i style="font-size: xxx-large" class="fa fa-video-camera" aria-hidden="true"></i></a>
                                            @elseif($file_extension == 'pdf')
                                                <a href="{{ asset('storage/admin/document/' . $document) }}" target="_blank"><i style="font-size: xxx-large" class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
                                            @elseif($file_extension == 'zip')
                                                <a href="{{ asset('storage/admin/document/' . $document) }}" target="_blank"><i style="font-size: xxx-large" class="fa fa-file-archive-o" aria-hidden="true"></i></a>
                                            @elseif($file_extension == 'doc')
                                                <a href="{{ asset('storage/admin/document/' . $document) }}" target="_blank"><i style="font-size: xxx-large" class="fa fa-file" aria-hidden="true"></i></a>
                                            @else
                                                <img src="{{ asset('storage/admin/document/' . $document) }}"
                                                     alt="Image" width="50px"
                                                     data-toggle="modal"
                                                     data-target="#imageModal{{ $index }}_{{ $documentIndex }}">
                                            @endif
                                        <!-- Modal -->
                                            <div class="modal fade" id="imageModal{{ $index }}_{{ $documentIndex }}"
                                                 tabindex="-1" role="dialog" aria-labelledby="imageModalLabel"
                                                 aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <img
                                                                src="{{ asset('storage/admin/document/' . $document) }}"
                                                                class="img-fluid" alt="Image">

                                                            <!-- Download Button -->
                                                            <div class="mt-2 text-center">
                                                                <a href="{{ asset('storage/admin/document/' . $document) }}"
                                                                   download="image.jpg" class="btn btn-primary">
                                                                    Download
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            @if (($documentIndex + 1) % 4 == 0 && $documentIndex + 1 < count($user_chat->document))
                                                <br>
                                            @endif
                                        @endforeach
                                    </div>
                                @endif
                            </li>
                        @endif
                    @endforeach
                </ul>
                <footer>
                    <form id="add_data" action="{{ route('user-chat-send') }}" enctype="multipart/form-data">
                        @csrf
                        <textarea name="message" id="message" placeholder="Type your message"></textarea>
                        <input type="file" multiple name="document[]" id="document">
                        <input type="hidden" name="receiver_id" value="{{ $receiver_record->id }}">
                        <button type="button" id="submitBtn" class="btn btn-sm btn-shadow btn-outline-primary btn-hover-shine"
                                style="display: none;margin-left: 475px;">
                            <span id="loader" style="display: none;"><i class="fa fa-spinner fa-spin"></i> Loading...</span>
                            Send
                        </button>
                    </form>
                </footer>
            </div>
        </div>

    </main>

@endsection
@push('page_scripts')
    <script>
        $chat = $(".chat");
        $profile = $(".user-profile");

        /* ===================================
            Screen resize handler
        ====================================== */
        const smallDevice = window.matchMedia("(max-width: 767px)");
        const largeScreen = window.matchMedia("(max-width: 1199px)");
        smallDevice.addEventListener("change", handleDeviceChange);
        largeScreen.addEventListener("change", handleLargeScreenChange);

        handleDeviceChange(smallDevice);
        handleLargeScreenChange(largeScreen);

        function handleDeviceChange(e) {
            if (e.matches) chatMobile();
            else chatDesktop();
        }

        function handleLargeScreenChange(e) {
            if (e.matches) profileToogleOnLarge();
            else profileExtraLarge();
        }

        function chatMobile() {
            $chat.addClass("chat--mobile");
        }

        function chatDesktop() {
            $chat.removeClass("chat--mobile");
        }

        function profileToogleOnLarge() {
            $profile.addClass("user-profile--large");
        }

        function profileExtraLarge() {
            $profile.removeClass("user-profile--large");
        }

        /* ===================================
            Events
        ====================================== */

        $(".messaging-member").click(function () {
            $chat.fadeIn();
            $chat.addClass("chat--show");
        });

        $(".chat__previous").click(function () {
            $chat.removeClass("chat--show");
        });

        $(".chat__details").click(function () {
            $profile.fadeIn();
            $profile.addClass("user-profile--show");
        });

        $(".user-profile__close").click(function () {
            $profile.removeClass("user-profile--show");
        });

        $(".messages-page__dark-mode-toogler").click(function () {
            $("body").toggleClass("dark-mode");
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
                $('#submitBtn').toggle(hasText || hasImage);
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
            $('#submitBtn').click(function (e) {
                e.preventDefault();

                // Show loading spinner inside the button
                $('#loader').show();
                $('#submitBtn').attr('disabled', true); // Disable the button during loading

                var formData = new FormData($('#add_data')[0]);

                $.ajax({
                    type: 'POST',
                    url: $('#add_data').attr('action'),
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: 'Your message sent successfully.',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.reload();
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
                    },
                    complete: function () {
                        // Hide loading spinner inside the button
                        $('#loader').hide();
                        $('#submitBtn').attr('disabled', false); // Enable the button after loading
                    }
                });
            });
        });
    </script>
@endpush
