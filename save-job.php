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

// Handle delete action
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_job_id'])) {
    $delete_job_id = $_POST['delete_job_id'];
    $stmt = $dbconnection->prepare("DELETE FROM tbl_saved_jobs WHERE job_id = ? AND user_id = ?");
    $stmt->bind_param("ii", $delete_job_id, $user_id);
    $stmt->execute();
    if ($stmt->affected_rows > 0) {
        $type = "success";
          $msg = "Job deleted successfully";
          print_r("<script>swal({ title:\"Job Nest\", text: '".$msg."', icon: \"".$type."\"});</script>");
    } else {
        $type = "error";
          $msg = "Job delete error";
          print_r("<script>swal({ title:\"Job Nest\", text: '".$msg."', icon: \"".$type."\"});</script>");
    }
    $stmt->close();
}

// Prepare and execute the SQL query safely
$query = "SELECT j.*, sj.saved_on FROM tbl_jobs j
          JOIN tbl_saved_jobs sj ON j.Job_id = sj.job_id
          WHERE j.Status=1 AND sj.user_id=?
          ORDER BY sj.saved_on DESC";

if ($stmt = $dbconnection->prepare($query)) {
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $jobCount = 0;
    ?>
<main class="main">
  <div class="container">
    <h3 class="mt-0 mb-15 color-brand-1">Saved Jobs</h3>
  
   <?php if ($result->num_rows > 0) {
        echo '<div class="row">';

        while ($row = $result->fetch_assoc()) {
            $jobCount++;
            ?>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
              <div class="card-grid-2 hover-up">
                  <div class="card-grid-2-image-left">
                      <div class="image-box"><img src="<?php echo htmlspecialchars($row['Logo']); ?>" alt="<?php echo htmlspecialchars($row['Company']); ?>"></div>
                      <div class="right-info">
                          <a class='name-job' href='jobdetails.php?job_id=<?php echo htmlspecialchars($row['Job_id']); ?>'><?php echo htmlspecialchars($row['Company']); ?></a>
                          <span class="location-small"><?php echo htmlspecialchars($row['Location']); ?></span>
                      </div>
                  </div>
                  <div class="card-block-info">
                      <h6><a href='job-details.php'><?php echo htmlspecialchars($row['Title']); ?></a></h6>
                      <div class="mt-5">
                          <span class="card-briefcase"><?php echo htmlspecialchars($row['Job_type']); ?></span>
                          <span class="card-time"><?php echo date('Y-m-d', strtotime($row['saved_on'])); ?></span>
                      </div>
                      <p class="font-sm color-text-paragraph mt-15"><?php echo htmlspecialchars($row['Description']); ?></p>
                      <div class="card-2-bottom mt-30">
                          <div class="row">
                              <div class="col-lg-7 col-7">
                                  <span class="card-text-price">$<?php echo htmlspecialchars($row['Salary']); ?></span>
                                  <span class="text-muted">/Hour</span>
                              </div>
                              <div class="col-lg-5 col-5 text-end">
                                  <form method="POST" action="">
                                      <input type="hidden" name="delete_job_id" value="<?php echo $row['Job_id']; ?>">
                                      <button type="submit" class="btn btn-danger text-light">Delete</button>
                                  </form>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
            <?php
            if ($jobCount % 3 == 0) {
                echo '</div><div class="row">';
            }
        }
        if ($jobCount % 3 != 0) {
            echo '</div>';
        }
    } else {
        echo '<p>No job postings saved at the moment.</p>';
    }
    $stmt->close();
} else {
    echo "Error preparing query: " . $dbconnection->error;
}
?>
<div class="paginations">
  <ul class="pager">
    <li><a class="pager-prev" href="#"></a></li>
    <li><a class="pager-number" href="#">1</a></li>
    <li><a class="pager-number" href="#">2</a></li>
    <li><a class="pager-number" href="#">3</a></li>
    <li><a class="pager-number" href="#">4</a></li>
    <li><a class="pager-number" href="#">5</a></li>
    <li><a class="pager-number active" href="#">6</a></li>
    <li><a class="pager-number" href="#">7</a></li>
    <li><a class="pager-next" href="#"></a></li>
  </ul>
</div>
</div>
</main>
<?php
include ('include/footer.php');
include ('include/script.php');
?>
</body>
</html>
