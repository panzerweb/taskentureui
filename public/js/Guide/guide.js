const guideContent = {
    "getting-started": {
        title: "Getting Started",
        content: `
            <p style="font-size: 25px">Welcome to Pixel Quest: TaskMaster! This guide will help you navigate our pixelated productivity adventure.</p>
            <div class="image-container">
                <img src="/images/Guide/gettingstarted.png" alt="Creating a New Task" class="guide-image pixel-border">
            </div>
            <ol>
                <li style="font-size: 25px">Create your account or log in to your existing account.</li>
                <li style="font-size: 25px">Once logged in, you'll see your task board with your task lists.</li>
                <li style="font-size: 25px">Click on "Add Task" to create your first task list.</li>
            </ol>
        `
    },
    "creating-tasks": {
        title: "Creating Tasks",
        content: `
            <p style="font-size: 25px">Adding new quests (tasks) is quick and easy in our pixelated realm.</p>
            <div class="image-container">
                <img src="/images/Guide/creatingtask.png" alt="Creating a New Task" class="guide-image pixel-border">
            </div>
            <ol>
                <li style="font-size: 25px">Click the "Add Task" button at the top of your Task List.</li>
                <li style="font-size: 25px">Enter your Task title in the text field.</li>
                <li style="font-size: 25px">Add any additional details or due time if needed.</li>
                <li style="font-size: 25px">Press Enter or click "Add Task" to save your new task.</li>
            </ol>
        `
    },
    "organizing-tasks": {
        title: "Organizing Tasks",
        content: `
            <p style="font-size: 25px">Organizing your task to help you arrange your task.</p>
            <div class="image-container">
                <img src="/images/Guide/organizingtask.png" alt="Creating a New Task" class="guide-image pixel-border">
            </div>
            <ol>
                <li style="font-size: 25px">After creating tasks you can organize using category.</li>
                <li style="font-size: 25px">Select from the categories selection to assign which is your priority first.</li>
                <li style="font-size: 25px">Set time limits and reminders to stay on top of your task.</li>
                <li style="font-size: 25px">Use the task search function to quickly find specific tasks or use the filter to show only the categorized tasks.</li>
            </ol>
        `
    },"How to get coins?": {
        title: "How to get coins?",
        content: `
            <p style="font-size: 25px">In this page it will teach you how to get coins.</p>
            <div class="image-container">
                <img src="/images/Guide/coins.png" alt="Creating a New Task" class="guide-image pixel-border">
            </div>
            <ol>
                <li style="font-size: 25px">By finishing your tasks you will gain random amount of coins (5-10).</li>
                <li style="font-size: 25px">You will also gain experience points in order for you to levelup.</li>
                <li style="font-size: 25px">To gain more coins you can participate in the upcoming Events and by playing game(indevelopment).</li>
            </ol>
        `
    },"Trash": {
        title: "Trash",
        content: `
            <p style="font-size: 25px">Pixel Quest: TaskMaster offers powerful organization features to keep your quests on track.</p>
            <div class="image-container">
                <img src="/images/Guide/trash.png" alt="Creating a New Task" class="guide-image pixel-border">
            </div>
            <ol>
                <li style="font-size: 25px">After deleting a task you can check it in the trash.</li>
                <li style="font-size: 25px">You can either completely delete or retrieve it again.</li>
            </ol>
        `
    },
    "settings": {
        title: "Settings",
        content: `
            <p style="font-size: 25px">Settings will be update soon it is still in development.</p>
            <div class="image-container">
                <img src="/images/Guide/settings.png" alt="Creating a New Task" class="guide-image pixel-border">
            </div>
            <ol>
                <li style="font-size: 25px">Access settings by clicking on your pixel avatar in the heading section.</li>
                <li style="font-size: 25px">Sorry for now we don't have a user settings.</li>
            </ol>
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

