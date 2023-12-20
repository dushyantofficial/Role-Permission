@foreach($user_chats as $index => $user_chat)
    @php
        $time = $user_chat->time;
        $date = $user_chat->date;
        $dateTime = $date.' '.$time;
        $dateToCheck = \Carbon\Carbon::parse($dateTime);
    @endphp
    @if($user_chat->sender_id == \Illuminate\Support\Facades\Auth::id())
        <li class="me">
            <div class="entete">
                <center>
                    <h3>{{$dateTime}}, <b style="color: black">{{$dateToCheck->diffForHumans()}}</b>
                    </h3>
                </center>
                <h2>{{$user_chat->sender_name->name}}</h2>
                <span class="status blue"></span>
            </div>
            @if ($user_chat->message != null)
                <div class="triangle"></div>
                <div class="message">
                    {{$user_chat->message}}
                </div>
            @endif
            <br>
            @if ($user_chat->document != null)
                <div class="images-container">
                    @foreach ($user_chat->document as $documentIndex => $document)
                        @php
                            $file_extension = pathinfo($document, PATHINFO_EXTENSION);
                        @endphp
                        @if($file_extension == 'csv' || $file_extension == 'xlsx')
                            <a href="{{ asset('storage/admin/document/' . $document) }}"
                               target="_blank"><i style="font-size: xxx-large"
                                                  class="fa fa-file-excel-o" aria-hidden="true"></i></a>
                        @elseif($file_extension == 'mp4')
                            <a href="{{ asset('storage/admin/document/' . $document) }}"
                               target="_blank"><i style="font-size: xxx-large"
                                                  class="fa fa-video-camera" aria-hidden="true"></i></a>
                        @elseif($file_extension == 'pdf')
                            <a href="{{ asset('storage/admin/document/' . $document) }}"
                               target="_blank"><i style="font-size: xxx-large"
                                                  class="fa fa-file-pdf-o"
                                                  aria-hidden="true"></i></a>
                        @elseif($file_extension == 'zip')
                            <a href="{{ asset('storage/admin/document/' . $document) }}"
                               target="_blank"><i style="font-size: xxx-large"
                                                  class="fa fa-file-archive-o"
                                                  aria-hidden="true"></i></a>
                        @elseif($file_extension == 'doc' || $file_extension == 'docx')
                            <a href="{{ asset('storage/admin/document/' . $document) }}"
                               target="_blank"><i style="font-size: xxx-large" class="fa fa-file"
                                                  aria-hidden="true"></i></a>
                        @else
                            <img src="{{ asset('storage/admin/document/' . $document) }}"
                                 alt="Image" width="50px"
                                 style="cursor: zoom-out;"   data-toggle="modal"
                                 data-target="#imageModal{{ $index }}_{{ $documentIndex }}">
                        @endif
                    <!-- Modal -->
                        <div class="modal fade" id="imageModal{{ $index }}_{{ $documentIndex }}"
                             tabindex="-1" role="dialog" aria-labelledby="imageModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <center>
                                            <img
                                                src="{{ asset('storage/admin/document/' . $document) }}"
                                                class="img-fluid" alt="Image">
                                        </center>
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
                <center>
                    <h3>{{$dateTime}}, <b style="color: black">{{$dateToCheck->diffForHumans()}}</b>
                    </h3>
                </center>
            </div>
            @if ($user_chat->message != null)
                <div class="triangle"></div>
                <div class="message">
                    {{$user_chat->message}}
                </div>
            @endif
            <br>
            @if ($user_chat->document != null)
                <div class="images-container">
                    @foreach ($user_chat->document as $documentIndex => $document)
                        @php
                            $file_extension = pathinfo($document, PATHINFO_EXTENSION);
                        @endphp
                        @if($file_extension == 'csv' || $file_extension == 'xlsx')
                            <a href="{{ asset('storage/admin/document/' . $document) }}"
                               target="_blank"><i style="font-size: xxx-large"
                                                  class="fa fa-file-excel-o" aria-hidden="true"></i></a>
                        @elseif($file_extension == 'mp4')
                            <a href="{{ asset('storage/admin/document/' . $document) }}"
                               target="_blank"><i style="font-size: xxx-large"
                                                  class="fa fa-video-camera" aria-hidden="true"></i></a>
                        @elseif($file_extension == 'pdf')
                            <a href="{{ asset('storage/admin/document/' . $document) }}"
                               target="_blank"><i style="font-size: xxx-large"
                                                  class="fa fa-file-pdf-o"
                                                  aria-hidden="true"></i></a>
                        @elseif($file_extension == 'zip')
                            <a href="{{ asset('storage/admin/document/' . $document) }}"
                               target="_blank"><i style="font-size: xxx-large"
                                                  class="fa fa-file-archive-o"
                                                  aria-hidden="true"></i></a>
                        @elseif($file_extension == 'doc' || $file_extension == 'docx')
                            <a href="{{ asset('storage/admin/document/' . $document) }}"
                               target="_blank"><i style="font-size: xxx-large" class="fa fa-file"
                                                  aria-hidden="true"></i></a>
                        @else
                            <img src="{{ asset('storage/admin/document/' . $document) }}"
                                 alt="Image" width="50px"
                                 style="cursor: zoom-out;" data-toggle="modal"
                                 data-target="#imageModal{{ $index }}_{{ $documentIndex }}">
                        @endif
                    <!-- Modal -->
                        <div class="modal fade" id="imageModal{{ $index }}_{{ $documentIndex }}"
                             tabindex="-1" role="dialog" aria-labelledby="imageModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <center>
                                            <img
                                                src="{{ asset('storage/admin/document/' . $document) }}"
                                                class="img-fluid" alt="Image">
                                        </center>
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
