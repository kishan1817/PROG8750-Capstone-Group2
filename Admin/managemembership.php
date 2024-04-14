<?php include 'adminheader.php'; 

// Check if the toggle_status button was clicked
if (isset($_POST['toggle_status'])) {
    $membershipId = $_POST['membership_id'];
    $currentStatus = $_POST['current_status'];
    $newStatus = $currentStatus ? 0 : 1; // Toggle the status

    // SQL to update the status
    $sql = "UPDATE tbl_membership SET Status = ? WHERE Membership_id = ?";
    $stmt = $dbconnection->prepare($sql);
    $stmt->bind_param("ii", $newStatus, $membershipId);
    $stmt->execute();
    $stmt->close();

    // Refresh the page to reflect changes
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// SQL query to fetch all memberships
$sql = "SELECT Membership_id, Name, Description, Price, Status FROM tbl_membership";
$result = $dbconnection->query($sql);

$memberships = []; // Initialize an empty array to store membership data

// Check if there are any results
if ($result->num_rows > 0) {
    // Output data of each row into the array
    while($row = $result->fetch_assoc()) {
        $memberships[] = $row;
    }
} else {
    echo "<h2>No memberships added<h2>";
}
$dbconnection->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css');
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins','Open Sans',Arial;
        }

        body {
            min-height: 100vh;
            background-size: cover;
            background-position: center;
        }

        .nav-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 25px 1.5rem;
            height: 60px;
            background-color: rgba(8, 28, 138, 0.72);
        }

        .logo {
            color: aliceblue;
            font-weight: bold;
            text-transform: uppercase;
            font-size: 1.25rem;
            margin-left: 8px;
            margin-top: 80px;
            cursor: pointer;
        }

        .list-nav-bar {
            list-style: none;
            text-transform: uppercase;
            display: flex;
            gap: 20px;
        }

        .list-item a {
            cursor: pointer;
            font-size: 1.25rem;
            text-decoration: none;
            color: #000000;
            text-align: center;
            margin-left: 0.5rem;
            letter-spacing: 0.1rem;
        }

        .list-item a:hover {
            color: #ffffff;
        }

        .burger-menu {
            display: none;
        }

        @media screen and (max-width: 578px) {
            .list-item a {
                font-size: 1rem;
            }
            .list-nav-bar.active {
                right: 0;
            }
            .list-nav-bar {
                display: flex;
                position: fixed;
                right: -100%;
                top: 60px;
                width: 35%;
                background-color: rgba(8, 28, 138, 0.72);
                text-align: center;
                flex-direction: column;
                transition: 0.7s;
                gap: 18px;
                border-radius: 0 0 10px 10px;
            }
            .burger-menu {
                display: block;
                cursor: pointer;
            }
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
            padding: 15px;
        }

        .card {
            height: 10em;
            width: 20.75em;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            background-color: rgba(8, 28, 138, 0.72);
            color: #ffffff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.5);
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.5);
        }
        .card:hover .h4 {
            color: #ffffff;
        }

        .h4 {
            font-size: 1.25rem;
            margin-bottom: 0.5rem;
        }

        p {
            font-size: 1rem;
        }
        .table-container {
            width: 100%;
            overflow-x: auto;
            margin-top: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: center;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        td button {
            margin-right: 5px;
            cursor: pointer;
        }
        h2 {
            text-align: center;
            margin-top: 20px; 
        }
    </style>
</head>
<body>
<div class="container">

    <h2> Manage Membership</h2>
    <div class="table-container">
    <div style="text-align: right; margin-bottom: 20px;">
        <a href="addmembership.php" class="btn btn-primary">Add Membership</a>
    </div>
    <table>
        <thead>
            <tr>
                <th>Membership Id</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Current Status</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($memberships as $membership): ?>
            <tr>
            <td><?php echo htmlspecialchars($membership['Membership_id']); ?></td>
            <td><?php echo htmlspecialchars($membership['Name']); ?></td>
            <td><?php echo htmlspecialchars($membership['Description']); ?></td>
            <td>$<?php echo htmlspecialchars($membership['Price']); ?></td>
            <td><form method="post" action="">
                        <input type="hidden" name="membership_id" value="<?php echo $membership['Membership_id']; ?>">
                        <input type="hidden" name="current_status" value="<?php echo $membership['Status']; ?>">
                        <center>
                            <button type="submit" class="btn <?php echo $membership['Status'] ? 'btn-success' : 'btn-danger'; ?>" name="toggle_status">
                                <?php echo $membership['Status'] ? 'Active' : 'Inactive'; ?>
                            </button>
                        </center>
                </form>
            </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
