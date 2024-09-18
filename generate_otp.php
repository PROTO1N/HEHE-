<?php

// session_start();
include('server.php'); // Include your database connection file

// Include PHPMailer classes
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$errors = array();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'])) {
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $_SESSION['email'] = $email;

    // Check if email exists in the users table
    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($db, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        // Generate OTP
        $otp = rand(100000, 999999);
        $expires = time() + 300; // OTP expires in 5 minutes

        // Insert OTP into password_resets table
        $query = "INSERT INTO password_resets (email, otp, expires) VALUES ('$email', '$otp', '$expires')";
        if (mysqli_query($db, $query)) {
            // Send OTP via email
            $mail = new PHPMailer(true);
            try {
                // Server settings
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com'; // Replace with your SMTP host
                $mail->SMTPAuth = true;
                $mail->Username = 'your-email@gmail.com'; // Replace with your email address
                $mail->Password = 'your-email-password'; // Replace with your email password or app-specific password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                // Recipients
                $mail->setFrom('your-email@gmail.com', 'Job Portal');
                $mail->addAddress($email);

                // Content
                $mail->isHTML(true);
                $mail->Subject = 'Password Reset OTP';
                $mail->Body    = 'Your OTP for password reset is ' . $otp;

                $mail->send();
                $_SESSION['otp_sent'] = true; // Flag to indicate OTP sent successfully
                header('Location: verify_otp.php');
                exit();
            } catch (Exception $e) {
                $errors[] = "Failed to send OTP. Please try again. Mailer Error: {$mail->ErrorInfo}";
            }
        } else {
            $errors[] = "Failed to generate OTP. Please try again.";
        }
    } else {
        $errors[] = "Email not found.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: #f9f9f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 300px;
        }
        h2 {
            margin-bottom: 20px;
        }
        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        button {
            background: #4cb8c4;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background: #3cd3ad;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Forgot Password</h2>
        <?php if (count($errors) > 0): ?>
            <div>
                <?php foreach ($errors as $error): ?>
                    <p style="color: red;"><?php echo $error; ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <form action="generate_otp.php" method="POST">
            <input type="email" name="email" placeholder="Enter your email" required>
            <button type="submit">Send OTP</button>
        </form>
    </div>
</body>
</html>
