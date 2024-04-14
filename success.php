<?php
include('include/head.php');
include('include/header.php');
require_once 'include/config.php';
require_once 'vendor/autoload.php';

if (!isset($_SESSION["User_id"]) || !isset($_GET['session_id'])) {
    header('Location: membership.php');
    exit;
}

$user_id = $_SESSION["User_id"];

$stripe_secret_key = "sk_test_51P3iwf01E4zAY5UQvQimu4sBz1nvFlLAAPUIAymNIgMpz4vXfKdhSRBE7Qle88NN59VEOIrRr4lQj0XNZqI0xCnE0044MIchdW";
\Stripe\Stripe::setApiKey($stripe_secret_key);

$message = "An error occurred. Please try again.";
$redirectUrl = "membership.php";
$res = "error";

if (!isset($_SESSION["membership_id"])) {
    $message = "Membership ID missing. Please try again.";
} else {
    $membership_id = $_SESSION["membership_id"];
    $session_id = $_GET['session_id'];

    try {
        $session = \Stripe\Checkout\Session::retrieve($session_id);
        if ($session->payment_status == 'paid') {
            // Check if user already has a membership
            $checkSql = "SELECT Membership_id FROM tbl_users_membership WHERE User_id = ?";
            $checkStmt = $dbconnection->prepare($checkSql);
            $checkStmt->bind_param("i", $user_id);
            $checkStmt->execute();
            $checkResult = $checkStmt->get_result();

            if ($checkResult->num_rows > 0) {
                // User already has a membership, so update it
                $updateSql = "UPDATE tbl_users_membership SET Membership_id = ? WHERE User_id = ?";
                $updateStmt = $dbconnection->prepare($updateSql);
                $updateStmt->bind_param("ii", $membership_id, $user_id);
                $updateStmt->execute();
                $message = "Membership updated successfully.";
            } else {
                // Insert new membership
                $insertSql = "INSERT INTO tbl_users_membership (Membership_id, User_id) VALUES (?, ?)";
                $insertStmt = $dbconnection->prepare($insertSql);
                $insertStmt->bind_param("ii", $membership_id, $user_id);
                $insertStmt->execute();
                $message = "Membership added successfully.";
            }
            $res = "success";
            $redirectUrl = "joblist.php"; // Redirect to job list on success
        }
    } catch (Exception $e) {
        $message = "Error: " . $e->getMessage();
    }
}

// Clear the session variable after use
unset($_SESSION["membership_id"]);
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script>
    swal({
        title: "<?php echo $message; ?>",
        type: "<?php echo $res === 'success' ? 'success' : 'error'; ?>",
        confirmButtonColor: "#05264E",
        confirmButtonText: "OK",
        closeOnConfirm: false
    },
    function(isConfirm){
        if (isConfirm) {
            window.location.href = "<?php echo $redirectUrl; ?>";
        }
    });
</script>

<?php
require_once 'include/footer.php';
require_once 'include/script.php';
?>
