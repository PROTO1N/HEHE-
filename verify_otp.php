<?php
session_start();
include('server.php'); // Include your database connection file

$errors = array();

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['otp'])) {
    if (isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
        $otp = mysqli_real_escape_string($db, $_POST['otp']);

        // Check if OTP is valid
        $query = "SELECT * FROM password_resets WHERE email='$email' AND otp='$otp' AND expires >= '".time()."'";
        $result = mysqli_query($db, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            // OTP is valid, proceed to reset password
            header('Location: reset_password.php');
            exit();
        } else {
            $errors[] = "Invalid or expired OTP.";
        }
    } else {
        $errors[] = "Session expired. Please try again.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: #f9f9f9;
            display: flex;
            justify-content: center;
           
        }