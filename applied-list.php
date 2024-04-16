<?php
$title = "Home Page";
include('include/head.php');
include('include/header.php');
require_once 'include/config.php';

// Check if the user is logged in, if not then redirect to login page
if (!isset($_SESSION["User_id"])) {
    header("Location: signin.php");
    exit;
}

$user_id = $_SESSION["User_id"];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'], $_POST['application_id'])) {
    // Handle form submission for accepting or rejecting an application
    $application_id = $_POST['application_id'];
    $action = $_POST['action'];
    $status = ($action == 'Accept') ? 'Accepted' : 'Rejected';

    $stmt = $dbconnection->prepare("UPDATE tbl_application SET status = ? WHERE application_id = ?");
    $stmt->bind_param("si", $status, $application_id);
    $stmt->execute();
    $stmt->close();
}

// Fetch applications related to jobs posted by the logged-in employer
$query = "SELECT CONCAT(u.first_name, ' ', u.last_name) AS full_name, u.phone, a.Application_id, a.Resume, j.Title
          FROM tbl_users u
          JOIN tbl_application a ON u.user_id = a.user_id
          JOIN tbl_jobs j ON j.job_id = a.job_id
          WHERE j.user_id = ?";

$stmt = $dbconnection->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>
<main class="main">
    <div class="container">
        <h3 class="mt-0 mb-15 color-brand-1">Applied List</h3>
        <table class="table table-striped table-bordered table-hover">
            <thead class="thead-dark">
                <tr class="text-center">
                    <th>Applicant Name</th>
                    <th>Phone Number</th>
                    <th>Job Title</th>
                    <th>Resume</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr class="text-center">
                    <td><?php echo htmlspecialchars($row['full_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['phone']); ?></td>
                    <td><?php echo htmlspecialchars($row['Title']); ?></td>
                    <td>
                        <?php if ($row['Resume']): ?>
                            <a href="<?php echo htmlspecialchars($row['Resume']); ?>" download>Download Resume</a>
                        <?php else: ?>
                            No Resume Uploaded
                        <?php endif; ?>
                    </td>
                    <td>
                        <form method="post" action="">
                            <input type="hidden" name="application_id" value="<?php echo $row['Application_id']; ?>">
                            <button type="submit" name="action" value="Accept" class="btn btn-success">Accept</button>
                            <button type="submit" name="action" value="Reject" class="btn btn-danger">Reject</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</main>
<?php
    include ('include/footer.php');
    include ('include/script.php');
?>
</body>
</html>
