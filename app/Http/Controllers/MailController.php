<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUs;
use Illuminate\Support\Carbon;

class MailController extends Controller
{
    public function sendMail(Request $request)
    {
        $name = $request->name;

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'messages' => 'required',
        ]);

        Contact::insert([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'phone' => $request->phone,
            'message' => $request->message,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Your Message Submited Successfully',
            'alert-type' => 'success'
        );

        Mail::to('fake@mail.com')->send(new ContactUs($name));

        return view('thank-you');
    }
}
