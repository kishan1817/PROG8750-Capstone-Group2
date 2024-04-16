<?php
require '../include/config.php';

// Get user_id from GET request
$user_id = isset($_GET['user_id']) ? intval($_GET['user_id']) : 0;

// SQL to fetch data from tbl_users
$sql = "SELECT u.User_id, u.First_Name, u.Last_Name, u.Email, u.Phone, u.Status,
               a.Application_id, a.Job_id, a.Cover_Letter, a.Resume, a.Applied_at
        FROM tbl_users u
        LEFT JOIN tbl_application a ON u.User_id = a.User_id
        WHERE u.User_id = ?";
$stmt = $dbconnection->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "<p>No details available for this user.</p>";
    $dbconnection->close();
    exit;
}
$dbconnection->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Job Seeker Application Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            padding: 20px;
            font-family: 'Arial', sans-serif;
        }
        .container {
            max-width: 800px; 
            margin: auto;
            background-color: #f4f4f4;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        h2, h3 {
            color: #333;
            text-align: center;
        }
        .job-application-details {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around; 
            gap: 10px; 
        }
        .job-card {
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            width: 48%; 
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .job-card h5 {
            color: #0056b3; 
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Job Seeker Application Details</h2>
    <p><strong>User ID:</strong> <?php echo htmlspecialchars($row['User_id']); ?></p>
    <p><strong>Name:</strong> <?php echo htmlspecialchars($row['First_Name']) . ' ' . htmlspecialchars($row['Last_Name']); ?></p>
    <p><strong>Email:</strong> <?php echo htmlspecialchars($row['Email']); ?></p>
    <p><strong>Phone:</strong> <?php echo htmlspecialchars($row['Phone']); ?></p>
    <p><strong>Status:</strong> <?php echo $row['Status'] ? 'Active' : 'Inactive'; ?></p>
    <?php if ($row['Application_id']): ?>
        <h3>Job Application Details</h3>
        <div class="job-application-details">
            <?php foreach ($result as $application): ?>
                <div class="job-card">
                    <p><strong>Job ID:</strong> <?php echo htmlspecialchars($application['Job_id']); ?></p>
                    <p><strong>Cover Letter:</strong> <?php echo htmlspecialchars($application['Cover_Letter']); ?></p>
                    <p><strong>Applied at:</strong> <?php echo htmlspecialchars($application['Applied_at']); ?></p>
                    <p><strong>Resume:</strong> <?php echo htmlspecialchars($application['Resume']); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p>No job applications found for this user.</p>
    <?php endif; ?>
</div>
</body>
</html>



