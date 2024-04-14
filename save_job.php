<?php
session_start();
require 'include/config.php'; // Adjust the path as necessary to your configuration file

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['save_job'])) {
    $User_id = $_POST['User_id'];
    $job_id = $_POST['job_id'];

    // SQL to insert the saved job
    $sql = "INSERT INTO saved_jobs (user_id, job_id) VALUES (?, ?)";

    if($stmt = $dbconnection->prepare($sql)){
        $stmt->bind_param("ii", $User_id, $job_id);

        if($stmt->execute()){
            // Redirect back to joblist or to the profile page with a success message
            header("Location: joblist.php?save=success");
            exit();
        } else{
            echo "Error saving the job. Please try again.";
        }
    }

    $stmt->close();
    $dbconnection->close();
} else {
    // Redirect to joblist.php if the form wasn't submitted correctly
    header("Location: joblist.php");
    exit();
}
?>
