@extends('layouts.app')

@section('content')
    <style>
        /* Custom styles for active nav-pills */
        .nav-pills .nav-link.active {
            background-color: #6635B1; /* Change this to your desired color */
            color: white; /* Optional: Change the text color */
        }
        .nav-pills .nav-link {
            color: #6635B1;
        }
    </style>

    <div class="container my-4">
        <!-- Flash Messages -->
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Coins Display -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3>Your Coins: 
                <span class="badge bg-warning text-dark">
                    {{ Auth::user()->coins->sum('gold_coins') }}
                </span>
            </h3>
            <a href="{{ route('inventory.index') }}" class="btn text-white" style="background-color: #6635B1;" id="view-owned-items-btn">View Owned Items</a>
        </div>

        <!-- Category Navigation -->
        <ul class="nav nav-pills justify-content-center mb-4" id="category-nav">
            <li class="nav-item">
                <a class="nav-link active" data-category="all" href="#">All</a> <!-- Default category -->
            </li>
            @foreach ($items as $category => $categoryItems)
                <li class="nav-item">
                    <a class="nav-link" data-category="{{ $category }}" href="#">
                        {{ ucfirst($category) }}
                    </a>
                </li>
            @endforeach
        </ul>

        <div class="row g-3" id="shop-items">
            @foreach ($items as $category => $categoryItems)
                <div class="col-12 category" data-category="{{ $category }}">
                    <h4 class="text-center text-uppercase" style="color: #6635B1;">{{ $category }}</h4>
                    <div class="row g-3">
                        @foreach ($categoryItems as $item)
                            <div class="col-md-4">
                                <div class="card h-100">
                                    <img src="{{ asset($item->image) }}" class="card-img-top" alt="{{ $item->name }}">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $item->name }}</h5>
                                        <p class="card-text">{{ $item->description }}</p>
                                        <p class="text-danger fw-bold">{{ $item->price }} coins</p>
                                        <form action="{{ route('shop.purchase', $item->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn w-100 text-white" style="background-color: #6635B1;">Buy</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>

<script src="./js/Shop/shop.js"></script>
@endsection
