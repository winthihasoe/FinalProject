<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //create post
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

    // update post
    function updatePost($id){
        // catch data from edit post form field
        $title=request('title');
        $image=request('image');
        $content=request('content');

        // find post with id from db table
        $update_data=Post::find($id);
        $update_data->title=$title;
        $update_data->content=$content;

        // image
        if($image){
        $imageName=uniqid().'_'.$image->getClientOriginalName();
        $image->move(public_path('images/posts'),$imageName);
        $update_data->image=$imageName;
        $update_data->update();
        }

        // return back
        return back()->with('message','Post updated');
    }

    // delete post
    function deletePost($id){
        $delete_post=Post::find($id);
        $delete_post->delete();
        return redirect()->route('home')->with('message','Post Deleted!');
    }
}
