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
 
    

    function postById($id){
        $post=Post::find($id);
        return view('showPost',['post'=>$post]);
    }

    function editPost($id){
        $updateData=Post::find($id);
        return view('user.editPost',['updateData'=>$updateData]);
    }

    function contactUs(){
        return view('user.ContactUs');
    }

  
}
