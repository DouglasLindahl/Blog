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
        $blogPosts = BlogPost::query();

        if ($request->search) {
            $blogPosts->where('title', 'LIKE', '%' . $request->search . '%')
                ->orWhere('content', 'LIKE', '%' . $request->search . '%');
        }

        if ($request->author) {
            $blogPosts->join('users', 'blog_posts.user_id', '=', 'users.id')
                ->where('users.username', 'LIKE', '%' . $request->author . '%');
        }

        if ($request->newest == 'old') {
            $blogPosts->orderBy('blog_posts.created_at');
        } else {
            $blogPosts->orderByDesc('blog_posts.created_at');
        }

        $blogPosts = $blogPosts->select('blog_posts.*')->get();

        return view('dashboard', ['sort' => $blogPosts]);
    }
}
