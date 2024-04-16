<?php
include('include/head.php');
include('include/header.php');
require_once 'include/config.php';

// Check if the user is logged in and the request is coming from an AJAX call with POST method
if (!isset($_SESSION["User_id"]) || $_SERVER['REQUEST_METHOD'] !== 'POST') {
    // Unauthorized access response
    echo json_encode(['success' => false, 'message' => 'Unauthorized access']);
    exit;
}

// Extract user_id from session
$user_id = $_SESSION["User_id"];

// Check if job_id is provided in the POST request
if (isset($_POST['job_id'])) {
    $jobId = intval($_POST['job_id']);
    $stmt = $dbconnection->prepare("DELETE FROM tbl_jobs WHERE job_id = ? AND user_id = ?");
    $stmt->bind_param("ii", $jobId, $user_id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo json_encode(['success' => true, 'message' => 'Job post successfully deleted.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to delete job post or post not found.']);
    }
    $stmt->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Job ID not provided.']);
}
?>

