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

    function editUser($id){
        $updateUser=User::find($id);
        return view('admin.editUser',['updateUser'=>$updateUser]);
    }

    function updateUser($id){
        // $updateUser=User::find($id);
        // return $updateUser;
        $validation=request()->validate([
            'name'=>'required',
            'email'=>'required',
            'isAdmin'=>'required',
            'isPremium'=>'required'
        ]);

        if($validation){
            // grab user data from database
            $updateUser=User::find($id);
            // override data from form field
            $updateUser->name=$validation['name'];
            $updateUser->email=$validation['email'];
            $updateUser->isAdmin=$validation['isAdmin'];
            $updateUser->isPremium=$validation['isPremium'];
            $updateUser->update();
            // return back
            return back()->with('message','User updated');
        }else{
            return back()->withErrors($validation);
        }
        
    }

    function deleteUser($id){
        $deleteUser=User::find($id);
        $deleteUser->delete();
        return back()->with('message','User deleted');
    }
    function contact_messages(){
        $message=ContactMessage::latest()->get();
        return view('admin.contact_messages',['messages'=>$message]);
    }
}
