<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogPost;
use App\Models\Likes;
use Illuminate\Support\Facades\DB;

class LikePostController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(BlogPost $blogPost, Request $request)
    {
        $like = Likes::where('user_id', '=', $request->user_id)
            ->where('post_id', '=', $request->post_id)
            ->first();

        if ($like) {
            $blogPost->likes -= 1;
            DB::table('likes')->where('id', '=', $like->id)->delete();
        } else {
            $addLike = $request->only(["user_id", "post_id"]);
            Likes::create($addLike);
            $blogPost->likes += 1;
        }

        $blogPost->save();
        return redirect()->intended('dashboard');
    }
}
