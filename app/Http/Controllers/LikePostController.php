<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogPost;

class LikePostController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(BlogPost $blogPost)
    {
        $blogPost->likes += 1;
        $blogPost->save();
        return redirect()->intended('dashboard');
    }
}
