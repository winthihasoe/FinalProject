<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PageController extends Controller
{
    function index() {
        $posts=Post::latest()->get();
        return view('Index',['posts'=>$posts]);
    }

    function createPost(){
        return view('user.Create');
    }

    function userProfile(){
        return view('user.Userprofile');
    }
 
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

    function postById($id){
        $post=Post::find($id);
        return view('showPost',['post'=>$post]);
    }

    function contactUs(){
        return view('user.ContactUs');
    }

    function post(){
        // validation 
        $validation=request()->validate([
           'title'=>'required',
           'image'=>'required',
           'content'=>'required'
        ]);

        // get associated data as variable
        if($validation){
            $title=request('title');
            $image=request('image');
            $content=request('content');

            $post=new Post();
            $post->user_id=auth()->user()->id;
            $post->title=$title;
            
            // image
            $imageName=uniqid()."_".$image->getClientOriginalName();
            $post->image=$imageName;
            $image->move(public_path('images/posts/'),$imageName);
            
            $post->content=$content;
            $post->save();

            return redirect()->route('home')->with('message', 'add post');
        }else{
            return back()->withErrors($validation);
        }
        
    }
}
