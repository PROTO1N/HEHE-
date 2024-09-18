<?php
// Check if user is logged in
session_start();
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
    <title>Job Portal</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Additional CSS for animated headings */
        #animated-headings {
            text-align: center;
            margin-bottom: 20px;
            font-size: 2.5em; /* Adjust font size as needed */
        }

        .animated-word {
            display: inline-block;
            overflow: hidden;
            white-space: nowrap;
            border-right: 0.1em solid #000;
            animation: typing 3.5s steps(40, end), blink-caret 0.75s step-end infinite;
        }

        @keyframes typing {
            from { width: 0 }
            to { width: 100% }
        }

        @keyframes blink-caret {
            from, to { border-color: transparent }
            50% { border-color: black; }
        }

        .new-container {
            opacity: 0;
            transform: translateX(100%);
            transition: transform 0.5s ease-out, opacity 0.5s ease-out;
        }

        .new-container.visible {
            opacity: 1;
            transform: translateX(0);
        }

        .category-item {
            margin-bottom: 20px;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .category-item img {
            width: 100%;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .category-item h3 {
            font-size: 1.5em;
            margin-bottom: 10px;
        }

        .category-item p {
            font-size: 1.1em;
            line-height: 1.5;
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>
    <main>
        <section class="hero">
            <div id="particles-js"></div>
            <h1>Explore New Opportunities!</h1>
            <p>Or, <a href="post_opportunity.php">post an opportunity</a> for free.</p>
            <form class="search-form" action="opportunities_redirect.php" method="get">
                <select name="opportunity">
                    <option value="any">Any Opportunity</option>
                    <option value="seminar">Seminar</option>
                    <option value="fellowship">Fellowship</option>
                    <option value="internship">Internship</option>
                    <option value="full-time">Full-time Job</option>
                    <option value="part-time">Part-time Job</option>
                    <option value="workshop">Workshop</option>
                </select>
                <select name="region">
                    <option value="any">Any Region</option>
                    <option value="bagmati">Bagmati</option>
                    <option value="gandaki">Gandaki</option>
                    <option value="lumbini">Lumbini</option>
                    <option value="karnali">Karnali</option>
                    <option value="sudurpaschim">Sudurpaschim</option>
                </select>
                <button type="submit">Explore</button>
            </form>
        </section>
        <section class="opportunities">
            <h2>What are you looking for?</h2>
            <div id="animated-headings">
                <span id="heading-target" class="animated-word"></span>
            </div>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            background-color: #D2D2D2;
            background-image:
            repeating-linear-gradient(
                to right, transparent 0 100px,
                #25283b22 100px 101px
            ),
            repeating-linear-gradient(
                to bottom, transparent 0 100px,
                #25283b22 100px 101px
            );
        }

        body::before {
            position: absolute;
            width: min(1400px, 90vw);
            top: 10%;
            left: 50%;
            height: 90%;
            transform: translateX(-50%);
            content: '';
            background-image: url(bg.png);
            background-size: 100%;
            background-repeat: no-repeat;
            background-position: top center;
            pointer-events: none;
        }

        @import url('https://fonts.cdnfonts.com/css/ica-rubrik-black');
        @import url('https://fonts.cdnfonts.com/css/poppins');

        .banner {
            width: 100%;
            height: 100vh;
            text-align: center;
            overflow: hidden;
            position: relative;
        }
        .banner .slider {
            position: absolute;
            width: 200px;
            height: 250px;
            top: 10%;
            left: calc(50% - 100px);
            transform-style: preserve-3d;
            transform: perspective(1000px);
            animation: autoRun 20s linear infinite;
            z-index: 2;
        }
        @keyframes autoRun {
            from {
                transform: perspective(1000px) rotateX(-16deg) rotateY(0deg);
            }
            to {
                transform: perspective(1000px) rotateX(-16deg) rotateY(360deg);
            }
        }

        .banner .slider .item {
            position: absolute;
            inset: 0 0 0 0;
            transform: rotateY(calc((var(--position) - 1) * (360 / var(--quantity)) * 1deg))
                        translateZ(400px); /* Adjusted to 400px for equal distance */
        }
        .banner .slider .item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .banner .content {
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: min(1400px, 100vw);
            height: max-content;
            padding-bottom: 100px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            z-index: 1;
        }
        .banner .content h1 {
            font-family: 'ICA Rubrik';
            font-size: 16em;
            line-height: 1em;
            color: #25283B;
            position: relative;
        }
        .banner {
    width: 100%;
    height: 100vh;
    text-align: center;
    overflow: hidden;
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}

.banner .slider {
    position: absolute;
    width: 200px;
    height: 250px;
    top: 10%;
    left: 50%;
    transform: translateX(-50%);
    transform-style: preserve-3d;
    transform: perspective(1000px);
    animation: autoRun 20s linear infinite;
    z-index: 2;
}

@keyframes autoRun {
    from {
        transform: perspective(1000px) rotateX(-16deg) rotateY(0deg);
    }
    to {
        transform: perspective(1000px) rotateX(-16deg) rotateY(360deg);
    }
}

.banner .slider .item {
    position: absolute;
    inset: 0 0 0 0;
    transform: rotateY(calc((var(--position) - 1) * (360 / var(--quantity)) * 1deg))
                translateZ(400px);
}

.banner .slider .item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.banner .content {
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: min(1400px, 100vw);
    height: max-content;
    padding-bottom: 100px;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: center;
    z-index: 1;
}

.banner .content h1 {
    font-family: 'ICA Rubrik';
    font-size: 16em;
    line-height: 1em;
    color: #25283B;
    position: relative;
}

.banner .content h1::after {
    position: absolute;
    inset: 0 0 0 0;
    content: attr(data-content);
    z-index: 2;
    -webkit-text-stroke: 2px #d2d2d2;
    color: transparent;
}

.banner .content .author {
    font-family: Poppins;
    text-align: right;
    max-width: 200px;
}

.banner .content h2 {
    font-size: 3em;
}

.banner .content .model {
    background-image: url(images/model.png);
    width: 100%;
    height: 75vh;
    position: absolute;
    bottom: 0;
    left: 0;
    background-size: auto 130%;
    background-repeat: no-repeat;
    background-position: top center;
    z-index: 1;
}

@media screen and (max-width: 1023px) {
    .banner .slider {
        width: 160px;
        height: 200px;
        left: 50%;
        transform: translateX(-50%);
    }
    .banner .slider .item {
        transform: rotateY(calc((var(--position) - 1) * (360 / var(--quantity)) * 1deg))
                    translateZ(300px);
    }
    .banner .content h1 {
        text-align: center;
        width: 100%;
        text-shadow: 0 10px 20px #000;
        font-size: 7em;
    }
    .banner .content .author {
        color: #fff;
        padding: 20px;
        text-shadow: 0 10px 20px #000;
        z-index: 2;
        max-width: unset;
        width: 100%;
        text-align: center;
        padding: 0 30px;
    }
}

@media screen and (max-width: 767px) {
    .banner .slider {
        width: 100px;
        height: 150px;
        left: 50%;
        transform: translateX(-50%);
    }
    .banner .slider .item {
        transform: rotateY(calc((var(--position) - 1) * (360 / var(--quantity)) * 1deg))
                    translateZ(180px);
    }
    .banner .content h1 {
        font-size: 5em;
    }
}

    </style>

    <div class="banner">
        <div class="slider" style="--quantity: 5">
            <div class="item" style="--position: 1"><img src="Job.jpg" alt="Job"></div>
            <div class="item" style="--position: 2"><img src="Internship.jpg" alt="Internship"></div>
            <div class="item" style="--position: 3"><img src="Scholarship.jpg" alt="Scholarship"></div>
            <div class="item" style="--position: 4"><img src="Workshop.jpg" alt="Workshop"></div>
            <div class="item" style="--position: 5"><img src="Seminar.jpg" alt="Seminar"></div>
        </div>
    </div>
        </section>
        <section class="new-container">
            <h2>Additional Opportunities</h2>
            <div class="additional-content">
                <!-- Add your additional content here -->
                <div class="category-item">
                    <img src="images/extra_opportunity.jpg" alt="Extra Opportunity">
                    <h3>Extra Opportunity</h3>
                    <p>Explore more opportunities to enhance your career.</p>
                </div>
            </div>
        </section>
    </main>
    <?php include 'footer.php'; ?>
    
    <script src="js/particles.js"></script>
    <script src="js/particles.min.js"></script>
    <script src="js/app.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const headings = ["Seminar", "Internship", "Workshop", "Job"];
            const target = document.getElementById("heading-target");

            let currentHeading = 0;
            let isDeleting = false;
            let currentText = "";
            let typingSpeed = 150;
            let deletingSpeed = 100;
            let delayBetweenHeadings = 1000;

            function type() {
                let fullText = headings[currentHeading];

                if (isDeleting) {
                    currentText = fullText.substring(0, currentText.length - 1);
                } else {
                    currentText = fullText.substring(0, currentText.length + 1);
                }

                target.textContent = currentText;

                if (!isDeleting && currentText === fullText) {
                    setTimeout(() => isDeleting = true, delayBetweenHeadings);
                } else if (isDeleting && currentText === "") {
                    isDeleting = false;
                    currentHeading = (currentHeading + 1) % headings.length;
                }

                setTimeout(type, isDeleting ? deletingSpeed : typingSpeed);
            }

            type();

            const newContainer = document.querySelector('.new-container');
            
            function handleScroll() {
                const rect = newContainer.getBoundingClientRect();
                if (rect.top < window.innerHeight && rect.bottom >= 0) {
                    newContainer.classList.add('visible');
                    window.removeEventListener('scroll', handleScroll);
                }
            }
            
            window.addEventListener('scroll', handleScroll);
        });
    </script>
</body>
</html>
