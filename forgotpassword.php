<?php
session_start();
// Check if user is already logged in, redirect to index.php if logged in
if (isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <style>
        /* Global styles */
        body, html {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #4cb8c4, #3cd3ad); /* Oceanic blue gradient */
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
            color: #333;
        }

        header {
            width: 100%;
            background: #fff;
            padding: 10px 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header .logo img {
            height: 50px;
        }

        header nav ul {
            list-style: none;
            display: flex;
            margin: 0;
            padding: 0;
        }

        header nav ul li {
            margin: 0 10px;
        }

        header nav ul li a {
            text-decoration: none;
            color: #333;
            font-weight: 500;
        }

        header .search-header form {
            display: flex;
        }

        header .search-header input[type="text"] {
            padding: 5px 10px;
            border: 2px solid #ddd;
            border-radius: 5px 0 0 5px;
            outline: none;
            font-size: 16px;
        }

        header .search-header button {
            padding: 5px 10px;
            border: 2px solid #ddd;
            border-left: none;
            background: #4cb8c4; /* Oceanic blue button */
            color: #fff;
            border-radius: 0 5px 5px 0;
            cursor: pointer;
        }

        header .search-header button:hover {
            background: #3cd3ad; /* Lighter shade on hover */
        }

        main {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
        }

        .forgot-password {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 100%;
            max-width: 400px;
        }

        .forgot-password h1 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #4cb8c4; /* Oceanic blue heading */
        }

        .forgot-password label {
            display: block;
            font-size: 18px;
            margin-bottom: 10px;
        }

        .forgot-password input[type="email"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            margin-bottom: 20px;
            border: 2px solid #ddd;
            border-radius: 5px;
            outline: none;
        }

        .forgot-password button {
            background: #4cb8c4; /* Oceanic blue button */
            color: #fff;
            font-size: 18px;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .forgot-password button:hover {
            background: #3cd3ad; /* Lighter shade on hover */
        }

        footer {
            width: 100%;
            background: #fff;
            padding: 20px;
            box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        footer p {
            margin: 10px 0 0;
            color: #333;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">
            <img src="images/logo.png" alt="Logo">
        </div>
        <nav>
            <ul>
                <li><a href="#">Browse Opportunities</a></li>
                <li><a href="post_opportunity.php">Post an Opportunity</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="signup.php">SignUp</a></li>
            </ul>
        </nav>
        <div class="search-header">
            <form action="search.php" method="get">
                <input type="text" name="query" placeholder="Search opportunities...">
                <button type="submit">Search</button>
            </form>
        </div>
    </header>
    <main>
        <section class="forgot-password">
            <h1>Forgot Password</h1>
            <form action="generate_otp.php" method="post">
                <label for="email">Enter your email address:</label>
                <input type="email" id="email" placeholder="Your email" name="email" required>
                <button type="submit">Reset Password</button>
            </form>
        </section>
    </main>
    <footer>
        <div class="footer-container">
            <!-- Footer content -->
        </div>
        <p>&copy; 2024 Job Portal. All rights reserved.</p>
    </footer>
</body>
</html>
