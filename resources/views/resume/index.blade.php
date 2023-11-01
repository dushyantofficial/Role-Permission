@extends('layouts.app')


@section('content')
    <style>
        .preview  iframe > body{
            user-select: none !important;
        }
        .modal{
            top: 54px !important;
        }
        .model_fix_size{
            max-width: 60% !important;
        }
        @media (max-width: 575.98px) {
            /* Add a class to the table container to make it responsive */
            .responsive-table {
                overflow-x: auto;
            }
            .modal {
                width: 192% !important;
            }
            .course{
                margin-bottom: 5px;
            }
            .model_fix_size{
                max-width: 50% !important;
            }
        }
    </style>
    @include('Admin.flash-message')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <main class="app-content">
        <div class="app-title">

            <div>
                <h1><i class="fa fa-th-list"></i>Show All Resume</h1>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-12 float-right mb-5">
                           <span class="pull-right float-left">&nbsp;
                <button type="button" class="btn btn-sm btn-shadow btn-outline-primary btn-hover-shine course" data-bs-toggle="modal"
                        data-bs-target="#add_professional_skills">
 + Add Skill
                </button>
                               <button type="button" class="btn btn-sm btn-shadow btn-outline-danger btn-hover-shine course" data-bs-toggle="modal"
                                       data-bs-target="#add_work_experiences">
 + Add Experience
                </button>
                               <button type="button" class="btn btn-sm btn-shadow btn-outline-success btn-hover-shine course" data-bs-toggle="modal"
                                       data-bs-target="#add_educations">
 + Add Education
                </button>
                               <button type="button" class="btn btn-sm btn-shadow btn-outline-dark btn-hover-shine" data-bs-toggle="modal"
                                         data-bs-target="#add_project">
 + Add Project
                </button>
                               </button>
                               <button type="button" class="btn btn-sm btn-shadow btn-outline-info btn-hover-shine" data-bs-toggle="modal"
                                       data-bs-target="#add_course">
 + Add Course
                </button>
                           </span>
                <span class="pull-right float-right">&nbsp;
                <button type="button" class="btn btn-sm btn-shadow btn-outline-primary btn-hover-shine" data-bs-toggle="modal"
                        data-bs-target="#add_resume">
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
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Date Of Birth</th>
                                <th>Preview</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($resumes as $key => $resume)
                                @php
                                    $current_year = date('Y',strtotime('-1 year'));
                                    $before_year = date('Y-m-d', strtotime("$current_year-12-31"));
                                @endphp
                                <tr id="{{$resume->id}}">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $resume->name }}</td>
                                    <td>{{ $resume->email }}</td>
                                    <td>{{ $resume->phone }}</td>
                                    <td>{{ $resume->dob }}</td>
                                    <td>
                                        <button type="button" style="margin: 0 auto;display: block;"
                                                class="btn btn-sm btn-shadow btn-outline-success btn-hover-shine menu_button"
                                                data-bs-toggle="modal" data-bs-target="#myModal{{$resume->id}}">
                                            Preview
                                        </button>

                                        <!-- Resume Preview Modal -->
                                        <div class="modal fade" id="myModal{{$resume->id}}" data-bs-backdrop="static"
                                             data-bs-keyboard="false" tabindex="-1"
                                             aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg model_fix_size">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Preview Resume</h5>
{{--                                                        <button class="btn-danger">Pdf Download</button>--}}
                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body preview">
                                                        <iframe src="{{url("preview_resume")}}?id={{$resume->id}}"
                                                                width="100%" height="500" frameborder="0"
                                                                style="user-select: none !important;"></iframe>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{route('resume-details')}}?id={{$resume->id}}"
                                           class="btn btn-sm btn-shadow btn-outline-warning btn-hover-shine" target="_blank">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <button type="button"
                                                class="btn btn-sm btn-shadow btn-outline-info btn-hover-shine"
                                                data-bs-toggle="modal"
                                                data-bs-target="#edit_resume{{$resume->id}}">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button
                                            class="btn btn-sm btn-shadow btn-outline-danger btn-hover-shine delete-resume"
                                            data-delete-id="{{ $resume->id }}">
                                            <i class="fa fa-trash" aria-hidden="true"></i></button>
                                        {{--                                        {!! Form::open(['method' => 'DELETE','route' => ['resumes.destroy', $resume->id],'style'=>'display:inline','onclick' => "return confirm('Are you sure?')"]) !!}--}}
                                        {{--                                        {!! Form::submit('Delete', ['class' => 'btn btn-outline-danger']) !!}--}}
                                        {{--                                        {!! Form::close() !!}--}}
                                    </td>
                                </tr>

                                <!-- Edit Resume Modal -->
                                <div class="modal fade" id="edit_resume{{$resume->id}}" data-bs-backdrop="static"
                                     data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                     aria-hidden="true">
                                    <div class="modal-dialog modal-lg" style="max-width: 50%;">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Resume</h5>
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
                                                <form id="edit_form_{{ $resume->id }}"
                                                      action="{{route('resumes.update',$resume->id)}}" method="post"
                                                      enctype="multipart/form-data">
                                                    @csrf
                                                    @method('patch')


                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Name</label><span class="text-danger"><b>*</b></span>
                                                                <input type="text"
                                                                       class="form-control" id="name"
                                                                       value="{{$resume->name}}" name="name"
                                                                       placeholder="Enter Name...">
                                                            </div>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label class="control-label">About Me</label><span class="text-danger"><b>*</b></span>
                                                                <textarea class="form-control" name="about_me"
                                                                          id="about_me"
                                                                          placeholder="Enter About Me...">{{$resume->about_me}}</textarea>
                                                            </div>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Destination</label><span class="text-danger"><b>*</b></span>
                                                                <select class="form-control" name="destination" id="">
                                                                    <option value="">---Select Destination---</option>
                                                                    @foreach(config('constants.DESTINATION') as $key => $destination)
                                                                        <option value="{{$destination}}" @if(isset($resume)) {{$resume->destination == $destination  ? 'selected' : ''}} @endif>{{$key}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Date Of Birth</label><span class="text-danger"><b>*</b></span>
                                                                <input type="date"
                                                                       class="form-control" id="dob"
                                                                       value="{{$resume->dob}}" max="{{$before_year}}" name="dob">
                                                            </div>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Email</label><span class="text-danger"><b>*</b></span>
                                                                <input type="text"
                                                                       class="form-control" id="email"
                                                                       value="{{$resume->email}}" name="email"
                                                                       placeholder="Enter Email...">
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Phone</label><span class="text-danger"><b>*</b></span>
                                                                <input type="number"
                                                                       class="form-control" id="phone"
                                                                       value="{{$resume->phone}}" maxlength="10"
                                                                       min="1" name="phone"
                                                                       placeholder="Enter Phone...">
                                                            </div>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Address</label><span class="text-danger"><b>*</b></span>
                                                                <input type="text"
                                                                       class="form-control" id="address"
                                                                       value="{{$resume->address}}"
                                                                       name="address" placeholder="Enter Address...">
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Profile Pic</label>
                                                                <input type="file"
                                                                       class="form-control" id="profile_pic"
                                                                       value="{{old('profile_pic')}}"
                                                                       name="profile_pic"
                                                                       placeholder="Enter profile_pic...">
                                                                <img src="{{asset('storage/images/'.$resume->profile_pic)}}" width="100px">
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-sm btn-shadow btn-outline-secondary btn-hover-shine"
                                                                data-bs-dismiss="modal">Close
                                                        </button>
                                                        <button type="button" class="btn btn-sm btn-shadow btn-outline-info btn-hover-shine update-btn"
                                                                data-resume-id="{{ $resume->id }}">Update
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

        <!-- Add Resume Modal -->
        <div class="modal fade" id="add_resume" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
             aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" style="max-width: 50%;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Resume</h5>
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
                        <form id="add_form" action="{{route('resumes.store')}}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="control-label">Name</label><span class="text-danger"><b>*</b></span>
                                        <input type="text"
                                               class="form-control" id="name" value="{{old('name')}}" name="name"
                                               placeholder="Enter Name...">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="control-label">About Me</label><span class="text-danger"><b>*</b></span>
                                        <textarea class="form-control" name="about_me" id="about_me"
                                                  placeholder="Enter About Me..."></textarea>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="control-label">Destination</label><span class="text-danger"><b>*</b></span>
                                        <select class="form-control" name="destination" id="">
                                            <option value="">---Select Destination---</option>
                                            @foreach(config('constants.DESTINATION') as $key => $destination)
                                                <option value="{{$destination}}">{{$key}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="control-label">Date Of Birth</label><span class="text-danger"><b>*</b></span>
                                        <input type="date"
                                               class="form-control" id="dob" max="{{ $before_year }}" value="{{old('dob')}}" name="dob">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="control-label">Email</label><span class="text-danger"><b>*</b></span>
                                        <input type="text"
                                               class="form-control" id="email" value="{{old('email')}}" name="email"
                                               placeholder="Enter Email...">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="control-label">Phone</label><span class="text-danger"><b>*</b></span>
                                        <input type="number"
                                               class="form-control" id="phone" value="{{old('phone')}}" minlength="10"
                                               min="1" name="phone" placeholder="Enter Phone...">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="control-label">Address</label><span class="text-danger"><b>*</b></span>
                                        <input type="text"
                                               class="form-control" id="address" value="{{old('address')}}"
                                               name="address" placeholder="Enter Address...">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="control-label">Profile Pic</label><span class="text-danger"><b>*</b></span>
                                        <input type="file"
                                               class="form-control" id="profile_pic" value="{{old('profile_pic')}}"
                                               name="profile_pic" placeholder="Enter profile_pic...">
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-sm btn-shadow btn-outline-secondary btn-hover-shine" data-bs-dismiss="modal">Close
                                </button>
                                <button type="submit" id="submitBtn" class="btn btn-sm btn-shadow btn-outline-primary btn-hover-shine">Save changes
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

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
                    <form id="add_skill" action="{{route('professional_skills.store')}}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="control-label">Employee Name</label><span class="text-danger"><b>*</b></span>
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
                                    <label class="control-label">Skill</label><span class="text-danger"><b>*</b></span>
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
                                    <label class="control-label">Color</label><span class="text-danger"><b>*</b></span>
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
                                        class="text-danger check_box"><b>*</b></span>
                                    <input type="number"
                                           class="form-control" id="professional_per"
                                           value="{{old('professional_per')}}" minlength="10"
                                           min="1" name="professional_per" placeholder="Enter Professional Per...">
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-shadow btn-outline-secondary btn-hover-shine" data-bs-dismiss="modal">Close
                            </button>
                            <button type="submit" id="add_skill_button" class="btn btn-sm btn-shadow btn-outline-primary btn-hover-shine">Save changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <!-- Add work_experiences Modal -->
    <div class="modal fade" id="add_work_experiences" data-bs-backdrop="static" data-bs-keyboard="false"
         tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" style="max-width: 50%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Work Experiences</h5>
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
                    <form id="add_work_experiences_form" action="{{route('work_experiences.store')}}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="control-label">Employee Name</label><span class="text-danger"><b>*</b></span>
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
                                    <label class="control-label">Destination</label><span class="text-danger"><b>*</b></span>
                                    <select class="form-control" name="destination" id="">
                                        <option value="">---Select Destination---</option>
                                        @foreach(config('constants.DESTINATION') as $key => $destination)
                                            <option value="{{$destination}}">{{$key}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label class="control-label">Company Name</label><span class="text-danger"><b>*</b></span>
                                    <input type="text"
                                           class="form-control" id="company_name" value="{{old('company_name')}}"
                                           min="1" name="company_name" placeholder="Enter Company Name...">
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label class="control-label">Start Date</label><span class="text-danger"><b>*</b></span>
                                    <input type="month"
                                           class="form-control date" id="start_date" value="{{old('start_date')}}"
                                           max="" name="start_date">
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label class="control-label">End Date</label><span class="text-danger check_box"><b>*</b></span>
                                    <input type="month"
                                           class="form-control date end_date" id="end_date" value="{{old('end_date')}}"
                                           min="" name="end_date">

                                    <input type="checkbox"
                                           class="check" id="check" value="1"
                                           name="check">
                                    <label class="control-label">Present</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label class="control-label">Description</label>
                                    <textarea class="form-control" name="description" id="" ></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-shadow btn-outline-secondary btn-hover-shine" data-bs-dismiss="modal">Close
                            </button>
                            <button type="submit" id="work_experiences_btn" class="btn btn-sm btn-shadow btn-outline-primary btn-hover-shine">Save
                                changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Add education Modal -->
    <div class="modal fade" id="add_educations" data-bs-backdrop="static" data-bs-keyboard="false"
         tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" style="max-width: 50%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Educations</h5>
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
                    <form id="add_form_educations" action="{{route('educations.store')}}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="control-label">Employee Name</label><span class="text-danger"><b>*</b></span>
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
                                    <label class="control-label">Degree Name</label><span class="text-danger"><b>*</b></span>
                                    <input type="text"
                                           class="form-control" id="degree_name" value="{{old('degree_name')}}"
                                           min="1" name="degree_name" placeholder="Enter Degree Name...">
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-group">
                                    <label class="control-label">College Name</label><span class="text-danger"><b>*</b></span>
                                    <input type="text"
                                           class="form-control" id="college_name"
                                           value=""
                                           min="1" name="college_name"
                                           placeholder="Enter College Name...">
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group">
                                    <label class="control-label">City Name</label><span class="text-danger"><b>*</b></span>
                                    <input type="text"
                                           class="form-control" id="city_name"
                                           value=""
                                           min="1" name="city_name"
                                           placeholder="Enter City Name...">
                                </div>
                            </div>

                            <div class="col-8">
                                <div class="form-group">
                                    <label class="control-label">University Name</label><span class="text-danger"><b>*</b></span>
                                    <input type="text"
                                           class="form-control" id="university_name"
                                           value=""
                                           min="1" name="university_name"
                                           placeholder="Enter University Name...">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label class="control-label">Grade</label><span class="text-danger"><b>*</b></span>
                                    <select class="form-control text-center" name="grade" id="">
                                        <option value="">---Select Grade---</option>
                                        @foreach(config('constants.GRADE') as $key => $grade)
                                            <option value="{{$grade}}">{{$key}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="control-label">Start Date</label><span class="text-danger"><b>*</b></span>
                                    <input type="month"
                                           class="form-control date" id="start_date" value="{{old('start_date')}}"
                                           max="" name="start_date">
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label class="control-label">End Date</label><span class="text-danger check_box"><b>*</b></span>
                                    <input type="month"
                                           class="form-control date end_date" id="educ_end_date"
                                           value="{{old('end_date')}}"
                                           min="" name="end_date">

                                    <input type="checkbox"
                                           class="check" id="educ_check" value="1"
                                           name="check">
                                    <label class="control-label">Present</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="control-label">Description</label>
                                    <textarea class="form-control" name="description" id="" ></textarea>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-shadow btn-outline-secondary btn-hover-shine" data-bs-dismiss="modal">Close
                            </button>
                            <button type="submit" id="add_educations_btn" class="btn btn-sm btn-shadow btn-outline-primary btn-hover-shine">Save changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Project Modal -->
    <div class="modal fade" id="add_project" data-bs-backdrop="static" data-bs-keyboard="false"
         tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" style="max-width: 50%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Project</h5>
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
                    <form id="add_form_project" action="{{route('projects.store')}}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="control-label">Employee Name</label><span class="text-danger"><b>*</b></span>
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
                                    <label class="control-label">Project Name</label><span class="text-danger"><b>*</b></span>
                                    <input type="text"
                                           class="form-control" id="degree_name" value="{{old('project_name')}}"
                                           name="project_name" placeholder="Enter Porject Name...">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="control-label">Company Name</label><span class="text-danger"><b>*</b></span>
                                    <input type="text"
                                           class="form-control" id="company_name"
                                           value=""
                                           min="1" name="company_name"
                                           placeholder="Enter Company Name...">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="control-label">Technology</label><span class="text-danger"><b>*</b></span>
                                    <select class="form-control" name="technology" id="">
                                        <option value="">---Select Technology---</option>
                                        @foreach(config('constants.TECHNOLOGY') as $key => $skill)
                                            <option value="{{$skill}}">{{$key}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="col-6">
                                <div class="form-group">
                                    <label class="control-label">City Name</label><span class="text-danger"><b>*</b></span>
                                    <input type="text"
                                           class="form-control" id="city_name"
                                           value=""
                                           min="1" name="city_name"
                                           placeholder="Enter City Name...">
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label class="control-label">Start Date</label><span class="text-danger"><b>*</b></span>
                                    <input type="month"
                                           class="form-control date" id="start_date" value="{{old('start_date')}}"
                                           max="" name="start_date">
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label class="control-label">End Date</label><span class="text-danger check_box"><b>*</b></span>
                                    <input type="month"
                                           class="form-control date end_date" id="end_date" value="{{old('end_date')}}"
                                           name="end_date">

                                    <input type="checkbox"
                                           class="check" id="check" value="1"
                                           name="check">
                                    <label class="control-label">Present</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label class="control-label">Description</label>
                                    <textarea class="form-control" name="description" id="" ></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-shadow btn-outline-secondary btn-hover-shine" data-bs-dismiss="modal">Close
                            </button>
                            <button type="submit" id="add_project_btn" class="btn btn-sm btn-shadow btn-outline-primary btn-hover-shine">Save changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Course Modal -->
    <div class="modal fade" id="add_course" data-bs-backdrop="static" data-bs-keyboard="false"
         tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" style="max-width: 50%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Courses</h5>
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
                    <form id="add_form_course" action="{{route('course.store')}}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="control-label">Employee Name</label><span class="text-danger"><b>*</b></span>
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
                                    <label class="control-label">Course Name</label><span class="text-danger"><b>*</b></span>
                                    <input type="text"
                                           class="form-control" id="course_name"
                                           value=""
                                           name="course_name"
                                           placeholder="Enter Course Name...">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label class="control-label">Institution Name</label><span class="text-danger"><b>*</b></span>
                                    <input type="text"
                                           class="form-control" id="institution_name"
                                           value=""
                                           name="institution_name"
                                           placeholder="Enter Institution Name...">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="control-label">Start Date</label><span class="text-danger"><b>*</b></span>
                                    <input type="month"
                                           class="form-control date" id="start_date" value="{{old('start_date')}}"
                                           max="" name="start_date">
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label class="control-label">End Date</label><span class="text-danger check_box"><b>*</b></span>
                                    <input type="month"
                                           class="form-control date end_date" id="end_date" value="{{old('end_date')}}"
                                           min="" name="end_date">

                                    <input type="checkbox"
                                           class="check" id="check" value="1"
                                           name="check">
                                    <label class="control-label">Present</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="control-label">Description</label>
                                    <textarea class="form-control" name="description" id="" ></textarea>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-shadow btn-outline-secondary btn-hover-shine" data-bs-dismiss="modal">Close
                            </button>
                            <button type="submit" id="add_course_btn" class="btn btn-sm btn-shadow btn-outline-primary btn-hover-shine">Save changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <p class="text-center text-primary"><small>Developer Name :- <b style="color: red">Dushyant
                Chhatraliya</b></small>
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
                        $('#add_resume').modal('hide'); // Close the modal
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: 'Your resume was created successfully.',
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
                        $('#edit_resume' + resumeId).modal('hide');

                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: 'Your resume was updated successfully.',
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

    {{--   Delete Record With Js --}}
    <script>
        $(document).ready(function () {
            // Add click event listener to the delete button
            $(document).on('click', '.delete-resume', function () {
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
                            url: '{{ route('resumes.destroy', ['resume' => 'id']) }}' + id,
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
{{--    <script type="text/javascript">$('#sampleTable').DataTable();</script>--}}

    {{--  Add Professional_Skill Js  --}}
    <script>
        $(document).ready(function () {
            $('#add_skill_button').click(function (e) { // Change 'submitBtn' to the actual ID of your button
                e.preventDefault();
                var formData = new FormData($('#add_skill')[0]); // Use the form ID 'add_form'

                $.ajax({
                    type: 'POST',
                    url: $('#add_skill').attr('action'), // Use the form's action attribute
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

    {{-- Add Experience Js --}}
    <script>
        $(document).ready(function () {
            $('#work_experiences_btn').click(function (e) { // Change 'submitBtn' to the actual ID of your button
                e.preventDefault();
                var formData = new FormData($('#add_work_experiences_form')[0]); // Use the form ID 'add_form'

                $.ajax({
                    type: 'POST',
                    url: $('#add_work_experiences_form').attr('action'), // Use the form's action attribute
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        $('#add_work_experiences').modal('hide'); // Close the modal
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

    {{-- Current Year & Month Show Js   --}}
    <script>
        // Get the current date
        const currentDate = new Date();

        // Get the current year and month as separate variables
        const currentYear = currentDate.getFullYear();
        const currentMonth = (currentDate.getMonth() + 1).toString().padStart(2, '0');

        // Create the maxDate value in YYYY-MM format
        const maxDate = `${currentYear}-${currentMonth}`;

        // Wait for the DOM to be fully loaded
        document.addEventListener('DOMContentLoaded', function () {
            // Get all elements with the class name 'date'
            const elementsWithDateClass = document.querySelectorAll('.date');

            // Iterate over the elements and set the 'max' attribute for each one
            elementsWithDateClass.forEach(function (element) {
                element.setAttribute('max', maxDate);
            });
        });
    </script>

    {{--Check Click End Date Desable--}}
    <script>
        const checkboxes = document.querySelectorAll('.check'); // Select all checkboxes
        const endDateInputs = document.querySelectorAll('.end_date'); // Select all end_date inputs

        // Add event listeners to all checkboxes
        checkboxes.forEach((checkbox, index) => {
            checkbox.addEventListener('change', function () {
                endDateInputs[index].disabled = this.checked; // Disable the corresponding end_date input when the checkbox is checked
            });
        });
    </script>

    {{--  Add Education Js  --}}
    <script>
        $(document).ready(function () {
            $('#add_educations_btn').click(function (e) { // Change 'submitBtn' to the actual ID of your button
                e.preventDefault();
                var formData = new FormData($('#add_form_educations')[0]); // Use the form ID 'add_form'

                $.ajax({
                    type: 'POST',
                    url: $('#add_form_educations').attr('action'), // Use the form's action attribute
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        $('#add_educations').modal('hide'); // Close the modal
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

    {{--  Add Project Js  --}}
    <script>
        $(document).ready(function () {
            $('#add_project_btn').click(function (e) { // Change 'submitBtn' to the actual ID of your button
                e.preventDefault();
                var formData = new FormData($('#add_form_project')[0]); // Use the form ID 'add_form'

                $.ajax({
                    type: 'POST',
                    url: $('#add_form_project').attr('action'), // Use the form's action attribute
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        $('#add_project').modal('hide'); // Close the modal
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

    {{--  Add Couse Js  --}}
    <script>
        $(document).ready(function () {
            $('#add_course_btn').click(function (e) { // Change 'submitBtn' to the actual ID of your button
                e.preventDefault();
                var formData = new FormData($('#add_form_course')[0]); // Use the form ID 'add_form'

                $.ajax({
                    type: 'POST',
                    url: $('#add_form_course').attr('action'), // Use the form's action attribute
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        $('#add_course').modal('hide'); // Close the modal
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

{{--  Drag-Drop Colum  --}}
    <script>
        $(document).ready(function() {
            var table = $('#sampleTable').DataTable({
                "order": [], // Disable initial sorting
                "columnDefs": [
                    { "orderable": false, "targets": [0, 3] }, // Disable sorting on specific columns
                ],
            });

            $("#sampleTable tbody").sortable({
                helper: fixHelperModified,
                update: function(event, ui) {
                    var newOrder = $(this).sortable('toArray', { attribute: 'id' });
                    updateRowOrder(newOrder);
                },
            }).disableSelection();

            function fixHelperModified(e, tr) {
                var $originals = tr.children();
                var $helper = tr.clone();
                $helper.children().each(function(index) {
                    $(this).width($originals.eq(index).width());
                });
                return $helper;
            }

            function updateRowOrder(newOrder) {
                var csrfToken = $('meta[name="csrf-token"]').attr('content'); // Get the CSRF token

                $.ajax({
                    url: '{{ route('update-row-order') }}',
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken // Include the CSRF token in the headers
                    },
                    data: { resume_id: newOrder },
                    success: function(response) {
                        location.reload();
                    },
                    error: function (error) {
                        console.error(error);
                    }
                });
            }
        });

    </script>


    <script>
        $(document).ready(function() {
            // Add an event listener to the checkbox
            $('.check').change(function() {
                if ($(this).is(':checked')) {
                    $('.check_box').hide(); // Hide the span when the checkbox is checked
                } else {
                    $('.check_box').show(); // Show the span when the checkbox is unchecked
                }
            });
        });

    </script>
@endpush
