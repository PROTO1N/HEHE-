<?php
session_start(); // Start the session
?>

<?php include '../Header/header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Job Portal</title>
    <link rel="stylesheet" href="../Css/contact.css">
    
    </style>
</head>
<body>
    <div class="container">
        <h1>Contact Us</h1>
        <form action="process_contact.php" method="post">
            <input type="text" name="name" placeholder="Your Name" required>
            <input type="email" name="email" placeholder="Your Email" required>
            <input type="tel" name="phone" placeholder="Your Phone Number">
            <textarea name="message" placeholder="How can we help you?" rows="5" required></textarea>
            <button type="submit">Submit</button>
        </form>
    </div>
    <?php include '../Footer/footer.php'; ?>
    <script>
        document.querySelector('button').addEventListener('click', function(e) {
            var rect = e.target.getBoundingClientRect();
            var bubble = document.createElement('div');
            bubble.classList.add('bubble');
            bubble.style.left = (e.clientX - rect.left) + 'px';
            bubble.style.top = (e.clientY - rect.top) + 'px';
            e.target.appendChild(bubble);

            bubble.addEventListener('animationend', function() {
                bubble.remove();
            });
        });
    </script>
</body>
</html>
