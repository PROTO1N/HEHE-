<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opportunity Form</title>
    <link rel="stylesheet" href="postopportunity.css">
    <!-- Load TinyMCE from CDN -->
    <script src="https://cdn.jsdelivr.net/npm/tinymce/tinymce.min.js"></script>
    <script>
        // Initialize TinyMCE for opportunity_description
        document.addEventListener("DOMContentLoaded", function() {
            tinymce.init({
                selector: 'textarea#opportunity_description',
                plugins: 'lists link',
                toolbar: 'undo redo | bold italic | bullist numlist | blockquote | alignleft aligncenter alignright | link',
                menubar: false
            });
        });
    </script>
</head>
<body>
    <div class="post-opportunity">Post Opportunity</div>
    <div class="large-gap"></div>
    <h2>Share Your Opportunity with the Youth Opportunities Community</h2>
    <p>
        Do you have an opportunity you'd like to share with the Youth Opportunities community? Please use the form above to submit your opportunity. Alternatively, you can email us at <a href="mailto:post@youthop.com" class="email-link">post@youthop.com</a>.
    </p>
    
    <p>
        <strong>Terms of Submission:</strong><br>
        By submitting your opportunity, you agree to the following terms. Please read them carefully:
    </p>
    
    <ul>
        <li><strong>Accuracy and Responsibility:</strong><br>
            <ul>
                <li>The information provided is accurate and does not contain any confidential details that could harm any involved parties or organizations.</li>
                <li>The submitter ensures the authenticity, validity, and reliability of the shared information and takes full responsibility for its content.</li>
            </ul>
        </li>
        <li><strong>Public Sharing:</strong><br>
            The information submitted will be shared with potential beneficiaries and viewers through our website, social media channels, and other communication means.
        </li>
        <li><strong>Image Usage:</strong><br>
            Permission is granted to Youth Opportunities to use any uploaded images for the submitted opportunity. If no image is provided, Youth Opportunities reserves the right to design, modify, and use appropriate images related to the opportunity.
        </li>
    </ul>
    
    <p>
        Thank you for contributing to the Youth Opportunities community. Your support helps us connect young people with valuable opportunities.
    </p>
    
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
                        <!-- Add other options as needed -->
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
                <td><label for="official_representative" class="additional-details">Official Representative</label></td>
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
