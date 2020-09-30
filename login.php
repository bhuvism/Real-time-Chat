<?php
session_start();

if(isset($_SESSION['userid'])){
  header('location:welcome.php');
}
if(isset($_POST['btn'])){
    $server = "localhost";
$mysql_username = "<your_mysql_username>";
$mysql_password = "<your_mysql_password>";
$db_name = "<your_db_name>";
$conn = new mysqli($server,$mysql_username,$mysql_password,$db_name);
    if(!$conn){
        echo '<script>alert("Database not connected")</script>';
        echo '<script>document.location.replace("login.php");</script>';
    } else{
        $username = $_POST['username'];
    
    $password = $_POST['pass1'];
    $password= md5($password);
    $query = "SELECT * FROM users WHERE username='".$username."' AND  password='".$password."' ";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
if(!$row){
echo '<script>alert("You are not a registered user!!...Please register and then try logging in. ")</script>';
echo '<script>document.location.replace("register.php");</script>';

die();
} else {
  // if($row['user_email_status'] == 'verified'){
  //   $_SESSION['userid'] = $row['id'];
  //   $_SESSION['username'] = $row['username'];
  //   date_default_timezone_set('Asia/Kolkata');
  //   $current_timestamp = date('Y-m-d H:i:s');
  //   $query = "INSERT INTO login_details(last_activity,userid) VALUES('".$current_timestamp."','".$_SESSION['userid']."')";
  //   $result = $conn->query($query);
  //   if($result){
  //      $_SESSION['last_id'] = $conn->insert_id;
  //   }
  //   header('location:welcome.php');
  // } else {
  //   echo '<script>alert("Please verify your email address first and try logging in")</script>';
  //       echo '<script>document.location.replace("register.php");</script>';
  // }
    
  $_SESSION['userid'] = $row['id'];
    $_SESSION['username'] = $row['username'];
    date_default_timezone_set('Asia/Kolkata');
    $current_timestamp = date('Y-m-d H:i:s');
    $query = "INSERT INTO login_details(last_activity,userid) VALUES('".$current_timestamp."','".$_SESSION['userid']."')";
    $result = $conn->query($query);
    if($result){
       $_SESSION['last_id'] = $conn->insert_id;
    }
    header('location:welcome.php');
}
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Social-chat</title>
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
<script>
  function myFunction(){
   
    var x = document.getElementById("pass1");
    if(x.type === "password"){
     
      x.type = "type"
    } else {
      x.type="password"
    }
  }
</script>

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
        <h2>Login </h2>
        <form action="login.php" method="POST" class="form-container">
                      <div class="modal-body">
                          <div class="form-group">
                              <label class="form-control-label" style="color: white;"> &nbsp; Username</label>
                              <input type="text" name="username"  class="form-control"   placeholder="username" required>
                            </div>
                          
                          <div class="form-group ">
                            <label class="form-control-label" style="color: white;"> &nbsp;Password </label>
                            <input  type="password" id="pass1" name="pass1"  class="form-control "   placeholder=" Password" required  ><br>
                            
                           <input type="checkbox"  onclick="myFunction()"> &nbsp;<label style="color:white;">Show Password</label>
 </div>
                            <!-- <a href="reset_password.php">Forgot Password ?</a> -->
                            
                          </div>
                          
                          <h3 style="background-color:white;"><hr></h3>
                          
                      
      <button type="submit"  name="btn"  id="showit" value="true" class="btn btn-get-started " onclick="loader()" >Authenticate</button><br>
        <small style="color: white;"><b>Not yet Registered?<a href="register.php">&nbsp;Register here</a></b></small>
                         
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



