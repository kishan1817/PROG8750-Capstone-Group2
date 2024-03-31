<?php
    $title = "Home Page";
    include ('include/head.php');
    include ('include/header.php');
// Include the database configuration file
include 'include/config.php';

// Initialize message variable

$Job_id = isset($_GET['Job_id']) ? htmlspecialchars($_GET['Job_id']) : '';
if (isset($_GET['Job_id'])) {
    $query = "SELECT * FROM tbl_jobs WHERE Job_id = ?";
    $stmt = $dbconnection->prepare($query);
    $stmt->bind_param("i", $Job_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $job_post = $result->fetch_assoc();
    } else {
        echo "Job post not found";
        exit;
    }
}

$msg = "";
$res = false;

// If the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize input
    $company = $_POST['company'];
    $title = $_POST['title'];
    $description = htmlspecialchars($_POST['description']);
    $location = htmlspecialchars($_POST['location']);
    $salary = floatval($_POST['salary']);
    $industry = htmlspecialchars($_POST['industry']);
    $job_type = htmlspecialchars($_POST['job_type']);
    $job_level = htmlspecialchars($_POST['job_level']);
    $experience = intval($_POST['experience']);
    $deadline = htmlspecialchars($_POST['deadline']);
    // Assuming $posted_at is the current date
    $posted_at = date('Y-m-d');
    // Get user_id from session
    $user_id = $_SESSION['User_id'];
    $satus = 1;
    

    // Validate required fields
    if (empty($company) || empty($title) || empty($description) || empty($location) || empty($salary) || empty($industry) || empty($job_type) || empty($job_level) || empty($experience) || empty($deadline)) {
        $msg = "Please fill in all required fields.";
    } elseif (isset($_POST['Job_id']) && !empty($_POST['Job_id']))  {
        
        $targetDir = "StoredImages/";
        $fileName = basename($_FILES["logo"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        // Attempt to upload file
        if(move_uploaded_file($_FILES["logo"]["tmp_name"], $targetFilePath)){
            // Prepare the update query including the Logo path
            $update_query = "UPDATE tbl_jobs SET Company = ?, Logo = ?, Title = ?, Description = ?, Location = ?, Salary = ?, Industry = ?, Job_type = ?, Job_level = ?, Experience = ?, Deadline = ?, Posted_at = ? WHERE Job_id = ?";
            $update_stmt = $dbconnection->prepare($update_query);
            // Bind parameters
            $update_stmt->bind_param("sssssdsssissi", $company, $targetFilePath, $title, $description, $location, $salary, $industry, $job_type, $job_level, $experience, $deadline, $posted_at, $Job_id);

            // Execute the statement
            if ($update_stmt->execute()) {
                $msg = "Job post updated successfully.";
                $res = true;
            } else {
                $msg = "Error updating record: " . $dbconnection->error;
            }
        } else {
            // Handle failed upload
            $msg = "There was an error uploading the Image.";
        }
        //echo $msg;
    } 
    else {
        // Handle file upload for logo
        if (isset($_FILES['logo']['name']) && $_FILES['logo']['error'] == 0) {
            $targetDir = "StoredImages/";
            $fileName = basename($_FILES["logo"]["name"]);
            $targetFilePath = $targetDir . $fileName;
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

            // Allow certain file formats
            $allowTypes = array('jpg','png','jpeg','gif');
            if (in_array($fileType, $allowTypes)) {
                // Upload file to server
                if (move_uploaded_file($_FILES["logo"]["tmp_name"], $targetFilePath)) {
                    // Insert into database
                    $stmt = $dbconnection->prepare("INSERT INTO tbl_jobs (Company, Logo, Title, Description, Location, Salary, Industry, Job_type, Job_level, Experience, Deadline, Posted_at, User_id, Status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,1)");
                    $stmt->bind_param("sssssdsssissi", $company, $targetFilePath, $title, $description, $location, $salary, $industry, $job_type, $job_level, $experience, $deadline, $posted_at, $user_id);

                    if ($stmt->execute()) {
                        $msg = "Job posted successfully.";
                        $res = true;
                    } else {
                        $msg = "Error in posting job.";

                    }
                } else {
                    $msg = "Sorry, there was an error uploading your file.";
                }
            } else {
                $msg = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            }
        } else {
            $msg = "Please upload a logo for the job.";
        }
    }
    ?>
<body>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        </body>
      
<?php
if($res==true){
            echo "<script>
            swal({
                title: \"Job Nest\",
                text: \"" . $msg . "\",
                icon: \"success\"
            }).then((value) => {
                window.location.href = 'joblist.php'; 
            });
          </script>";
     }
else{
        echo "<script>
            swal({
                title: \"Job Nest\",
                text: \"" . $msg . "\",
                icon: \"error\"
            }).then((value) => {
                window.location.href = 'jobpost.php'; 
            });
          </script>";
     }
 }

?>

<main>
    <form method="post" enctype="multipart/form-data">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-12">
                    <input type="hidden" name="Job_id" value="<?php echo $Job_id; ?>">
                    <div class="form-group">
                        <label class="font-sm color-text-mutted mb-10">Company Name *</label>
                        <input class="form-control" type="text" name="company" value="<?php echo isset($job_post['Company']) && !empty(trim($job_post['Company'])) ? htmlspecialchars($job_post['Company']) : ''; ?>" required>
                    </div>
                    <div class="form-group">
                        <label class="font-sm color-text-mutted mb-10">Location *</label>
                        <input class="form-control" type="text" name="location" value="<?php echo isset($job_post['Location']) && !empty(trim($job_post['Location'])) ? htmlspecialchars($job_post['Location']) : ''; ?>" required>
                    </div>
                    <div class="form-group">
                        <label class="font-sm color-text-mutted mb-10">Title *</label>
                        <input class="form-control" type="text" name="title" value="<?php echo isset($job_post['Title']) && !empty(trim($job_post['Title'])) ? htmlspecialchars($job_post['Title']) : ''; ?>" required>
                    </div>
                    <div class="form-group">
                        <label class="font-sm color-text-mutted mb-10">Salary *</label>
                        <input class="form-control" type="text" name="salary" value="<?php echo isset($job_post['Salary']) && !empty(trim($job_post['Salary'])) ? htmlspecialchars($job_post['Salary']) : ''; ?>" required>
                    </div>
                    <div class="form-group">
                        <label class="font-sm color-text-mutted mb-10">Industry *</label>
                        <input class="form-control" type="text" name="industry" value="<?php echo isset($job_post['Industry']) && !empty(trim($job_post['Industry'])) ? htmlspecialchars($job_post['Industry']) : ''; ?>" required>
                    </div>
                    <div class="form-group">
                        <label class="font-sm color-text-mutted mb-10">Job Type *</label>
                        <input class="form-control" type="text" name="job_type" value="<?php echo isset($job_post['Job_type']) && !empty(trim($job_post['Job_type'])) ? htmlspecialchars($job_post['Job_type']) : ''; ?>" required>
                    </div>
                    <div class="form-group">
                        <label class="font-sm color-text-mutted mb-10">Job Level *</label>
                        <input class="form-control" type="text" name="job_level" value="<?php echo isset($job_post['Job_level']) && !empty(trim($job_post['Job_level'])) ? htmlspecialchars($job_post['Job_level']) : ''; ?>" required>
                    </div>
                    <div class="form-group">
                        <label class="font-sm color-text-mutted mb-10">Experience *</label>
                        <input class="form-control" type="text" name="experience" value="<?php echo isset($job_post['Experience']) && !empty(trim($job_post['Experience'])) ? htmlspecialchars($job_post['Experience']) : ''; ?>" required>
                    </div>
                  
                   
                    <div class="form-group">
                        <label class="font-sm color-text-mutted mb-10">Description *</label>
                        <textarea class="form-control" name="description" rows="4" value="<?php echo isset($job_post['Description']) && !empty(trim($job_post['Description'])) ? htmlspecialchars($job_post['Description']) : ''; ?>" required><?php echo isset($job_post['Description']) && !empty(trim($job_post['Description'])) ? htmlspecialchars($job_post['Description']) : ''; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label class="font-sm color-text-mutted mb-10">Logo *</label>
                        <input class="form-control" type="file" name="logo" accept="image/*" value="<?php echo isset($job_post['Logo']) && !empty(trim($job_post['Logo'])) ? htmlspecialchars($job_post['Logo']) : ''; ?>" required>
                    </div>
                
                    <div class="form-group">
                        <label class="font-sm color-text-mutted mb-10">Deadline *</label>
                        <input class="form-control" type="date" name="deadline" value="<?php echo isset($job_post['Deadline']) && !empty(trim($job_post['Deadline'])) ? htmlspecialchars($job_post['Deadline']) : ''; ?>" required>
                    </div>
                    <div class="box-button mt-15">
                        <button class="btn btn-apply-big font-md font-bold">Post Job</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</main>
<?php
    include ('include/footer.php');
    include ('include/script.php');
?>