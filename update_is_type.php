<?php 
  $server = "localhost";
$mysql_username = "<your_mysql_username>";
$mysql_password = "<your_mysql_password>";
$db_name = "<your_db_name>";
$conn = new mysqli($server,$mysql_username,$mysql_password,$db_name);
   $conn->set_charset("utf8mb4");
   session_start();
   $query = "UPDATE login_details SET is_type='".$_POST['is_type']."' WHERE login_details_id='".$_SESSION['last_id']."'";
   $result = $conn->query($query);
  
   
   ?>
