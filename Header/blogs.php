<?php
include('..\php\server.php'); // Include server.php for database connection

// Define the number of blogs per page
$blogs_per_page = 10;

// Get the current page number from the URL, default is 1
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start_from = ($page - 1) * $blogs_per_page;

// Fetch blogs from the database with pagination
$query = "SELECT * FROM blogs LIMIT $start_from, $blogs_per_page";
$result = mysqli_query($db, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogs</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="blog-container">
        <?php
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                echo '<div class="blog-card">';
                echo '<img src="' . $row['image_url'] . '" alt="Blog Image" class="blog-image">';
                echo '<div class="blog-content">';
                echo '<h2>' . $row['title'] . '</h2>';
                echo '<p>' . substr($row['description'], 0, 150) . '...</p>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo '<p>No blogs available.</p>';
        }

        // Pagination logic
        $total_query = "SELECT COUNT(*) FROM blogs";
        $total_result = mysqli_query($db, $total_query);
        $total_blogs = mysqli_fetch_row($total_result)[0];
        $total_pages = ceil($total_blogs / $blogs_per_page);

        if ($total_pages > 1) {
            echo '<div class="pagination">';
            for ($i = 1; $i <= $total_pages; $i++) {
                echo '<a href="blogs.php?page=' . $i . '">' . $i . '</a>';
            }
            echo '</div>';
        }

        // Close connection
        mysqli_close($db);
        ?>
    </div>
</body>
</html>
