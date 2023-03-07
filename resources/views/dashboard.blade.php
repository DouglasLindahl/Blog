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

    <section class="filter">
        <div class="search">
        <label for="" class="form-label">Search: </label>
        <input type="text" class="form-control" placeholder="Keyword...">
    </div>

    <div class="author">
        <label for="" class="form-label">Author: </label>
        <select name="" class="form-select">
        <option value="">Select author</option>
        <option value="">Douglas</option>
        <option value="">Filip</option>
        </select>
    </div>

    <div class="sort">
        <label for="" class="form-label">Sort by: </label>
        <select name="" class="form-select">
        <option value="">Newest</option>
        <option value="">Oldest</option>
        </select>
    </div>
</section>

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
