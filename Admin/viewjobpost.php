<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Job Post Details</title>
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
        .job-post-details {
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
    <?php
    // Include configuration file
    require '../include/config.php';

    // Get job_id from GET request
    $job_id = isset($_GET['job_id']) ? intval($_GET['job_id']) : 0;

    // SQL to fetch data from tbl_jobs
    $sql = "SELECT * FROM tbl_jobs WHERE Job_id = ?";
    $stmt = $dbconnection->prepare($sql);
    $stmt->bind_param("i", $job_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "<p>No details available for this job post.</p>";
        $dbconnection->close();
        exit;
    }
    $dbconnection->close();
    ?>

    <h2>Job Post Details</h2>
    <div class="job-post-details">
        <div class="job-card">
            <h5><?php echo htmlspecialchars($row['Title']); ?></h5>
            <p><strong>Company:</strong> <?php echo htmlspecialchars($row['Company']); ?></p>
            <p><strong>Description:</strong> <?php echo htmlspecialchars($row['Description']); ?></p>
            <p><strong>Location:</strong> <?php echo htmlspecialchars($row['Location']); ?></p>
            <p><strong>Salary:</strong> <?php echo htmlspecialchars($row['Salary']); ?></p>
            <p><strong>Industry:</strong> <?php echo htmlspecialchars($row['Industry']); ?></p>
            <p><strong>Job Type:</strong> <?php echo htmlspecialchars($row['Job_type']); ?></p>
            <p><strong>Job Level:</strong> <?php echo htmlspecialchars($row['Job_level']); ?></p>
            <p><strong>Experience:</strong> <?php echo htmlspecialchars($row['Experience']); ?> years</p>
            <p><strong>Deadline:</strong> <?php echo htmlspecialchars($row['Deadline']); ?></p>
            <p><strong>Posted at:</strong> <?php echo htmlspecialchars($row['Posted_at']); ?></p>
            <p><strong>Status:</strong> <?php echo $row['Status'] ? 'Active' : 'Inactive'; ?></p>
        </div>
    </div>
</div>
</body>
</html>
