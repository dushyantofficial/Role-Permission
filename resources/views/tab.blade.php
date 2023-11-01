<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet"/>

    <title>Document</title>
</head>
<style>
    td {
        text-align: inherit;
    }

    input {
        width: 220px;
    }

    .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
        color: #495057;
        background-color: #fff;
        border-color: #dee2e6 #dee2e6 #fff;
        border-top: 0px solid transparent !important;
        border-bottom: 1px solid #848689 !important;
        border-radius: 1px 1px 19px 0px !important;
    }

    .fa {
        font-size: 27px;
    }
</style>
<body>
<div class="container">


    <div class="tab-content" id="nav-tabContent">

        <!-- first tab start -->
        <div class="tab-pane fade show active" id="nav-first" role="tabpanel" aria-labelledby="nav-first-tab">
            @include('Admin.flash-message')
            <form action="{{route('add-campaign-ideas')}}" method="post" name="frm" enctype="multipart/form-data"
                  style="padding: 40px 0px;">
                @csrf
                <table align="center" bgcolor="" width="100%" cellpadding="5" cellspacing="0" border="0">
                    <tbody>
                    <tr>
                        <td width="20%" align="right">
                            <b class="label">Campaign Title </b>
                        </td>
                        <td width="80%" align="left">
                            <input type="text" name="campaign_title"
                                   value="{{old('campaign_title')}}"
                                   class="textbox @error('campaign_title') is-invalid @enderror"/>
                            @error('campaign_title')
                            <br> <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td width="20%" align="right">
                            <b class="label">Campaign Description </b>
                        </td>
                        <td width="80%" align="left">
                            <textarea name="campaign_description"
                                      class=" @error('campaign_description') is-invalid @enderror">{{old('campaign_description')}}</textarea>

                            @error('campaign_description')
                            <br> <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td width="20%" align="right">
                            <b class="label">Upload Banner </b>
                        </td>
                        <td width="80%" align="left">
                            <input type="file" name="campaign_banner"
                                   class="textbox @error('campaign_banner') is-invalid @enderror"/>
                            @error('campaign_banner')
                            <br> <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </td>
                    </tr>
                    {{--                    <tr>--}}
                    {{--                        <td width="20%" align="right">--}}
                    {{--                            <b class="label">Start Date </b>--}}
                    {{--                        </td>--}}
                    {{--                        <td width="80%" align="left">--}}
                    {{--                            <input type="date" name="start_date"--}}
                    {{--                                   value="{{old('start_date')}}"--}}
                    {{--                                   class="textbox @error('start_date') is-invalid @enderror"/>--}}
                    {{--                            @error('start_date')--}}
                    {{--                            <br> <span class="text-danger">{{ $message }}</span>--}}
                    {{--                            @enderror--}}
                    {{--                        </td>--}}
                    {{--                    </tr>--}}
                    {{--                    <tr>--}}
                    {{--                        <td width="20%" align="right">--}}
                    {{--                            <b class="label">End Date </b>--}}
                    {{--                        </td>--}}
                    {{--                        <td width="80%" align="left">--}}
                    {{--                            <input type="date" name="end_date" value="{{old('end_date')}}"--}}
                    {{--                                   class="@error('end_date') is-invalid @enderror"/>--}}
                    {{--                            @error('end_date')--}}
                    {{--                            <br> <span class="text-danger">{{ $message }}</span>--}}
                    {{--                            @enderror--}}
                    {{--                        </td>--}}
                    {{--                    </tr>--}}
                    <tr height="60">
                        <td width="20%" align="right">&nbsp;</td>
                        <td width="80%" align="left">
                            <button class="btn btn-primary">Save and continue</button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </form>
        </div>
        <!-- first tab End -->

        <!-- Second tab start -->
        <div class="tab-pane fade" id="nav-second" role="tabpanel" aria-labelledby="nav-second-tab">

            <div class="container" style="padding: 40px 0px;">
                <p><b>Question List</b></p>
                <div id="questions-container">
                    <table class="table table-fluid" id="myTable">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Question Name</th>
                            <th>Input Type</th>
                            <th>Is Default</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody class="scroll-pane">
                        @foreach($campaign_idea_questions as $campaign_idea_question)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$campaign_idea_question->question}}</td>
                                <td>{{$campaign_idea_question->input_type}}</td>
                                <td>
                                    @if($campaign_idea_question->status == 1)
                                        Yes
                                    @else
                                        No
                                    @endif
                                </td>
                                <td>
                                    <button class="btn btn-info">Edit</button>
                                    <button class="btn btn-danger">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @if(request()->tab == 'active')
                        <a href="{{route('question-form')}}" class="btn btn-primary" data-toggle="modal"
                           data-target="#exampleModalCenter">Add New
                            Question
                        </a>
                    @else
                        <button type="button" class="btn btn-primary add_button">Add New
                            Question
                        </button>
                    @endif
                    <br>
                    <br>
                    <br>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                        <button class="btn btn-primary me-md-2">Save and continue</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Second tab End -->

        <!-- Third tab start -->
        <div class="tab-pane fade" id="nav-third" role="tabpanel" aria-labelledby="nav-third-tab">
            <div class="container" style="padding: 40px 0px;">
                <p><b>Question List</b></p>
                <div id="questions-container">
                    <table class="table table-fluid" id="myTable3">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Question Name</th>
                            <th>Input Type</th>
                            <th>Is Default</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody class="scroll-pane">
                        @foreach($evaluation_criterias as $evaluation_criteria)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$evaluation_criteria->question}}</td>
                                <td>{{$evaluation_criteria->input_type}}</td>
                                <td>
                                    @if($campaign_idea_question->status == 1)
                                        Yes
                                    @else
                                        No
                                    @endif
                                </td>
                                <td>
                                    <button class="btn btn-info">Edit</button>
                                    <button class="btn btn-danger">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @if(request()->tab == 'active')
                        <a href="{{route('question-form')}}" class="btn btn-primary" data-toggle="modal"
                           data-target="#exampleModalCenter">Add New
                            Question
                        </a>
                    @else
                        <button type="button" class="btn btn-primary add_button">Add New
                            Question
                        </button>
                    @endif
                    <br>
                    <br>
                    <br>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                        <button class="btn btn-primary me-md-2">Save and continue</button>
                    </div>
                </div>

            </div>
            <!-- Third tab End -->
        </div>
        <!-- Third tab End -->

        <!-- Fourth tab start -->
        <div class="tab-pane fade" id="nav-fourth" role="tabpanel" aria-labelledby="nav-fourth-tab">
            <div class="container" style="padding: 40px 0px;">
                <p><b>Question List</b></p>
                <div id="questions-container">
                    <table class="table table-fluid" id="myTable4">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Question Name</th>
                            <th>Input Type</th>
                            <th>Is Default</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody class="scroll-pane">
                        @foreach($additional_criterias as $additional_criteria)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$additional_criteria->question}}</td>
                                <td>{{$additional_criteria->input_type}}</td>
                                <td>
                                    @if($campaign_idea_question->status == 1)
                                        Yes
                                    @else
                                        No
                                    @endif
                                </td>
                                <td>
                                    <button class="btn btn-info">Edit</button>
                                    <button class="btn btn-danger">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @if(request()->tab == 'active')
                        <a href="{{route('question-form')}}" class="btn btn-primary" data-toggle="modal"
                           data-target="#exampleModalCenter">Add New
                            Question
                        </a>
                    @else
                        <button type="button" class="btn btn-primary add_button">Add New
                            Question
                        </button>
                    @endif
                    <br>
                    <br>
                    <br>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                        <button class="btn btn-primary me-md-2">Save and continue</button>
                    </div>
                </div>
            </div>
            <!-- Third tab End -->
        </div>
        <!-- Fourth tab End -->


        <!--        Model Popup-->

        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Add Question</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="">
                        <div class="modal-body">
                            <label><b>Question Name</b></label>
                            <input type="text" name="" value="" class="form-control" required>

                            <label><b>Input Type</b></label>
                            <select class="form-control" name="" id="" required>
                                <option value="">---Select Input Type---</option>
                                <option value="text">Text</option>
                                <option value="number">Number</option>
                                <option value="radio">Radio</option>
                                <option value="date">Date</option>
                                <option value="checkbox">CheckBox</option>
                                <option value="numberofinput">NumberOfInput</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-first-tab" data-bs-toggle="tab" data-bs-target="#nav-first"
                    type="button" role="tab" aria-controls="nav-home" aria-selected="true">
                Campaign Details
            </button>
            <button class="nav-link" id="active_tab" data-bs-toggle="tab" data-bs-target="#nav-second"
                    type="button" role="tab" aria-controls="nav-profile" aria-selected="false">
                Idea Details
            </button>
            <button class="nav-link" id="nav-third-tab" data-bs-toggle="tab" data-bs-target="#nav-third"
                    type="button" role="tab" aria-controls="nav-contact" aria-selected="false">
                Evaluation CQ
            </button>
            <button class="nav-link" id="nav-fourth-tab" data-bs-toggle="tab" data-bs-target="#nav-fourth"
                    type="button" role="tab" aria-controls="nav-contact" aria-selected="false">
                Additional ECQ
            </button>
        </div>
    </nav>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/boo
        tstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        // Attach a click event handler to delete buttons
        $('.delete-button').on('click', function () {
            // Find the parent container of the clicked button
            var container = $(this).closest('.question');

            // Display a confirmation alert before deleting
            var confirmDelete = confirm("Are you sure you want to delete this question?");

            if (confirmDelete) {
                container.remove();
            }
        });
    });
</script>
<script>
    $(document).ready(function () {
        $('#myTable').DataTable();
    });
    $(document).ready(function () {
        $('#myTable3').DataTable();
    });
    $(document).ready(function () {
        $('#myTable4').DataTable();
    });
</script>

@php
    $doc = request('tab');
@endphp
<script>
    $(document).ready(function () {
        var active = '<?php echo $doc; ?>';
        if (active == 'active') {
            $('#active_tab').trigger('click');
        } else {
            $('#nav-first-tab').trigger('click');
        }
    });
</script>
<script>
    $(document).on('click', '.add_button', function () {
        alert('Please First Campaign Details Create!...')
        $('#nav-first-tab').trigger('click');
    });
</script>
</body>

</html>
