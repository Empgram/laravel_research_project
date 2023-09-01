<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\CustomEmail;

class EmailController extends Controller
{
    public function sendEmail(Request $request)
    {
        $guardianEmail = $request->input('guardian_email');
        $message = $request->input('message');

        // Send email using Laravel's Mail class
        Mail::to($guardianEmail)->send(new CustomEmail($message));

        // Redirect back with a success message
        return back()->with('success', 'Email sent successfully!');
    }
}

