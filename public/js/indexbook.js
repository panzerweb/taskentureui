const items = [
    { id: 1, name: "Coming soon...", image: "pixel-sword.png", description: "A powerful sword made of pure pixels.", obtain: "Defeat the Pixel Dragon in the Crystal Caverns.", category: "Items" },
    { id: 2, name: "Coming soon...", image: "health-potion.png", description: "Restores 50 HP when consumed.", obtain: "Can be crafted using 3 Red Herbs and 1 Crystal Vial.", category: "Items" },
    { id: 3, name: "Bobo!", image: "/images/badges/level2.svg", description: "Awarded for reaching level 2.", obtain: "Pagtask Tapulan.", category: "Badges" },
    { id: 4, name: "Waw Kabobohan", image: "/images/badges/level3.svg", description: "Awarded for crafting 100 potions.", obtain: "Craft 100 different potions.", category: "Badges" },
    { id: 5, name: "Bobo kapa", image: "/images/avatars/level1.png", description: "A Bobong avatar.", obtain: "Reach level 2 in finishing some task.", category: "Avatars" },
    { id: 6, name: "Di kana Bobo", image: "/images/avatars/level2.png", description: "A powerful mage avatar.", obtain: "Cast 1000 spells.", category: "Avatars" },
    { id: 7, name: "Di kana Bobo", image: "/images/avatars/level3.png", description: "A powerful mage avatar.", obtain: "Cast 1000 spells.", category: "Avatars" },
    { id: 8, name: "Di kana Bobo", image: "/images/avatars/level4.png", description: "A powerful mage avatar.", obtain: "Cast 1000 spells.", category: "Avatars" },
    { id: 9, name: "Coming soon...", image: "pixel-pup.png", description: "A loyal pixelated dog companion.", obtain: "Complete the 'Lost Puppy' quest in Pixel Village.", category: "Pets" },
    { id: 10, name: "Coming soon...", image: "dragonling.png", description: "A baby dragon pet that grows with you.", obtain: "Hatch a dragon egg found in the Volcanic Peaks.", category: "Pets" },
    { id: 10, name: "Coming soon...", image: "dragonling.png", description: "A baby dragon pet that grows with you.", obtain: "Hatch a dragon egg found in the Volcanic Peaks.", category: "Pets" }
];

let currentCategory = "All";

function createItemCard(item) {
    const card = document.createElement('div');
    card.className = 'item-card pixel-border';
    card.innerHTML = `
        <img src="${item.image}" alt="${item.name}" class="pixel-border">
        <h3 class="pixel-text">${item.name}</h3>
    `;
    card.addEventListener('click', () => openModal(item));
    return card;
}

function displayItems(items) {
    const grid = document.getElementById('itemGrid');
    grid.innerHTML = '';
    items.forEach(item => {
        grid.appendChild(createItemCard(item));
    });
}

function openModal(item) {
    const modal = document.getElementById('itemModal');
    const title = document.getElementById('modalTitle');
    const image = document.getElementById('modalImage');
    const description = document.getElementById('modalDescription');
    const obtain = document.getElementById('modalObtain');
    const category = document.getElementById('modalCategory');

    title.textContent = item.name;
    image.src = item.image;
    image.alt = item.name;
    description.textContent = item.description;
    obtain.textContent = `How to obtain: ${item.obtain}`;
    category.textContent = `Category: ${item.category}`;

    modal.style.display = 'block';
}

const closeBtn = document.getElementsByClassName('close')[0];
closeBtn.onclick = function() {
    document.getElementById('itemModal').style.display = 'none';
}

window.onclick = function(event) {
    const modal = document.getElementById('itemModal');
    if (event.target == modal) {
        modal.style.display = 'none';
    }
}

const searchInput = document.getElementById('searchInput');
const searchButton = document.getElementById('searchButton');

function searchItems() {
    const searchTerm = searchInput.value.toLowerCase();
    const filteredItems = items.filter(item => 
        (item.name.toLowerCase().includes(searchTerm) || 
        item.description.toLowerCase().includes(searchTerm)) &&
        (currentCategory === "All" || item.category === currentCategory)
    );
    displayItems(filteredItems);
}

searchButton.addEventListener('click', searchItems);
searchInput.addEventListener('keyup', function(event) {
    if (event.key === 'Enter') {
        searchItems();
    }
});

const categoryButtons = document.querySelectorAll('.category-btn');
categoryButtons.forEach(button => {
    button.addEventListener('click', function() {
        currentCategory = this.dataset.category;
        categoryButtons.forEach(btn => btn.classList.remove('active'));
        this.classList.add('active');
        searchItems();
    });
});

// Initial display of all items
displayItems(items);