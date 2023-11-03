<html>
<head>
    <style>
        /*#ascrail2002 {*/
        /*    z-index: 0 !important;*/
        /*}*/

        /*.nicescroll-rails-vr {*/
        /*    z-index: 0;*/
        /*}*/

        @media print {
            .player-chart nice {
                width: 100%;
            }

            div table {
                width: 100%;
                margin: 0;

            }

            .print-table {
                max-width: 100%;
                border: 1px solid #000;
                border-collapse: collapse;
            }

            .print-table #leader {
                max-width: 100%;
                border: 1px solid #000;
                border-collapse: collapse;
            }
        }

    </style>
</head>
<body>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                @if(request('date'))
                    @php
                        $dateParts = explode(' - ', request('date'));
               $startDate = \Carbon\Carbon::parse($dateParts[0])->startOfDay();
               $endDate = \Carbon\Carbon::parse($dateParts[1])->endOfDay();
                    @endphp
                    <center><h3>Date :- {{date('d-m-Y',strtotime($startDate))}} <span
                                style="color: red">To</span> {{date('d-m-Y',strtotime($endDate))}} </h3></center>
                @else
                    <center><h3>Date :- {{date('d-m-Y')}} </h3></center>
                @endif
            </div>
        </div>
    </div>
</section>

<div class="content px-3">
    <div class="clearfix"></div>
    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <div id="leaderBoardSwissTable" class="print-table">
                    <table id="leader" class="table table-responsive" border="1" width="100%"
                           style="border-collapse: collapse">
                        <thead>
                        <tr class="text-center">
                            <th style="padding: 7px;">No</th>
                            <th style="padding: 7px;">Refund Id</th>
                            <th style="padding: 7px;">User Name</th>
                            <th style="padding: 7px;">Currency</th>
                            <th style="padding: 7px;">Amount</th>
                            <th style="padding: 7px;">Entity</th>
                            <th style="padding: 7px;">Status</th>
                            <th style="padding: 7px;">Payment Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($refund_payments_historys as $payment)
                            <tr style="text-align: center;">
                                <td style="padding: 7px;">{{ $loop->iteration }}</td>
                                <td style="padding: 7px;">{{ $payment->refund_id }}</td>
                                <td style="padding: 7px;">
                                    @if(isset($payment->user_name))
                                        {{ $payment->user_name->name }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td style="padding: 7px;">{{ $payment->currency }}</td>
                                <td style="padding: 7px;">{{ $payment->amount }}</td>
                                <td style="padding: 7px;">{{ $payment->entity }}</td>
                                <td style="padding: 7px;">
                                    <label class="badge badge-success">{{$payment->status}}</label>
                                </td>
                                <td style="padding: 7px;">
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
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>
</div>
</body>
</html>
