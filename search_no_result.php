<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>No Results Found</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <main>
        <section class="no-results">
            <h2>Umm, looks like the opportunity you searched for isn't here.</h2>
            <p>Please try searching for another opportunity.</p>
        </section>
        <section class="trending-opportunities">
            <h2>Trending Opportunities</h2>
            <div class="trending-categories">
                <!-- Display 5 trending categories here -->
                <div class="category">Category 1</div>
                <div class="category">Category 2</div>
                <div class="category">Category 3</div>
                <div class="category">Category 4</div>
                <div class="category">Category 5</div>
            </div>
        </section>
    </main>
    <?php include 'footer.php'; ?>
</body>
</html>
