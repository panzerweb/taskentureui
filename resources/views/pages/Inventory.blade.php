@extends('layouts.app')

@section('content')

<style>
    /* Sidebar categories */
    .list-group-item {
        cursor: pointer;
    }

    .category-section {
        margin-top: 20px;
    }

    .card-img-top {
        height: 200px;
        object-fit: cover;
    }

    .card-body {
        background-color: #f9f9f9;
    }

    .category-section h4 {
        color: #6635B1;
        font-size: 1.2rem;
    }
    h3{
        font-family: sans-serif;
        font-weight: bolder;
        font-size: 2rem;
    }
</style>

    <div class="container my-4" style="min-height: 60vh;">
        <!-- Coins Display -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3>Your Inventory:</h3>
            <a href="{{route('shop.index')}}" class="btn text-white" style="background-color: #6635B1;" id="view-owned-items-btn">Go to Shop</a>
        </div>

        <!-- Categories and Items Layout -->
        <div class="row">
            <!-- Categories Sidebar (Left side) -->
            <div class="col-md-3">
                <div class="list-group">
                    <!-- Loop over the categories -->
                    <a href="#" class="list-group-item list-group-item-action category-link" data-category="all">
                        All
                    </a>
                    @foreach ($categorizedItems as $category => $categoryItems)
                        @if ($category !== 'all')  <!-- Skip "All" in this loop -->
                            <a href="#" class="list-group-item list-group-item-action category-link" data-category="{{ $category }}">
                                {{ ucfirst($category) }}
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>

            <!-- Purchased Items (Right side) -->
            <div class="col-md-9">
                <!-- Display items for "All" category by default -->
                <div class="category-section" id="category-all">
                    <h4 class="text-center text-uppercase" style="color: #6635B1;">All Items</h4>
                    @if ($categorizedItems['all']->isEmpty())
                        <div class="alert alert-danger text-center" role="alert">
                            <img src="{{asset('/images/auth/auth1.png')}}" alt="">
                        </div>
                    @else
                        <div class="row g-3">
                            @foreach ($categorizedItems['all'] as $item)
                                <div class="col-md-4">
                                    <div class="card h-100">
                                        <img src="{{ asset($item->image) }}" class="card-img-top" alt="{{ $item->name }}">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $item->name }}</h5>
                                            <p class="card-text">{{ $item->description }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

                <!-- Loop through other categories dynamically -->
                @foreach ($categorizedItems as $category => $categoryItems)
                    @if ($category !== 'all') <!-- Skip "All" -->
                        <div class="category-section" id="category-{{ $category }}" style="display:none;">
                            <h4 class="text-center text-uppercase" style="color: #6635B1;">{{ ucfirst($category) }}</h4>
                            <div class="row g-3">
                                @foreach ($categoryItems as $item)
                                    <div class="col-md-4">
                                        <div class="card h-100">
                                            <img src="{{ asset($item->image) }}" class="card-img-top" alt="{{ $item->name }}">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $item->name }}</h5>
                                                <p class="card-text">{{ $item->description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    

    <!-- Add JavaScript for handling category filtering -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const categoryLinks = document.querySelectorAll('.category-link');
            const categorySections = document.querySelectorAll('.category-section');

            // Display "All" items by default
            document.getElementById('category-all').style.display = 'block';

            // Add event listeners to each category link
            categoryLinks.forEach(link => {
                link.addEventListener('click', function () {
                    const category = this.getAttribute('data-category');

                    // Hide all category sections
                    categorySections.forEach(section => {
                        section.style.display = 'none';
                    });

                    // Show the selected category
                    document.getElementById(`category-${category}`).style.display = 'block';
                });
            });
        });
    </script>
@endsection
