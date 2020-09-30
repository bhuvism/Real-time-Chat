<?php 
   $conn = new mysqli("localhost","root","75;#)dFys_ei","social");
   $conn->set_charset("utf8mb4");
   session_start();
   $query = "UPDATE login_details SET is_type='".$_POST['is_type']."' WHERE login_details_id='".$_SESSION['last_id']."'";
   $result = $conn->query($query);
  
   
   ?>