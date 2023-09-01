<?php

namespace App\Http\Controllers\Auth;
use App\Models\User;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Mail;
use App\Mail\ForgotPasswordMail;

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $this->validateEmail($request);

        $response = $this->broker()->sendResetLink(
            $request->only('email')
        );

        if ($response === Password::RESET_LINK_SENT) {
           
        
            $token = $this->broker()->createToken($user);
            $url = route('password.reset', [
                'token' => $token,
                'email' => $request->email,
            ]);

            Mail::to($request->email)->send(new ForgotPasswordMail($url));

            return $this->sendResetLinkResponse($request, $response);
        } else {
            return $this->sendResetLinkFailedResponse($request, $response);
        }
    }
}
