<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel TODO</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Icons -->
    <script src="https://kit.fontawesome.com/4a679d8ec0.js" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mdb.min.css') }}" rel="stylesheet">
    <link href="{{ asset('sass/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Laravel TODO
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <div class="dropdown">
                                    <span class="dropdown-toggle pointer" data-mdb-toggle="dropdown">
                                        {{ Auth::user()->name }}
                                    </span>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="container py-4">
            @guest
                @else
                <h1>Welcome <b>{{ Auth::user()->name }}</b>!</h1>
                <br>
                <form action="/add" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-11">
                            <div class="m-1">
                                <input class="form-control" name="todo" placeholder="TODO name" id="todo" required>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="m-1">
                                <button class="w-100 btn btn-primary">Add</button>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col" style="text-align: left;">
                            <div class="m-1">
                                <a class="text-primary" href="{{ url('/') }}">All {{ $all }}</a>
                            </div>
                        </div>
                        <div class="col" style="text-align: center;">
                            <div class="m-1">
                                <a class="text-success" href="{{ url('/done') }}">Done {{ $dones }}</a>
                            </div>
                        </div>
                        <div class="col" style="text-align: right;">
                            <div class="m-1">
                                <a class="text-danger" href="{{ url('/not') }}">Not Done {{ $notdones }}</a>
                            </div>
                        </div>
                    </div>
                    <br>
                </form>
            @endguest
            @yield('content')
        </main>
    </div>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/mdb.min.js') }}"></script>
</body>
</html>
