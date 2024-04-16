<?php
require '../include/config.php';

header('Content-Type: application/json');

if (isset($_POST['user_id'])) {
    $userId = $_POST['user_id'];
    $sql = "DELETE FROM tbl_users WHERE User_id = ?";

    $stmt = $dbconnection->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("i", $userId);
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
    echo json_encode(['status' => 'error', 'message' => 'User ID not provided']);
}
?>
