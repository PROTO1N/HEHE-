<?php
session_start();

// Check if user is logged in
if (isset($_SESSION['username'])) {
    $loggedIn = true;
    $username = $_SESSION['username'];
} else {
    $loggedIn = false;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQs - Job Portal</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Css/styles.css">
    <style>
        body {
            text-align: center;
            background-color: white;
            font-family: Arial, sans-serif;
        }
        .faq-container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
        }
        .faq-item {
            border-bottom: 1px solid #ccc;
            padding: 20px 0;
            text-align: left;
        }
        .faq-item h3 {
            color: #007bff;
        }
        .faq-item p {
            color: #333;
        }
    </style>
</head>
<body>
    <header class="bg-primary text-white p-3">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="logo">
                <img src="images/logo.png" alt="Logo" class="img-fluid">
            </div>
            <nav>
                <ul class="nav">
                    <li class="nav-item"><a class="nav-link text-white" href="#">Browse Opportunities</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="post_opportunity.php">Post an Opportunity</a></li>
                    <?php if ($loggedIn) : ?>
                        <li class="nav-item"><a class="nav-link text-white" href="profile.php">Profile</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="logout.php">Logout</a></li>
                    <?php else : ?>
                        <li class="nav-item"><a class="nav-link text-white" href="login.php">Login</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="signup.php">SignUp</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
        <?php if ($loggedIn) : ?>
            <div class="profile-actions">
                <ul class="list-unstyled">
                    <li><a href="edit_profile.php">Edit Profile</a></li>
                    <li><a href="upload_profile_pic.php">Upload Profile Picture</a></li>
                    <li><a href="followers.php">Check Followers</a></li>
                    <li><a href="delete_account.php">Delete Account</a></li>
                </ul>
            </div>
        <?php endif; ?>
        <div class="search-header">
            <form class="form-inline" action="search.php" method="get">
                <input class="form-control mr-2" type="text" name="query" placeholder="Search opportunities...">
                <button class="btn btn-dark" type="submit">Search</button>
            </form>
        </div>
    </header>
    <main class="container mt-4">
        <div class="faq-container">
            <h1>FAQs</h1>
            <div class="faq-item">
                <h3>What is Youth Opportunities?</h3>
                <p>Youth Opportunities is a platform dedicated to connecting youth with various opportunities such as jobs, internships, seminars, workshops, and more.</p>
            </div>
            <div class="faq-item">
                <h3>How do I sign up?</h3>
                <p>To sign up, click on the SignUp link in the navigation bar, fill out the registration form, and submit it. You will receive a confirmation email to activate your account.</p>
            </div>
            <div class="faq-item">
                <h3>How do I post an opportunity?</h3>
                <p>To post an opportunity, first, make sure you are logged in. Then, click on "Post an Opportunity" in the navigation bar, fill out the opportunity form, and submit it for review.</p>
            </div>
            <div class="faq-item">
                <h3>Can I edit my profile?</h3>
                <p>Yes, after logging in, you can click on "Profile" in the navigation bar and then choose "Edit Profile" to update your information.</p>
            </div>
            <div class="faq-item">
                <h3>How can I delete my account?</h3>
                <p>To delete your account, go to "Profile" in the navigation bar, select "Delete Account," and follow the instructions. Deleting your account is irreversible.</p>
            </div>
            <div class="faq-item">
                <h3>What should I do if I forget my password?</h3>
                <p>If you forget your password, click on the "Forgot Password" link on the login page. You will receive an email with instructions to reset your password securely.</p>
            </div>
        </div>
    </main>

    <?php include '../Footer/footer.php'; ?>

</body>
</html>
