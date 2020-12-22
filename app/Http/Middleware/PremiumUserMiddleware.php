<?php

namespace App\Http\Middleware;

use App\Models\Post;
use Closure;
use Illuminate\Http\Request;

class PremiumUserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // check this user is admin or not 
        // check this user is premium user or not 
        // check this post is posted by this user 
        // get post id 
        $id=request('id');
        // get author id
        $authorId=Post::find($id)->user_id;
        if(auth()->user()->isAdmin=="1" || auth()->user()->isPremium=="1" || auth()->user()->id == $authorId){

            return $next($request);

        }else{
            return redirect()->route('home')->with('errors',"You are not premium user or Admin.");
        }
    }
}
