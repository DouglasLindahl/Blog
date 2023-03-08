<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\models\BlogPost;

class SortPostsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $blogPosts = BlogPost::orderByDesc('created_at')->get();
        if ($request["author"] != null) {
            if ($request["newest"] == "new") {
                $blogPosts = BlogPost::join('users', 'blog_posts.user_id', '=', 'users.id')
                    ->where('users.username', 'like', '%' . $request["author"] . '%')
                    ->orderBy('blog_posts.created_at', 'desc')->get();
            } else if ($request["newest"] == "old") {
                $blogPosts = BlogPost::join('users', 'blog_posts.user_id', '=', 'users.id')
                    ->where('users.username', 'like', '%' . $request["author"] . '%')
                    ->orderBy('blog_posts.created_at', 'asc')->get();
            }
        } else {
            if ($request["newest"] == "new") {
                $blogPosts = BlogPost::orderBy('created_at', 'desc')->get();
            } else if ($request["newest"] == "old") {
                $blogPosts = BlogPost::orderBy('created_at', 'asc')->get();
            }
        }
        return view('dashboard', ['sort' => $blogPosts]);
    }
}
