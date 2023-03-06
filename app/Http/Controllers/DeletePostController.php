<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogPost;
use Illuminate\Support\Facades\DB;

class DeletePostController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(BlogPost $blogPost)
    {
        DB::table('blog_Posts')->where('id', '=', $blogPost->id)->delete();
        return redirect()->intended("/dashboard");
    }
}
