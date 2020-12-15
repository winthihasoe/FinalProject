<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    function post_contact_message(){
        
        // validate data 
        $validation=request()->validate([
            'username'=>'required',
            'email'=>'required',
            'message'=>'required'
        ]);

        if($validation){
            $username=$validation['username'];
            $email=$validation['email'];
            $message=$validation['message'];

            $sent_message=new ContactMessage();
            $sent_message->username=$username;
            $sent_message->email=$email;
            $sent_message->message=$message;
            $sent_message->save();

            return back()->with('message','Your message is sent');

        }else{
            return back()->withErrors($validation);
        }

        // save it to db 
    }
}
