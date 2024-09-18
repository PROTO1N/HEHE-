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
        $query = "SELECT * FROM password_resets WHERE email='$email' AND otp='$otp' AND expires >= '".date("U")."'";
        $result = mysqli_query($db, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            // OTP is valid, proceed to reset password
            header('Location: resetpassword.php');
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

        input[type="text"] {
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
        <h2>Verify OTP</h2>
        <?php if (count($errors) > 0): ?>
            <div>
                <?php foreach ($errors as $error): ?>
                    <p style="color: red;"><?php echo $error; ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <form action="verify_otp.php" method="POST">
            <input type="text" name="otp" placeholder="Enter OTP" required>
            <button type="submit">Verify</button>
        </form>
    </div>
</body>
</html>
