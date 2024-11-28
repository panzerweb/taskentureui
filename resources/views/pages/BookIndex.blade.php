<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taskenture</title>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('/css/Index/styles.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
</head>
<body>
    <a href="{{ route('home') }}" class="btn-anchor">
        <button class="btn-nice">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
                <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293z"/>
                <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293z"/>
              </svg>
        </button>
    </a>
    <header class="hero">
        <div class="hero-content">
            <h1 class="pixel-text"><span>Task</span>enture: Guide Book</h1>
            <p>Discover the secrets of every item and reward in the game!</p>
        </div>
    </header>

    <main class="container">
        <section class="search-section">
            <input type="text" id="searchInput" placeholder="Search items..." class="pixel-border">
            <button id="searchButton" class="pixel-border">Search</button>
        </section>

        <section class="category-section">
            <button class="category-btn pixel-border active" data-category="All">All</button>
            <button class="category-btn pixel-border" data-category="Badges">Badges</button>
            <button class="category-btn pixel-border" data-category="Avatars">Avatars</button>
            <button class="category-btn pixel-border" data-category="Items">Items</button>
            <button class="category-btn pixel-border" data-category="Pets">Pets</button>
        </section>

        <section class="index-grid" id="itemGrid">
            <!-- Items will be dynamically added here -->
        </section>
    </main>

    <div id="itemModal" class="modal">
        <div class="modal-content pixel-border">
            <span class="close">&times;</span>
            <h2 id="modalTitle" class="pixel-text"></h2>
            <img id="modalImage" src="" alt="Item image" class="pixel-border">
            <p id="modalDescription"></p>
            <p id="modalObtain" class="obtain-info"></p>
            <p id="modalCategory" class="category-info"></p>
        </div>
    </div>

    <script src="{{asset('/js/indexbook.js')}}"></script>
</body>
</html>