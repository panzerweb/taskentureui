const guideContent = {
    "getting-started": {
        title: "Getting Started",
        content: `
            <p>Welcome to Pixel Quest: TaskMaster! This guide will help you navigate our pixelated productivity adventure.</p>
            <img src="/placeholder.svg?height=200&width=400" alt="TaskMaster Dashboard" class="guide-image pixel-border">
            <ol>
                <li>Create your pixelated avatar or log in to your existing account.</li>
                <li>Once logged in, you'll see your quest board with your task lists.</li>
                <li>Click on "New Quest" to create your first task list.</li>
            </ol>
        `
    },
    "creating-tasks": {
        title: "Creating Tasks",
        content: `
            <p>Adding new quests (tasks) is quick and easy in our pixelated realm.</p>
            <img src="/placeholder.svg?height=200&width=400" alt="Creating a New Task" class="guide-image pixel-border">
            <ol>
                <li>Click the "+" pixel button at the top of your quest list.</li>
                <li>Enter your quest title in the text field.</li>
                <li>Add any additional details or time limits if needed.</li>
                <li>Press Enter or click "Add Quest" to save your new task.</li>
            </ol>
        `
    },
    "managing-tasks": {
        title: "Managing Tasks",
        content: `
            <p>Keep track of your quests and level up your productivity!</p>
            <img src="/placeholder.svg?height=200&width=400" alt="Managing Tasks" class="guide-image pixel-border">
            <ul>
                <li>Click the pixel checkbox next to a quest to mark it as complete.</li>
                <li>Click on a quest to view or edit its details.</li>
                <li>Drag and drop quests to reorder them within your list.</li>
                <li>Use the "..." menu to delete, duplicate, or move quests between lists.</li>
            </ul>
        `
    },
    "organizing-tasks": {
        title: "Organizing Tasks",
        content: `
            <p>Pixel Quest: TaskMaster offers powerful organization features to keep your quests on track.</p>
            <img src="/placeholder.svg?height=200&width=400" alt="Organizing Tasks" class="guide-image pixel-border">
            <ul>
                <li>Create multiple quest boards for different projects or areas of your pixelated life.</li>
                <li>Use pixel tags to categorize quests across different boards.</li>
                <li>Set time limits and reminders to stay on top of your quests.</li>
                <li>Use the pixel search function to quickly find specific quests.</li>
            </ul>
        `
    },
    "settings": {
        title: "Settings",
        content: `
            <p>Customize your Pixel Quest: TaskMaster experience to fit your style.</p>
            <img src="/placeholder.svg?height=200&width=400" alt="Settings and Customization" class="guide-image pixel-border">
            <ul>
                <li>Access settings by clicking on your pixel avatar in the top right corner.</li>
                <li>Customize notification preferences for quest reminders and updates.</li>
                <li>Choose from various pixel themes to personalize your TaskMaster realm.</li>
                <li>Connect with other pixel productivity tools for seamless integration.</li>
            </ul>
        `
    }
};

document.addEventListener('DOMContentLoaded', function() {
    const categoryList = document.getElementById('category-list');
    const guideContentElement = document.getElementById('guide-content');

    // Create category buttons
    for (const category in guideContent) {
        const li = document.createElement('li');
        const button = document.createElement('button');
        button.className = 'category-btn pixel-text';
        button.setAttribute('data-category', category);
        button.textContent = guideContent[category].title;
        li.appendChild(button);
        categoryList.appendChild(li);
    }

    const categoryButtons = document.querySelectorAll('.category-btn');

    function showSection(categoryId) {
        const section = guideContent[categoryId];
        guideContentElement.innerHTML = `
            <section class="guide-section active">
                <h2 class="pixel-text">${section.title}</h2>
                ${section.content}
            </section>
        `;
        addImageEffects();
    }

    function setActiveButton(button) {
        categoryButtons.forEach(btn => {
            btn.classList.remove('active');
        });
        button.classList.add('active');
    }

    categoryButtons.forEach(button => {
        button.addEventListener('click', function() {
            const categoryId = this.getAttribute('data-category');
            showSection(categoryId);
            setActiveButton(this);
        });
    });

    // Add pixelated hover effect to images
    function addImageEffects() {
        const images = document.querySelectorAll('.guide-image');
        images.forEach(img => {
            img.addEventListener('mouseover', function() {
                this.style.transform = 'scale(1.05)';
                this.style.transition = 'transform 0.3s ease';
            });
            img.addEventListener('mouseout', function() {
                this.style.transform = 'scale(1)';
            });
        });
    }

    // Add pixelated click effect to buttons
    categoryButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            this.style.transform = 'scale(0.95)';
            setTimeout(() => {
                this.style.transform = 'scale(1)';
            }, 100);
        });
    });

    // Show the first section by default
    showSection('getting-started');
    setActiveButton(categoryButtons[0]);
});

