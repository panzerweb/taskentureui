@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{asset('/css/Event/styles.css')}}">
        <!-- char char panang image -->
    <header class="hero" style="background-image: url('{{ asset('images/misc/herogif.png') }}');"> 
        <div class="hero-content">
            <h1 class="pixel-text">Taskenture Events</h1>
            <p>Join us for epic tasking adventures!</p>
        </div>
    </header>

    <main class="container">

    <section id="current-events"></section>
    <section id="upcoming-events"></section>
    <section id="professional-events"></section>
    <script src="path/to/testEvent.js"></script>

    </main>

    <script src="./js/Events/event.js"></script>

@endsection