<?php
$title = "Home Page";
include ('include/head.php');
include ('include/header.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include('include/config.php'); 

    $email = mysqli_real_escape_string($dbconnection, $_POST['Email']);
    $password = $_POST['Password'];

    $query = "SELECT * FROM tbl_users WHERE Email='$email'"; 
    $result = mysqli_query($dbconnection, $query);
    
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if($row['Status']==1){
          if ($password==$row['Password']) {
            $_SESSION['User_id'] = $row['User_id']; 
            $_SESSION['Usertype'] = $row['User'];
            $type = "success";
            $msg = "Login successful!";
            echo "<script>
              swal({
                  title: \"Job Nest\",
                  text: \"" . $msg . "\",
                  icon: \"success\"
              }).then((value) => {
                  window.location.href = 'index.php'; // Redirect to homepage or dashboard
              });
            </script>";
        
            
          } else {
              $type = "error";
            $msg = "Invalid Password";
            print_r("<script>swal({ title:\"Job Nest\", text: '".$msg."', icon: \"".$type."\"});</script>");
          }
        }
        else{
          $type = "error";
          $msg = "Account Blocked";
          print_r("<script>swal({ title:\"Job Nest\", text: '".$msg."', icon: \"".$type."\"});</script>");
        }
    } else {
        $type = "error";
          $msg = "Email doesn't exist";
          print_r("<script>swal({ title:\"Job Nest\", text: '".$msg."', icon: \"".$type."\"});</script>");
    }
}
?>

<main class="main">
  <section class="pt-100 login-register">
    <div class="container"> 
      <div class="row login-register-cover">
        <div class="col-lg-4 col-md-6 col-sm-12 mx-auto">
          <div class="text-center">
            <p class="font-sm text-brand-2">Welcome back!</p>
            <h2 class="mt-10 mb-5 text-brand-1">Member Login</h2>
            <button class="btn social-login hover-up mb-20"><img src="dist/images/homepage/icons/icon-google.svg" alt="jobnest"><strong>Sign in with Google</strong></button>
            <div class="divider-text-center"><span>Or continue with</span></div>
          </div>
          <form class="login-register text-start mt-20" action="signin.php" method="post">
            <div class="form-group">
              <label class="form-label" for="input-1">Email address *</label>
              <input class="form-control" id="input-1" type="text" required="" name="Email" placeholder="ajaygosai@gmail.com">
            </div>
            <div class="form-group">
              <label class="form-label" for="input-4">Password *</label>
              <input class="form-control" id="input-4" type="password" required="" name="Password" placeholder="************">
            </div>
            <div class="login_footer form-group d-flex justify-content-between">
              <label class="cb-container">
                <input type="checkbox"><span class="text-small">Remember me</span><span class="checkmark"></span>
              </label><a class='text-muted' href='forgetpassword.php'>Forgot Password</a>
            </div>
            <div class="form-group">
              <button class="btn btn-brand-1 hover-up w-100" type="submit" name="login">Login</button>
            </div>
            <div class="text-muted text-center">Don't have an Account? <a href='register.php'>Sign up</a></div>
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