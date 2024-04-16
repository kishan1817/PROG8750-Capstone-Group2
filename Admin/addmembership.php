<?php
//include 'adminheader.php'; 
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: adminlogin.php');
    exit;
}
require '../include/config.php';

$membershipId = isset($_GET['membership_id']) ? $_GET['membership_id'] : null;
$isUpdating = $membershipId !== null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $status = $_POST['status'];

    if ($isUpdating) {
        $sql = "UPDATE tbl_membership SET Name = ?, Description = ?, Price = ?, Status = ? WHERE Membership_id = ?";
        $stmt = $dbconnection->prepare($sql);
        $stmt->bind_param("ssiii", $name, $description, $price, $status, $membershipId);
    } else {
        $sql = "INSERT INTO tbl_membership (Name, Description, Price, Status) VALUES (?, ?, ?, ?)";
        $stmt = $dbconnection->prepare($sql);
        $stmt->bind_param("ssii", $name, $description, $price, $status);
    }

    if($stmt->execute()) {
        $successMsg = $isUpdating ? 'Membership successfully updated.' : 'Membership successfully added.';
        echo "<script>alert('$successMsg'); window.location.href='managemembership.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $dbconnection->close();
} else {
    if ($isUpdating) {
        $sql = "SELECT Name, Description, Price, Status FROM tbl_membership WHERE Membership_id = ?";
        $stmt = $dbconnection->prepare($sql);
        $stmt->bind_param("i", $membershipId);
        $stmt->execute();
        $stmt->bind_result($name, $description, $price, $status);
        $stmt->fetch();
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $isUpdating ? 'Update' : 'Add'; ?> Membership</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2 class="text-center"><?php echo $isUpdating ? 'Update' : 'Add'; ?> Membership</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?<?php echo $isUpdating ? 'membership_id=' . $membershipId : ''; ?>" method="post">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" required value="<?php echo isset($name) ? $name : ''; ?>">
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description" rows="3" required><?php echo isset($description) ? $description : ''; ?></textarea>
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type of="number" class="form-control" id="price" name="price" step="0.01" min="0" title="Please enter a valid price." required value="<?php echo isset($price) ? $price : ''; ?>">
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <select class="form-control" id="status" name="status">
                <option value="1" <?php echo isset($status) && $status == 1 ? 'selected' : ''; ?>>Active</option>
                <option value="0" <?php echo isset($status) && $status == 0 ? 'selected' : ''; ?>>Inactive</option>
            </select>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary"><?php echo $isUpdating ? 'Update' : 'Submit'; ?></button>
        </div>
    </form>
</div>
</body>
</html>
