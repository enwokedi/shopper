<?php

namespace App\Http\Controllers\Welcome;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\MailController;

class ContactController extends Controller
{
    public function Contact()
    {
        return view('frontend.contact');
    }

    public function StoreMessage(Request $request)
    {
        // dd($request);
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

        return redirect()->back()->with($notification);
    }

    public function ContactMessage()
    {
        $contacts = Contact::latest()->get();
        return view('admin.contact.allcontact', compact('contacts'));
    }

    public function DeleteMessage($id)
    {
        Contact::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Your Message Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
