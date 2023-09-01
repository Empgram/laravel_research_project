<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\MailNotify;
use App\Models\SentEmail;

class MailController extends Controller
{
    public function showEmailForm()
    {
        return view('email-form');
    }
    public function index()
    {
        $messages = Mail::latest()->get();
        return view('messages.index', compact('body'));
    }
    public function sendEmail(Request $request)
    {
        $data = [
            'subject' => 'Email from Your App',
            'body' => $request->input('message')
        ];

        try {
            Mail::to($request->input('recipient'))->send(new MailNotify($data));

            // Store the sent email in the database
            SentEmail::create([
                'recipient_email' => $request->input('recipient'),
                'subject' => $data['subject'],
                'body' => $data['body']
            ]);

            return redirect()->route('message.index')->with('success', 'Email sent successfully');
        } catch (\Exception $exception) {
            return redirect()->route('email.form')->with('error', 'Failed to send email');
        }
    }
}
