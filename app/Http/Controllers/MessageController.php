<?php

namespace App\Http\Controllers;
use Mail;
use App\Mail\MailNotify;
use App\Models\SentEmail;
use Illuminate\Http\Request;
use App\Models\Message;
class MessageController extends Controller
{
    // app/Http/Controllers/MessageController.php


    public function go()
    {
       
        return view('messages\create');
    }

public function index()
{
    $messages = SentEmail::latest()->get();
    return view('messages.index', compact('messages'));
}

public function store(Request $request)
{
    $request->validate([
        'body' => 'required|max:255',
    ]);

    Message::create([
        'user_id' => auth()->id(),
        'body' => $request->body,
    ]);

    return back();
}

}
