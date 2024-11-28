document.addEventListener('DOMContentLoaded', function() {
    // This function will run when the DOM is fully loaded
    console.log('Pixel Quest Events page loaded!');
    
    const currentEvents = [
        {
            title: 'MASSIVE UPDATE!!',
            image: '/images/events/massive_update.svg', 
            description: 'Shop, Inventory, and Guide UPDATES!!',
            date: 'November 28, 2024'
        },
        {
            title: 'Latest Grapic UI Design!',
            image: '/images/events/graphic_update.svg', 
            description: 'Sheeeshable!',
            date: 'November 28, 2024'
        },
    ];
    
    // Function to render current events
    function renderCurrentEvents(events) {
        const eventSection = document.querySelector('#current-events');
        eventSection.innerHTML = `<h2 class="section-title pixel-text">Current Events</h2>`;
        events.forEach(event => {
            const eventCard = `
                <div class="event-card">
                    <img src="${event.image}" alt="${event.title}" class="event-image">
                    <div class="event-details">
                        <h3 class="pixel-text">${event.title}</h3>
                        <p>${event.description}</p>
                        <p class="event-date">${event.date}</p>
                    </div>
                </div>
            `;
            eventSection.innerHTML += eventCard;
        });
    }
    
    renderCurrentEvents(currentEvents);
    
    const upcomingEvents = [
        {
            title: 'GAME soon??',
            image: '/images/events/showcase_update.svg', 
            description: 'Whether it’s conquering your to-do list or tackling long-term goals, TaskQuest transforms every accomplishment into a step toward victory. Are you ready to turn your daily grind into an epic adventure?',
            date: 'July 5 - July 7, 2023'
        },
        {
            title: 'Indie Game Showcase',
            image: '/images/events/shop_update.svg', 
            description: 'Discover the next big indie hit at our exclusive showcase event.',
            date: 'July 15, 2023'
        },
    ];
    
    // Function to render upcoming events
    function renderUpcomingEvents(events) {
        const eventSection = document.querySelector('#upcoming-events');
        eventSection.innerHTML = `<h2 class="section-title pixel-text">Upcoming Events</h2>`;
        events.forEach(event => {
            const eventCard = `
                <div class="event-card">
                    <img src="${event.image}" alt="${event.title}" class="event-image">
                    <div class="event-details">
                        <h3 class="pixel-text">${event.title}</h3>
                        <p>${event.description}</p>
                        <p class="event-date">${event.date}</p>
                    </div>
                </div>
            `;
            eventSection.innerHTML += eventCard;
        });
    }
    
    renderUpcomingEvents(upcomingEvents);


    const professionalEvents = [
        {
            title: 'Game Dev Conference',
            image: '/images/events/gamedev_conference_update.svg', 
            description: 'Network with industry leaders and learn about the latest in game development technologies.',
            date: 'August 10 - August 12, 2023'
        },
        {
            title: 'Esports Tournament',
            image: '/images/events/tournament_update.svg ', 
            description: 'Watch top players compete in our annual professional esports tournament.',
            date: 'August 20 - August 22, 2023'
        },
    ];
    
    // Function to render upcoming events
    function renderProfessionalEvents(events) {
        const eventSection = document.querySelector('#professional-events');
        eventSection.innerHTML = `<h2 class="section-title pixel-text">Professional Events</h2>`;
        events.forEach(event => {
            const eventCard = `
                <div class="event-card">
                    <img src="${event.image}" alt="${event.title}" class="event-image">
                    <div class="event-details">
                        <h3 class="pixel-text">${event.title}</h3>
                        <p>${event.description}</p>
                        <p class="event-date">${event.date}</p>
                    </div>
                </div>
            `;
            eventSection.innerHTML += eventCard;
        });
    }
    
    renderProfessionalEvents(professionalEvents);
    
    
    

    // You can add more interactive features here in the future
    // For example:
    // - Countdown timers for upcoming events
    // - Dynamic filtering of events
    // - Smooth scrolling to sections
    // - Modal popups for event details
});