<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogPost;

class LikePostController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(BlogPost $blogPost, Request $request)
    {
        if (BlogPost::where('user_id', 'like', $request->user_id, "AND", 'post_id', 'like', $request->post_id)->get()) {
            $blogPost->likes -= 1;
            $blogPost->save();
            return redirect()->intended('dashboard');
        } else {
            $blogPost->likes += 1;
            $blogPost->save();
            return redirect()->intended('dashboard');
        }
    }
}
