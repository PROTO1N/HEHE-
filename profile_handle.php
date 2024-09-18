<?php
// Handle profile picture upload
if ($_FILES['profilePicture']) {
    $file = $_FILES['profilePicture'];
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileError = $file['error'];

    // Validate and process the file (e.g., check file type, size, etc.)
    // Move uploaded file to a folder on your server
    $destination = 'uploads/profiles/' . $fileName; // Adjust folder path as needed
    move_uploaded_file($fileTmpName, $destination);

    // Save $destination in database for user's profile picture
    // Example database query:
    // $userId = $_SESSION['user_id']; // Assuming you have a logged-in user
    // $sql = "UPDATE users SET profile_picture = '$destination' WHERE id = $userId";
    // Execute SQL query to update user's profile picture in database
}

// Handle other photos upload similarly...
?>
