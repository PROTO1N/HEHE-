<?php
session_start();

// Check if user is logged in
if (isset($_SESSION['username'])) {
    $loggedIn = true;
    $username = $_SESSION['username'];
} else {
    $loggedIn = false;
}

// Fetch seminar opportunities from the database
function fetchOpportunities() {
    // Replace this with actual database fetching code
    return [
        [
            "title" => "Sample Seminar Opportunity",
            "description" => "Description for seminar opportunity.",
            "image_url" => "../images/sample.png",
            "deadline" => "2024-12-31"
        ],
        // Add more sample opportunities as needed
    ];
}

$opportunities = fetchOpportunities();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seminars | Job Portal</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <header>
        <div class="logo">
            <img src="../images/logo.png" alt="Logo">
        </div>
        <nav>
            <ul>
                <li><a href="../index.php">Browse Opportunities</a></li>
                <li><a href="../post_opportunity.php">Post an Opportunity</a></li>
                <?php if ($loggedIn) : ?>
                    <li><a href="../profile.php">Profile</a></li>
                    <li><a href="../logout.php">Logout</a></li>
                <?php else : ?>
                    <li><a href="../login.php">Login</a></li>
                    <li><a href="../signup.php">SignUp</a></li>
                <?php endif; ?>
            </ul>
        </nav>
        <?php if ($loggedIn) : ?>
            <div class="profile-actions">
                <ul>
                    <li><a href="../edit_profile.php">Edit Profile</a></li>
                    <li><a href="../upload_profile_pic.php">Upload Profile Picture</a></li>
                    <li><a href="../followers.php">Check Followers</a></li>
                    <li><a href="../delete_account.php">Delete Account</a></li>
                </ul>
            </div>
        <?php endif; ?>
        <div class="search-header">
            <form action="../search.php" method="get">
                <input type="text" name="query" placeholder="Search opportunities...">
                <button type="submit">Search</button>
            </form>
        </div>
    </header>
    <main>
        <section class="opportunities">
            <h2>Seminar Opportunities</h2>
            <div class="opportunities-container">
                <?php foreach ($opportunities as $opportunity) : ?>
                    <div class="opportunity">
                        <img src="<?php echo $opportunity['image_url']; ?>" alt="<?php echo $opportunity['title']; ?>">
                        <h3><?php echo $opportunity['title']; ?></h3>
                        <p><?php echo $opportunity['description']; ?></p>
                        <p>Deadline: <?php echo date('F j, Y', strtotime($opportunity['deadline'])); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    </
