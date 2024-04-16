<?php
require '../include/config.php';

if(isset($_POST['membership_id'])) {
    $membershipId = $_POST['membership_id'];

    $sql = "DELETE FROM tbl_membership WHERE Membership_id = ?";
    $stmt = $dbconnection->prepare($sql);
    $stmt->bind_param("i", $membershipId);
    if($stmt->execute()) {
        echo 'ok';
    } else {
        echo 'error';
    }
    $stmt->close();
    $dbconnection->close();
}
?>
