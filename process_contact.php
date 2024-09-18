
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Initialize variables
$name = "";
$email = "";
$phone = "";
$message = "";
$errors = array();

// Connect to the database
$db = mysqli_connect('localhost', 'root', '', 'jobportal');
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input data
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $phone = mysqli_real_escape_string($db, $_POST['phone']);
    $message = mysqli_real_escape_string($db, $_POST['message']);

    // Insert into database
    $query = "INSERT INTO contact_querir (name, email, phone, message) 
              VALUES ('$name', '$email', '$phone', '$message')";
    if (mysqli_query($db, $query)) {
        echo '<script>alert("Thank you! Your message has been sent."); window.location.href = "index.php";</script>';
    } else {
        array_push($errors, "Failed to submit contact form: " . mysqli_error($db));
    }
}

// Close database connection
mysqli_close($db);
?>
