<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogPost;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DeletePostController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(BlogPost $blogPost)
    {
        $user = Auth::user();
        DB::table('blog_Posts')->where('id', '=', $blogPost->id)->delete();
        return redirect()->intended("/myPage")->with('user', $user);
    }
}
