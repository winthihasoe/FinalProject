<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    function login(){
        return view('auth.login');
    }

    function post_login(){
        // authentication for required field
        $validation=request()->validate([
            'email'=>'required',
            'password'=>'required'
        ]);

        if($validation){
            // check for email and password
            $auth=Auth::attempt(['email'=>$validation['email'], 'password'=>$validation['password']]);
            if($auth){
                // redirect to home page
                return redirect()->route('home');
            }else{
                return back()->with('error','Authentication Failed! Try again.');
            }
        }else{
            // go back with errors
            return back()->withErrors($validation);
        }
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
            
            if(Auth::attempt(['email'=>$validation['email'], 'password'=>$validation['password']])){
            return redirect()->route('home');
            }
        }else{
            return back()->withErrors($validation);
        }
    }

    // logout
    function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}