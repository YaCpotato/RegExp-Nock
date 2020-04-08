<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <title>Laravel Sample</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://kit.fontawesome.com/fff52c779c.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div id="app">
    <nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item" href="#">
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
                ユーザー
                </a>
                <div class="navbar-dropdown">
                <a class="navbar-item">
                    About
                </a>
                <a class="navbar-item">
                    Jobs
                </a>
                <a class="navbar-item">
                    Contact
                </a>
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
</div>
@yield('content')
</body>
<script src="{{ asset('js/app.js') }}"></script>
</html>
