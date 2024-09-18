<?php
session_start(); // Start the session
?>

<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Job Portal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 15px;
            border: 1px solid #ccc;
        }
        h1 {
            color: #007bff;
            text-align: center;
            margin-bottom: 20px;
            font-size: 2em;
        }
        form {
            margin-top: 20px;
        }
        input[type="text"],
        input[type="email"],
        input[type="tel"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }
        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="tel"]:focus,
        textarea:focus {
            border-color: #007bff;
            outline: none;
        }
        textarea {
            resize: vertical;
        }
        button {
            background-color: #007bff;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            padding: 12px 20px;
            cursor: pointer;
            font-size: 16px;
            position: relative;
            overflow: hidden;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #0056b3;
        }

        .bubble {
            position: absolute;
            width: 20px;
            height: 20px;
            background-color: #ffffff;
            border-radius: 50%;
            opacity: 0.5;
            animation: bubble 0.5s linear;
        }

        @keyframes bubble {
            from {
                transform: scale(1);
                opacity: 0.5;
            }
            to {
                transform: scale(2);
                opacity: 0;
            }
        }
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
    <?php include 'footer.php'; ?>
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
