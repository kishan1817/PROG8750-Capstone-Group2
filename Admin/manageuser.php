<!DOCTYPE html>
<html>
<head>
    <title>Admin Login Page</title>
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        main {
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100vh;
        }

        .logo-container {
            margin-bottom: 40px;
            margin-top: 30px;
        }

        .logo-container img {
            display: block;
            margin: 0 auto;
        }

        .nav-tabs {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: center;
            background-color: #f2f2f2;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .nav-item {
            margin: 0;
        }

        .nav-link {
            padding: 10px 20px;
            text-decoration: none;
            color: #333;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .nav-link:hover {
            background-color: #ddd;
        }

        .nav-link.active {
            background-color: #007bff;
            color: #fff;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        h3 {
            text-align: center;
        }

        .delete-button {
            background-color: #ff0000;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 5px 10px;
            cursor: pointer;
        }

        .delete-button:hover {
            background-color: #cc0000;
        }

        .logout-container {
            text-align: center;
            margin-top: 20px;
        }

        .logout-button {
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }

        .logout-button:hover {
            background-color: #218838;
        }
    </style>
    <link href="dist/css/style.css" rel="stylesheet">
</head>
<body>
<main>
    <div class="logo-container">
        <img src="../dist/images/logo.png" alt="jobnest" width="170" height="100">
    </div>
    <ul class="nav-tabs">
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="../Admin/admin-pannel.php">Manage Employers</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="../Admin/manageuser.php">Manage Users</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="../Admin/deletejob.php">Manage Jobs</a>
        </li>
    </ul>

    <div class="tab-content mt-3">
        <div id="manage-employers" class="container tab-pane">
            <h3>Manage Users</h3>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>ABC</td>
                        <td><button class="delete-button">Delete</button></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>ABC</td>
                        <td><button class="delete-button">Delete</button></td>
                    </tr>
                </tbody>
            </table>
            <div class="logout-container">
                <button class="logout-button">Logout</button>
            </div>
        </div>
    </div>
</main>
</body>
</html>
