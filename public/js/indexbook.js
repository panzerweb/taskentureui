const items = [
    // Badges
    { id: 1, name: "Task Rookie", image: "/images/badges/level2.svg", description: "Levelled up to level 2", obtain: "Complete 3 Tasks to Level up.", category: "Badges" },
    { id: 2, name: "Elite Streaker", image: "/images/badges/level3.svg", description: "Reaching Level 3 by completing Task", obtain: "Obtained after finishing 6 tasks", category: "Badges" },
    { id: 3, name: "Hunter", image: "/images/badges/level4.svg", description: "You have become a Fierce Task Hunter", obtain: "Becoming Level 4 and finishing 9 tasks.", category: "Badges" },
    { id: 4, name: "Valor", image: "/images/badges/level5.svg", description: "Befitting of a Productive Soldier, a Valor Medal", obtain: "You have to become productive and completed 12 tasks.", category: "Badges" },
    { id: 5, name: "Ascendant", image: "/images/badges/level6.svg", description: "You are ready to ascend to higher status", obtain: "Ascended to Level 6, you just finished 15 tasks.", category: "Badges" },
    { id: 6, name: "Night Owl", image: "/images/badges/level7.svg", description: "A powerful mage avatar.", obtain: "Cast 1000 spells.", category: "Badges" },
    { id: 7, name: "Alpha Bear", image: "/images/badges/level8.svg", description: "A powerful mage avatar.", obtain: "Cast 1000 spells.", category: "Badges" },
    // Avatars
    { id: 9, name: "Starter", image: "/images/avatars/level1.png", description: "A powerful mage avatar.", obtain: "Cast 1000 spells.", category: "Avatars" },
    { id: 10, name: "Rookie", image: "/images/avatars/level2.png", description: "A powerful mage avatar.", obtain: "Cast 1000 spells.", category: "Avatars" },
    { id: 11, name: "Elite", image: "/images/avatars/level3.png", description: "A loyal pixelated dog companion.", obtain: "Complete the 'Lost Puppy' quest in Pixel Village.", category: "Avatars" },
    { id: 12, name: "Master", image: "/images/avatars/level4.png", description: "A baby dragon pet that grows with you.", obtain: "Hatch a dragon egg found in the Volcanic Peaks.", category: "Avatars" },
    { id: 13, name: "Conqueror", image: "/images/avatars/level5.svg", description: "A baby dragon pet that grows with you.", obtain: "Hatch a dragon egg found in the Volcanic Peaks.", category: "Avatars" },
    { id: 14, name: "Grand Ninja", image: "/images/avatars/level6.svg", description: "A baby dragon pet that grows with you.", obtain: "Hatch a dragon egg found in the Volcanic Peaks.", category: "Avatars" },
    { id: 15, name: "Grandmaster", image: "/images/avatars/level7.svg", description: "A baby dragon pet that grows with you.", obtain: "Hatch a dragon egg found in the Volcanic Peaks.", category: "Avatars" },
    { id: 16, name: "Knight", image: "/images/avatars/level8.svg", description: "A baby dragon pet that grows with you.", obtain: "Hatch a dragon egg found in the Volcanic Peaks.", category: "Avatars" },
    { id: 17, name: "Mafia Boss", image: "/images/avatars/level9.svg", description: "A baby dragon pet that grows with you.", obtain: "Hatch a dragon egg found in the Volcanic Peaks.", category: "Avatars" },
    { id: 18, name: "Emperor", image: "/images/avatars/level10.svg", description: "A baby dragon pet that grows with you.", obtain: "Hatch a dragon egg found in the Volcanic Peaks.", category: "Avatars" },
    // Coming Soon
    { id: 19, name: "Coming soon...", image: "/images/misc/comingsoonmark.svg", description: "A baby dragon pet that grows with you.", obtain: "Hatch a dragon egg found in the Volcanic Peaks.", category: "Items" },
    { id: 20, name: "Coming soon...", image: "/images/misc/comingsoonmark.svg", description: "A baby dragon pet that grows with you.", obtain: "Hatch a dragon egg found in the Volcanic Peaks.", category: "Items" },
    { id: 21, name: "Coming soon...", image: "/images/misc/comingsoonmark.svg", description: "A baby dragon pet that grows with you.", obtain: "Hatch a dragon egg found in the Volcanic Peaks.", category: "Items" },
    { id: 22, name: "Coming soon...", image: "/images/misc/comingsoonmark.svg", description: "A baby dragon pet that grows with you.", obtain: "Hatch a dragon egg found in the Volcanic Peaks.", category: "Items" },
    { id: 23, name: "Coming soon...", image: "/images/misc/comingsoonmark.svg", description: "A baby dragon pet that grows with you.", obtain: "Hatch a dragon egg found in the Volcanic Peaks.", category: "Items" },


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