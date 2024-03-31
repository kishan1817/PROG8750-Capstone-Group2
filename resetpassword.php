<?php
$title = "Reset Password";
include ('include/head.php');
include ('include/header.php');
?>
<main class="main">
  <section class="pt-100 login-register">
    <div class="container"> 
      <div class="row login-register-cover">
        <div class="col-lg-4 col-md-6 col-sm-12 mx-auto">
          <div class="text-center">
            <h2 class="mt-10 mb-5 text-brand-1">Forgot Password</h2>
          </div>
          <form class="login-register text-start mt-20" action="#" method="post">
            <div class="form-group">
              <label class="form-label" for="input-1">New Password *</label>
              <input class="form-control" id="input-1" type="password" required="" name="password" placeholder="Demo@123">
            </div>
            <div class="form-group">
              <label class="form-label" for="input-1">Confirm Password *</label>
              <input class="form-control" id="input-1" type="password" required="" name="cpassword" placeholder="Demo@123">
            </div>
            <div class="form-group">
              <button class="btn btn-brand-1 hover-up w-100" type="submit" name="reset">Reset Password </button>
            </div>
            <div class="text-muted text-center">Want to Login?<a href='signin.php'>Login</a></div>
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
<?php
    if(isset($_POST["reset"])){
        include('../include/config.php');
        $pwd = $_POST["password"];
        $pwd2 = $_POST["cpassword"];
        
        $Email = isset($_GET['email']) ? $_GET['email'] : '';

        if($pwd == $pwd2){
        $sql = mysqli_query($dbconnection, "SELECT * FROM tbl_users WHERE Email='$Email'");
        $query = mysqli_num_rows($sql);
  	    $fetch = mysqli_fetch_assoc($sql);

        if($Email){
            mysqli_query($dbconnection, "UPDATE tbl_users SET Password='$pwd' WHERE Email='$Email'");
            ?>
            <script>
              
                alert("<?php echo "your password has been succesfully reset"?>");
                window.location.replace("index.php");
            </script>
            <?php
        }else{
            ?>
            <script>
                alert("<?php echo "Please try again"?>");
            </script>
            <?php
        }
      }
      else{
        ?>
        <script>
            alert("<?php echo "Both Password should be match"?>");
        </script>
        <?php
      }
    }

?>
