<?php
session_start(); // Start the session

// Connect to the database
$db = mysqli_connect('localhost', 'root', '', 'jobportal');

if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

// Initialize variables
$errors = array();

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receive all input values from the form
    $title = mysqli_real_escape_string($db, $_POST['title']);
    $opportunity_description = mysqli_real_escape_string($db, $_POST['opportunity_description']);
    $opportunity_type = mysqli_real_escape_string($db, $_POST['opportunity_type']);
    $funding_type = mysqli_real_escape_string($db, $_POST['funding_type']);
    $category = mysqli_real_escape_string($db, $_POST['category']);
    $has_deadline = isset($_POST['has_deadline']) ? 1 : 0;
    $application_deadline = $has_deadline ? mysqli_real_escape_string($db, $_POST['application_deadline']) : NULL;
    $further_queries = mysqli_real_escape_string($db, $_POST['further_queries']);
    $official_link = mysqli_real_escape_string($db, $_POST['official_link']);
    $program_start_date = mysqli_real_escape_string($db, $_POST['program_start_date']);
    $program_end_date = mysqli_real_escape_string($db, $_POST['program_end_date']);
    $region = mysqli_real_escape_string($db, $_POST['region']);
    $your_name = mysqli_real_escape_string($db, $_POST['your_name']);
    $your_email = mysqli_real_escape_string($db, $_POST['your_email']);
    $official_contact_email = mysqli_real_escape_string($db, $_POST['official_contact_email']);

    // Handle image upload
    $image_path = "";
    if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) {
        $target_dir = "uploads/";
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0755, true);
        }
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $image_path = $target_file;
        } else {
            array_push($errors, "Sorry, there was an error uploading your file.");
        }
    }

    // Form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($title)) { array_push($errors, "Title is required"); }
    if (empty($opportunity_type)) { array_push($errors, "Opportunity Type is required"); }
    if (empty($category)) { array_push($errors, "Category is required"); }
    if (empty($official_link)) { array_push($errors, "Official Link is required"); }
    if (empty($your_name)) { array_push($errors, "Your Name is required"); }
    if (empty($your_email)) { array_push($errors, "Your Email is required"); }

    // Finally, insert opportunity if there are no errors in the form
    if (count($errors) == 0) {
        $query = "INSERT INTO opportunities (title, opportunity_description, opportunity_type, funding_type, category, has_deadline, application_deadline, further_queries, official_link, program_start_date, program_end_date, region, your_name, your_email, official_contact_email, image_path) 
                  VALUES('$title', '$opportunity_description', '$opportunity_type', '$funding_type', '$category', '$has_deadline', '$application_deadline', '$further_queries', '$official_link', '$program_start_date', '$program_end_date', '$region', '$your_name', '$your_email', '$official_contact_email', '$image_path')";

        if (mysqli_query($db, $query)) {
            $_SESSION['success'] = "Opportunity posted successfully!";
            echo '<script>alert("Opportunity posted successfully!"); window.location.href = "index.php";</script>';
        } else {
            array_push($errors, "Failed to post opportunity: " . mysqli_error($db));
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opportunity Form</title>
    <link rel="stylesheet" href="postopportunity.css">
</head>
<body>
    <h2>Post Opportunity</h2>
    <?php if (count($errors) > 0) : ?>
        <div class="error">
            <?php foreach ($errors as $error) : ?>
                <p><?php echo $error; ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <form action="submit_form.php" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td><label for="title" class="required">Title *</label></td>
                <td><input type="text" id="title" name="title" required></td>
            </tr>
            <tr>
                <td>Opportunity Description</td>
                <td><textarea id="opportunity_description" name="opportunity_description"></textarea></td>
            </tr>
            <tr>
                <td><label for="opportunity_type" class="required">Opportunity Type *</label></td>
                <td>
                    <select id="opportunity_type" name="opportunity_type" required>
                        <option value="General">General</option>
                        <option value="Job">Job</option>
                        <option value="Internship">Internship</option>
                        <option value="Scholarship">Scholarship</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Funding Type</td>
                <td>
                    <select name="funding_type">
                        <option value="">- Select -</option>
                        <option value="Fully Funded">Fully Funded</option>
                        <option value="Partially Funded">Partially Funded</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="category" class="required">Category *</label></td>
                <td>
                    <select id="category" name="category" required>
                        <option value="any">Any Opportunity</option>
                        <option value="seminar">Seminar</option>
                        <option value="fellowship">Fellowship</option>
                        <option value="internship">Internship</option>
                        <option value="full-time">Full-time Job</option>
                        <option value="part-time">Part-time Job</option>
                        <option value="workshop">Workshop</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Has Deadline</td>
                <td>
                    <input type="checkbox" id="has_deadline" name="has_deadline" onclick="toggleDeadlineFields(this.checked)">
                    <label for="has_deadline" class="button"></label>
                    <div id="deadlineFields" style="display:none;">
                        <label>Application Deadline</label>
                        <input type="date" name="application_deadline">
                    </div>
                </td>
            </tr>
            <tr>
                <td>For Further Queries</td>
                <td><textarea name="further_queries"></textarea></td>
            </tr>
            <tr>
                <td><label for="official_link" class="required">Official Link *</label></td>
                <td><input type="url" id="official_link" name="official_link" required></td>
            </tr>
            <tr>
                <td>Program Start Date</td>
                <td><input type="date" name="program_start_date"></td>
            </tr>
            <tr>
                <td>Program End Date</td>
                <td><input type="date" name="program_end_date"></td>
            </tr>
            <tr>
                <td><label for="region" class="additional-details">Region</label></td>
                <td><input type="text" name="region"></td>
            </tr>
            <tr>
                <td colspan="2" class="additional-details-heading">YOUR DETAILS</td>
            </tr>
            <tr>
                <td><label for="your_name" class="required">Your Name *</label></td>
                <td><input type="text" id="your_name" name="your_name" required></td>
            </tr>
            <tr>
                <td><label for="your_email" class="required">Your Email *</label></td>
                <td><input type="email" id="your_email" name="your_email" required></td>
            </tr>
            <tr>
                <td><label for="official_contact_email" class="additional-details">Official Contact Email</label></td>
                <td><input type="email" name="official_contact_email"></td>
            </tr>
            <tr>
                <td><label for="image">Upload Image:</label></td>
                <td><input type="file" id="image" name="image" accept="image/*"></td>
            </tr>
        </table>
        <button type="submit">Submit</button>
    </form>

    <script>
        // Toggle deadline fields visibility
        function toggleDeadlineFields(isChecked) {
            var deadlineFields = document.getElementById('deadlineFields');
            deadlineFields.style.display = isChecked ? 'block' : 'none';
        }
    </script>
</body>
</html>
