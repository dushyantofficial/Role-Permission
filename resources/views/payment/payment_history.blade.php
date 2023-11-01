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
    <main class="app-content">
        <div class="app-title">

            <div>
                <h1><i class="fa fa-th-list"></i>Show All Payment History</h1>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-12 float-right mb-5">
            <span class="pull-right float-right">&nbsp;

                <!-- Modal -->
            </div>
            <div class="col-md-12">
                <div class="tile">
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
                                        <label class="badge badge-success">{{$payment->method}}</label>
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

    <script type="text/javascript">$('#sampleTable').DataTable();</script>
@endpush
