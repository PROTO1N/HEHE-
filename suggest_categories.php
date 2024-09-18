<?php
// suggest_categories.php

// Simulated category data (replace with your actual categories logic)
$categories = [
    "Seminar",
    "Fellowship",
    "Internship",
    "Full-time Job",
    "Part-time Job",
    "Workshop",
    "Scholarship"
];

// Get the search term from query string
$searchTerm = $_GET['q'] ?? '';

// Filter categories based on the search term
$matchedCategories = array_filter($categories, function($category) use ($searchTerm) {
    return stripos($category, $searchTerm) !== false;
});

// Output JSON response
header('Content-Type: application/json');
echo json_encode($matchedCategories);
?>
