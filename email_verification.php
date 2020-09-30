<?php  
$server = "localhost";
$mysql_username = "<your_mysql_username>";
$mysql_password = "<your_mysql_password>";
$db_name = "<your_db_name>";
$conn = new mysqli($server,$mysql_username,$mysql_password,$db_name);
$conn->set_charset("utf8mb4");
session_start();
$message ='';
if(isset($_GET['activation_code'])){
    $query = "SELECT * FROM users WHERE user_activation_code = '".$_GET['activation_code']."' ";
    $result = $conn->query($query);
    $rows = $result->num_rows;
    if($rows > 0){
        foreach($result as $row){
            if($row['user_email_status'] == 'not verified'){
                $q = "UPDATE users SET user_email_status='verified' WHERE id='".$row['id']."' ";
                $res = $conn->query($q);
                if($res){
                    $message = '<label class="text-success">Your Email Address has been Successfully Verified <br />You can login here - <a href="login.php">Login</a></label>';
                }
            } else {
                $message = '<label class="text-info">Your Email Address has been already Verified</label>';
            }
        }
    } else {
        $message = '<label class="text-danger">Invalid Link</label>';
    }
}
?>

<!DOCTYPE html>
<html>
 <head>
  <title>Email Verification</title>  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
  
  <div class="container">
   <h1 align="center">Email Verification</h1>
  
   <h3><?php echo $message; ?></h3>
   
  </div>
 
 </body>
 
</html>
