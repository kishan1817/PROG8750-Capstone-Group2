<?php
include ('include/head.php');
    include ('include/header.php');
require('include/config.php'); // Include your DB configuration

if (isset($_GET['job_id']) && isset($_SESSION['User_id'])) {
    $job_id = $_GET['job_id'];
    $user_id = $_SESSION['User_id'];

    // Insert into database
    $stmt = $dbconnection->prepare("INSERT INTO tbl_saved_jobs (user_id, job_id) VALUES (?, ?)");
    $stmt->bind_param("ii", $user_id, $job_id);
    $stmt->execute();

    if ($stmt->affected_rows === 1) {
        // Redirect back to joblist or to a confirmation page
        header("Location: joblist.php?status=success");
        $type = "success";
            $msg = "Saved Successfully";
            print_r("<script>swal({ title:\"Job Nest\", text: '".$msg."', icon: \"".$type."\"});</script>");
    } else {
        // Handle errors, e.g., job already saved
        header("Location: joblist.php?status=error");
        $type = "error";
            $msg = "job already saved";
            print_r("<script>swal({ title:\"Job Nest\", text: '".$msg."', icon: \"".$type."\"});</script>");
    }
} else {
    // Redirect or error message if job_id or user_id are not set
    header("Location: joblist.php?status=unauthorized");
    $type = "error";
            $msg = "unauthorized user";
            print_r("<script>swal({ title:\"Job Nest\", text: '".$msg."', icon: \"".$type."\"});</script>");
}
?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>