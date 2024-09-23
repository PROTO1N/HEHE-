<?php
session_start();

// Check if user is logged in and is an admin, otherwise redirect to login page
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

// Example content for admin dashboard
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Job Portal</title>
    <link rel="stylesheet" href="../Css/styles.css">
</head>
<body>
    <?php include_once('header.php'); ?> <!-- Include header specific to logged-in users -->

    <main>
        <h1>Welcome, Admin!</h1>
        <p>Here you can manage posted opportunities, user accounts, and more.</p>
        <!-- Add links to manage opportunities, users, etc. -->
    </main>

    <?php include_once('../Footer/footer.php'); ?> <!-- Include footer -->
     <!-- would be better to not have footer in admin page -->
</body>
</html>
