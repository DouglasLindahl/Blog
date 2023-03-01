<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class CreateBlogPostController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $blogPost = $request->only(["user_id", "title", "content"]);
        BlogPost::create($blogPost);
        return redirect()->intended('dashboard');
    }
}
