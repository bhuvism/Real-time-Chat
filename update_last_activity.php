<?php 
  $conn = new mysqli("localhost","root","75;#)dFys_ei","social");
  session_start();
  date_default_timezone_set('Asia/Kolkata');
    $current_timestamp = date('Y-m-d H:i:s');
 $query = "UPDATE login_details SET last_activity='$current_timestamp' WHERE login_details_id = '".$_SESSION['last_id']."'";
 $result = $conn->query($query);

?>