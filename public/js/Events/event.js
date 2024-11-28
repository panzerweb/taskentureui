document.addEventListener('DOMContentLoaded', function() {
    // This function will run when the DOM is fully loaded
    console.log('Pixel Quest Events page loaded!');
    
    const currentEvents = [
        {
            title: 'MASSIVE UPDATE!!',
            image: '/images/logo/EventShop.png', 
            description: 'Pagka WOWOWO!',
            date: 'November 25, 2024'
        },
        {
            title: 'Latest Grapic UI Design!',
            image: '/images/badges/level2.svg', 
            description: 'Sheeeshable!',
            date: 'November 25, 2024 same date nalang sa ni'
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
            title: 'Shop!',
            image: '/images/events/pixel-art-workshop.jpg', 
            description: 'Learn the art of pixel creation from industry professionals!',
            date: 'July 5 - July 7, 2023'
        },
        {
            title: 'Indie Game Showcase',
            image: '/images/events/indie-showcase.jpg', 
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
            image: 'game-dev-conference.jpg', 
            description: 'Network with industry leaders and learn about the latest in game development technologies.',
            date: 'August 10 - August 12, 2023'
        },
        {
            title: 'Esports Tournament',
            image: 'esports-tournament.jpg', 
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