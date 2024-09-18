<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join Us - Youth Opportunities</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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

        .join-us-section {
            text-align: center;
            padding: 50px 20px;
            background: linear-gradient(to right, #3a7bd5, #00d2ff); /* Gradient background */
            color: white; /* Text color */
            border-radius: 10px; /* Rounded corners */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow */
            margin-bottom: 20px;
        }

        /* Heading Styles */
        .join-us-heading {
            font-family: 'Pacifico', cursive; /* Ensure you load the font if needed */
            font-size: 2.5rem; /* Adjust font size as needed */
            margin-bottom: 20px;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
        }

        /* Paragraph Styles */
        .join-us-text {
            font-size: 1.2rem; /* Adjust font size as needed */
            line-height: 1.6; /* Adjust line height for readability */
            margin-bottom: 20px;
            color: #f0f0f0; /* Light text color for readability */
        }

        /* Email Section Styles */
        .email-section {
            text-align: center;
            margin: 20px 0;
        }

        .email-section a {
            display: inline-flex;
            align-items: center;
            text-decoration: none;
            font-size: 1.2rem;
            color: #007bff;
            background-color: #ffffff;
            padding: 10px 20px;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow */
            transition: background-color 0.3s, color 0.3s;
        }

        .email-section a:hover {
            background-color: #007bff;
            color: #ffffff;
        }

        .email-section i {
            margin-right: 10px;
            font-size: 1.5rem; /* Adjust icon size as needed */
        }

        @import url('https://fonts.googleapis.com/css2?family=Pacifico&display=swap'); /* Google Font */
    </style>
</head>
<body>
    <?php include 'header.php'; ?>

    <main>
        <section class="join-us-section">
            <h1 class="join-us-heading">Join Us</h1>
            <p class="join-us-text">
                Youth Opportunities places young people at its core, flourishing through fresh ideas and bold leadership to make significant contributions to youth development. We welcome self-motivated individuals who share our commitment to YO's global mission and are eager to be part of our journey.
            </p>
            <p class="join-us-text">
                Are you ready to unlock your full potential? At YO, we offer a supportive platform for young people to educate, empower, and engage them in spearheading innovative initiatives that drive societal change.
            </p>
            <p class="join-us-text">
                Stay tuned for exciting opportunities to connect with us and become part of our dynamic community.
            </p>
        </section>

        <div class="email-section">
            <a href="mailto:intopportunities.hub@gmail.com">
                <i class="fas fa-envelope"></i> Email Us at intopportunities.hub@gmail.com
            </a>
        </div>
    </main>

    <?php include 'footer.php'; ?>
</body>
</html>
