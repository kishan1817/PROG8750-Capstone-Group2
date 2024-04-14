<?php
include('include/head.php');
include('include/header.php');
require_once 'include/config.php'; // Make sure this path is correct



// Fetch all active memberships
$query = "SELECT * FROM tbl_membership WHERE Status = 1 ORDER BY Membership_id DESC";
$result = mysqli_query($dbconnection, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Memberships</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <main class="main">
        <div class="container">
            <h3 class="mt-0 color-brand-1 mb-50">Available Memberships</h3>
            <div class="row">
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                            <div class="card hover-up mb-4">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo htmlspecialchars($row['Name']); ?></h5>
                                    <h6 class="card-subtitle mb-2 text-muted">$<?php echo htmlspecialchars($row['Price']); ?></h6>
                                    <p class="card-text"><?php echo htmlspecialchars($row['Description']); ?></p>
                                    <a href="checkout.php?Membership_id=<?php echo $row['Membership_id']; ?>" class="btn btn-primary">Add Membership</a>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo '<p class="text-center">No memberships available at the moment.</p>';
                }
                ?>
            </div>
        </div>
    </main>
    <?php include ('include/footer.php'); ?>
    <?php include ('include/script.php'); ?>
</body>
</html>
