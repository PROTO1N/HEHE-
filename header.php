<?php

// Check if user is logged in
if (isset($_SESSION['username'])) {
    $loggedIn = true;
    $username = $_SESSION['username'];
} else {
    $loggedIn = false;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Portal</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            text-align: center;
            background-color: white;
        }
        #fireworksCanvas {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 1;
        }
        .hero {
            position: relative;
            z-index: 2; /* Ensure hero content is above canvas */
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">
            <img src="images/logo.png" alt="Logo">
        </div>
        <nav>
            <ul>
                <li><a href="#">Browse Opportunities</a></li>
                <li><a href="post_opportunity.php">Post an Opportunity</a></li>
                <?php if ($loggedIn) : ?>
                    <li><a href="profile.php">Profile</a></li>
                    <li><a href="logout.php">Logout</a></li>
                <?php else : ?>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="signup.php">SignUp</a></li>
                <?php endif; ?>
            </ul>
        </nav>
        <div class="search-header">
            <div class="search-container">
                <form action="search_results.php" method="get">
                    <input type="text" id="search-input" name="q" placeholder="Search opportunities...">
                    <button type="submit">Search</button>
                </form>
                <div id="search-suggestions"></div>
            </div>
        </div>
    </header>
</body>
</html>
