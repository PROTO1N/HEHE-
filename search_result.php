<?php
// Example categories (replace with your actual categories)
$categories = [
    'Seminar', 'Fellowship', 'Internship', 'Full-time Job', 'Part-time Job', 'Workshop'
];

// Check if the search query is set
if (isset($_GET['q'])) {
    $searchTerm = $_GET['q'];

    // Check if the search term matches any category
    $matchedCategory = false;
    foreach ($categories as $category) {
        if (strpos(strtolower($category), strtolower($searchTerm)) !== false) {
            $matchedCategory = true;
            break;
        }
    }

    if ($matchedCategory) {
        // Display search results or redirect to specific page for matched category
        // Replace with your logic to display or redirect
        echo "<h2>Search Results for '$searchTerm'</h2>";
        echo "<p>Display search results here.</p>";
    } else {
        // Redirect to a page indicating no results found
        header("Location: no_results.php?q=" . urlencode($searchTerm));
        exit();
    }
} else {
    // Redirect to home page or handle error if search term is not set
    header("Location: index.php");
    exit();
}
?>
