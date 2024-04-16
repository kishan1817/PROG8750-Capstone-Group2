<?php include 'adminheader.php'; 
// Check if the toggle_status button was clicked
if (isset($_POST['toggle_status'])) {
    $jobId = $_POST['job_id'];
    $currentStatus = $_POST['current_status'];
    $newStatus = $currentStatus ? 0 : 1; // Toggle the status

    // SQL to update the status
    $sql = "UPDATE tbl_jobs SET Status = ? WHERE Job_id = ?";
    $stmt = $dbconnection->prepare($sql);
    $stmt->bind_param("ii", $newStatus, $jobId);
    $stmt->execute();
    $stmt->close();

    // Refresh the page to reflect changes
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
// SQL query to fetch all users
$sql = "SELECT Job_id, Company, Title, User_id, Status FROM tbl_jobs";
$result = $dbconnection->query($sql);

$users = []; // Initialize an empty array to store user data

// Check if there are any results
if ($result->num_rows > 0) {
    // Output data of each row into the array
    while($row = $result->fetch_assoc()) {
        $jobs[] = $row;
    }
} else {
    echo "0 results";
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
    
    <h2> Manage Job Post</h2>
    <div class="table-container">
    <table>
        <thead>
            <tr>
                <th>Job Id</th>
                <th>Company</th>
                <th>Job Title</th>
                <th>User Id</th>
                <th>Current Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($jobs as $job): ?>
            <tr  id="job-<?php echo $job['Job_id']; ?>">
            <td><?php echo htmlspecialchars($job['Job_id']); ?></td>
            <td><?php echo htmlspecialchars($job['Company']); ?></td>
            <td><?php echo htmlspecialchars($job['Title']); ?></td>
            <td><?php echo htmlspecialchars($job['User_id']); ?></td>
            <td><form method="post" action="">
                        <input type="hidden" name="job_id" value="<?php echo $job['Job_id']; ?>">
                        <input type="hidden" name="current_status" value="<?php echo $job['Status']; ?>">
                        <center>
                            <button type="submit" class="btn <?php echo $job['Status'] ? 'btn-success' : 'btn-danger'; ?>" name="toggle_status">
                                <?php echo $job['Status'] ? 'Active' : 'Deactive'; ?>
                            </button>
                        </center>
                </form>
            </td>
            <td>
                <a href="viewjobpost.php?job_id=<?php echo $job['Job_id']; ?>" class="btn btn-info">View Detail</a>
                <button onclick="deleteJobPost(<?php echo $job['Job_id']; ?>);" class="btn btn-danger">Delete</button>
            </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
function deleteJobPost(jobId) {
    if (confirm('Are you sure you want to delete this job post?')) {
        $.ajax({
            url: 'deletejobpost.php',
            type: 'POST',
            dataType: 'json',
            data: {job_id: jobId},
            success: function(response) {
                if (response.status === 'ok') {
                    $('#job-' + jobId).fadeOut(500, function() { $(this).remove(); });
                } else {
                    alert('Error deleting job post: ' + (response.message || 'Unknown error'));
                }
            },
            error: function(xhr, status, error) {
                alert('AJAX request failed: ' + error);
            }
        });
    }
}
</script>

</body>
</html>
