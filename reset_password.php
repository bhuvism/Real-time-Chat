<?php 
$server = "localhost";
$mysql_username = "<your_mysql_username>";
$mysql_password = "<your_mysql_password>";
$db_name = "<your_db_name>";
$conn = new mysqli($server,$mysql_username,$mysql_password,$db_name);
if(isset($_POST['btn'])){
    $username = $_POST['username'];
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];

    if($pass1 == $pass2){
            $password = md5($pass1);
            $query = "UPDATE users SET password='$password' WHERE username='$username' ";
            $result = $conn->query($query);
            $query2 = "SELECT * FROM users WHERE username='".$username."' AND  password='".$password."' ";
            $result2 = $conn->query($query2);
            $row = $result2->fetch_assoc();
            if($row){
                echo '<script>alert("Password Reset process returned with status 200")</script>';
        echo '<script>document.location.replace("login.php");</script>';
            } else {
                echo '<script>alert("Enter same username you entered during Registering")</script>';
            }
    } else {
        echo '<script>alert("Passwords does not match")</script>';
        echo '<script>document.location.replace("reset_password.php");</script>';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
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
        <h2>Reset Password </h2>
        <form action="" method="POST" class="form-container">
                      <div class="modal-body">
                          <div class="form-group">
                              <label class="form-control-label" style="color: white;"> &nbsp; Username</label>
                              <input type="text" name="username"  class="form-control"   placeholder="username entered during Registering" required>
                            </div>
                          
                          <div class="form-group">
                            <label class="form-control-label" style="color: white;"></i> &nbsp;New Password </label>
                            <input type="password" name="pass1"  class="form-control"   placeholder=" Password" required>
                            
                            
                          </div>
                          <div class="form-group">
                            <label class="form-control-label" style="color: white;"></i> &nbsp;Confirm Password </label>
                            <input type="password" name="pass2"  class="form-control"   placeholder="re-enter password" required>
                            
                            
                          </div>
                          
                          <h3 style="background-color:white;"><hr></h3>
                          
                         
                      
      <button type="submit"  name="btn"  id="showit" value="true" class="btn btn-get-started " onclick="loader()" >Reset Password</button>
       
                         
                          </div>
         
                          
                        </form>
      </div>

    </div>
  </section>

  <section  id="contact" class="contact section-bg"  >
  <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6 footer-info">
            <h3>Web Connect</h3>
            <small><em><p>Web based Real-time Chat Application</p></em></small>
           <a href="#"> <p>Login or Sign-up to get started from the above menu area</p></a>
          </div>
</div></div>
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
         <p>Mysuru<br>Karnataka, IN 570023</p>
        </div>
</div>
</div>
<div class="col-lg-4">
      <div class="info d-flex flex-column justify-content-center" data-aos="fade-right">
        <div class="email">
          <i class="	fa fa-envelope"></i>
          <h4> Email:</h4>
          <p>bhuvanbhuvism@gmail.com</p>
        </div>
</div></div>
<div class="col-lg-4">
      <div class="info d-flex flex-column justify-content-center" data-aos="fade-right">

        <div class="phone">
          <i class="fa fa-phone"></i>
          <h4> Call:</h4>
          <p>+919740411323</p>
        </div>

      </div>

    </div>

    <div class="col-lg-4 mt-3 mt-lg-0">
    
      <i class="fa fa-globe fa-2x"></i>
       <h4>Social links</h4>
       <div class="social-links">
              <a href="https://twitter.com/BhuvanSM1" target="_blank" class="twitter"><i class="fa fa-twitter"></i></a>
              
              <a href="https://www.instagram.com/bhuviism/" target="_blank" class="instagram"><i class="fa fa-instagram"></i></a>
              <a href="https://www.linkedin.com/in/bhuvan-jain-s-m-55382b196/"  target="_blank" class="linkedin"><i class="fa fa-linkedin"></i></a>
              <a href="https://github.com/bhuvism" target="_blank" class="GitHib"><i class="fa fa-github"></i></a>
            </div>
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
