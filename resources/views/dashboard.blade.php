<link rel="stylesheet" href="{{ asset('/css/dashboard.css') }}">

@if(!isset($sort))
@php ($sort = App\models\BlogPost::orderBy('created_at', 'desc')->get())
@endif

@php ($user = auth()->user())
@php( $blogPosts = $sort)


@php( $users = App\models\user::all())



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
    <div class = "sortContainer">
        <form class = "sortPosts" action="sortPosts" method = "POST">
            @csrf
            <section class="filter">
                <div class="search">
                    <label for="search" class="form-label">Search: </label>
                    <input type="text" class="form-control" name = "search" placeholder="Keyword...">
                </div>

                <div class="author">
                    <label for="search" class="form-label">Author: </label>
                    <input type="text" class="form-control" name = "author" placeholder="Author...">
                </div>

                <div class="sort">
                    <label for="" class="form-label">Sort by: </label>
                    <select name="newest" class="form-select">
                    <option value="new">Newest</option>
                    <option value="old">Oldest</option>
                    </select>
                </div>
            </section>
            <input type="hidden" name = "user" value = {{$user}}>
            <input type="submit" value = "Sort">
        </form>
        <form action="resetSort" method = "POST">
            @csrf
            <input type="hidden" name = "user" value = {{$user}}>
            <input type="submit" value = "Reset">
        </form>
    </div>

    <div class = "blogPostsContainer">
        @foreach($blogPosts as $post)
        <div class = "blogPost">
            <div class = "blogPostHeader">
                <h1>{{$post->title}}</h1>
                <p class = "content">{{$post->content}}</p>
                <p class = "likes">
                    {{ $post->likes }} likes
                </p>
            </div>
            <div class = "blogPostInfo">
                @if(!App\models\user::find($post->user_id))
                    <p class = "author"> By: [Deleted]</p>
                @else
                    <p class = "author">By: {{ App\models\user::find($post->user_id)->username }}</p>
                    <p class = "timestamp">{{ $post->created_at->diffForHumans() }}</p>
                @endif
                <div class="like">
                    <form action="post/{{ $post->id }}/like" method="POST">
                        @csrf
                        @method('patch')
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <input type="hidden" name = "user_id" value="{{$user->id}}">
                        <input type="hidden" name = "sort" value = {{$sort}}>
                        <button type="submit">Like</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</body>
