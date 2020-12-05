<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    function login(){
        return view('auth.login');
    }

    function register(){
        return view('auth.register');
    }

    function post_register(){
        // authentication 
        $validation=request()->validate([
            'username'=>'required',
            'email'=>'required',
            'password'=>'required || min:8',
            'image'=>'required'
        ]);

        if($validation){
            // save to public folder
            $image=request('image'); //save to public folder
            $image_name=uniqid()."_".$image->getClientOriginalName(); //save to db table as a new image name with random id
            $image->move(public_path('images/profiles'),$image_name);
            
            // save to user db table
            $password=$validation['password'];
            $user=new User();
            $user->name=$validation['username'];
            $user->email=$validation['email'];
            $user->password=Hash::make($password);
            $user->image=$image_name;
            $user->save();
            
            return redirect()->route('home');
        }else{
            return back()->withErrors($validation);
        }
    }
}