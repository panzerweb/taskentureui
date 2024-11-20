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
    @viteReactRefresh
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">

        <nav class="navbar navbar-expand-md shadow-sm">
            <div class="container d-flex justify-content-between">
                <a class="navbar-brand text-light" href="{{ url('/home') }}">
                    {{ config('app.name', 'Taskenture') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
        
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <!-- Other nav items can go here -->
                    </ul>
        
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto d-flex justify-content-center">
                        {{-- Page Links --}}
                        <li class="nav-item mx-auto">
                            <x-navlink href="{{ route('home') }}" :active="request()->routeIs('home') || request()->routeIs('tasks.search') && request()->route('context') === 'home'">My List</x-navlink>
                        </li>
                        <li class="nav-item mx-auto">
                            <x-navlink href="{{ route('pages.starred') }}" :active="request()->routeIs('pages.starred') || request()->routeIs('tasks.search') && request()->route('context') === 'pages.starred'">Favorite</x-navlink>
                        </li>
                        <li class="nav-item mx-auto">
                            <x-navlink href="{{ route('pages.trash') }}" :active="request()->routeIs('pages.trash') || request()->routeIs('tasks.search') && request()->route('context') === 'pages.trash'">Trash</x-navlink>
                        </li>
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item mx-auto">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
        
                            @if (Route::has('register'))
                                <li class="nav-item mx-auto">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown mx-auto">
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
        
                <!-- Notification Icon outside the collapsible navbar -->
                <div class="dropdown dropstart position-relative ms-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" id="notificationDropdown" data-bs-toggle="dropdown" aria-expanded="false" width="24" height="24" fill="currentColor" style="cursor: pointer;" class="bi bi-bell-fill text-warning" viewBox="0 0 16 16">
                        <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2m.995-14.901a1 1 0 1 0-1.99 0A5 5 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901"/>
                    </svg>
                    <ul class="dropdown-menu" aria-labelledby="notificationDropdown" style="max-width: 500px;">
                        @forelse (auth()->user()->unreadNotifications as $notification)
                            <li>
                                <a href="" class="dropdown-item px-2">
                                    <h6 class="fw-bold">Updated!</h6>
                                    <p class="fw-bold mb-0">{{$notification->data['taskname']}}</p>
                                    <p class="small my-0">Due on {{ $notification->data['due_date'] }}</p>
                                    <span class="fw-semibold">Updated at: </span><span class="small">{{ $notification->updated_at }}</span>
                                </a>
                                <hr>
                            </li>
                        @empty
                            <li>
                                <a class="dropdown-item" href="#">No new notifications</a>
                            </li>
                        @endforelse
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
                        <li class="nav-item mb-2"><a href="{{ route('faqs') }}" class="nav-link p-0 text-light">FAQs</a></li>
                        <li class="nav-item mb-2"><a href="{{ route('reportbug') }}" class="nav-link p-0 text-light">Report Bug</a></li>
                    </ul>
                </div>
            
                <div class="col-6 col-md-2 mb-3">
                    <h5 class="fw-semibold">Community</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="{{ route('pages.help') }}" :active="request()->routeIs('pages.help')" class="nav-link p-0 text-light">Team</a></li>
                        <li class="nav-item mb-2"><a href="{{ route('devmessage') }}" class="nav-link p-0 text-light">Developer Message</a></li>
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
                            <a href="https://github.com/panzerweb/TaskEnture" class="fs-5 px-1 text-warning link-opacity-50-hover"><i class="bi bi-github"></i></a>
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
