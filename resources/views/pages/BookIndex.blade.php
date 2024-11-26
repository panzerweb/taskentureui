<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taskenture</title>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('/css/Index/styles.css')}}">
</head>
<body>
    <header class="hero">
        <div class="hero-content">
            <h1 class="pixel-text">Taskenture: Guide Index</h1>
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