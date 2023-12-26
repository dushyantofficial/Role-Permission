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
                <h1><i class="fa fa-th-list"></i>Show All Payment History</h1>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-12 float-right mb-5">
            <span class="pull-right float-right">&nbsp;
            </span>
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
                                        value="{{$user->id}}" {{request('user_id') == $user->id  ? 'selected' : ''}} >{{$user->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="ml-3">
                            <select class="form-control" name="payment_method" id=""
                                    style="background: #fff; cursor: pointer; padding: 0px 1px; border: 1px solid #ccc;">
                                <option value="">---Select Method---</option>
                                @foreach($payment_methods as $payment_method)
                                    <option
                                        value="{{$payment_method->method}}" {{request('payment_method') == $payment_method->method  ? 'selected' : ''}}>
                                        {{ucfirst($payment_method->method)}}</option>
                                @endforeach
                            </select>
                        </div>

                        <button href="#" class="btn btn-sm btn-shadow btn-outline-primary btn-hover-shine ml-3"
                                id="filter">Filter
                        </button>
                        <a href="{{route('payment-history')}}"
                           class="btn btn-sm btn-shadow btn-outline-dark btn-hover-shine ml-3">Reset</a>
                        <div class="ml-3">
                            <a class="btn btn-sm btn-shadow btn-outline-danger btn-hover-shine"
                               href="{{route('payment-history-pdf')}}?date={{request('date')}}&user_id={{request('user_id')}}&payment_method={{request('payment_method')}}">Pdf
                                File</a>
                            <button type="button" class="btn btn-sm btn-shadow btn-outline-info btn-hover-shine"
                                    onclick="ExportToExcel('xlsx')">Excel File
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
                                <th>Entity</th>
                                <th>Method</th>
                                <th>Description</th>
                                <th>Wallet</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>Payment Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($payment_historys as $key => $payment)
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
                                    <td>{{ $payment->entity }}</td>
                                    <td>
                                        <label class="badge badge-success">{{ucfirst($payment->method)}}</label>
                                    </td>
                                    <td>{{ $payment->description }}</td>
                                    <td>
                                        @if($payment->wallet != null)
                                            {{ $payment->wallet }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        @if($payment->email != null)
                                            {{ $payment->email }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>{{ $payment->contact }}</td>
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
                                        <button
                                            class="btn btn-sm btn-shadow btn-outline-danger btn-hover-shine delete-payment"
                                            data-delete-id="{{ $payment->id }}">
                                            <i class="fa fa-trash" aria-hidden="true"></i></button>
                                    </td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>

        @if(request('date'))
            @php
                $date = list($startDate, $endDate) = explode(' - ', request('date'));
            @endphp
            <input type="hidden" name="" id="start_date" value="{{$date[0]}}">
            <input type="hidden" name="" id="end_date" value="{{$date[1]}}">
        @endif
    </main>

    <p class="text-center text-primary"><small>Developer Name :- <b style="color: red">Dushyant Chhatraliya</b></small>
    </p>
@endsection
@push('page_scripts')


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
                            type: 'GET',
                            url: '{{ route('payment-history-delete')}}',
                            data: {
                                _token: '{{ csrf_token() }}',
                                id: id,
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
