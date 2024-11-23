<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Taskenture</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="{{asset('css/welcome.css')}}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    </head>
    <body>
        {{-- Navbar --}}
        <header>
            @if (Route::has('login'))
                <nav class="navbar navbar-expand-md shadow-sm">
                    <div class="container-lg">
                        <!-- Brand Name -->
                        <a class="navbar-brand text-light fw-bold" href="{{ url('/home') }}">
                            {{ config('app.name', 'Taskenture') }}
                        </a>

                        <!-- Toggler for Mobile View -->
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <!-- Collapsible Content -->
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <!-- Right Side Links -->
                            <ul class="navbar-nav ms-auto">
                                @auth
                                    <!-- Dashboard Link for Authenticated Users -->
                                    <li class="nav-item">
                                        <a href="{{ url('/home') }}" class="nav-link text-light">
                                            {{ __('Dashboard') }}
                                        </a>
                                    </li>
                                @else
                                    <!-- Login Link -->
                                    <li class="nav-item">
                                        <a href="{{ route('login') }}" class="nav-link text-light">
                                            {{ __('Login') }}
                                        </a>
                                    </li>

                                    <!-- Register Link -->
                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a href="{{ route('register') }}" class="nav-link text-light">
                                                {{ __('Register') }}
                                            </a>
                                        </li>
                                    @endif
                                @endauth
                            </ul>
                        </div>
                    </div>
                </nav>
            @endif
        </header>
        {{-- Main Section --}}
        <main>
            <section class="main-section my-3">
                <div class="container-lg">
                    <div class="text-center">
                        <img
                            src="{{asset('images/logo/Taskenturelogo.svg')}}"
                            class="img-fluid rounded-top"
                            alt=""
                        />
                        
                        <h1 class="display-3 text-warning fw-bold">Task<span class="text-light">enture</span></h1>
                        <p class="text-light lead">Create Task, Finish them, Earn badges and achievements along the way as your productivity soars high.</p>

                        <a href="https://github.com/panzerweb/taskentureui" target="_blank">
                            <button class="main-button text-wrap">Visit Repository</button>
                        </a>

                    </div>
                </div>
            </section>
        </main>

        {{-- Footer Section --}}
        <section class="footer-section">
            <div class="container">
                <footer class="py-5 text-light">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex justify-content-center flex-column">
                                <h2 class="text-center text-warning fw-bold">Task<span class="text-light">enture</span></h2>
                                <p class="text-center mb-4">Your Gamified To Do Web Application</p>
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

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    </body>
</html>
