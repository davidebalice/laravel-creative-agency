<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Carbon\Carbon;

class ContactController extends Controller
{
    public function Contact(){
        return view('frontend.contact');
    }
   
    public function StoreMessage(Request $request){

        $request->validate([
            'name' => ['required'],
            'message' => ['required'],
            'email' => ['required','email']
        ],[
            'name.required' => 'Name is required',
            'message.required' => 'Message is required',
            'email.required' => 'Email is required',
        ]);

        Contact::insert([
            'name' => $request->name,
            'email' => $request->email,
            'tel' => $request->tel,
            'subject' => $request->subject,            
            'message' => $request->message,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Message send successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function ContactMessage(){
        $messages = Contact::latest()->orderby('created_at', 'DESC')->get();
        return view('admin.contact.messages',compact('messages'));
    }
    
    public function DeleteMessage ($id){
        Contact::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Message deleted',
            'alert-type' => 'error'
        );
        session()->flash('message','message deleted');
        return redirect()->back()->with($notification);
    }
}
