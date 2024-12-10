<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


class ContactController extends Controller
{
    public function contactus()
    {
        $user = Auth::user();
        return view('contact', ['user' => $user]);
    }

    public function submitForm(Request $request)
    {

        $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);
        Contact::create([
            'user_id' => Auth::id(),
            'subject' => $request->subject,
            'message' => $request->message,
        ]);
        return redirect('contact')->with('success', 'Your message has been sent!');
    }

    public function sendEmail(Request $request)
    {
        // return $request;
        $userEmail = Auth::user()->email;
        // return $userEmail;
        $designerEmail = $request->designer_email;
        // return $designerEmail;

        Mail::send('mail.communication', ['messageContent' => $request->message], function ($message) use ($userEmail, $designerEmail) {
            $message->from('rafayrashid457@gmail.com', 'Decor Vista Management');
            $message->to($designerEmail);
            $message->replyTo($userEmail);
            $message->subject('New Message from User');
        });


        return back()->with('success', 'Email sent successfully!');
    }

    public function sendEmail2(Request $request)
    {
        $designerEmail = Auth::user()->email;
        // return $userEmail;
        $userEmail = $request->user_email;
        // return $userEmail;

        Mail::send('mail.communication2', ['messageContent' => $request->message], function ($message) use ($userEmail, $designerEmail) {
            $message->from('rafayrashid457@gmail.com', 'Decor Vista Management');
            $message->to($userEmail); 
            $message->replyTo($designerEmail);
            $message->subject('New Message from User');
        });


        return back()->with('success', 'Email sent successfully!');
    }
}
