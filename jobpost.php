<?php
    $title = "Home Page";
    include ('include/head.php');
    include ('include/header.php');
// Include the database configuration file
include 'include/config.php';

// Initialize message variable
$msg = "";
$res = false;

// If the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize input
    $company = htmlspecialchars($_POST['company']);
    $title = htmlspecialchars($_POST['title']);
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
    

    // Validate required fields
    if (empty($company) || empty($title) || empty($description) || empty($location) || empty($salary) || empty($industry) || empty($job_type) || empty($job_level) || empty($experience) || empty($deadline)) {
        $msg = "Please fill in all required fields.";
    } else {
        // Handle file upload for logo
        if (isset($_FILES['logo']['name']) && $_FILES['logo']['error'] == 0) {
            $targetDir = "Images/";
            $fileName = basename($_FILES["logo"]["name"]);
            $targetFilePath = $targetDir . $fileName;
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

            // Allow certain file formats
            $allowTypes = array('jpg','png','jpeg','gif');
            if (in_array($fileType, $allowTypes)) {
                // Upload file to server
                if (move_uploaded_file($_FILES["logo"]["tmp_name"], $targetFilePath)) {
                    // Insert into database
                    $stmt = $dbconnection->prepare("INSERT INTO tbl_jobs (Company, Logo, Title, Description, Location, Salary, Industry, Job_type, Job_level, Experience, Deadline, Posted_at, User_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
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
//echo $msg;
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
                    <div class="form-group">
                        <label class="font-sm color-text-mutted mb-10">Company Name *</label>
                        <input class="form-control" type="text" name="company" required>
                    </div>
                    <div class="form-group">
                        <label class="font-sm color-text-mutted mb-10">Location *</label>
                        <input class="form-control" type="text" name="location" required>
                    </div>
                    <div class="form-group">
                        <label class="font-sm color-text-mutted mb-10">Title *</label>
                        <input class="form-control" type="text" name="title" required>
                    </div>
                    <div class="form-group">
                        <label class="font-sm color-text-mutted mb-10">Salary *</label>
                        <input class="form-control" type="text" name="salary" required>
                    </div>
                    <div class="form-group">
                        <label class="font-sm color-text-mutted mb-10">Industry *</label>
                        <input class="form-control" type="text" name="industry" required>
                    </div>
                    <div class="form-group">
                        <label class="font-sm color-text-mutted mb-10">Job Type *</label>
                        <input class="form-control" type="text" name="job_type" required>
                    </div>
                    <div class="form-group">
                        <label class="font-sm color-text-mutted mb-10">Job Level *</label>
                        <input class="form-control" type="text" name="job_level" required>
                    </div>
                    <div class="form-group">
                        <label class="font-sm color-text-mutted mb-10">Experience *</label>
                        <input class="form-control" type="text" name="experience" required>
                    </div>
                  
                   
                    <div class="form-group">
                        <label class="font-sm color-text-mutted mb-10">Description *</label>
                        <textarea class="form-control" name="description" rows="4" required></textarea>
                    </div>
                    <div class="form-group">
                        <label class="font-sm color-text-mutted mb-10">Logo *</label>
                        <input class="form-control" type="file" name="logo" accept="image/*" required>
                    </div>
                
                    <div class="form-group">
                        <label class="font-sm color-text-mutted mb-10">Deadline *</label>
                        <input class="form-control" type="date" name="deadline" required>
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