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
                            <span class="text-warning">Task</span><span class="text-light">enture</span>
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


            {{-- Objective Section --}}
            <section class="objective-section pt-5">
                <div class="container-fluid remaining-container">
                    <div class="container-lg">
                        <h1 class="fw-bold pt-3 text-warning">Obje<span class="text-light">ctive</span></h1>
                        <div class="row mb-5 align-items-center">
                            <div class="col-12 col-md-7 col-lg-5">
                                <img src="{{asset('images/misc/objective.svg')}}" class="img-fluid w-100 p-3">
                            </div>
                            <div class="col-12 col-md-5 col-lg-7">
                                <h2 class="fw-bold fs-1 mb-3 text-warning">Pur<span class="text-light">pose</span> of this Web<span class="text-light">site</span></h2>
                                <p class="text-light">
                                    Taskenture is a free habit-building and 
                                    ToDo Web Application that treats your real life like a game. 
                                    With in-game rewards to motivate you, 
                                    Taskenture can help you achieve your goals to become healthy, hard-working, and happy.
                                </p>
                                <p class="text-light">
                                    Health and Fitness, School and Work, or maybe your personal life? Taskenture is here to help you manage it all!
                                    There are only a handful of todo apps in the World Wide Web that makes your tasking
                                    a GAMING!
                                </p>
                            </div>
                        </div>
                    </div>         
                </div>

                
                <marquee direction="left" scrollamount="12" class="d-flex justify-content-between align-items-center gap-5 ">
                    <span class="mx-5">UPDATES ARE COMING SOON!</span>
                    <span class="mx-5">SHOP WILL BE HERE</span>
                </marquee>


                <div class="row mt-5">
                    <div class="col-12">
                        <h1 class="fw-bold pt-5 pb-4 text-center text-warning">Key <span class="text-light">Features</span></h1>
                        <p class="text-center text-light w-75 mx-auto">
                            Taskenture lets you have this features so that our users can 
                            enjoy our simple web application to its fullest. And our team
                            is working our best to optimize the website as we are in its development.
                        </p>
                    </div>
                </div>
                <div class="row mt-5 pb-5 key-features-card">
                    <div class="col-12 col-md-4 mb-3">
                        <div class="container-lg text-center text-light">
                            <img src="{{asset('images/misc/award.svg')}}"  alt="" class="w-100">
                            <h3 class="mt-5 mb-3 text-warning">You Can Earn Some Rewards</h3>
                            <p class="card-text">
                                Ranking Badges, Avatars, Gold Coins, and Diamonds will be rewarded to you. Go, and be productive!
                            </p>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 mb-3">
                        <div class="container-lg text-center text-light">
                            <img src="{{asset('images/misc/taskmanage.svg')}}"  alt="" class="w-100">
                            <h3 class="mt-5 mb-3 text-warning">A Effective Task Management</h3>
                            <p class="card-text">
                                Do not allow yourself to be a master procrastinator, touch some grass *COUGH* I mean use Taskenture to be productive.
                            </p>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 mb-3">
                        <div class="container-lg text-center text-light">
                            <img src="{{asset('images/misc/getreward.svg')}}"  alt="" class="w-100">
                            <h3 class="mt-5 mb-3 text-warning">Become your Best Version</h3>
                            <p class="card-text">
                                Day by day, you thrive hard to become a better version of yourself. Consistence is the key to success bro!
                            </p>
                        </div>
                    </div>
                </div>
            </section>
        
        </main>

        {{-- Footer Section --}}
        <section class="footer-section">
            <div class="container">
                <footer class="py-5 text-light">
                    <div class="row">
                        <div class="row">
                            <div class="col-6 col-md-2 mb-3">
                                <h5 class="fw-semibold">Support</h5>
                                <ul class="nav flex-column">
                                    <li class="nav-item mb-2"><a href="{{ route('outside.faqs') }}" class="nav-link p-0 text-light">FAQs</a></li>
                                    <li class="nav-item mb-2"><a href="{{ route('outside.reportbug') }}" class="nav-link p-0 text-light">Report Bug</a></li>
                                </ul>
                            </div>
                        
                            <div class="col-6 col-md-2 mb-3">
                                <h5 class="fw-semibold">Community</h5>
                                <ul class="nav flex-column">
                                    <li class="nav-item mb-2"><a href="{{ route('outside.help') }}" class="nav-link p-0 text-light">Team</a></li>
                                    <li class="nav-item mb-2"><a href="{{ route('outside.contactus') }}" class="nav-link p-0 text-light">Contact Us</a></li>
                                </ul>
                            </div>
                        <div class="col-md-5 offset-md-3">
                            <div class="d-flex justify-content-center align-items-end flex-column">
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
