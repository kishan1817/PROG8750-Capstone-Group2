<?php
	$title = "Home Page";
	include ('include/head.php');
	include ('include/header.php');
  // Get the job ID from the query string
  $job_id = isset($_GET['job_id']) ? intval($_GET['job_id']) : 0;

  // Prepare the SQL query to fetch the job details
$query = "SELECT * FROM tbl_jobs WHERE Job_id = $job_id";
$result = mysqli_query($dbconnection, $query);

// Check if the job details were found
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
?>
	<main class="main">
      <section class="section-box-2">
        <div class="container">
          <div class="row mt-10">
            <div class="col-lg-8 col-md-12">
            <div class="image-box"><img src="<?php echo $row['Logo']; ?>" alt="<?php echo $row['Company']; ?>"></div>
              <div><h3><?php echo $row['Title']; ?></h3></div>
              
              <div class="mt-0 mb-15"><span class="card-briefcase"><?php echo $row['Job_type']; ?></span><span class="card-time"><?php echo date("F j, Y", strtotime($row['Posted_at'])); ?></span></div>
            </div>
            <div class="col-lg-4 col-md-12 text-lg-end">
              <div class="btn btn-apply-icon btn-apply btn-apply-big hover-up" data-bs-toggle="modal" data-bs-target="applunow.php">Apply now</div>
            </div>
          </div>
          <div class="border-bottom pt-10 pb-10"></div>
        </div>
      </section>
      <section class="section-box mt-50">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
              <div class="job-overview">
              <h3><?php echo $row['Company']; ?></h3>
                <h5 class="border-bottom pb-15 mb-30">Employment Information</h5>
                <div class="row">
                  <div class="col-md-6 d-flex">
                    <div class="sidebar-icon-item"><img src="dist/images/job-single/industry.svg" alt="jobnest"></div>
                    <div class="sidebar-text-info ml-10"><span class="text-description industry-icon mb-10">Industry</span><strong class="small-heading"><?php echo $row['Industry']; ?></strong></div>
                  </div>
                  <div class="col-md-6 d-flex mt-sm-15">
                    <div class="sidebar-icon-item"><img src="dist/images/job-single/job-level.svg" alt="jobnest"></div>
                    <div class="sidebar-text-info ml-10"><span class="text-description joblevel-icon mb-10">Job level</span><strong class="small-heading">Experienced (Non - Manager)</strong></div>
                  </div>
                </div>
                <div class="row mt-25">
                  <div class="col-md-6 d-flex mt-sm-15">
                    <div class="sidebar-icon-item"><img src="dist/images/job-single/salary.svg" alt="jobnest"></div>
                    <div class="sidebar-text-info ml-10"><span class="text-description salary-icon mb-10">Salary</span><strong class="small-heading">$<?php echo $row['Salary']; ?></strong></div>
                  </div>
                  <div class="col-md-6 d-flex">
                    <div class="sidebar-icon-item"><img src="dist/images/job-single/experience.svg" alt="jobnest"></div>
                    <div class="sidebar-text-info ml-10"><span class="text-description experience-icon mb-10">Experience</span><strong class="small-heading"><?php echo $row['Experience']; ?>years</strong></div>
                  </div>
                </div>
                <div class="row mt-25">
                  <div class="col-md-6 d-flex mt-sm-15">
                    <div class="sidebar-icon-item"><img src="dist/images/job-single/job-type.svg" alt="jobnest"></div>
                    <div class="sidebar-text-info ml-10"><span class="text-description jobtype-icon mb-10">Job type</span><strong class="small-heading"><?php echo $row['Job_type'];?></strong></div>
                  </div>
                  <div class="col-md-6 d-flex mt-sm-15">
                    <div class="sidebar-icon-item"><img src="dist/images/job-single/deadline.svg" alt="jobnest"></div>
                    <div class="sidebar-text-info ml-10"><span class="text-description mb-10">Deadline</span><strong class="small-heading"><?php echo $row['Deadline'];?></strong></div>
                  </div>
                </div>
                <div class="row mt-25">
                  <div class="col-md-6 d-flex mt-sm-15">
                    <div class="sidebar-icon-item"><img src="dist/images/job-single/updated.svg" alt="jobnest"></div>
                    <div class="sidebar-text-info ml-10"><span class="text-description jobtype-icon mb-10">Updated</span><strong class="small-heading">10/07/2022</strong></div>
                  </div>
                  <div class="col-md-6 d-flex mt-sm-15">
                    <div class="sidebar-icon-item"><img src="dist/images/job-single/location.svg" alt="jobnest"></div>
                    <div class="sidebar-text-info ml-10"><span class="text-description mb-10">Location</span><strong class="small-heading"><?php echo $row['Location']; ?></strong></div>
                  </div>
                </div>
              </div>
              <div class="content-single">
                <p><?php echo $row['Description']; ?></p>
              </div>
              <div class="single-apply-jobs">
                <div class="row align-items-center">
                  <div class="col-md-5"><a class="btn btn-default mr-15" href="applynow.php?job_id=<?php echo $row['Job_id']; ?>">Apply now</a><a class="btn btn-border" href="#">Save job</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="section-box mt-50 mb-50">
        <div class="container">
          <div class="text-left">
            <h2 class="section-title mb-10 wow animate__animated animate__fadeInUp">Featured Jobs</h2>
            <p class="font-lg color-text-paragraph-2 wow animate__animated animate__fadeInUp">Get the latest news, updates and tips</p>
          </div>
          <div class="mt-50">
            <div class="box-swiper style-nav-top">
              <div class="swiper-container swiper-group-4 swiper">
                <div class="swiper-wrapper pb-10 pt-5">
                  <div class="swiper-slide">
                    <div class="card-grid-2 hover-up">
                      <div class="card-grid-2-image-left"><span class="flash"></span>
                        <div class="image-box"><img src="dist/images/brands/brand-6.png" alt="jobnest"></div>
                        <div class="right-info"><a class='name-job' href='company-details.html'>Quora JSC</a><span class="location-small">New York, US</span></div>
                      </div>
                      <div class="card-block-info">
                        <h6><a href='job-details.html'>Senior System Engineer</a></h6>
                        <div class="mt-5"><span class="card-briefcase">Part time</span><span class="card-time">5<span> minutes ago</span></span></div>
                        <p class="font-sm color-text-paragraph mt-15">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae architecto eveniet, dolor quo repellendus pariatur.</p>
                        <div class="mt-30"><a class='btn btn-grey-small mr-5' href='job-details.html'>PHP</a><a class='btn btn-grey-small mr-5' href='job-details.html'>Android    </a>
                        </div>
                        <div class="card-2-bottom mt-30">
                          <div class="row">
                            <div class="col-lg-7 col-7"><span class="card-text-price">$800</span><span class="text-muted">/Hour</span></div>
                            <div class="col-lg-5 col-5 text-end">
                              <div class="btn btn-apply-now" data-bs-toggle="modal" data-bs-target="#ModalApplyJobForm">Apply now</div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="swiper-slide">
                    <div class="card-grid-2 hover-up">
                      <div class="card-grid-2-image-left"><span class="flash"></span>
                        <div class="image-box"><img src="dist/images/brands/brand-4.png" alt="jobnest"></div>
                        <div class="right-info"><a class='name-job' href='company-details.html'>Dailymotion</a><span class="location-small">New York, US</span></div>
                      </div>
                      <div class="card-block-info">
                        <h6><a href='job-details.html'>Frontend Developer</a></h6>
                        <div class="mt-5"><span class="card-briefcase">Full time</span><span class="card-time">6<span> minutes ago</span></span></div>
                        <p class="font-sm color-text-paragraph mt-15">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae architecto eveniet, dolor quo repellendus pariatur.</p>
                        <div class="mt-30"><a class='btn btn-grey-small mr-5' href='jobs-grid.html'>Typescript</a><a class='btn btn-grey-small mr-5' href='jobs-grid.html'>Java</a>
                        </div>
                        <div class="card-2-bottom mt-30">
                          <div class="row">
                            <div class="col-lg-7 col-7"><span class="card-text-price">$250</span><span class="text-muted">/Hour</span></div>
                            <div class="col-lg-5 col-5 text-end">
                              <div class="btn btn-apply-now" data-bs-toggle="modal" data-bs-target="#ModalApplyJobForm">Apply now</div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="swiper-slide">
                    <div class="card-grid-2 hover-up">
                      <div class="card-grid-2-image-left"><span class="flash"></span>
                        <div class="image-box"><img src="dist/images/brands/brand-8.png" alt="jobnest"></div>
                        <div class="right-info"><a class='name-job' href='company-details.html'>Periscope</a><span class="location-small">New York, US</span></div>
                      </div>
                      <div class="card-block-info">
                        <h6><a href='job-details.html'>Lead Quality Control QA</a></h6>
                        <div class="mt-5"><span class="card-briefcase">Full time</span><span class="card-time">6<span> minutes ago</span></span></div>
                        <p class="font-sm color-text-paragraph mt-15">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae architecto eveniet, dolor quo repellendus pariatur.</p>
                        <div class="mt-30"><a class='btn btn-grey-small mr-5' href='job-details.html'>iOS</a><a class='btn btn-grey-small mr-5' href='job-details.html'>Laravel</a><a class='btn btn-grey-small mr-5' href='job-details.html'>Golang</a>
                        </div>
                        <div class="card-2-bottom mt-30">
                          <div class="row">
                            <div class="col-lg-7 col-7"><span class="card-text-price">$250</span><span class="text-muted">/Hour</span></div>
                            <div class="col-lg-5 col-5 text-end">
                              <div class="btn btn-apply-now" data-bs-toggle="modal" data-bs-target="#ModalApplyJobForm">Apply now</div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="swiper-slide">
                    <div class="card-grid-2 hover-up">
                      <div class="card-grid-2-image-left"><span class="flash"></span>
                        <div class="image-box"><img src="dist/images/brands/brand-4.png" alt="jobnest"></div>
                        <div class="right-info"><a class='name-job' href='company-details.html'>Dailymotion</a><span class="location-small">New York, US</span></div>
                      </div>
                      <div class="card-block-info">
                        <h6><a href='job-details.html'>Frontend Developer</a></h6>
                        <div class="mt-5"><span class="card-briefcase">Full time</span><span class="card-time">6<span> minutes ago</span></span></div>
                        <p class="font-sm color-text-paragraph mt-15">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae architecto eveniet, dolor quo repellendus pariatur.</p>
                        <div class="mt-30"><a class='btn btn-grey-small mr-5' href='jobs-grid.html'>Typescript</a><a class='btn btn-grey-small mr-5' href='jobs-grid.html'>Java</a>
                        </div>
                        <div class="card-2-bottom mt-30">
                          <div class="row">
                            <div class="col-lg-7 col-7"><span class="card-text-price">$250</span><span class="text-muted">/Hour</span></div>
                            <div class="col-lg-5 col-5 text-end">
                              <div class="btn btn-apply-now" data-bs-toggle="modal" data-bs-target="#ModalApplyJobForm">Apply now</div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="text-center"><a class="btn btn-grey" href="joblist.php">Load more posts</a></div>
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
  } else {
    echo '<p>Job details not found.</p>';
  }

		include ('include/footer.php');
		include ('include/script.php');
    
	?>
	</body>
</html>