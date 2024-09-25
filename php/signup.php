<?php include('../php/server.php');
// session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Form</title>
    <link rel="stylesheet" href="../Css/signup.css">
</head>
<body>
    <?php include '../Header/header.php'; ?>
    <div class="signup-container">

        <div class="message-row">
            <?php if (isset($_SESSION['error'])): ?>
                <div class="error"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></div>
            <?php elseif (isset($_SESSION['success'])): ?>
                <div class="success"><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></div>
            <?php endif; ?>
        </div>

        <div class="form-row">
            <div class="form-column">
                <h2>Sign Up</h2>
                <form action="../php/signup_db.php" method="POST">
                    <div class="input-row">
                        <input type="text" name="first_name" placeholder="First Name" required>
                        <input type="text" name="last_name" placeholder="Last Name" required>
                    </div>
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <input type="password" name="confirm_password" placeholder="Confirm Password" required>
                    <button type="submit">Sign Up</button>
                </form>
                <div class="login-prompt">
                        <p>Already have an account? <a href="../php/login.php">Login</a></p>
                </div>
            </div>
            <div class="svg-column">
                <img src="../svg/signup.svg" alt="SVG Image" style="max-width: 100%; border-radius: 10px;">
            </div>
        </div>
    </div>
    <?php include '../Footer/footer.php'; ?>
</body>
</html>
