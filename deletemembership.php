<?php
include('include/head.php');
include('include/header.php');
require_once 'include/config.php';

if (!isset($_SESSION["User_id"])) {
    header("Location: signin.php");
    exit;
}

$user_id = $_SESSION["User_id"];

if (isset($_POST['delete_membership'])) {
    $sql = "DELETE FROM tbl_users_membership WHERE User_id = ?";
    $stmt = $dbconnection->prepare($sql);

    if ($stmt === false) {
        die("Failed to prepare statement");
    }

    $stmt->bind_param("i", $user_id);
    $success = $stmt->execute();
    $affected_rows = $dbconnection->affected_rows; // Store affected_rows before closing the statement
    $stmt->close();

    // Preparing message and alert type
    if ($success && $affected_rows > 0) {
        $message = "Membership deleted successfully.";
        $alertType = "success";
    } else if ($success && $affected_rows == 0) {
        $message = "Failed to delete membership or no membership found.";
        $alertType = "error";
    } else {
        $message = "An error occurred.";
        $alertType = "error";
    }

    // Output SweetAlert2 script
    echo "<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@11'>";
    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
    echo "<script>
            Swal.fire({
                title: '" . addslashes($message) . "',
                icon: '" . $alertType . "',
                confirmButtonColor: '#05264E',
                confirmButtonText: 'OK',
            }).then((result) => {
                window.location.href = 'mymembership.php';
            });
          </script>";
}
?>
<?php include('include/footer.php'); ?>
<?php include('include/script.php'); ?>
