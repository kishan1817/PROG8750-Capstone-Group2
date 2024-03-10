<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all fields are filled
    if (isset($_POST['certification']) && isset($_POST['education']) && isset($_POST['experience']) && isset($_POST['skills'])) {
        // Check if file is uploaded without errors
        if (isset($_FILES['resume']) && $_FILES['resume']['error'] === UPLOAD_ERR_OK) {
            // Check if the file is a PDF
            $fileType = strtolower(pathinfo($_FILES['resume']['name'], PATHINFO_EXTENSION));
            if ($fileType == 'pdf') {
                // Move uploaded file to desired location
                $targetDir = "Resume/";
                $targetFile = $targetDir . basename($_FILES['resume']['name']);
                if (move_uploaded_file($_FILES['resume']['tmp_name'], $targetFile)) {
                    echo "Resume uploaded successfully.";
                    // Process other form data here
                    // Example: $certification = $_POST['certification'];
                    //          $education = $_POST['education'];
                    //          $experience = $_POST['experience'];
                    //          $skills = $_POST['skills'];
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            } else {
                echo "Only PDF files are allowed.";
            }
        } else {
            echo "No file uploaded or an error occurred while uploading.";
        }
    } else {
        echo "All fields are required.";
    }
} else {
    echo "Form not submitted.";
}
?>
