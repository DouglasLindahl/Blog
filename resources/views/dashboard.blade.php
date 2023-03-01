<h1>Welcome, {{$user["username"]}}</h1>

@include('errors')
<form action="/createPost" method = "GET">
    @csrf
    <input type="submit">
</form>

<a href="/">Log out</a>