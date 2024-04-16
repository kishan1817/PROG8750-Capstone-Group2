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
        $type = "success";
            $msg = "Saved Successfully";
            print_r("<script>swal({ title:\"Job Nest\", text: '".$msg."', icon: \"".$type."\"}).then((value) => {
                  window.location.href = 'joblist.php';
              });</script>");
    } else {
        // Handle errors, e.g., job already saved
        $type = "error";
            $msg = "job already saved";
            print_r("<script>swal({ title:\"Job Nest\", text: '".$msg."', icon: \"".$type."\"}).then((value) => {
                  window.location.href = 'joblist.php';
              });</script>");
    }
} else {
    // Redirect or error message if job_id or user_id are not set
    $type = "error";
            $msg = "unauthorized user";
            print_r("<script>swal({ title:\"Job Nest\", text: '".$msg."', icon: \"".$type."\"}).then((value) => {
                  window.location.href = 'joblist.php';
              });</script>");
}
?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>