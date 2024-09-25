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
<?php include '../Header/header.php'; ?>
    
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
