<?php
require '../include/config.php';
// Get user_id from GET request
$user_id = isset($_GET['user_id']) ? intval($_GET['user_id']) : 0;

// SQL to fetch employer and their job postings
$sql = "SELECT u.User_id, u.First_Name, u.Last_Name, u.Email, u.Phone, u.User, u.Status,
               j.Job_id, j.Company, j.Title, j.Description, j.Location, j.Salary, j.Industry, j.Job_type, j.Job_level, j.Experience, j.Deadline, j.Posted_at, j.Status AS JobStatus
        FROM tbl_users u
        LEFT JOIN tbl_jobs j ON u.User_id = j.User_id
        WHERE u.User_id = ? AND u.User = 'employer'";

$stmt = $dbconnection->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$employerDetails = null;
$jobs = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        if (!$employerDetails) { // Only set this once
            $employerDetails = [
                'User_id' => $row['User_id'],
                'First_Name' => $row['First_Name'],
                'Last_Name' => $row['Last_Name'],
                'Email' => $row['Email'],
                'Phone' => $row['Phone'],
                'Status' => $row['Status']
            ];
        }
        if ($row['Job_id']) { // Check if there's a job associated
            $jobs[] = $row;
        }
    }
} else {
    echo "<p>No details available for this employer.</p>";
    exit; // Exit script if no data is found
}

$dbconnection->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Employer Details</title>
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
        .job-posts {
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
    <?php if ($employerDetails): ?>
    <h2>Employer Details</h2>
    <div>
        <h4><?php echo htmlspecialchars($employerDetails['First_Name']) . ' ' . htmlspecialchars($employerDetails['Last_Name']); ?></h4>
        <p>Email: <?php echo htmlspecialchars($employerDetails['Email']); ?></p>
        <p>Phone: <?php echo htmlspecialchars($employerDetails['Phone']); ?></p>
        <p>Status: <?php echo $employerDetails['Status'] ? 'Active' : 'Inactive'; ?></p>
    </div>
    <?php endif; ?>

    <?php if (!empty($jobs)): ?>
    <h3>Job Postings by this Employer</h3>
    <div class="job-posts">
        <?php foreach ($jobs as $job): ?>
            <div class="job-card">
                <h5><?php echo htmlspecialchars($job['Title']); ?></h5>
                <p>Company: <?php echo htmlspecialchars($job['Company']); ?></p>
                <p>Location: <?php echo htmlspecialchars($job['Location']); ?></p>
                <p>Industry: <?php echo htmlspecialchars($job['Industry']); ?></p>
                <p>Type: <?php echo htmlspecialchars($job['Job_type']); ?>, Level: <?php echo htmlspecialchars($job['Job_level']); ?></p>
                <p>Deadline: <?php echo htmlspecialchars($job['Deadline']); ?></p>
                <p>Status: <?php echo $job['JobStatus'] ? 'Active' : 'Inactive'; ?></p>
            </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
</div>
</body>
</html>
