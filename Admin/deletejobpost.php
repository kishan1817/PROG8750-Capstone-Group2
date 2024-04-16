<?php
require '../include/config.php'; // Adjust the path as necessary

if (isset($_POST['job_id'])) {
    $jobId = $_POST['job_id'];
    $sql = "DELETE FROM tbl_jobs WHERE Job_id = ?";

    $stmt = $dbconnection->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("i", $jobId);
        if($stmt->execute()) {
            echo json_encode(['status' => 'ok']);
        } else {
            echo json_encode(['status' => 'error', 'message' => $stmt->error]);
        }
        $stmt->close();
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to prepare the statement']);
    }
    $dbconnection->close();
} else {
    echo json_encode(['status' => 'error', 'message' => 'Job ID not provided']);
}
?>
