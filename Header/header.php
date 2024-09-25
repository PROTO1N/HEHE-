<?php
// include('../php/server.php');

// Check if user is logged in
if (isset($_SESSION['user_name'])) {
    $loggedIn = true;
    $username = $_SESSION['user_name']; 
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
    <link rel="stylesheet" href="../Css/header.css">
</head>
<body>
   
    <header>
        <div class="header-container">
            
            <div class="logo">
                <img src="../images/logo.png" alt="Logo" > 
            </div>
            <div class="nav">
                <a href="#">Browse Opportunities</a>
                <a href="../php/post_opportunity.php">Post Opportunity</a>
                <?php if ($loggedIn) : ?>
                    <li><a href="../php/profile.php">Profile</a></li>
                    <li><a href="../php/logout.php">Logout</a></li>
                <?php else : ?>
                    <li><a href="../php/login.php">Login</a></li>
                    <li><a href="../php/signup.php">SignUp</a></li>
                <?php endif; ?>
            </div>

        
            <div class="search">
            <form action="search_results.php" method="get">
                    <input type="text" id="search-input" placeholder="Search.." />
                    <button type="submit">Search</button>
                </form>
            </div>
        </div>
    </header>
</body>
</html>
