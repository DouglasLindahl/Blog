<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogPost;

class LikePostController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function like(blogPost $post)
    {
        $post->likes++;
        $post->save();

        return back();
    }
}
