<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    public function __construct()
    {
//        $this->middleware('guest');
    }

    protected function sendResetLinkResponse(Request $request, string $response)
    {
        return response()->json(['status' => trans($response)]);
    }

    protected function sendResetLinkFailedResponse(Request $request, string $response)
    {
        return response()->json(['email' => trans($response)], 400);
    }

}
