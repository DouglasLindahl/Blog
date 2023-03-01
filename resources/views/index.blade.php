{{-- <link rel="stylesheet" href="{{ asset('./css/app.css') }}"> --}}
<form method="post" action="/login">
    @csrf

<div class="header">
    <h1>Blogg</h1>
    <button type="button">Log in</button>
</div>

    <div class="login-form">
    <div>
        <label for="username">Username</label>
        <input name="username" id="username" type="text" />
    </div>
    <div>
        <label for="password">Password</label>
        <input name="password" id="password" type="password" />
    </div>
    <button type="submit">Login</button>
</div>
</form>

@include('errors')
