<?php use App\Models\BlogPost; ?>
<link rel="stylesheet" href="{{ asset('/css/myPage.css') }}">



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
    <div>
        <form action="/dashboard" method = "get">
            @csrf
            <input type="submit" value = "Dashboard">
        </form>
    </div>
</header>
<body>
    <div class="blogPostsContainer">
        @foreach($user->posts as $post)
        <div class = "blogPost">
            <h1>{{$post->title}}</h1>
            <p class = "author">By: {{ App\models\user::find($post->user_id)->username }}</p>
            <p class = "content">{{$post->content}}</p>
            <form class = "deletePostButton" action="post/{{$post->id}}/delete" method = "POST">
                @csrf
                <input type="hidden" value = {{$post->id}}>
                @method('patch')
                <input type="submit" value = "Delete Post">
            </form>
        </div>
        @endforeach
    </div>
</body>
