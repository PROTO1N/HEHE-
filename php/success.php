<?php
session_start();

if (!isset($_SESSION['success'])) {
    header('location: ../php/index.php');
    exit();
}

$success_message = $_SESSION['success'];
unset($_SESSION['success']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success</title>
    <link rel="stylesheet" href="../Css/styles.css">
</head>
<body>
    <div class="success-container">
        <h2><?php echo $success_message; ?></h2>
        <a href="../php/index.php">Go to Home</a>
    </div>
</body>
</html>
