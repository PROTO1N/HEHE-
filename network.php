<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Local Network</title>
    <style>
        /* Add your CSS styles here */
        .grid-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            padding: 20px;
        }

        .grid-item {
            background-color: #f0f0f0;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .grid-item img {
            max-width: 100%;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .grid-item h3 {
            font-size: 1.5em;
            margin-bottom: 10px;
        }

        .grid-item p {
            font-size: 1.1em;
            line-height: 1.5;
        }

        /* Customize styles for specific sections */
        .grid-item.instagram {
            background-color: #f8f8f8; /* Light gray */
        }

        .grid-item.linkedin {
            background-color: #0077b5; /* LinkedIn blue */
            color: #fff; /* White text */
        }

        .grid-item.facebook {
            background-color: #3b5998; /* Facebook blue */
            color: #fff; /* White text */
        }

        .grid-item.youtube {
            background-color: #c4302b; /* YouTube red */
            color: #fff; /* White text */
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>
    <main>
        <section class="grid-container">
            <div class="grid-item instagram">
                <img src="images/instagram.jpg" alt="Instagram">
                <h3>Instagram</h3>
                <p>Description of Instagram section.</p>
            </div>
            <div class="grid-item linkedin">
                <img src="images/linkedin.jpg" alt="LinkedIn">
                <h3>LinkedIn</h3>
                <p>Description of LinkedIn section.</p>
            </div>
            <div class="grid-item facebook">
                <img src="images/facebook.jpg" alt="Facebook">
                <h3>Facebook</h3>
                <p>Description of Facebook section.</p>
            </div>
            <div class="grid-item youtube">
                <img src="images/youtube.jpg" alt="YouTube">
                <h3>YouTube</h3>
                <p>Description of YouTube section.</p>
            </div>
        </section>
    </main>
    <?php include 'footer.php'; ?>
</body>
</html>
