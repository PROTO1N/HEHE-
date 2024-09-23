<?php
// Database connection parameters
$host = 'localhost'; // Change if necessary
$db = 'user_profile';
$user = 'root'; // Your MySQL username
$password = ''; // Your MySQL password

// Create a connection
$conn = new mysqli($host, $user, $password, $db);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch the user data
session_start(); // Ensure session is started
$user_id = $_SESSION['user_id'] ?? 1; // Change to fetch from session if needed

// Prepare and execute SQL to fetch user data
$stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
$stmt->bind_param('i', $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    echo "No user found!";
    exit;
}

// Handle profile update
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $bio = $_POST['bio'];
    $twitter_link = $_POST['twitter_link'];
    $pinterest_link = $_POST['pinterest_link'];
    $facebook_link = $_POST['facebook_link'];
    $website_link = $_POST['website_link'];

    // Handle profile picture upload
    if (!empty($_FILES['profile_pic']['name'])) {
        $profile_pic = basename($_FILES['profile_pic']['name']);
        $target_dir = "uploads/";
        $target_file = $target_dir . $profile_pic;

        // Validate file type and size
        $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $allowed_types = array('jpg', 'jpeg', 'png', 'gif');
        $max_size = 5 * 1024 * 1024; // 5MB

        if (in_array($file_type, $allowed_types) && $_FILES['profile_pic']['size'] <= $max_size) {
            if (move_uploaded_file($_FILES['profile_pic']['tmp_name'], $target_file)) {
                // File upload successful
            } else {
                echo "Error uploading file.";
                exit;
            }
        } else {
            echo "Invalid file type or size.";
            exit;
        }
    } else {
        $profile_pic = $user['profile_pic'];
    }

    // Prepare and execute SQL to update user data
    $update_stmt = $conn->prepare("UPDATE users SET 
        name = ?, 
        email = ?, 
        bio = ?, 
        profile_pic = ?, 
        twitter_link = ?, 
        pinterest_link = ?, 
        facebook_link = ?, 
        website_link = ? 
        WHERE id = ?");
    $update_stmt->bind_param('ssssssssi', $name, $email, $bio, $profile_pic, $twitter_link, $pinterest_link, $facebook_link, $website_link, $user_id);

    if ($update_stmt->execute()) {
        header("Location: ../php/profile.php"); // Refresh the page
        exit;
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>
