<h1>Welcome, {{$user["username"]}}</h1>

@include('errors')
<form action="/createPost" method = "POST">
    @csrf
    <input type="submit">
</form>

<a href="/">Log out</a>
