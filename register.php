<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['btn'])){
    $conn = new mysqli("localhost","root","75;#)dFys_ei","social");
    if(!$conn){
        echo '<script>alert("Database not connected")</script>';
    } else {
        $username = $_POST['username'];
    $email = $_POST['email'];
    $password1 = $_POST['pass1'];
    $password2 = $_POST['pass2'];
    $q = "SELECT * FROM users WHERE email='".$email."'";
    $res = $conn->query($q);
    $res = $res->fetch_assoc();
   
    if($res){
      echo '<script>alert("Please register with different email")</script>';
            echo '<script>document.location.replace("register.php");</script>';
    }
    if($password1 == $password2){
        $password = md5($password1);
        $query1 = "SELECT * FROM users WHERE username='".$username."' OR  password='".$password."' ";
        $result1 = $conn->query($query1);
        $row1 = $result1->fetch_assoc();
        if($row1){
            echo '<script>alert("If you are already a registered user,try logging in to our chat system OR try Registering with different Username and Password")</script>';
            echo '<script>document.location.replace("index.php");</script>';
        } else{
          $user_activation_code = md5(rand());
          $user_email_status = 'not verified';
            $query = "INSERT INTO users(username,email,password,user_activation_code,user_email_status) VALUES('$username','$email','$password','$user_activation_code','$user_email_status')";
        $result = mysqli_query($conn, $query);
        if($result){
          echo '<script>alert("Congratulations! You have successfully Registered!")</script>';
          echo '<script>document.location.replace("login.php");</script>';
          // $base_url = "https://peer-connect.ml/";
          // require 'assets/vendor/autoload.php';
          // // require 'PHPMailerAutoload.php';
          
          // $mail = new PHPMailer;
          
          // $mail->isSMTP();                                      // Set mailer to use SMTP
          // $mail->Host = 'smtp.mailgun.org';                     // Specify main and backup SMTP servers
          // $mail->SMTPAuth = true;                               // Enable SMTP authentication
          // $mail->Username = 'postmaster@peer-connect.ml';   // SMTP username
          // $mail->Password = 'f2b716eecc3fbe4bc36a549364673699-07e45e2a-09c3ed68';                           // SMTP password
          // $mail->SMTPSecure = 'tls';                            // Enable encryption, only 'tls' is accepted
          
          // $mail->From = 'we@peer-connect.ml';
          // $mail->FromName = 'Peer-connect';
          // $mail->addAddress($email);                 // Add a recipient
          
          // $mail->WordWrap = 50;                                 // Set word wrap to 50 characters
          
          // $mail->Subject = 'User Registration Message';
          // $mail->Body    = 'Hi'  . $username.' ,
          // Thanks for Registration. Your password is '.$password1.', This password will work only after your email verification.
          // Please Open this link to verify your email address - '.$base_url.'email_verification.php?activation_code='.$user_activation_code.'
          // Best Regards, Peer-connect';
          
          // if($mail->send()) {
          //     echo '<script>alert("User Verification link has been mailed to '.$email.',, Please login through the link  mailed to you ")</script>';
             
          // } else {
          //   echo 'Mailer Error: ' . $mail->ErrorInfo;
          // }
   
   
   
        } else {
            echo '<script>alert("Registration declined")</script>';
        }
    }
        
        
    } else {
        echo '<script>alert("Passwords doesnt match")</script>';
        echo '<script>document.location.replace("register.php");</script>';
    }
    }
    
   
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register!</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
<div id="preloader"></div>
<header id="header" class="fixed-top">
        <div class="container">
    
          <div class="logo float-left">
            <h1 class="text-light"><a href="#header"><img src="assets/img/log.png"  style="border-radius:50%;"> <span>Web Connect</span></a></h1>
          </div>
    
          <nav class="main-nav float-right d-none d-lg-block">
            <ul >
              <li class="active"><a href="index.php">Home</a></li>
              <li><a href="login.php">Login</a></li>
              <li><a href="register.php">Sign up</a> </li>
             
              
              
            </ul>
          </nav>
    
        </div>
      </header>

      <section id="introo" class="clearfix">
    <div class="container">


      <div class="introo-info">
        <h2>Register </h2>
        <form action="" method="POST" class="form-container">
              <div class="modal-body">
                  <div class="form-group">
                      <label class="form-control-label" style="color: white;"> &nbsp; Username</label>
                      <input type="text" name="username"  class="form-control"   placeholder="username" required>
                    </div>
                    <div class="form-group">
                    <label class="form-control-label" style="color: white;"></i> &nbsp;Email </label>
                    <input type="email" name="email"  class="form-control"   placeholder="your email-id" required>
                    
                  </div>
                  <div class="form-group">
                    <label class="form-control-label" style="color: white;"></i> &nbsp;Password </label>
                    <input type="password" name="pass1"  class="form-control"   placeholder=" Password" required>
                    
                  </div>
                  <div class="form-group">
                    <label class="form-control-label" style="color: white;"></i> &nbsp;Confirm Password </label>
                    <input type="password" name="pass2"  class="form-control"   placeholder="re-enter your password" required>
                    
                  </div>
                  <h3 style="background-color:white;"><hr></h3>
                  
                 
              
<button type="submit"  name="btn"  id="showit" value="true" class="btn-get-started scrollto " onclick="loader()" >Register</button><br>
<small style="color: white;"><b>Already a user?&nbsp;<a href="login.php">Login here</a></b></small>
                 
                  </div>
 
                  
                </form>
      </div>

    </div>
  </section>

  <section  id="contact" class="contact section-bg"  >
<div class="container">

  <div class="section-title" >
    <h2>Contact</h2>
    <p>Contact us for any queries</p>
  </div>

  <div class="row">

    <div class="col-lg-4">
      <div class="info d-flex flex-column justify-content-center" data-aos="fade-right">
        <div class="address">
          <i class="fa fa-map-marker"></i>
          <h4> Location:</h4>
         <p>Mysuru , Karnataka<p>
        </div>

        <div class="email">
          <i class="	fa fa-envelope"></i>
          <h4> Email:</h4>
          <p>me@bhuvan.me</p>
        </div>

        <div class="phone">
          <i class="fa fa-phone"></i>
          <h4> Call:</h4>
          <p>+91 9740411323</p>
        </div>

      </div>

    </div>

    <div class="col-lg-8 mt-5 mt-lg-0">

      <form action="mail.php" method="GET" role="form" class="php-email-form" data-aos="fade-left">
        <div class="form-row">
          <div class="col-md-6 form-group">
            <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
            <div class="validate"></div>
          </div>
          <div class="col-md-6 form-group">
            <input type="email" class="form-control" name="from" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
            <div class="validate"></div>
          </div>
        </div>
        <div class="form-group">
          <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
          <div class="validate"></div>
        </div>
        <div class="form-group">
          <textarea class="form-control" name="body" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
          <div class="validate"></div>
        </div>
        <div class="mb-3">
          <div class="loading">Loading</div>
          <div class="error-message">This is a beta feature. Please contact us through the email provided above</div>
          <div class="sent-message">Your message has been sent. Thank you!</div>
        </div>
        <div class="text-center"><button type="submit">Send Message</button></div>
      </form>

    </div>

  </div>

</div>
</section>

<footer id="footer" >

      
      <div class="credits">
       <h6 style="padding-top:35px;"> Developed by <a target="_blank" href="https://www.instagram.com/bhuviism/"><b>Bhuvan S M</b></a></h6><br>
       
      </div>
   
</footer>



<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
<script src="https://cdn.jsdelivr.net/npm/darkmode-js@1.5.5/lib/darkmode-js.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
   
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/counterup/counterup.min.js"></script>
    <script src="assets/vendor/mobile-nav/mobile-nav.js"></script>
    <script src="assets/vendor/wow/wow.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
    <script src="assets/vendor/venobox/venobox.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
</body>
</html>