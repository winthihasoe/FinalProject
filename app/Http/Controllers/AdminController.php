<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index(){
        return view('admin.index');
    }

    function manage_premium_users(){
        $users=User::get();
        return view('admin.manage_premium_users',['users'=>$users]);
    }

    function contact_messages(){
        $message=ContactMessage::latest()->get();
        return view('admin.contact_messages',['messages'=>$message]);
    }
}
