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

        // Apply search filter
        if ($request->search) {
            $blogPosts->where('title', 'LIKE', '%' . $request->search . '%')
                ->orWhere('content', 'LIKE', '%' . $request->search . '%');
        }

        // Apply author filter
        if ($request->author) {
            $blogPosts->join('users', 'blog_posts.user_id', '=', 'users.id')
                ->where('users.username', 'LIKE', '%' . $request->author . '%');
        }

        // Apply sorting preference
        if ($request->newest == 'new') {
            $blogPosts->orderByDesc('blog_posts.created_at');
        } else {
            $blogPosts->orderBy('blog_posts.created_at');
        }

        // Fetch the blog posts from the database
        $blogPosts = $blogPosts->select('blog_posts.*')->get();

        // Return the sorted blog posts to the view
        return view('dashboard', ['sort' => $blogPosts]);
    }
}
