<?php
$title = "Home Page";
include('include/head.php');
include('include/header.php');
require_once 'include/config.php';
require "Mail/phpmailer/PHPMailerAutoload.php";

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
    $status = $action;

    // Update application status
    $stmt = $dbconnection->prepare("UPDATE tbl_application SET status = ? WHERE application_id = ?");
        if (!$stmt) {
            die('Prepare failed: ' . $dbconnection->error);
        }
        $stmt->bind_param("si", $status, $application_id);
        if (!$stmt->execute()) {
            die('Execute failed: ' . $stmt->error);
        }
    $stmt->close();


    // Fetch email address from tbl_users
    $stmt = $dbconnection->prepare("SELECT Email FROM tbl_users WHERE User_id = (SELECT User_id FROM tbl_application WHERE Application_id = ?)");
    $stmt->bind_param("i", $application_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($row = $result->fetch_assoc()) {
        $email = $row['Email'];
        $token = bin2hex(random_bytes(50));

        //session_start ();
        $_SESSION['token'] = $token;
        $_SESSION['email'] = $email;
        // Send email to the applicant
        $mail = new PHPMailer;
            $mail->SMTPDebug = 2;
            $mail->isSMTP();
            $mail->Host='smtp.gmail.com';
            $mail->Port=587;
            $mail->SMTPAuth=true;
            $mail->SMTPSecure='tls';

            // h-hotel account
            $mail->Username='18bmiit067@gmail.com';
            $mail->Password='ylhd gqfr kjvd geev';


        $mail->setFrom('18bmiit067@gmail.com', 'No Reply');
        $mail->addAddress($email); 

        $mail->isHTML(true); 

        if ($action == 'Accept') {
            $mail->Subject = 'Congratulations! Your Job Application has been Accepted';
            $mail->Body = '<p>Your job application has been accepted. We are delighted to offer you the position.</p>
            <p>We believe that you will be a valuable addition to our team and we look forward to working with you.</p>
            <p>Please let us know if you have any questions or need further information.</p>';
        } else {
            $mail->Subject = 'Update on Your Job Application';
            $mail->Body = '<p>Thank you for your interest in the position. After careful consideration, we have decided not to move forward with your application at this time.</p>
            <p>We appreciate the time you took to apply and wish you the best of luck in your job search.</p>';
        }

        if($mail->send()){
            ?>
                <script>
                    window.location.replace("notification.html");
                   
                </script>
            <?php
        }else{
            ?>
                <script>
                     alert("<?php echo " Invalid Email "?>");
                </script>
            <?php
        }
    }
}

$query = "SELECT CONCAT(u.first_name, ' ', u.last_name) AS full_name, u.phone, a.Application_id, a.Resume, j.Title, a.status
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
                    <th>Status / Action</th>
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
                        <?php if ($row['status'] == 'Pending'): ?>
                            <form method="post" action="">
                                <input type="hidden" name="application_id" value="<?php echo $row['Application_id']; ?>">
                                <button type="submit" name="action" value="Accept" class="btn btn-success">Accept</button>
                                <button type="submit" name="action" value="Reject" class="btn btn-danger">Reject</button>
                            </form>
                        <?php else: ?>
                        <?php
                        if ($row['status'] == 'Accept') {
                            echo 'Accepted';
                        } elseif ($row['status'] == 'Reject') {
                            echo 'Rejected';
                        } else {
                            echo htmlspecialchars($row['status']); 
                        }
                        ?>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</main>
<?php
    include('include/footer.php');
    include('include/script.php');
?>
</body>
</html>
