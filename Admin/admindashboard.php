<?php include 'adminheader.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> 
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
            height: 5em;
            width: 21.75em;
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
            cursor: pointer;
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
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        td button {
            margin-right: 5px;
            cursor: pointer;
        }
        canvas {
            max-width: 800px;
        }
        h2 {
        text-align: center;
        margin-top: 20px; 
        }

        .chart-container {
            width: 70%; /* Adjust the width as needed */
            margin: 0 auto;
            text-align: center;
        }

        canvas {
            max-width: 100%; /* Adjust the maximum width as needed */
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> 
 
</head>
<body>
<div class="container">
    <!-- Dynamic data display -->
    <div class="row">
        <?php
        // Include configuration file
        require '../include/config.php';

        // Count total applications
        $sql = "SELECT COUNT(*) AS total_applications FROM tbl_application";
        $result = $dbconnection->query($sql);
        $row = $result->fetch_assoc();
        $total_applications = $row['total_applications'];

        // Count total job seekers
        $sql = "SELECT COUNT(*) AS total_job_seekers FROM tbl_users WHERE User = 'job seeker'";
        $result = $dbconnection->query($sql);
        $row = $result->fetch_assoc();
        $total_job_seekers = $row['total_job_seekers'];

        // Count total employers
        $sql = "SELECT COUNT(*) AS total_employers FROM tbl_users WHERE User = 'employer'";
        $result = $dbconnection->query($sql);
        $row = $result->fetch_assoc();
        $total_employers = $row['total_employers'];

        // Count total job posts
        $sql = "SELECT COUNT(*) AS total_job_posts FROM tbl_jobs";
        $result = $dbconnection->query($sql);
        $row = $result->fetch_assoc();
        $total_job_posts = $row['total_job_posts'];

        // Count total memberships
        $sql = "SELECT COUNT(*) AS total_memberships FROM tbl_membership";
        $result = $dbconnection->query($sql);
        $row = $result->fetch_assoc();
        $total_memberships = $row['total_memberships'];

        // Count total companies
        $sql = "SELECT COUNT(DISTINCT Company) AS total_companies FROM tbl_jobs";
        $result = $dbconnection->query($sql);
        $row = $result->fetch_assoc();
        $total_companies = $row['total_companies'];

        // Close DB connection
        $dbconnection->close();
        ?>
    </div>
</div>


<div class="chart-container">
    <canvas id="myChart"></canvas>
</div>

<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Total Applications', 'Total Job Seekers', 'Total Employers', 'Total Job Posts', 'Total Memberships', 'Total Companies'],
            datasets: [{
                label: 'Statistics',
                data: [<?php echo $total_applications; ?>, <?php echo $total_job_seekers; ?>, <?php echo $total_employers; ?>, <?php echo $total_job_posts; ?>, <?php echo $total_memberships; ?>, <?php echo $total_companies; ?>],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
    
</script>

</script>
</body>
</html>
