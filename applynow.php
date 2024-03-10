<?php
    $title = "Home Page";
    include ('include/head.php');
    include ('include/header.php');
?>
<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <h2 class="text-center">Apply Here</h2>

                <form action="process-form.php" method="POST" enctype="multipart/form-data">
                    <label for="certification">Certification:</label><br>
                    <textarea id="certification" name="certification" class="form-control" rows="3"></textarea><br>

                    <label for="education">Education:</label><br>
                    <textarea id="education" name="education" class="form-control" rows="3"></textarea><br>

                    <label for="experience">Experience:</label><br>
                    <textarea id="experience" name="experience" class="form-control" rows="3"></textarea><br>

                    <label for="resume">Resume (PDF only):</label><br>
                    <input type="file" id="resume" name="resume" class="form-control"><br>

                    <label for="skills">Skills:</label><br>
                    <textarea id="skills" name="skills" class="form-control" rows="3"></textarea><br>

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
?>
