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
            'password'=>'required || min:8 || confirmed',
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

    // update userprofile
    function post_userProfile(){
        // rename data from input field
        $name=request('name');
        $email=request('email');
        $image=request('image');
        $old_password=request('old_password');
        $new_password=request('new_password');
        
        // find user information in db table
        $id=auth()->user()->id;
        $current_user=User::find($id);

        // overwrite if name and email changed
        $current_user->name=$name;
        $current_user->email=$email;
       
        // if image field or password field is filled
        if($image || $old_password){
            if($image){
                // save to public file path
                $image_name=uniqid()."_".$image->getClientOriginalName();
                $image->move(public_path('images/profiles/'),$image_name);

                // save to db image column
                $current_user->image=$image_name;
               
                
            }

            // if password fields is filled
            if($old_password && $new_password){
                // compare to old password
                if(Hash::check($old_password,$current_user->password)){
                    // let user to change new password
                    $current_user->password=Hash::make($new_password);
                    $current_user->update();
                    
                }else{
                    return back()->with('error',"Password didn't match");
                }
            }
            // update image or password
            $current_user->update();
            return back()->with('success','Profile Changed!');
        }
        // update name and email
        $current_user->update();
        return back();
    }
}