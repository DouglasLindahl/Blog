@php( $blogPosts = App\models\BlogPost::all())
@php( $users = App\models\user::all())

<link rel="stylesheet" href="{{ asset('/css/dashboard.css') }}">

@include('errors')

<header>
    <div>
        <h1>{{$user["username"]}}</h1>
        <form action="/createPost" method = "POST">
            @csrf
            <input class = "createPostButton" type="submit" value = "Create post">
        </form>
    </div>
    <div>
        <a href="/logout">Log out</a>
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
