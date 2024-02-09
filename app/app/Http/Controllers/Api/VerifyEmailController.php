<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\Request;
use Illuminate\Queue\Middleware\ThrottlesExceptions;
use Illuminate\Support\Facades\URL;
use Illuminate\Validation\ValidationException;

class VerifyEmailController extends Controller
{
//    public function confirmedEmail(Request $request)
//    {
//        $user = User::find($request->route('id'));
//
//        if (!hash_equals(
//            sha1($user->getEmailForVerification()),
//            (string)$request->route('hash')
//        )) {
//            return false;
//        }
//
//        if ($user->hasVerifiedEmail()) {
//            return redirect(env('FRONT_URL') . '/email/verify/already-success');
//        }
//
//        $user->markEmailAsVerified();
//        event(new Verified($user));
//
//        return response()->json([
//            'status' => trans('verification.verified'),
//        ]);

    public function __construct(Request $request, User $user)
    {
        if (!( $this->middleware('throttle:6,1')->only('verify', 'resend'))) {
            return response()->json([
                'request' => $request,
            ], 400);
        }
    }

    public function verify(Request $request, User $user)
    {
        if (! URL::hasValidSignature($request)) {
            return response()->json([
                'status' => trans('verification.invalid'),
            ], 400);
        }

        if ($user->hasVerifiedEmail()) {
            return response()->json([
                'status' => trans('verification.already_verified'),
            ], 400);
        }

        $user->markEmailAsVerified();

        event(new Verified($user));

        return response()->json([
            'status' => trans('verification.verified'),
        ]);
    }

    public function resend(Request $request)
    {

        $user = User::where('email', $request->email)->first();

        if (is_null($user)) {
            throw ValidationException::withMessages([
                'email' => [trans('verification.user')],
            ]);
        }

        if ($user->hasVerifiedEmail()) {
            throw ValidationException::withMessages([
                'email' => [trans('verification.already_verified')],
            ]);
        }

        $user->sendEmailVerificationNotification();

        return response()->json(['status' => trans('verification.sent')]);
    }
}
