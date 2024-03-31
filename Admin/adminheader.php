<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: adminlogin.php');
    exit;
}
require '../include/config.php';
?>

<nav class="nav-bar">
    <div class="icon-nav">
    <a href="admindashboard.php">  <span class="logo"><img src="../dist/images/logo.png" alt="Logo" height="50px" width="160px"></span></a>
    </div>

    <ul class="list-nav-bar active">
        <li class="list-item"><a href="admindashboard.php">Home</a></li>
        <li class="list-item"><a href="adminlogout.php">Logout</a></li>
    </ul>
    <div class="fas burger-menu" id="burger-menu">&#9776;</div>
</nav>
<div class="container">
    <a href="manageemployer.php" class="card">
        <span class="h4">Manage Employer</span>
    </a>
    <a href="manageuser.php" class="card">
        <span class="h4">Manage User</span>
    </a>
    <a href="deletejobs.php" class="card">
        <span class="h4">Manage Jobs</span>
    </a>
</div>