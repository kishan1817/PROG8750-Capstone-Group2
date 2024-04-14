<?php 
//include 'adminheader.php'; 
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: adminlogin.php');
    exit;
}
require '../include/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract the information from the post request
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $status = $_POST['status'];

    // Prepare the SQL statement to insert the data
    $sql = "INSERT INTO tbl_membership (Name, Description, Price, Status) VALUES (?, ?, ?, ?)";

    // Prepare and bind
    $stmt = $dbconnection->prepare($sql);
    $stmt->bind_param("ssii", $name, $description, $price, $status);

    // Execute and check if successful
    if($stmt->execute()) {
        echo "<script>alert('Membership successfully added.'); window.location.href='managemembership.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $dbconnection->error;
    }

    $stmt->close();
    $dbconnection->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Membership</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            width: 100%;
            max-width: 500px; /* Adjust based on your preference */
        }
        .form-group {
            text-align: left;
        }
    </style>
</head>
<body>
<div class="container">
    <h2 class="text-center">Add Membership</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" class="form-control" id="price" name="price" step="0.01" min="0" title="Please enter a valid price." required>
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <select class="form-control" id="status" name="status">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
</body>
</html>
