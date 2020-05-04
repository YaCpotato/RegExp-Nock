<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <title>Laravel Sample</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://kit.fontawesome.com/fff52c779c.js" crossorigin="anonymous"></script>
  <script
  src="https://code.jquery.com/jquery-3.5.0.min.js"
  integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ="
  crossorigin="anonymous"></script>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item" href="/">
            <h1 class="title">RegExpノックセンター</h1>
        </a>

        <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        </a>
    </div>

    <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-start">
        
        </div>
        <div class="navbar-end">
            @auth
            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">
                {{ $auths->name }}
                </a>
                <div class="navbar-dropdown">
                <hr class="navbar-divider">
                <span class="navbar-item" href="{{ route('logout') }}">
                    <form action="{{ route('logout') }}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button class="button is-light" type="submit">Logout</button>
                    </form>
                </span>
            </div>
            @endauth

            @guest
            <div class="navbar-item">
                <div class="buttons">
                <a class="button is-primary" href="{{ route('register') }}">
                    <strong>Sign up</strong>
                </a>
                <a class="button is-light" href="{{ route('login') }}">
                    Log in
                </a>
                </div>
            </div>
            @endguest
        </div>
    </div>
    </nav>
@yield('content')

</body>
</html>
