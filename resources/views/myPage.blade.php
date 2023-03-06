<?php use App\Models\BlogPost; ?>
<link rel="stylesheet" href="{{ asset('/css/dashboard.css') }}">

<body>
    <div class="blogPostsContainer">
        @foreach($user->posts as $post)
        <div class = "blogPost">
            <h1>{{$post->title}}</h1>
            <p class = "author">By: {{ App\models\user::find($post->user_id)->username }}</p>
            <p class = "content">{{$post->content}}</p>
            <form action="post/{{$post->id}}/delete" method = "POST">
                @csrf
                <input type="hidden" value = {{$post->id}}>
                @method('patch')
                <input type="submit" value = "Delete Post">
            </form>
        </div>
        @endforeach
    </div>
</body>
