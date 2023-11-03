<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\PaymentHistory;
use App\Models\PaymentRefund;
use App\Models\User;
use PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Razorpay\Api\Api;

class PaymentController extends Controller
{
    public function index(Request $request)
    {


        $date = $request->input('date');
        $user_id = $request->input('user_id');
        $status = $request->input('status');

        $pending = 'pending';
        $refund = 'refunded';
        $paid = 'paid';

        $query = Payment::query();

        // Check if a date is provided and add a date filter
        if (!empty($date)) {
            $dateParts = explode(' - ', $date);
            $startDate = Carbon::parse($dateParts[0])->startOfDay();
            $endDate = Carbon::parse($dateParts[1])->endOfDay();
            $query->whereBetween('created_at', [$startDate, $endDate]);
        }

        // Check if a user_id is provided and add a user_id filter
        if (!empty($user_id)) {
            $query->where('user_id', $user_id);
        }

        // Check if a status is provided and add a status filter
        if (!empty($status)) {
            $query->where('status', $status);
        }

        // Get the filtered records
        $payments = $query->orderByRaw(DB::raw("FIELD(status, '$pending', '$refund', '$paid')"))
            ->orderBy('created_at', 'desc')->get();
        $users = User::where('status', 'active')->get();
        return view('payment.index', compact('users', 'payments'));
    }

    public function create()
    {

    }

    public function store(Request $request)
    {

        $request->validate(Payment::$rules, Payment::$customMessages);
        $input = $request->all();
        $input['status'] = 'pending';
        Payment::create($input);
        return redirect()->back()->with('success', 'Payment added successfully!');
    }

    public function edit(Request $request, $id)
    {

    }

    public function update(Request $request, $id)
    {
        $payments = Payment::find($id);
        $input = $request->all();
        $request->validate(Payment::$rules, Payment::$customMessages);
        $payments->update($input);
        return response()->json('true');
    }

    public function show(Request $request, $id)
    {

    }

    public function destroy($id)
    {
        $id = preg_replace('/[^0-9]/', '', $id);
        $payments = Payment::where('id', $id)->first();
        $payments->delete();
        return response()->json(['message' => 'Payment deleted successfully']);

    }

    public function online_pay(Request $request){
       $payment_details = $request->all();
        return view('payment.razorpayView',compact('payment_details'));
    }

    public function refundPayment(Request $request)
    {
        // Fetch the payment details from your database
        $payment = Payment::find($request->id); // Replace 'Payment' with your model

        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

        try {
            $refund = $api->refund->create([
                'payment_id' => $payment->transaction_id,
                'amount' => $payment->amount * 100, // Amount in paise
            ]);
            $refund['refund_id'] = $refund['id'];
            $refund['user_id'] = $payment->user_id;
            $refund['payment_date'] = $refund['created_at'];
            $refund['amount'] = $payment->amount;
            // Update your database to mark the payment as refunded
            $payment->update(['status' => 'refunded']);

            PaymentRefund::create($refund->toArray());
            // Handle notifications and logging
            // ...
            return response()->json(['success' => "Payment of ₹$payment->amount has been refunded successfully."]);
        } catch (\Razorpay\Api\Errors\Error $e) {
            return response()->json(['error' => 'Error occurred while processing the refund: ' . $e->getMessage()]);
        }
    }

    public function payment_history(Request $request)
    {


        $date = $request->input('date');
        $user_id = $request->input('user_id');
        $method = $request->input('payment_method');

        $query = PaymentHistory::query();

        // Check if a date is provided and add a date filter
        if (!empty($date)) {
            $dateParts = explode(' - ', $date);
            $startDate = Carbon::parse($dateParts[0])->startOfDay();
            $endDate = Carbon::parse($dateParts[1])->endOfDay();
            $query->whereBetween('created_at', [$startDate, $endDate]);
        }

        // Check if a user_id is provided and add a user_id filter
        if (!empty($user_id)) {
            $query->where('user_id', $user_id);
        }

        // Check if a status is provided and add a status filter
        if (!empty($method)) {
            $query->where('method', $method);
        }

        // Get the filtered records
        $payment_historys = $query->get();
        $users = User::where('status', 'active')->get();
        $payment_methods = PaymentHistory::select('method')->distinct()->get();

        return view('payment.payment_history', compact('users', 'payment_historys', 'payment_methods'));
    }

    public function payment_history_delete(Request $request)
    {
        $payment_historys = PaymentHistory::find($request->id);
        $payment_historys->delete();
        return response()->json(['message' => 'Payment History deleted successfully']);

    }

    public function refund_payment_history(Request $request)
    {
        $date = $request->input('date');
        $user_id = $request->input('user_id');

        $query = PaymentRefund::query();

        // Check if a date is provided and add a date filter
        if (!empty($date)) {
            $dateParts = explode(' - ', $date);
            $startDate = Carbon::parse($dateParts[0])->startOfDay();
            $endDate = Carbon::parse($dateParts[1])->endOfDay();
            $query->whereBetween('created_at', [$startDate, $endDate]);
        }

        // Check if a user_id is provided and add a user_id filter
        if (!empty($user_id)) {
            $query->where('user_id', $user_id);
        }


        // Get the filtered records
        $refund_payments_historys = $query->get();
        $users = User::where('status', 'active')->get();

        return view('payment.refund_payment_history', compact('users', 'refund_payments_historys'));
    }

    public function refund_payment_history_delete(Request $request)
    {
        $refund_payments_historys = PaymentRefund::find($request->id);
        $refund_payments_historys->delete();
        return response()->json(['message' => 'Refund Payment History deleted successfully']);

    }


    //Payment Pdf
    public function payment_pdf(Request $request)
    {


        $date = $request->input('date');
        $user_id = $request->input('user_id');
        $status = $request->input('status');

        $pending = 'pending';
        $refund = 'refunded';
        $paid = 'paid';

        $query = Payment::query();

        // Check if a date is provided and add a date filter
        if (!empty($date)) {
            $dateParts = explode(' - ', $date);
            $startDate = Carbon::parse($dateParts[0])->startOfDay();
            $endDate = Carbon::parse($dateParts[1])->endOfDay();
            $query->whereBetween('created_at', [$startDate, $endDate]);
        }

        // Check if a user_id is provided and add a user_id filter
        if (!empty($user_id)) {
            $query->where('user_id', $user_id);
        }

        // Check if a status is provided and add a status filter
        if (!empty($status)) {
            $query->where('status', $status);
        }

        // Get the filtered records
        $payments = $query->orderByRaw(DB::raw("FIELD(status, '$pending', '$refund', '$paid')"))
            ->orderBy('created_at', 'desc')->get();
        $pdf = Pdf::loadView('payment.payment_pdf', ['payments' => $payments]);
        return $pdf->download("payment.pdf");
      //  $users = User::where('status', 'active')->get();
        //return view('payment.index', compact('users', 'payments'));
    }

    //Payment History Pdf
    public function payment_history_pdf(Request $request)
    {


        $date = $request->input('date');
        $user_id = $request->input('user_id');
        $method = $request->input('payment_method');

        $query = PaymentHistory::query();

        // Check if a date is provided and add a date filter
        if (!empty($date)) {
            $dateParts = explode(' - ', $date);
            $startDate = Carbon::parse($dateParts[0])->startOfDay();
            $endDate = Carbon::parse($dateParts[1])->endOfDay();
            $query->whereBetween('created_at', [$startDate, $endDate]);
        }

        // Check if a user_id is provided and add a user_id filter
        if (!empty($user_id)) {
            $query->where('user_id', $user_id);
        }

        // Check if a status is provided and add a status filter
        if (!empty($method)) {
            $query->where('method', $method);
        }

        // Get the filtered records
        $payment_historys = $query->get();

        $pdf = Pdf::loadView('payment.payment_history_pdf', ['payment_historys' => $payment_historys]);
        return $pdf->download("payment_history.pdf");
        //return view('payment.payment_history', compact('users', 'payment_historys', 'payment_methods'));
    }

    //Refund Payment History Pdf
    public function refund_payment_history_pdf(Request $request)
    {
        $date = $request->input('date');
        $user_id = $request->input('user_id');

        $query = PaymentRefund::query();

        // Check if a date is provided and add a date filter
        if (!empty($date)) {
            $dateParts = explode(' - ', $date);
            $startDate = Carbon::parse($dateParts[0])->startOfDay();
            $endDate = Carbon::parse($dateParts[1])->endOfDay();
            $query->whereBetween('created_at', [$startDate, $endDate]);
        }

        // Check if a user_id is provided and add a user_id filter
        if (!empty($user_id)) {
            $query->where('user_id', $user_id);
        }


        // Get the filtered records
        $refund_payments_historys = $query->get();
        $pdf = Pdf::loadView('payment.refund_payment_history_pdf', ['refund_payments_historys' => $refund_payments_historys]);
        return $pdf->download("refund_payment_history.pdf");
      //  return view('payment.refund_payment_history', compact('users', 'refund_payments_historys'));
    }


}
