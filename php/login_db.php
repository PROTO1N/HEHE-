<?php
include('../php/server.php');

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email = ?";
$stmt = mysqli_prepare($db, $sql);
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);


if (mysqli_num_rows($result) === 0) {

    $_SESSION['error'] = 'Email not found. Please register.';
    header('Location: ../php/login.php');
    exit;
}

$user = mysqli_fetch_assoc($result);
if (password_verify($password, $user['password'])) {
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_name'] = $user['first_name']; 
    $_SESSION['success'] = 'Login successful!';
    header('Location: ../php/homepage.php'); 
} else {
    // Password is incorrect
    $_SESSION['error'] = 'Incorrect password. Please try again.';
    header('Location: ../php/login.php');
    exit;
}

mysqli_stmt_close($stmt);
mysqli_close($db);
?>