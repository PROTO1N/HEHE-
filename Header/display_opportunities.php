<?php
session_start(); // Start the session

// Connect to the database
$db = mysqli_connect('localhost', 'root', '', 'jobportal');

if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}


// Set how many opportunities to display per page
$opportunities_per_page = 4;

// Get the current page number from the URL, if not present set to 1
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Calculate the offset for the SQL query
$offset = ($page - 1) * $opportunities_per_page;

// Fetch total number of opportunities
$total_query = "SELECT COUNT(*) as total FROM opportunities";
$total_result = mysqli_query($db, $total_query);
$total_row = mysqli_fetch_assoc($total_result);
$total_opportunities = $total_row['total'];

// Calculate total number of pages needed
$total_pages = ceil($total_opportunities / $opportunities_per_page);
// Fetch all opportunities
$query = "SELECT * FROM opportunities ORDER BY category";
$result = mysqli_query($db, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($db));
}

// Initialize an array to store opportunities by category
$opportunities_by_category = array();

while ($row = mysqli_fetch_assoc($result)) {
    $category = $row['category'];
    if (!isset($opportunities_by_category[$category])) {
        $opportunities_by_category[$category] = array();
    }
    $opportunities_by_category[$category][] = $row;
}

// Debug: Print the opportunities by category array
echo "<pre>";
print_r($opportunities_by_category);
echo "</pre>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opportunities</title>
    <style>
        /* Grid layout for opportunities */
        .opportunities-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr); /* 2 columns */
            gap: 20px;
        }

        .opportunity-item {
            border: 1px solid #ccc;
            padding: 15px;
            border-radius: 8px;
            background-color: #f9f9f9;
        }

        .opportunity-item img {
            max-width: 100px;
            height: auto;
            display: block;
            margin-bottom: 10px;
        }

        .pagination {
            margin-top: 20px;
            text-align: center;
        }

        .pagination a {
            display: inline-block;
            margin: 0 5px;
            padding: 8px 12px;
            text-decoration: none;
            color: #333;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .pagination a.active {
            background-color: #007bff;
            color: white;
            border-color: #007bff;
        }

        .pagination a:hover {
            background-color: #ddd;
        }
    </style>
<body>
    <h1>Opportunities</h1>
    <?php if (empty($opportunities_by_category)) : ?>
        <p>No opportunities found.</p>
    <?php else : ?>
        <?php foreach ($opportunities_by_category as $category => $opportunities) : ?>
            <h2><?php echo htmlspecialchars($category); ?></h2>
            <ul>
                <?php foreach ($opportunities as $opportunity) : ?>
                    <li>
                        <h3><?php echo htmlspecialchars($opportunity['title']); ?></h3>
                        <p><?php echo htmlspecialchars($opportunity['opportunity_description']); ?></p>
                        <p><strong>Type:</strong> <?php echo htmlspecialchars($opportunity['opportunity_type']); ?></p>
                        <p><strong>Funding:</strong> <?php echo htmlspecialchars($opportunity['funding_type']); ?></p>
                        <?php if ($opportunity['has_deadline']) : ?>
                            <p><strong>Deadline:</strong> <?php echo htmlspecialchars($opportunity['application_deadline']); ?></p>
                        <?php endif; ?>
                        <p><strong>Link:</strong> <a href="<?php echo htmlspecialchars($opportunity['official_link']); ?>" target="_blank">Official Link</a></p>
                        <?php if ($opportunity['image_path']) : ?>
                            <img src="<?php echo htmlspecialchars($opportunity['image_path']); ?>" alt="Opportunity Image" style="width: 100px; height: auto;">
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endforeach; ?>
    <?php endif; ?>
</body>
</html>
