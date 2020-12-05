<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
            // 'username'=>'required',
            // 'email'=>'required',
            // 'password'=>'required || min:8',
            'image'=>'required'
        ]);

        if($validation){
            $image=request('image'); //save to public folder
            $image_name=uniqid()."_".$image->getClientOriginalName(); //save to db table as a new image name with random id

            $image->move(public_path('images/profiles'),$image_name);
            
            // return $image_name;
            // dd($image);
            
            // return redirect()->route('home');
        // }else{
        //     return back()->withErrors($validation);
        }
    }
}
