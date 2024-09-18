<?php
session_start();
include('server.php'); // Include your database connection file

$errors = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
        $new_password = mysqli_real_escape_string($db, $_POST['new_password']);
        $confirm_password = mysqli_real_escape_string($db, $_POST['confirm_password']);

        if ($new_password == $confirm_password) {
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
            $query = "UPDATE users SET password='$hashed_password' WHERE email='$email'";
            mysqli_query($db, $query);

            // Delete the used OTP
            $query = "DELETE FROM password_resets WHERE email='$email'";
            mysqli_query($db, $query);

            $_SESSION['message'] = "Password has been reset successfully.";
            header('Location: login.php');
            exit();
        } else {
            $errors[] = "Passwords do not match.";
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
    <title>Reset Password</title>
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

        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        button {
            background: #ff4e50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Reset Password</h2>
        <?php if (count($errors) > 0): ?>
            <div>
                <?php foreach ($errors as $error): ?>
                    <p style="color: red;"><?php echo $error; ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <form action="resetpassword.php" method="POST">
            <input type="password" name="new_password" placeholder="New Password" required>
            <input type="password" name="confirm_password" placeholder="Confirm Password" required>
            <button type="submit">Reset Password</button>
        </form>
    </div>
</body>
</html>
