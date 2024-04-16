<?php
include ('include/session.php');
?>
<body>
	
    <header class="header sticky-bar">
      <div class="container">
        <div class="main-header">
          <div class="header-left">
            <div class="header-logo"><a class='d-flex' href='index.php'><img alt="jobnest" src="dist/images/logo.png" width="150" height="50 "></a></div>
          </div>
          <div class="header-nav">
            <nav class="nav-main-menu">
              <ul class="main-menu">
                <li><a class='active' href='index.php'>Home</a></li>
                <li><a href='about.php'>About Us</a></li>
                <li><a href='contact.php'>Contact Us</a></li>
                <?php if(isset($_SESSION['User_id'])): ?>
                  <li><a href='joblist.php'>Job List</a></li>
                  <li><a href='candidate-profile.php'>Profile</a></li>
                  <?php if ($_SESSION['Usertype'] == 'employer'): ?>
                    <li><a href='applied-list.php'>Applied List</a></li>
                  <?php elseif ($_SESSION['Usertype'] == 'job seeker'): ?>
                    <li><a href='save-job.php'>Saved Jobs</a></li>
                  <?php endif; ?>
                <?php endif; ?>
                  
              </ul>
            </nav>
            <div class="burger-icon burger-icon-white"><span class="burger-icon-top"></span><span class="burger-icon-mid"></span><span class="burger-icon-bottom"></span></div>
          </div>
          <div class="header-right">
            <div class="block-signin">
              <?php if(isset($_SESSION['User_id'])): ?>
                    <a class='btn btn-default btn-shadow ml-40 hover-up' href='logout.php'>Logout</a>
                <?php else: ?>
                    <a class='text-link-bd-btom hover-up' href='register.php'>Register</a>
                    <a class='btn btn-default btn-shadow ml-40 hover-up' href='signin.php'>Sign in</a>
                <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </header>
    