<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Campaign_Ideas;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function checkEmail(Request $request)
    {
        $email = $request->input('email');

        $existingUser = Campaign_Ideas::where('sd_email', $email)->first();

        return response()->json([
            'unique' => !$existingUser,
        ]);
    }
}
