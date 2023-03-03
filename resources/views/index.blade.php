<link rel="stylesheet" href="{{ asset('./css/index.css') }}">

<body>
    <div class="header">
        <button class = "openLoginFormButton" type="button">Log in</button>
    </div>
    <form class = "loginForm hidden" method="post" action="/login">
        @csrf

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
    <form class = "registerButton hidden" action="/register" method = "get">
        <div>
            @csrf
            <button type = "submit">Register account</button>
        </div>
    </form>
    @include('errors')
    <script type="text/javascript" src="{{ URL::asset('./js/index.js') }}"></script>
</body>
