<?php
include 'profiledb.php'; // Include your database connection file

// Check if user ID is available in session
$user_id = $_SESSION['user_id'] ?? 1; // Change to fetch from session if needed

// Fetch the user data
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="profile.css">
</head>
<body>
    <div class="profile-container">
        <div class="profile-header">
            <div class="profile-image">
                <img src="uploads/<?php echo htmlspecialchars($user['profile_pic']); ?>" alt="Profile Picture">
            </div>
            <div class="profile-details">
                <h1><?php echo htmlspecialchars($user['name']); ?></h1>
                <p><?php echo htmlspecialchars($user['bio']); ?></p>
                <p><?php echo htmlspecialchars($user['email']); ?></p>
                <div class="profile-stats">
                    <span><strong>4,073</strong> Followers</span>
                    <span><strong>322</strong> Following</span>
                    <span><strong>200,543</strong> Attraction</span>
                </div>
            </div>
            <div class="edit-profile">
                <button onclick="document.getElementById('edit-form').style.display='block'">Edit Profile</button>
            </div>
        </div>
        <div class="profile-info">
            <div class="bio">
                <p><?php echo htmlspecialchars($user['bio']); ?></p>
            </div>
            <div class="social-icons">
                <a href="<?php echo htmlspecialchars($user['twitter_link']); ?>"><img src="twitter-icon.png" alt="Twitter"></a>
                <a href="<?php echo htmlspecialchars($user['pinterest_link']); ?>"><img src="pinterest-icon.png" alt="Pinterest"></a>
                <a href="<?php echo htmlspecialchars($user['facebook_link']); ?>"><img src="facebook-icon.png" alt="Facebook"></a>
                <a href="<?php echo htmlspecialchars($user['website_link']); ?>"><img src="website-icon.png" alt="Website"></a>
            </div>
        </div>
        <div class="profile-content">
            <div class="tabs">
                <span class="tab active">Photos</span>
                <span class="tab">About</span>
            </div>
            <div class="photos-section">
                <img src="photo1.jpg" alt="Photo">
                <img src="photo2.jpg" alt="Photo">
                <img src="photo3.jpg" alt="Photo">
                <img src="photo4.jpg" alt="Photo">
            </div>
        </div>
    </div>

    <!-- Edit Profile Form -->
    <div id="edit-form" style="display:none;">
        <form action="profile.php" method="POST" enctype="multipart/form-data">
            <input type="text" name="name" value="<?php echo htmlspecialchars($user['name']); ?>" required>
            <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
            <textarea name="bio"><?php echo htmlspecialchars($user['bio']); ?></textarea>
            <input type="file" name="profile_pic">
            <input type="url" name="twitter_link" value="<?php echo htmlspecialchars($user['twitter_link']); ?>">
            <input type="url" name="pinterest_link" value="<?php echo htmlspecialchars($user['pinterest_link']); ?>">
            <input type="url" name="facebook_link" value="<?php echo htmlspecialchars($user['facebook_link']); ?>">
            <input type="url" name="website_link" value="<?php echo htmlspecialchars($user['website_link']); ?>">
            <button type="submit">Save Changes</button>
        </form>
    </div>
</body>
</html>
