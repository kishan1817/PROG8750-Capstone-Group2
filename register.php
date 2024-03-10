<?php
	$title = "Home Page";
	include ('include/head.php');
	include ('include/header.php');

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include('include/config.php');

    // Retrieve form data
    $firstName = mysqli_real_escape_string($dbconnection, $_POST['First_Name']);
    $lastName = mysqli_real_escape_string($dbconnection, $_POST['Last_Name']);
    $email = mysqli_real_escape_string($dbconnection, $_POST['Email']);
    $password = mysqli_real_escape_string($dbconnection, $_POST['Password']);
    $phone = mysqli_real_escape_string($dbconnection, $_POST['Phone']);
    $userType = isset($_POST['User']) ? 'employer' : 'job seeker';

    // Initial error message
    $errorMsg = '';

    // Check if email already exists
    $emailCheckQuery = "SELECT Email FROM tbl_users WHERE Email='$email'";
    $emailCheckResult = mysqli_query($dbconnection, $emailCheckQuery);
    if (mysqli_num_rows($emailCheckResult) > 0) {
        $errorMsg .= 'Email already exists.\\n';
    }

    // Validate password
    if (!preg_match("/^(?=.\d)(?=.[A-Z])(?=.*\W).{8,}$/", $password)) {
        $errorMsg .= 'Password must be at least 8 characters long, include at least one uppercase letter, one symbol, and one number.\\n';
    }

    // Validate first and last name
    if (!preg_match("/^[a-zA-Z]*$/", $firstName)) {
        $errorMsg .= 'First Name must contain only alphabets.\\n';
    }
    if (!preg_match("/^[a-zA-Z]*$/", $lastName)) {
        $errorMsg .= 'Last Name must contain only alphabets.\\n';
    }
    if (!preg_match("/^[0-9]{10}$/", $phone)) {
      $errorMsg .= 'Phone number must be exactly 10 digits.\\n';
     }

    // If there are any errors, don't insert and show SweetAlert
    if (!empty($errorMsg)) {
        echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
        echo "<script>swal({ title: 'Registration Error', text: \"$errorMsg\", icon: 'error'}).then((value) => {
            window.location.href = 'register.php';
        });</script>";
    } else {
        // If validation passes, insert user
        $query = "INSERT INTO tbl_users (First_Name, Last_Name, Email, Password, Phone, User) VALUES ('$firstName', '$lastName', '$email', '$password', '$phone', '$userType')";
        if (mysqli_query($dbconnection, $query)) {
            echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
            echo "<script>swal({ title: 'Job Nest', text: 'Registration successful!', icon: 'success'}).then((value) => {
                window.location.href = 'signin.php';
            });</script>";
        } else {
            $errorMsg = 'Error in registration. Please try again.';
            echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
            echo "<script>swal({ title: 'Job Nest', text: \"$errorMsg\", icon: 'error'}).then((value) => {
                window.location.href = 'register.php';
            });</script>";
        }
    }
}
?>
	<main class="main">
      <section class="pt-100 login-register">
        <div class="container"> 
          <div class="row login-register-cover">
            <div class="col-lg-4 col-md-6 col-sm-12 mx-auto">
              <div class="text-center">
                <p class="font-sm text-brand-2">Register </p>
                <h2 class="mt-10 mb-5 text-brand-1">Start for free Today</h2>
                <p class="font-sm text-muted mb-30">Access to all features. No credit card required.</p>
                <button class="btn social-login hover-up mb-20"><img src="dist/images/homepage/icons/icon-google.svg" alt="jobnest"><strong>Sign up with Google</strong></button>
                <div class="divider-text-center"><span>Or continue with</span></div>
              </div>
              <form class="login-register text-start mt-20" action="register.php" method="post">
                <div class="form-group">
                  <label class="form-label" for="First_Name">First Name *</label>
                  <input class="form-control" id="First_Name" type="text" required="" name="First_Name" placeholder="Ajay">
                </div>
                <div class="form-group">
                  <label class="form-label" for="Last_Name">Last Name *</label>
                  <input class="form-control" id="Last_Name" type="text" required="" name="Last_Name" placeholder="Gosai">
                </div>
                <div class="form-group">
                  <label class="form-label" for="Phone">Phone Number*</label>
                  <input class="form-control" id="Phone" type="text" required="" name="Phone" placeholder="9876543210">
                </div>
                <div class="form-group">
                  <label class="form-label" for="Email">Email *</label>
                  <input class="form-control" id="Email" type="email" required="" name="Email" placeholder="ajaygosai@gmail.com">
                </div>
                <div class="form-group">
                  <label class="form-label" for="Password">Password *</label>
                  <input class="form-control" id="Password" type="password" required="" name="Password" placeholder="************">
                </div>
                <div class="login_footer form-group d-flex justify-content-between">
                  <label class="cb-container">
                    <input type="checkbox" id="User" name="User"><span class="text-small">Register as a employer</span><span class="checkmark"></span>
                  </label>
                  <label class="cb-container">
                    <input type="checkbox"><span class="text-small">Agree our terms and policy</span><span class="checkmark"></span>
                  </label>
                </div>
                <div class="form-group">
                  <button class="btn btn-brand-1 hover-up w-100" type="submit" name="login">Submit &amp; Register</button>
                </div>
                <div class="text-muted text-center">Already have an account? <a href='signin.php'>Sign in</a></div>
              </form>
            </div>
            <div class="img-2"><img src="dist/images/login/img-2.svg" alt="jobnest"></div>
          </div>
        </div>
      </section>
    </main>
<?php
		include ('include/footer.php');
		include ('include/script.php');
	?>
	</body>
 
</html>