<?php
    $title = "Apply Now";
    include ('include/head.php');
    include ('include/header.php');
    include('include/config.php');

    $message = ''; 
    $res;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $job_id = isset($_GET['job_id']) ? intval($_GET['job_id']) : 0;
        $user_id = $_SESSION['User_id'];
        $applied_at = date('Y-m-d');

        // Check if resume is uploaded
        if (isset($_FILES["resume"]) && $_FILES["resume"]["error"] == 0) {
            $resume_dir = "Resume/";
            $resume_file = $resume_dir . basename($_FILES["resume"]["name"]);
            $uploadOk = 1;
            $resumeFileType = strtolower(pathinfo($resume_file, PATHINFO_EXTENSION));

            // Allow certain file formats
            if (!in_array($resumeFileType, ['pdf', 'doc', 'docx'])) {
                $message = 'Sorry, only PDF, DOC & DOCX files are allowed.';
                $res=false;
                $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                $message = 'Sorry, your file was not uploaded.';
                $res=false;
            } else {
                // Try to upload file
                if (!file_exists($resume_dir)) {
                    mkdir($resume_dir, 0777, true);
                }
                if (move_uploaded_file($_FILES["resume"]["tmp_name"], $resume_file)) {
                    $sql = $dbconnection->prepare("INSERT INTO tbl_application (Job_id, User_id, Resume, Applied_at) VALUES (?, ?, ?, ?)");
                    $sql->bind_param("iiss", $job_id, $user_id, $resume_file, $applied_at);
                    if ($sql->execute()) {
                        $message = 'Application submitted successfully!';
                        $res=true;
                    } else {
                        $message = 'There was an error submitting your application.';
                        $res=false;
                    }
                } else {
                    $message = 'Sorry, there was an error uploading your file.';
                    $res=false;
                }
            }
        } else {
            $message = 'Fields are empty or No resume uploaded.';
            $res=false;
        }

        $dbconnection->close();
    }
?>
<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <h2 class="text-center">Apply Here</h2>

                <form action="#" method="POST" enctype="multipart/form-data">
                    <label for="certification">Certification:</label><br>
                    <textarea id="certification" name="certification" class="form-control" rows="3" required></textarea><br>

                    <label for="education">Education:</label><br>
                    <textarea id="education" name="education" class="form-control" rows="3" required></textarea><br>

                    <input type="hidden" name="job_id" value="The job ID here">
                
                    <label for="resume">Resume (PDF only):</label><br>
                    <input type="file" id="resume" name="resume" class="form-control" required><br>

                    <label for="skills">Skills:</label><br>
                    <textarea id="skills" name="skills" class="form-control" rows="3" required></textarea><br>

                    <div class="text-center">
                        <input type="submit" value="Submit" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
<?php
    include ('include/footer.php');
    include ('include/script.php');
    echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';

    if($res === true){
        echo "<script>swal({ title: 'Job Nest', text: '$message', icon: 'success'}).then((value) => {
            window.location.href = 'joblist.php';
        });</script>";
    }
    else if($message != '' and $res === false){
        echo "<script>swal({ title: 'Job Nest', text: '$message', icon: 'error'}).then((value) => {
            window.location.href = 'applynow.php';
        });</script>";
    }
?>

