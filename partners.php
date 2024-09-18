<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Partners</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        main {
            flex: 1;
            padding: 20px;
            background-color: #f4f4f4; /* Slightly darker background color for contrast */
        }

        .hero {
            text-align: center;
            padding: 50px 20px;
            background: linear-gradient(to right, #3a7bd5, #00d2ff); /* Slightly darker gradient */
            color: white; /* Text color */
            border-radius: 10px; /* Rounded corners */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow */
        }

        /* Elegant Heading Styles */
        .elegant-heading {
            font-family: 'Pacifico', cursive; /* Ensure you load the font if needed */
            font-size: 2.5rem; /* Adjust font size as needed */
            margin-bottom: 10px;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
        }

        /* Intro Text Styles */
        .intro-text {
            font-size: 1.2rem; /* Adjust font size as needed */
            margin-bottom: 20px;
            font-style: italic; /* Italicize text */
        }

        /* Partners List Styles */
        .partners-list {
            list-style-type: none; /* Remove default list styling */
            padding: 0;
        }

        .partners-list li {
            font-size: 1.2rem; /* Adjust font size as needed */
            margin: 10px 0;
            background-color: rgba(255, 255, 255, 0.9); /* Slightly more opaque background */
            padding: 10px;
            border-radius: 5px; /* Rounded corners */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Subtle shadow */
            color: #333; /* Dark text color for readability */
        }

        @import url('https://fonts.googleapis.com/css2?family=Pacifico&display=swap'); /* Google Font */
    </style>
</head>
<body>

    <main>
        <section class="hero">
            <h1 class="elegant-heading">Our Partners</h1>
            <p class="intro-text">We are proud to collaborate with the following organizations:</p>
            <ul class="partners-list">
                <li>Partner 1</li>
                <li>Partner 2</li>
                <li>Partner 3</li>
                <!-- Add more partners as needed -->
            </ul>
        </section>
    </main>

    <?php include 'footer.php'; ?>
</body>
</html>
