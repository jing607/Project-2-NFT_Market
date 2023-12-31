<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="//fonts.bunny.net"> --}}
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,200;0,400;0,600;0,700;1,200;1,400&display=swap" rel="stylesheet">


    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    {{-- <link rel="stylesheet" href="{{ asset('public/css/app.css') }}"> --}}


</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">

                <a href="{{ url('/') }}"class="navbar-logo">
                    <img src="{{ asset('images/nft-market-logo.jpg') }}" alt="logo"/>
                </a>



                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->

                        @auth
                            <li class="nav-item dropdown nav-btn">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end " aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    @auth
                                        @if (auth()->user()->role === 'ROLE_ADMIN')
                                        <a class="dropdown-item " href="{{ route('admin.user.list') }}">
                                            {{ __('Back Office') }}
                                        </a>
                                        @endif
                                        <a class="dropdown-item" href="{{ route('user.collection') }}">
                                            {{ __('My collection') }}
                                        </a>
                                    @endauth

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @else
                            @if (Route::has('login'))
                                <li class="nav-item nav-btn">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item nav-btn">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
