<link rel="stylesheet" href="{{ asset('./css/index.css') }}">
@include("errors")

<form action="/registerAccount" method = "post" class = "registerAccountForm">
    @csrf
    <label for="username">Username</label>
    <input type="text" name = "username" placeholder="Username">
    <label for="password">Password</label>
    <input type="password" name = "password" placeholder="************">
    <input type="submit" value = "Register account">
</form>
<form class = "loginButton" action="/" method = "get">
    <div>
        @csrf
        <button type = "submit">Back</button>
    </div>
</form>
