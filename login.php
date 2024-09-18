<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form action="login.php" method="POST">
            <?php include('errors.php'); ?>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" id="password" placeholder="Password" required>
            <div class="checkbox-container">
                <input type="checkbox" id="see-password" aria-label="See Password">
                <label for="see-password">Show Password</label>
            </div>
            <div class="extra-options">
                <div>
                    <input type="checkbox" id="remember-me" name="remember-me">
                    <label for="remember-me">Remember me</label>
                </div>
                <a href="forgotpassword.php">Forgot Password?</a>
            </div>
            <button type="submit" name="login_user">Login</button>
        </form>
        <div class="register">
            <p>Don't have an account? <a href="signup.php">Register</a></p>
        </div>
    </div>
    <script>
        document.getElementById('see-password').addEventListener('change', function () {
            var passwordField = document.getElementById('password');
            if (this.checked) {
                passwordField.setAttribute('type', 'text');
            } else {
                passwordField.setAttribute('type', 'password');
            }
        });
    </script>
</body>
</html>
