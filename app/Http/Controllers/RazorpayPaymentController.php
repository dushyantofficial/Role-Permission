<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\PaymentHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Razorpay\Api\Api;

class RazorpayPaymentController extends Controller
{
    public function index()
    {
        return view('payment.razorpayView');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $payment_details = Payment::find($request->payment_id);
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

        $payment = $api->payment->fetch($input['razorpay_payment_id']);

        if(count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount' => $payment['amount']));
                $input['transaction_id'] = $input['razorpay_payment_id'];
                $input['payment_status'] = $response['status'];
                $input['payment_date'] = $response['created_at'];
                $input['status'] = 'paid';
                $payment_details->update($input);

                $response['user_id'] = $payment_details->user_id;
                $response['payment_id'] = $payment_details->id;
                $response['amount'] = $payment_details->amount;
                $response['payment_date'] = $response['created_at'];
                $response['transaction_id'] = $input['razorpay_payment_id'];
                PaymentHistory::create($response->toArray());
                return redirect()->back()->with('success', "Payment of ₹$payment_details->amount is paid...");
            } catch (Exception $e) {
                return  $e->getMessage();
                Session::put('error',$e->getMessage());
                return redirect()->back()->with('dander', "Payment of ₹$payment_details->amount is fail...");
            }
        }
    }
}
