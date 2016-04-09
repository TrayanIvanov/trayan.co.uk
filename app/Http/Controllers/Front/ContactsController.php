<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\ContactRequest;
use App\Http\Controllers\Controller;
use Mail;
use Session;

class ContactsController extends Controller
{
    public function index()
    {
        return view('front.contacts');
    }

    public function contactMe(ContactRequest $request)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'msg' => $request->message,
        ];
        $replyTo = $data['email'];

        Mail::send('front.emails.contact', $data, function ($message) use ($replyTo) {
            $message->to('ivanov@trayan.co.uk');
            $message->subject('Trayan.co.uk - contact form');
            $message->replyTo($replyTo);
        });

        flash()->success('Success', 'Message is successfully sent!');
        return redirect('contacts');
    }
}
