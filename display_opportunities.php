<?php
session_start(); // Start the session

// Connect to the database
$db = mysqli_connect('localhost', 'root', '', 'jobportal');

if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

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
    <link rel="stylesheet" href="styles.css">
</head>
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
