<?php
include('../php/server.php');

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

$sql = "SELECT * FROM users WHERE email = ?";
$stmt = mysqli_prepare($db, $sql);
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) > 0) {
    $_SESSION['error'] = 'Email is already registered. Please use a different email.';
    header('Location: ../php/signup.php');
    exit;
}

if ($password !== $confirm_password) {
    $_SESSION['error'] = 'Passwords do not match.'; 
    header('Location: ../php/signup.php'); 
    exit; 
}
if (!preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W_]).{8,}$/', $password)) {
    $_SESSION['error'] = 'Password must be at least 8 characters long, contain at least one uppercase letter, one lowercase letter, one number, and one special character.';
    header('Location: ../php/signup.php'); 
    exit; 
}
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO users (first_name, last_name, email, password) VALUES (?, ?, ?, ?)";
$stmt = mysqli_prepare($db, $sql);

mysqli_stmt_bind_param($stmt, "ssss", $first_name, $last_name, $email, $hashed_password);

if (mysqli_stmt_execute($stmt)) {
    $_SESSION['success'] = 'Registration successful! You can now log in.';
    header('Location: ../php/signup.php'); 
    exit; 
} else {
    $_SESSION['error'] = 'Registration failed: ' . mysqli_error($db);
    header('Location: ../php/signup.php'); 
    exit; 
}
mysqli_stmt_close($stmt);
mysqli_close($db);

?>