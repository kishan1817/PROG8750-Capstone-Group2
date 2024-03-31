<?php
session_start(); // Start the session
require '../include/config.php'; // Include your database connection
$loginError = ''; // Initialize login error message

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if($_POST['username'] != "" && $_POST['password'] != ""){
    // Get username and password from form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare SQL statement 
    $stmt = $dbconnection->prepare("SELECT Email, Password FROM tbl_adminlogin WHERE Email = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Verify password
        if ($password == $row['Password']) {
            // Login successful
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            header("Location: admindashboard.php"); // Redirect to a success page
            exit(); // Prevent further execution
        } else {
            // Invalid password
            $loginError = 'Invalid username or password';
        }
    } else {
        // Username doesn't exist
        $loginError = 'Invalid username or password';
    }
    $stmt->close();
    $dbconnection->close();
    }
    else{
        $loginError = 'Please enter Username and Password';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login Page</title>
    <style>
        /* Admin CSS Starts */
        body {
            padding: 0;
            margin: 0;
            background-size: cover;
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100vh;
        }

   
        .logo {
            margin-bottom: 20px;
            margin-top:30px; 
        }

     
        .form {
            font-family: "Roboto", sans-serif;
            position: relative;
            z-index: 1;
            background: #FFFFFF;
            opacity: 99%;
            max-width: 260px;
            margin-top: 20px;
            padding: 10px 45px 30px 45px;
            text-align: center;
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
            border-radius: 10px;
        }

        .form p {
            font-size: 15px;
            padding: 1px;
            text-align: center;
        }

        .form input {
            outline: 0;
            border-radius: 10px;
            background: #F2F2F2;
            width: 100%;
            border: 0;
            margin: 0 0 15px;
            padding: 15px;
            box-sizing: border-box;
            font-size: 14px;
        }

        .form input:hover {
            background-color: #D3F8F9;
            transition: all 1s ease 0s;
        }

        .form input:focus {
            background-color: #D3F8F9;
            transition: all 1s ease 0s;
        }

        .form button {
            text-transform: uppercase;
            outline: 0;
            border-radius: 10px;
            background: rgba(8, 28, 138, 0.72);
            width: 100%;
            border: 0;
            padding: 15px;
            color: #FFFFFF;
            font-size: 14px;
            cursor: pointer;
        }

        .form button:hover, .form button:active, .form button:focus {
            background-color: rgba(8, 28, 138, 0.72);
            transition: all 1s ease 0s;
        }

        .form .message {
            margin: 15px 0 0;
            color: #B3B3B3;
            font-size: 12px;
        }

        .form .message a {
            color: #06C5CF;
            text-decoration: none;
        }

        /* Admin css ends */
    </style>
</head>
<body>
    <div class="logo">
        <img src="../dist/images/logo.png" alt="jobnest" width="170" height="100">
    </div>
    <div class="form">
        <p>Admin Login</p>
        <form id="loginForm" action="#" method="post">
            <input type="text" name="username" placeholder="username" require>
            <input type="password" name="password" placeholder="password" require>
            <button type="submit">Login</button>
        </form>
        <?php if ($loginError): ?>
            <script>alert('<?php echo $loginError; ?>');</script>
        <?php endif; ?>
    </div>
</body>
</html>
