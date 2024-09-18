<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Youth Opportunities</title>
    <link rel="stylesheet" href="youth_opportunities.css">
    <!-- Include Slick Carousel CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick-theme.css"/>
</head>
<body>
    <?php include 'header.php'; ?>
    <main>
        <section class="content">
            <h1 class="elegant-heading">Youth Opportunities</h1>
            <p>Welcome to the Youth Opportunities page. Here you will find various opportunities for youth.</p>
            
            <!-- Category Filter Form -->
            <form method="get" action="">
                <label for="category">Filter by category:</label>
                <select id="category" name="category">
                    <option value="">All</option>
                    <option value="Job">Job</option>
                    <option value="Internship">Internship</option>
                    <option value="Scholarship">Scholarship</option>
                    <option value="Seminar">Seminar</option>
                    <option value="Workshop">Workshop</option>
                </select>
                <button type="submit">Filter</button>
            </form>

            <!-- Display opportunities carousel here -->
            <div class="opportunities-carousel">
                <?php include 'display_opportunities.php'; ?>
            </div>
        </section>
    </main>
    <?php include 'footer.php'; ?>

    <!-- Include Slick Carousel JS -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.opportunities-carousel').slick({
                slidesToShow: 5,
                slidesToScroll: 5,
                infinite: false,
                dots: true,
                arrows: true
            });
        });
    </script>
</body>
</html>
