<link rel="stylesheet" href="{{ asset('./css/index.css') }}">


@include('errors')
<body>
    <section class="errors">
    </section>
    <header>
        <h1>Super cool blog (Extreme)</h1>
        <h2>Share your experiences with the world</h2>
    </header>
    <form class = "loginForm" method="post" action="/login">
        @csrf

        <label for="username">Username</label>
        <input name="username" id="username" type="text" placeholder="Username" />
        <label for="password">Password</label>
        <input name="password" id="password" type="password" placeholder="************" />
        <button type="submit">Login</button>
    </div>
    </form>
    <form class = "registerButton" action="/register" method = "get">
        <div>
            @csrf
            <button type = "submit">Register account</button>
        </div>
    </form>
    <script type="text/javascript" src="{{ URL::asset('./js/index.js') }}"></script>
</body>
