@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{asset('/css/Guide/styles.css')}}">

    <header class="bg-purple text-center py-5">
        <h1 class="pixel-text text-white">Taskenture: Guide Book</h1>
    </header>

    <nav id="category-nav" class="bg-dark py-3">
        <div class="container">
            <ul id="category-list" class="nav justify-content-center">
                <!-- Category buttons will be dynamically inserted here -->
            </ul>
        </div>
    </nav>

    <main id="guide-content" class="container py-5">
        <!-- Guide sections will be dynamically inserted here -->
    </main>

    <script src="{{asset('/js/Guide/guide.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


@endsection