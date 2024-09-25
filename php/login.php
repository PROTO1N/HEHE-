<?php include('../php/server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="../Css/login.css">
</head>
<body>
<?php include '../Header/header.php'; ?>
    <div class="login-container">

        <div class="message-row">
            <?php if (isset($_SESSION['error'])): ?>
                <div class="error"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></div>
            <?php elseif (isset($_SESSION['success'])): ?>
                <div class="success"><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></div>
            <?php endif; ?>
        </div>

        <div class="form-row">
            <div class="form-column">
                <h2>Login</h2>
                <form action="../php/login_db.php" method="POST">
                    
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="password" name="password" placeholder="Password" required>
                    
                    <button type="submit">Login</button>
                </form>
                <div class="login-prompt">
                        <p>Don't have an account? <a href="../php/signup.php">Register</a></p>
                </div>
            </div>
            <div class="svg-column">
                <img src="../svg/welcome.svg" alt="SVG Image" style="max-width: 100%; border-radius: 10px;">
            </div>
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
    <?php include '../Footer/footer.php'; ?>

</body>
</html>
