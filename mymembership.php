<?php
include('include/head.php');
include('include/header.php');
require_once 'include/config.php'; // Database configuration

if (!isset($_SESSION["User_id"])) {
    header("Location: signin.php"); // Redirect to login page if not logged in
    exit;
}

$user_id = $_SESSION["User_id"];

// Query to fetch the membership details of the logged-in user
$sql = "SELECT tm.Membership_id, tm.Name, tm.Description, tm.Price, tm.Status 
        FROM tbl_membership tm 
        JOIN tbl_users_membership tum ON tm.Membership_id = tum.Membership_id 
        WHERE tum.User_id = ? AND tm.Status = 1";
$stmt = $dbconnection->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    // Redirect to membership page if the user does not have a membership
    header("Location: membership.php");
    exit;
}

$membership = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Membership</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <main class="main">
        <div class="container">
            
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8 col-md-10">
                <center><h3 class="mt-0 color-brand-1 mb-50">My Membership</h3></center>
                    <div class="card hover-up mb-4">
                    
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($membership['Name']); ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted">$<?php echo htmlspecialchars($membership['Price']); ?></h6>
                            <p class="card-text"><?php echo htmlspecialchars($membership['Description']); ?></p>
                            <form method="post" action="deletemembership.php" onsubmit="return confirm('Are you sure you want to delete your membership?');">
                            <a href="membership.php" class="btn btn-primary">Upgrade Membership</a>
                            
                                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                                <button type="submit" name="delete_membership" class="btn btn-danger">Delete Membership</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include ('include/footer.php'); ?>
    <?php include ('include/script.php'); ?>
</body>
</html>
