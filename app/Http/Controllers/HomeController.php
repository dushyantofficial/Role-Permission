<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->status == "active") {
            return view('home');
        } else
            Auth::logout();
        return redirect()->route('login')->with('danger', 'User Block Contact Admin....');
    }

    public function mail()
    {

        $sub = "Test";
        $body = "Test";
        $message = "Test";
        $from = "dushyant.greatideas@gmail.com";
        $to = "kk.greatideas@gmail.com";
        Mail::send('emails.common', ["data" => $body], function ($message) use ($from, $to, $sub) {
            $message->to($to);
            $message->subject($sub);
            $message->from($from, 'My Cloud Particles');
        });
        dd('Mail Send');
    }

    public function verify_email()
    {
        return view('verify_email');
    }


}
