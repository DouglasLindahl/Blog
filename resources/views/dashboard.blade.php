@php( $blogPosts = App\models\BlogPost::all())
@php( $users = App\models\user::all())

<h1>Welcome, {{$user["username"]}}</h1>

@include('errors')
<form action="/createPost" method = "POST">
    @csrf
    <input type="submit">
</form>

<a href="/">Log out</a>

<div>
    @foreach($blogPosts as $post)
    <div class = "blogPost">
        <h1>{{$post->title}}</h1>
        <p>By: {{ App\models\user::find($post->user_id)->username }}</p>
        <p>{{$post->content}}</p>
    </div>
    @endforeach
</div>
