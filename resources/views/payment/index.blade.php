@extends('layouts.app')


@section('content')

    @include('Admin.flash-message')
    <meta name="csrf-token" content="{{ csrf_token() }}">
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

        .modal {
            top: 54px !important;
        }
        .razorpay-payment-button{
            margin-top: 15px !important;
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
    <main class="app-content">
        <div class="app-title">

            <div>
                <h1><i class="fa fa-th-list"></i>Show All Payment</h1>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-12 float-right mb-5">
            <span class="pull-right float-right">&nbsp;
                <button type="button" class="btn btn-sm btn-shadow btn-outline-primary btn-hover-shine"
                        data-bs-toggle="modal"
                        data-bs-target="#add_payment">
 + Add
                </button></span>

                <!-- Modal -->
            </div>
            <div class="col-md-12">
                <div class="tile">
                    <form method="GET" action="" class="form-inline">
                        <div class="row">
                            <div class="col-1 mt-4 ml-2">
                                <i class="glyphicon glyphicon-calendar fa fa-calendar filter"></i>&nbsp;
                                <span id="dates"></span> <b class="caret"></b>
                            </div>
                            <div class="form-group col-4">
                                <div>
                                    <input id="reportrange" name="date" value=""
                                           class="pull-left form-control daterange"
                                           style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc;"
                                           placeholder="Select Date">
                                </div>
                            </div>
                        </div>
                        <div class="ml-2">
                            <select class="form-control" name="user_id" id="">
                                <option value="">---Select User Name---</option>
                                @foreach($users as $user)
                                    <option
                                        value="{{$user->id}}" {{request()->user_id == $user->id  ? 'selected' : ''}} >{{$user->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="ml-3">
                            <select class="form-control" name="status" id=""
                                    style="background: #fff; cursor: pointer; padding: 0px 1px; border: 1px solid #ccc;">
                                <option value="">---Select Status---</option>
                                <option value="pending" {{request()->status == 'pending'  ? 'selected' : ''}}>Pending</option>
                                <option value="refunded" {{request()->status == 'refunded'  ? 'selected' : ''}}>Refunded</option>
                                <option value="paid" {{request()->status == 'paid'  ? 'selected' : ''}}>Paid</option>
                            </select>
                        </div>

                        <button href="#" class="btn btn-sm btn-shadow btn-outline-primary btn-hover-shine ml-3" id="filter">Filter</button>
                        <a href="{{route('payment.index')}}" class="btn btn-sm btn-shadow btn-outline-dark btn-hover-shine ml-3">Reset</a>
                        <div class="ml-3">
{{--                            <button type="button" class="btn btn-sm btn-shadow btn-outline-danger btn-hover-shine" onclick="pdfreport()">Pdf File</button>&nbsp;&nbsp;--}}
                            <button type="button" class="btn btn-sm btn-shadow btn-outline-info btn-hover-shine" onclick="ExportToExcel('xlsx')">Excel File
                            </button>

                        </div>
                    </form>
                    <div class="tile-body sortableTable__container table-responsive" id="my_report">
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>User Name</th>
                                <th>Amount</th>
                                <th>Transaction Id</th>
                                <th>Payment Status</th>
                                <th>Status</th>
                                <th>Entry Date</th>
                                <th>Payment Date</th>
                                <th>Online Payment</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($payments as $key => $payment)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        @if(isset($payment->user_name))
                                            {{ $payment->user_name->name }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>{{ $payment->amount }}</td>
                                    <td>
                                        @if($payment->transaction_id != null)
                                            {{ $payment->transaction_id }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        @if($payment->payment_status != null)
                                            {{ $payment->payment_status }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>  @if($payment->status == 'paid')
                                            <label class="badge badge-success">Paid</label>
                                        @elseif($payment->status == 'refunded')
                                            <label class="badge badge-info">Refund</label>
                                        @else
                                            <label class="badge badge-danger">Pending</label>
                                        @endif
                                    </td>
                                    <td>{{ date('Y-m-d',strtotime($payment->created_at)) }}</td>
                                    <td>
                                        @php
                                            $date = \Carbon\Carbon::createFromTimestamp($payment->payment_date);
                                            // Format the date as you want (e.g., 'Y-m-d H:i:s')
                                            $formattedDate = $date->format('Y-m-d H:i:s');
                                        @endphp
                                        @if($payment->payment_date != null)
                                            {{ $formattedDate }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        @if($payment->status != 'paid')
                                            <form
                                                action="{{ route('razorpay.payment.store') }}?user_id={{$payment->user_id}}&amount={{$payment->amount}}&payment_id={{$payment->id}}"
                                                method="POST">
                                                @csrf
                                                <script src="https://checkout.razorpay.com/v1/checkout.js"
                                                        data-key="{{ env('RAZORPAY_KEY') }}"
                                                        data-amount={{round($payment->amount) * 100}}
                                                            data-amount=""
                                                        data-buttontext="Pay {{$payment->amount}} INR"
                                                        data-name="Dushyant Chhatraliya"
                                                        data-description="Rozerpay"
                                                        data-image="{{asset('image/logo.jpg')}}"
                                                        data-prefill.name="{{$payment->user_name->name}}"
                                                        data-prefill.email="{{$payment->user_name->email}}"
                                                        data-theme.color="#ff7529">
                                                </script>
                                                 </form>
                                        @else
                                            <input type="button" data-amount="{{$payment->amount}}"
                                                   value="Payment is paid"
                                                   class="btn btn-sm btn-shadow btn-outline-success btn-hover-shine payment">
                                            <button
                                               style="margin-top: 5px !important;" class="btn btn-sm btn-shadow btn-outline-danger btn-hover-shine refund-payment"
                                                data-payment-id="{{ $payment->id }}" data-amount="{{$payment->amount}}">
                                                Payment Refund
                                            </button>
                                        @endif
                                    </td>
                                    <td>
                                        @if($payment->status != 'paid')
                                            <button type="button"
                                                    class="btn btn-sm btn-shadow btn-outline-info btn-hover-shine checkbox-edit"
                                                    data-bs-toggle="modal"
                                                    data-disable_date="{{$payment->id}}"
                                                    data-bs-target="#edit_payment{{$payment->id}}">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        @endif
                                        <button
                                            class="btn btn-sm btn-shadow btn-outline-danger btn-hover-shine delete-payment"
                                            data-delete-id="{{ $payment->id }}">
                                            <i class="fa fa-trash" aria-hidden="true"></i></button>
                                    </td>
                                </tr>

                                <!-- Edit Payment Modal -->
                                <div class="modal fade" id="edit_payment{{$payment->id}}"
                                     data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                     aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" style="max-width: 50%;">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Payment</h5>
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
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close">X
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="edit_form_{{ $payment->id }}"
                                                      action="{{route('payment.update',$payment->id)}}"
                                                      method="post"
                                                      enctype="multipart/form-data">
                                                    @csrf
                                                    @method('patch')


                                                    <div class="row">


                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label class="control-label">User Name</label><span
                                                                    class="text-danger"><b>*</b></span>
                                                                <select class="form-control" name="user_id" id="">
                                                                    <option value="">---Select User Name---</option>
                                                                    @foreach($users as $user)
                                                                        <option
                                                                            value="{{$user->id}}" @if(isset($payment)) {{$payment->user_id == $user->id  ? 'selected' : ''}} @endif>{{$user->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Amount</label><span
                                                                    class="text-danger"><b>*</b></span>
                                                                <input type="number"
                                                                       class="form-control" id="amount"
                                                                       value="{{$payment->amount}}"
                                                                       min="1" name="amount"
                                                                       placeholder="Enter Amount...">
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
                                                                data-resume-id="{{ $payment->id }}">Update
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                            @endforeach
                            </tbody>
                        </table>
                        @if(request('date'))
                            @php
                                $date = list($startDate, $endDate) = explode(' - ', request('date'));
                            @endphp
                            <input type="hidden" name="" id="start_date" value="{{$date[0]}}">
                            <input type="hidden" name="" id="end_date" value="{{$date[1]}}">
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Add Payment Modal -->
        <div class="modal fade" id="add_payment" data-bs-backdrop="static" data-bs-keyboard="false"
             tabindex="-1"
             aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" style="max-width: 50%;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Payment</h5>
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
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                    </div>
                    <div class="modal-body">
                        <form id="add_form" action="{{route('payment.store')}}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="control-label">User Name</label><span class="text-danger"><b>*</b></span>
                                        <select class="form-control" name="user_id" id="">
                                            <option value="">---Select User Name---</option>
                                            @foreach($users as $user)
                                                <option value="{{$user->id}}">{{$user->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="control-label">Amount</label><span
                                            class="text-danger"><b>*</b></span>
                                        <input type="number"
                                               class="form-control" id="amount" value="{{old('amount')}}"
                                               min="1" name="amount" placeholder="Enter Amount...">
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
            var paymentButtons = document.querySelectorAll('.razorpay-payment-button');

            paymentButtons.forEach(function (paymentButton) {
                paymentButton.classList.add('btn', 'btn-sm', 'btn-shadow', 'btn-outline-primary', 'btn-hover-shine');
            });
    </script>
    <script>
        $(document).ready(function (e) {
            $(document).on('click', '.payment', function () {
                var amount = $(this).data('amount'); // Use 'data-amount' directly
                var successMessage = 'Payment of ₹' + amount + ' is already paid.';
                Swal.fire({
                    icon: 'success',
                    text: successMessage,
                });
            });
        });
    </script>


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
                        $('#add_payment').modal('hide'); // Close the modal
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
                        $('#edit_payment' + resumeId).modal('hide');

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


    {{--   Delete Record With Js --}}
    <script>
        $(document).ready(function () {
            // Add click event listener to the delete button
            $(document).on('click', '.delete-payment', function () {
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
                            url: '{{ route('payment.destroy', ['payment' => 'id']) }}' + id,
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


    {{--  Refund Payment With Ajax  --}}
    <script>
        $(document).ready(function () {
            // Add click event listener to the delete button
            $(document).on('click', '.refund-payment', function () {
                var id = $(this).data('payment-id');
                var amount = $(this).data('amount'); // Use 'data-amount' directly
                var successMessage = 'Want to pay ₹' + amount;
                // Show a SweetAlert confirmation dialog
                Swal.fire({
                    title: 'Are you sure?',
                    text: successMessage,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, payment refund it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Send an AJAX request to delete the resource record
                        $.ajax({
                            type: 'GET',
                            url: '{{ route('refund-payment') }}',
                            data: {
                                _token: '{{ csrf_token() }}',
                                id: id,
                            },
                            success: function (response) {
                                // Handle the success response (e.g., reload the page or remove the deleted item from the DOM)
                                if (response.success) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Refunded!',
                                        text: response.success,
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            location.reload(); // Reload the page
                                        }
                                    });
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Not Refunded!',
                                        text: response.error,
                                    });
                                }
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

{{--  Date Picker  --}}
    <script type="text/javascript">

        $(function () {
            var start_date = $("#start_date").val();
            var end_date = $("#end_date").val();

            if (start_date && end_date) {
                // Split the date range into start and end dates
                var start = start_date;
                var end = end_date;

                function cb(start, end) {
                    var formattedStart = start.format('MMMM D, YYYY');
                    var formattedEnd = end.format('MMMM D, YYYY');
                    var formattedDateRange = formattedStart + ' - ' + formattedEnd;

                    $('#reportrange span').html(formattedDateRange);
                    $('.filter').trigger('change');
                }

            } else {
                var start = moment().subtract(29, 'days');
                var end = moment();

                function cb(start, end) {
                    // alert('call');
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                    $('.filter').trigger('change');
                }
            }


            $('#reportrange').daterangepicker({
                startDate: start,
                endDate: end,
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                }
            }, cb);

            // cb(start, end);

        });
    </script>

{{--  Excel Download  --}}
    @php
        $user = request()->user_id;
        if (isset($user)){
        $user_report = \App\Models\User::findOrfail($user);
        }
    @endphp
    <script>
        function ExportToExcel(type, fn, dl) {
            var elt = document.getElementById('my_report')
            var wb = XLSX.utils.table_to_book(elt, {sheet: "sheet1"});
            return dl ?
                XLSX.write(wb, {bookType: type, bookSST: true, type: 'base64'}) :
                XLSX.writeFile(wb, fn || ('<?php if (isset($user_report)) {
                    echo $user_report->name;
                } ?>_Reports.' + (type || 'xlsx')));
        }
    </script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
@endpush
