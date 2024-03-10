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
                  <li><a class="btn btn-border people-icon mb-20" href="#tab-saved-jobs" data-bs-toggle="tab" role="tab" aria-controls="tab-saved-jobs" aria-selected="false">Saved Jobs</a></li>
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
                    <div class="row display-list">
                    <?php
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    $logoPath = htmlspecialchars($row['Logo']);
                                    $companyName = htmlspecialchars($row['Company']);
                                    $jobTitle = htmlspecialchars($row['Title']);
                                    $jobDescription = htmlspecialchars($row['Description']);
                                    $jobLocation = htmlspecialchars($row['Location']);
                                    $jobSalary = htmlspecialchars($row['Salary']);
                                    $jobType = htmlspecialchars($row['Job_type']);
                                    $postedAt = date("F j, Y", strtotime($row['Posted_at']));
                                    $jobid =  htmlspecialchars($row['Job_id']);
                                    echo <<<JOB
                                    <div class="col-xl-12 col-12">
                                        <div class="card-grid-2 hover-up">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="card-grid-2-image-left">
                                                    <form method="post" action="#">
                                                      <input type="hidden" name="job_id" value="{$row['Job_id']}">
                                                        <div class="image-box"><img src="$logoPath" alt="$companyName logo"></div>
                                                        <div class="right-info"><a class="name-job" href="#">$companyName</a><span class="location-small">$jobLocation</span></div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 text-start text-md-end pr-60 col-md-6 col-sm-12">
                                                    <div class="pl-15 mb-15 mt-30">
                                                        <a class="btn btn-grey-small mr-5" href="#">$jobType</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-block-info">
                                                <h4><a href='job-details.html?job_id={$row['Job_id']}'>$jobTitle</a></h4>
                                                <div class="mt-5"><span class="card-briefcase">$jobType</span><span class="card-time"><span>Posted on $postedAt</span></span></div>
                                                <p class="font-sm color-text-paragraph mt-10">$jobDescription</p>
                                                <div class="card-2-bottom mt-20">
                                                    <div class="row">
                                                        <div class="col-lg-7 col-7"><span class="card-text-price">$$jobSalary</span><span class="text-muted">/Annul</span></div>
                                                        <div class="col-lg-5 col-5 text-end">
                                                            <div class="btn btn-apply-now" data-bs-toggle="modal" data-bs-target="#ModalApplyJobForm">Apply now</div>
                                                            <div><button type="submit" name="delete_job" class="btn btn-danger">Delete</button></div></form>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                  JOB;
                                }
                            } else {
                                echo "<p>No job posts found.</p>";
                            }
                            ?>
                        </div>
                 </div>
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
                  <div class="tab-pane fade" id="tab-saved-jobs" role="tabpanel" aria-labelledby="tab-saved-jobs">
                    <h3 class="mt-0 color-brand-1 mb-50">Saved Jobs</h3>
                    <div class="row"> 
                      <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="card-grid-2 hover-up">
                          <div class="card-grid-2-image-left">
                            <div class="image-box"><img src="dist/images/brands/brand-1.png" alt="jobnest"></div>
                            <div class="right-info"><a class='name-job' href='company-details.html'>LinkedIn</a><span class="location-small">Cambridge, CA</span></div>
                          </div>
                          <div class="card-block-info">
                            <h6><a href='job-details.html'>UI / UX Designer fulltime</a></h6>
                            <div class="mt-5"><span class="card-briefcase">Fulltime</span><span class="card-time">4<span> minutes ago</span></span></div>
                            <p class="font-sm color-text-paragraph mt-15">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae architecto eveniet, dolor quo repellendus pariatur</p>
                            <div class="mt-30"><a class='btn btn-grey-small mr-5' href='jobs-grid.html'>Adobe XD</a><a class='btn btn-grey-small mr-5' href='jobs-grid.html'>Figma</a><a class='btn btn-grey-small mr-5' href='jobs-grid.html'>Photoshop</a>
                            </div>
                            <div class="card-2-bottom mt-30">
                              <div class="row">
                                <div class="col-lg-7 col-7"><span class="card-text-price">$500</span><span class="text-muted">/Hour</span></div>
                                <div class="col-lg-5 col-5 text-end">
                                  <div class="btn btn-apply-now" data-bs-toggle="modal" data-bs-target="#ModalApplyJobForm">Apply now</div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="card-grid-2 hover-up">
                          <div class="card-grid-2-image-left">
                            <div class="image-box"><img src="dist/images/brands/brand-2.png" alt="jobnest"></div>
                            <div class="right-info"><a class='name-job' href='company-details.html'>Adobe Ilustrator</a><span class="location-small">Cambridge, CA</span></div>
                          </div>
                          <div class="card-block-info">
                            <h6><a href='job-details.html'>Full Stack Engineer</a></h6>
                            <div class="mt-5"><span class="card-briefcase">Part time</span><span class="card-time">5<span> minutes ago</span></span></div>
                            <p class="font-sm color-text-paragraph mt-15">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae architecto eveniet, dolor quo repellendus pariatur.</p>
                            <div class="mt-30"><a class='btn btn-grey-small mr-5' href='jobs-grid.html'>React</a><a class='btn btn-grey-small mr-5' href='jobs-grid.html'>NodeJS</a>
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
                      <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="card-grid-2 hover-up">
                          <div class="card-grid-2-image-left">
                            <div class="image-box"><img src="dist/images/brands/brand-3.png" alt="jobnest"></div>
                            <div class="right-info"><a class='name-job' href='company-details.html'>Bing Search</a><span class="location-small">Cambridge, CA</span></div>
                          </div>
                          <div class="card-block-info">
                            <h6><a href='job-details.html'>Java Software Engineer</a></h6>
                            <div class="mt-5"><span class="card-briefcase">Full time</span><span class="card-time">6<span> minutes ago</span></span></div>
                            <p class="font-sm color-text-paragraph mt-15">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae architecto eveniet, dolor quo repellendus pariatur.</p>
                            <div class="mt-30"><a class='btn btn-grey-small mr-5' href='jobs-grid.html'>Python</a><a class='btn btn-grey-small mr-5' href='jobs-grid.html'>AWS</a><a class='btn btn-grey-small mr-5' href='jobs-grid.html'>Photoshop</a>
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
                      <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="card-grid-2 hover-up">
                          <div class="card-grid-2-image-left">
                            <div class="image-box"><img src="dist/images/brands/brand-4.png" alt="jobnest"></div>
                            <div class="right-info"><a class='name-job' href='company-details.html'>Dailymotion</a><span class="location-small">Cambridge, CA</span></div>
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
                      <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="card-grid-2 hover-up">
                          <div class="card-grid-2-image-left">
                            <div class="image-box"><img src="dist/images/brands/brand-5.png" alt="jobnest"></div>
                            <div class="right-info"><a class='name-job' href='company-details.html'>Linkedin</a><span class="location-small">Cambridge, CA</span></div>
                          </div>
                          <div class="card-block-info">
                            <h6><a href='job-details.html'>React Native Web Developer</a></h6>
                            <div class="mt-5"><span class="card-briefcase">Fulltime</span><span class="card-time">4<span> minutes ago</span></span></div>
                            <p class="font-sm color-text-paragraph mt-15">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae architecto eveniet, dolor quo repellendus pariatur</p>
                            <div class="mt-30"><a class='btn btn-grey-small mr-5' href='jobs-grid.html'>Angular</a>
                            </div>
                            <div class="card-2-bottom mt-30">
                              <div class="row">
                                <div class="col-lg-7 col-7"><span class="card-text-price">$500</span><span class="text-muted">/Hour</span></div>
                                <div class="col-lg-5 col-5 text-end">
                                  <div class="btn btn-apply-now" data-bs-toggle="modal" data-bs-target="#ModalApplyJobForm">Apply now</div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="card-grid-2 hover-up">
                          <div class="card-grid-2-image-left">
                            <div class="image-box"><img src="dist/images/brands/brand-6.png" alt="jobnest"></div>
                            <div class="right-info"><a class='name-job' href='company-details.html'>Quora JSC</a><span class="location-small">Cambridge, CA</span></div>
                          </div>
                          <div class="card-block-info">
                            <h6><a href='job-details.html'>Senior System Engineer</a></h6>
                            <div class="mt-5"><span class="card-briefcase">Part time</span><span class="card-time">5<span> minutes ago</span></span></div>
                            <p class="font-sm color-text-paragraph mt-15">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae architecto eveniet, dolor quo repellendus pariatur.</p>
                            <div class="mt-30"><a class='btn btn-grey-small mr-5' href='job-details.html'>PHP</a><a class='btn btn-grey-small mr-5' href='job-details.html'>Android</a>
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
                      <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="card-grid-2 hover-up">
                          <div class="card-grid-2-image-left">
                            <div class="image-box"><img src="dist/images/brands/brand-7.png" alt="jobnest"></div>
                            <div class="right-info"><a class='name-job' href='company-details.html'>Nintendo</a><span class="location-small">Cambridge, CA</span></div>
                          </div>
                          <div class="card-block-info">
                            <h6><a href='job-details.html'>Products Manager</a></h6>
                            <div class="mt-5"><span class="card-briefcase">Full time</span><span class="card-time">6<span> minutes ago</span></span></div>
                            <p class="font-sm color-text-paragraph mt-15">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae architecto eveniet, dolor quo repellendus pariatur.</p>
                            <div class="mt-30"><a class='btn btn-grey-small mr-5' href='job-details.html'>ASP .Net</a><a class='btn btn-grey-small mr-5' href='job-details.html'>Figma</a>
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
                      <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="card-grid-2 hover-up">
                          <div class="card-grid-2-image-left">
                            <div class="image-box"><img src="dist/images/brands/brand-8.png" alt="jobnest"></div>
                            <div class="right-info"><a class='name-job' href='company-details.html'>Periscope</a><span class="location-small">Cambridge, CA</span></div>
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
                      <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="card-grid-2 hover-up">
                          <div class="card-grid-2-image-left">
                            <div class="image-box"><img src="dist/images/brands/brand-8.png" alt="jobnest"></div>
                            <div class="right-info"><a class='name-job' href='company-details.html'>Periscope</a><span class="location-small">Cambridge, CA</span></div>
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
                    </div>
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
	</body>
  <script>
function deleteItem(itemId) {
    fetch('candidate-profile.php', { 
        method: 'POST',
        body: new URLSearchParams({ 'action': 'delete', 'itemId': itemId }),
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
    })
    .then(response => response.json())
    .then(data => {
        if(data.success) {
            document.getElementById('item-' + itemId).remove(); 
            alert('Job post deleted successfully');
        } else {
            alert(data.message); // Handle failure
        }
    })
    .catch((error) => {
        console.error('Error:', error);
        alert('An error occurred');
    });
}
</script>

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 
<?php 
$res = false;
if(isset($_POST['delete_job'])) {
  
  $job_id = filter_input(INPUT_POST, 'job_id', FILTER_SANITIZE_NUMBER_INT); // Sanitize the input

  // Check if job_id is valid and not empty
  if (!empty($job_id)) {
      $sql = "DELETE FROM tbl_jobs WHERE Job_id = ?"; // SQL query to delete the job post

      
      if ($stmt = $dbconnection->prepare($sql)) {
          // Bind the job_id parameter
          $stmt->bind_param("i", $job_id); 

          // Execute the statement
          if ($stmt->execute()) {
              $res = true;
              $_SESSION['message'] = "Job post deleted successfully.";
              echo "<script>
              swal({
                  title: \"Job Nest\",
                  text: \"" . $_SESSION['message'] . "\",
                  icon: \"success\"
              }).then((value) => {
                  window.location.href = '#tab-my-jobs'; 
              });
            </script>";
            unset($_SESSION['message']);
             
          } else {
              $_SESSION['message'] = "Error deleting job post.";
          }

          // Close the statement
          $stmt->close();
      } else {
          $_SESSION['message'] = "Database prepare error.";
      }
  } else {
      $_SESSION['message'] = "Invalid job ID.";
  }

  header("Location: candidate-profile.php");
  exit;

  if($res==false){
  echo "<script>
    swal({
        title: \"Job Nest\",
        text: \"" . $_SESSION['message'] . "\",
        icon: \"error\"
    }).then((value) => {
        window.location.href = '#tab-my-jobs'; 
    });
  </script>";
    unset($_SESSION['message']);
  }
 
}

?>

</html>