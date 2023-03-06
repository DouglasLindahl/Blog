@php( $blogPosts = App\models\BlogPost::orderByDesc('created_at')->get())
{{-- @php( $blogPosts = App\models\BlogPost::join('users', 'blog_posts.user_id', '=', 'users.id')->where('users.username', 'like', '%' . "User search" . '%')->get()) --}}


@php( $users = App\models\user::all())


{{-- <link rel="stylesheet" href="{{ asset('/css/dashboard.css') }}"> --}}

@include('errors')

<header>
    <div>
        <form action="myPage" method="get">
            @csrf
            <input type="submit" value = "My page">
        </form>
    </div>
</header>
<body>
    <div class = "blogPostsContainer">
        @foreach($blogPosts as $post)
        <div class = "blogPost">
            <h1>{{$post->title}}</h1>
            @if(!App\models\user::find($post->user_id))
                <p class = "author"> By: [Deleted]</p>
            @else
                <p class = "author">By: {{ App\models\user::find($post->user_id)->username }}</p>
            @endif

            <p class = "content">{{$post->content}}</p>
        </div>
        @endforeach
    </div>
</body>
