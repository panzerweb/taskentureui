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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> {{-- Sweet Alert Script --}}
    @viteReactRefresh
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>
<body>

    {{-- Navigation --}}
    <nav class="navbar navbar-expand-md shadow-sm">
        <div class="container">
            <a class="navbar-brand text-light" href="{{ url('/') }}">
                <span class="text-warning">Task</span><span class="text-light">enture</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">
                    {{-- Page Links --}}
                    <li class="nav-item mx-auto">
                        <x-navlink href="{{ route('outside.faqs') }}" :active="request()->routeIs('outside.faqs')">FAQs</x-navlink>
                    </li>
                    <li class="nav-item mx-auto">
                        <x-navlink href="{{ route('outside.reportbug') }}" :active="request()->routeIs('outside.reportbug')">ReportBugs</x-navlink>
                    </li>
                    <li class="nav-item mx-auto">
                        <x-navlink href="{{ route('outside.contactus') }}" :active="request()->routeIs('outside.contactus')">Contact Us</x-navlink>
                    </li>
                    <li class="nav-item mx-auto">
                        <x-navlink href="{{ route('outside.help') }}" :active="request()->routeIs('outside.help')">Team</x-navlink>
                    </li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto"> 
 
                </ul>
            </div>
        </div>
    </nav>


    <main class="py-0">
        @yield('content')
    </main>


    {{-- Footer Section --}}
    <section class="footer-section">
        <div class="container">
            <footer class="py-5 text-light">
                <div class="row">
                    <div class="row">
                    <div class="col-12">
                        <div class="d-flex justify-content-center align-items-center flex-column">
                            <h2 class="text-center text-warning fw-bold">Task<span class="text-light">enture</span></h2>
                            <p class="text-center mb-4">Your Gamified To Do Web Application</p>
                            <div class="d-flex justify-content-center align-items-center  w-100 gap-2">
                                <a href="#" class="fs-5 px-1 text-warning link-opacity-50-hover"><i class="bi bi-meta"></i></a>
                                <a href="#" class="fs-5 px-1 text-warning link-opacity-50-hover"><i class="bi bi-instagram"></i></a>
                                <a href="#" class="fs-5 px-1 text-warning link-opacity-50-hover"><i class="bi bi-tiktok"></i></a>
                                <a href="https://github.com/panzerweb/TaskEnture" class="fs-5 px-1 text-warning link-opacity-50-hover"><i class="bi bi-github"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            
                <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
                <p class="text-center">© 2024 Taskenture, Inc. All rights reserved.</p>
                <ul class="list-unstyled d-flex justify-content-around gap-3">
                    <li class="nav-item mb-2 text-center">
                        <a href="#" class="nav-link p-0 text-light">
                            Privacy Policy
                        </a>
                    </li>
                    <li class="nav-item mb-2 text-center">
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