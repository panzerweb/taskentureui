{{-- 
 ==========================================================
 ||            Main Layout for the Web Application       ||
 ==========================================================
 
 Description: 
 This is the main reusable layout for the Web Application.
 This is where the CSS, JS Links, and other resource links
 are implemented in the head tag or the scripts below.

 
--}}

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Taskenture') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    {{-- Links --}}
    <link rel="stylesheet" href="{{ asset('css/behavior.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> {{-- Sweet Alert Script --}}
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md shadow-sm">
            <div class="container">
                <a class="navbar-brand text-light" href="{{ url('/home') }}">
                    {{ config('app.name', 'Taskenture') }}
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
                        {{-- Page Links --}}
                        <li class="nav-item">
                            <x-navlink href="{{ route('home') }}" :active="request()->routeIs('home') || request()->routeIs('tasks.search') && request()->route('context') === 'home'">My List</x-navlink>
                        </li>
                        <li class="nav-item">
                            <x-navlink href="{{ route('pages.starred') }}" :active="request()->routeIs('pages.starred') || request()->routeIs('tasks.search') && request()->route('context') === 'pages.starred'">Favorite</x-navlink>
                        </li>
                        <li class="nav-item">
                            <x-navlink href="{{ route('pages.trash') }}" :active="request()->routeIs('pages.trash') || request()->routeIs('tasks.search') && request()->route('context') === 'pages.trash'">Trash</x-navlink>
                        </li>
                        <li class="nav-item">
                            <x-navlink href="{{ route('pages.help') }}" :active="request()->routeIs('pages.help')">Help</x-navlink>
                        </li>
                        
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
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link text-warning dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-0">
            @yield('content')
        </main>
    </div>

    
    {{-- Footer Section --}}
    <section class="footer-section mt-5">
        <div class="container">
            <footer class="py-5 text-light">
                <div class="row">
                <div class="col-6 col-md-2 mb-3">
                    <h5 class="fw-semibold">Support</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">Help</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">Report Bug</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">FAQs</a></li>
                    </ul>
                </div>
            
                <div class="col-6 col-md-2 mb-3">
                    <h5 class="fw-semibold">Community</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">Team</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">Developer Message</a></li>
                    </ul>
                </div>
            
                <div class="col-md-5 offset-md-3">
                    <div class="d-flex justify-content-center flex-column">
                        <h2 class="text-center text-md-end">Taskenture</h2>
                        <p class="text-center text-md-end mb-4">Your Gamified To Do Web Application</p>
                        <div class="d-flex justify-content-center justify-content-md-end align-items-end  w-100 gap-2">
                            <a href="#" class="fs-5 px-1 text-warning link-opacity-50-hover"><i class="bi bi-meta"></i></a>
                            <a href="#" class="fs-5 px-1 text-warning link-opacity-50-hover"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="fs-5 px-1 text-warning link-opacity-50-hover"><i class="bi bi-tiktok"></i></a>
                            <a href="#" class="fs-5 px-1 text-warning link-opacity-50-hover"><i class="bi bi-github"></i></a>
                        </div>
                    </div>
                </div>
                </div>
            
                <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
                <p>© 2024 Taskenture, Inc. All rights reserved.</p>
                <ul class="list-unstyled d-flex gap-3">
                    <li class="nav-item mb-2">
                        <a href="#" class="nav-link p-0 text-light">
                            Privacy Policy
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="#" class="nav-link p-0 text-light">
                            Terms and Conditions
                        </a>
                    </li>
                </div>
            </footer>
        </div>
    </section>


    <script src="{{asset('js/console.js')}}"></script>

</body>
</html>
