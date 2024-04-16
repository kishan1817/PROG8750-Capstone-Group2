<?php
	$title = "Home Page";
	include ('include/head.php');
	include ('include/header.php');
  require_once 'include/config.php';

  

// Check if the user is logged in, if not then redirect to login page
if (!isset($_SESSION["User_id"])) {
    header("Location: signin.php");
    exit;
}


$user_id = $_SESSION["User_id"];



// SQL query to fetch jobs posted by the logged-in user
$sql = "SELECT Job_id, Company, Logo, Title, Description, Location, Salary, Industry, Job_type, Job_level, Experience, Deadline, Posted_at FROM tbl_jobs WHERE User_id = ?";
$stmt = $dbconnection->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$jobCount=0;
?>
	<main class="main">
      <section class="section-box-2">
        <div class="container">
          <div class="banner-hero banner-image-single"><img src="dist/images/candidates/img.png" alt="jobnest"><a class="btn-editor" href="#"></a></div>
          <div class="box-company-profile">
            <div class="image-compay"><img src="dist/images/candidates/candidate-profile.png" alt="jobnest"></div>
            <div class="row mt-10">
              <div class="col-lg-8 col-md-12">
                <h5 class="f-18">Ajay Gosai <span class="card-location font-regular ml-20">Cambridge, CA</span></h5>
                <p class="mt-0 font-md color-text-paragraph-2 mb-15">UI/UX Designer. Front end Developer</p>
              </div>
              <div class="col-lg-4 col-md-12 text-lg-end"><a class='btn btn-preview-icon btn-apply btn-apply-big' href='#'>Preview</a></div>
            </div>
          </div>
          <div class="border-bottom pt-10 pb-10"></div>
        </div>
      </section>
      <section class="section-box mt-50">
        <div class="container">
          <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-12">
              <div class="box-nav-tabs nav-tavs-profile mb-5">
                <ul class="nav" role="tablist">
                  <li><a class="btn btn-border aboutus-icon mb-20 active" href="#tab-my-profile" data-bs-toggle="tab" role="tab" aria-controls="tab-my-profile" aria-selected="true">My Profile</a></li>
                  <li><a class="btn btn-border recruitment-icon mb-20" href="#tab-my-jobs" data-bs-toggle="tab" role="tab" aria-controls="tab-my-jobs" aria-selected="false">My Jobs</a></li>
                  <!-- <li><a class="btn btn-border people-icon mb-20" href="#tab-saved-jobs" data-bs-toggle="tab" role="tab" aria-controls="tab-saved-jobs" aria-selected="false">Saved Jobs</a></li> -->
                </ul>
                <div class="border-bottom pt-10 pb-10"></div>
                <div class="mt-20 mb-20"><a class="link-red" href="#">Delete Account</a></div>
              </div>
            </div>
            <div class="col-lg-9 col-md-8 col-sm-12 col-12 mb-50">
              <div class="content-single">
                <div class="tab-content">
                  <div class="tab-pane fade show active" id="tab-my-profile" role="tabpanel" aria-labelledby="tab-my-profile">
                    <h3 class="mt-0 mb-15 color-brand-1">My Account</h3><a class="font-md color-text-paragraph-2" href="#">Update your profile</a>
                    <div class="mt-35 mb-40 box-info-profie">
                      <div class="image-profile"><img src="dist/images/candidates/candidate-profile.png" alt="jobnest"></div><a class="btn btn-apply text-light">Upload Avatar</a><a class="btn btn-link">Delete</a>
                    </div>
                    <div class="row form-contact">
                      <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                          <label class="font-sm color-text-mutted mb-10">Full Name *</label>
                          <input class="form-control" type="text" value="Ajay Gosai">
                        </div>
                        <div class="form-group">
                          <label class="font-sm color-text-mutted mb-10">Email *</label>
                          <input class="form-control" type="text" value="ajaygosai@gmail.com">
                        </div>
                        <div class="form-group">
                          <label class="font-sm color-text-mutted mb-10">Contact number</label>
                          <input class="form-control" type="text" value="01 - 234 567 89">
                        </div>
                        <div class="form-group">
                          <label class="font-sm color-text-mutted mb-10">Bio</label>
                          <textarea class="form-control" rows="4">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure.</textarea>
                        </div>
                        <div class="form-group">
                          <label class="font-sm color-text-mutted mb-10">Personal website</label>
                          <input class="form-control" type="url" value="https://xyz.com/">
                        </div>
                        <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label class="font-sm color-text-mutted mb-10">Country</label>
                              <input class="form-control" type="text" value="Canada">
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label class="font-sm color-text-mutted mb-10">State</label>
                              <input class="form-control" type="text" value="Ontario">
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label class="font-sm color-text-mutted mb-10">City</label>
                              <input class="form-control" type="text" value="Cambridge">
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label class="font-sm color-text-mutted mb-10">Zip code</label>
                              <input class="form-control" type="text" value="N1R0E2">
                            </div>
                          </div>
                        </div>
                        <div class="border-bottom pt-10 pb-10 mb-30"></div>
                        <h6 class="color-orange mb-20">Change your password</h6>
                        <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label class="font-sm color-text-mutted mb-10">Password</label>
                              <input class="form-control" type="password" value="123456789">
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label class="font-sm color-text-mutted mb-10">Re-Password *</label>
                              <input class="form-control" type="password" value="123456789">
                            </div>
                          </div>
                        </div>
                        <div class="border-bottom pt-10 pb-10"></div>
                        <div class="box-agree mt-30">
                          <label class="lbl-agree font-xs color-text-paragraph-2">
                            <input class="lbl-checkbox" type="checkbox" value="1">Available for freelancers
                          </label>
                        </div>
                        <div class="box-button mt-15">
                          <button class="btn btn-apply-big font-md font-bold">Save All Changes</button>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-12">
                        <div class="box-skills">
                          <h5 class="mt-0 color-brand-1">Skills</h5>
                          <div class="form-contact">
                            <div class="form-group">
                              <input class="form-control search-icon" type="text" value="" placeholder="E.g. Angular, Laravel...">
                            </div>
                          </div>
                          <div class="box-tags mt-30"><a class="btn btn-grey-small mr-10">Figma<span class="close-icon"></span></a><a class="btn btn-grey-small mr-10">Adobe XD<span class="close-icon"></span></a><a class="btn btn-grey-small mr-10">NextJS<span class="close-icon"></span></a><a class="btn btn-grey-small mr-10">React<span class="close-icon"></span></a><a class="btn btn-grey-small mr-10">App<span class="close-icon"></span></a><a class="btn btn-grey-small mr-10">Digital<span class="close-icon"></span></a><a class="btn btn-grey-small mr-10">NodeJS<span class="close-icon"></span></a></div>
                          <div class="mt-40"> <span class="card-info font-sm color-text-paragraph-2">You can add up to 15 skills</span></div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Job post display start-->
                    <div class="tab-pane fade" id="tab-my-jobs" role="tabpanel" aria-labelledby="tab-my-jobs">
                    <div><h3 class="mt-0 color-brand-1 mb-50">My Jobs</h3></div>
                    <div class="row">
                    <?php 
                    $userid = $_SESSION["User_id"];

                      $query = "SELECT * FROM tbl_jobs where Status=1 and User_id=$userid ORDER BY Posted_at DESC";
                      $result = mysqli_query($dbconnection, $query);
                      $jobCount = 0; // Counter to keep track of jobs
                      // Function to truncate job description
                      function truncate_description($text, $maxChars = 100) {
                        if (strlen($text) > $maxChars) {
                            $text = substr($text, 0, $maxChars) . '...';
                        }
                        return $text;
                      }

                      if (mysqli_num_rows($result) > 0) {
                          echo '<div class="row">'; // Start the first row

                          // Loop through each job and display its details
                          while($row = mysqli_fetch_assoc($result)) {
                              // For every job, increment the counter
                              $jobCount++;
                      ?>
                      <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="card-grid-2 hover-up">
                            <div class="card-grid-2-image-left">
                            <form method="POST" action="#">
                              <input type="hidden" name="job_id" value="{$row['Job_id']}">
                                <div class="image-box"><img src="<?php echo $row['Logo']; ?>" alt="<?php echo $row['Company']; ?>"></div>
                                <div class="right-info">
                                    <a class='name-job' href='jobdetails.php?job_id=<?php echo $row['Job_id']; ?>'><?php echo $row['Company']; ?></a>
                                    <span class="location-small"><?php echo $row['Location']; ?></span>
                                </div>
                            </div>
                            <div class="card-block-info">
                                <h6><a href='job-details.html'><?php echo $row['Title']; ?></a></h6>
                                <div class="mt-5">
                                    <span class="card-briefcase"><?php echo $row['Job_type']; ?></span>
                                    <span class="card-time"><?php echo $row['Posted_at']; // You might want to format this date or calculate the time ago ?></span>
                                </div>
                                <p class="font-sm color-text-paragraph mt-15"><?php echo truncate_description($row['Description']); ?></p>
                                <!-- Dynamically generate skill tags or categories here if applicable -->
                                <div class="mt-30">
                                    <!-- Example: <a class='btn btn-grey-small mr-5' href='jobs-grid.html'>Skill 1</a> -->
                                </div>
                                <div class="card-2-bottom mt-30">
                                    <div class="row">
                                        <div class="col-lg-7 col-7">
                                            <span class="card-text-price">$<?php echo $row['Salary']; ?></span>
                                            <span class="text-muted">/Year</span>
                                        </div>
                                        <div class="col-lg-5 col-5 text-end">
                                            <div><span><a class="btn btn-warning" href="jobpost.php?Job_id=<?php echo $row['Job_id']?>">Edit</a></span></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-lg-12 col-12">
                                        <div>
                                            <span>
                                                <button type="button" data-job-id="<?php echo $row['Job_id']; ?>" class="btn btn-danger delete-btn">Delete</button>
                                            </span>
                                        </div>
                                        </form>

                                      </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>
                      <?php
                            // Check if 3 jobs have been displayed
                            if ($jobCount % 3 == 0) {
                                echo '</div><div class="row">'; // Close the current row and start a new one
                            }
                        }

                        // Close the last row div if needed
                        if ($jobCount % 3 != 0) {
                            echo '</div>'; // This closes the row if there weren't exactly three jobs in the last row
                        }
                      } else {
                        echo '<p>No job postings available at the moment.</p>';
                      }
                      ?>
                 
                     <!-- Job post display ends--> 
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
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="section-box mt-50 mb-20">
        <div class="container">
          <div class="box-newsletter">
            <div class="row">
              <div class="col-xl-3 col-12 text-center d-none d-xl-block"><img src="dist/images/about/newsletter-left.png" alt="jobnest"></div>
              <div class="col-lg-12 col-xl-6 col-12">
                <h2 class="text-md-newsletter text-center">New Things Will Always<br> Update Regularly</h2>
                <div class="box-form-newsletter mt-40">
                  <form class="form-newsletter">
                    <input class="input-newsletter" type="text" value="" placeholder="Enter your email here">
                    <button class="btn btn-default font-heading icon-send-letter">Subscribe</button>
                  </form>
                </div>
              </div>
              <div class="col-xl-3 col-12 text-center d-none d-xl-block"><img src="dist/images/about/newsletter-right.png" alt="jobnest"></div>
            </div>
          </div>
        </div>
      </section>
    </main>
<?php
		include ('include/footer.php');
		include ('include/script.php');
	?>
	
  
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script>
document.addEventListener("DOMContentLoaded", function() {
    var deleteButtons = document.querySelectorAll('.delete-btn');
    deleteButtons.forEach(function(button) {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            var jobId = this.getAttribute('data-job-id');
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this job post!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    fetch('delete_post.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                        },
                        body: 'action=delete&job_id=' + jobId
                    }).then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            swal({
                                title: "deleted Successfully",
                                text: "deleted Successfully",
                                icon: "success",
                            }).then(() => {
                                location.reload(); // Reload the page to update the list of job posts
                            });
                        } else {
                            swal({
                                title: "Error in deletion",
                                text: "Error in deletion",
                                icon: "error",
                            });
                        }
                    });
                }
            });
        });
    });
});
</script>

 

</body>
</html>