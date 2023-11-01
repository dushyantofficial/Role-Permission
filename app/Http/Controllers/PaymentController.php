<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\PaymentHistory;
use App\Models\User;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $users = User::where('status', 'active')->get();
        $payments = Payment::all();
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

    public function payment_history()
    {
        $payment_historys = PaymentHistory::all();
        return view('payment.payment_history', compact('payment_historys'));
    }

    public function payment_history_delete(Request $request)
    {
        $payment_historys = PaymentHistory::find($request->id);
        $payment_historys->delete();
        return response()->json(['message' => 'Payment History deleted successfully']);

    }
}
