<?php 
  $server = "localhost";
$mysql_username = "<your_mysql_username>";
$mysql_password = "<your_mysql_password>";
$db_name = "<your_db_name>";
$conn = new mysqli($server,$mysql_username,$mysql_password,$db_name);
  session_start();
  date_default_timezone_set('Asia/Kolkata');
    $current_timestamp = date('Y-m-d H:i:s');
 $query = "UPDATE login_details SET last_activity='$current_timestamp' WHERE login_details_id = '".$_SESSION['last_id']."'";
 $result = $conn->query($query);

?>
