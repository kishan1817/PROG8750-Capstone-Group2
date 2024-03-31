<?php
$title = "Forgot Password";
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
              <label class="form-label" for="input-1">Email address *</label>
              <input class="form-control" id="input-1" type="text" required="" name="Email" placeholder="demo@gmail.com">
            </div>
            <div class="form-group">
              <button class="btn btn-brand-1 hover-up w-100" type="submit" name="Recover">Recover Password</button>
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
    if(isset($_POST["Recover"])){
        include('../include/config.php');
        $email = $_POST["Email"];

        $sql = mysqli_query($dbconnection, "SELECT * FROM tbl_users WHERE Email='$email'");
        $query = mysqli_num_rows($sql);
  	    $fetch = mysqli_fetch_assoc($sql);

        if(mysqli_num_rows($sql) <= 0){
            ?>
            <script>
                alert("<?php  echo "Sorry, no emails exists "?>");
            </script>
            <?php
        }else if($fetch["Status"] == 0){
            ?>
               <script>
                   alert("Sorry, your account must verify first, before you recover your password !");
                   window.location.replace("signin.php");
               </script>
           <?php
        }else{
            // generate token by binaryhexa 
            $token = bin2hex(random_bytes(50));

            //session_start ();
            $_SESSION['token'] = $token;
            $_SESSION['email'] = $email;

            require "Mail/phpmailer/PHPMailerAutoload.php";
            $mail = new PHPMailer;
            $mail->SMTPDebug = 2;
            $mail->isSMTP();
            $mail->Host='smtp.gmail.com';
            $mail->Port=587;
            $mail->SMTPAuth=true;
            $mail->SMTPSecure='tls';

            // h-hotel account
            $mail->Username='18bmiit067@gmail.com';
            $mail->Password='ylhd gqfr kjvd geev';

            // send by h-hotel email
            $mail->setFrom('18bmiit067@gmail.com', 'Password Reset');
            // get email from input
            $mail->addAddress($_POST["Email"]);
            //$mail->addReplyTo('lamkaizhe16@gmail.com');

            // HTML body
            $mail->isHTML(true);
            $mail->Subject="Recover your password";
            $mail->Body="<b>Dear User</b>
            <h3>We received a request to reset your password.</h3>
            <p>Kindly click the below link to reset your password</p>
            http://localhost/JOBNEST/resetpassword.php?email=$email
            <br><br>
            <p>With regrads,</p>
            <b>JobNest</b>";

            if(!$mail->send()){
                ?>
                    <script>
                        alert("<?php echo " Invalid Email "?>");
                    </script>
                <?php
            }else{
                ?>
                    <script>
                        window.location.replace("notification.html");
                    </script>
                <?php
            }
        }
    }


?>
