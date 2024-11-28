document.addEventListener("DOMContentLoaded", function () {
    // Select all category nav links and shop items
    const categoryNavLinks = document.querySelectorAll("#category-nav .nav-link");
    const shopItems = document.querySelectorAll(".category");

    // Function to show items for a specific category
    function showCategory(category) {
        // Loop through all shop items
        shopItems.forEach((item) => {
            // If the category matches or it's "all", show the item
            if (category === "all" || item.dataset.category === category) {
                item.style.display = "block";
            } else {
                item.style.display = "none";
            }
        });
    }

    // Show all items by default when the page loads
    showCategory("all");

    // Add click event listeners to category nav links
    categoryNavLinks.forEach((link) => {
        link.addEventListener("click", function (e) {
            e.preventDefault(); // Prevent the default anchor behavior

            // Remove "active" class from all links
            categoryNavLinks.forEach((link) => link.classList.remove("active"));

            // Add "active" class to the clicked link
            this.classList.add("active");

            // Get the selected category from the data-category attribute
            const selectedCategory = this.dataset.category;

            // Show items for the selected category
            showCategory(selectedCategory);
        });
    });
});
