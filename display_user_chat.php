<?php  
$conn = new mysqli("localhost","root","75;#)dFys_ei","social");
session_start();

$_SESSION['to_user_id'] = $_POST['to_user_id'];


  $output = '
  
<header id="header" class="fixed-top">
<div class="container">

  <div class="logo float-left">
<a href="welcome.php"><i class="fas fa-angle-left"></i></a> &nbsp;<span style="color:white;"><strong>'.$_POST['to_user_name'].'</strong></span></a></h1>

  </div><br>
  <div id="content">
  <small style="color:white;">'.fetch_is_type_status($_POST['to_user_id'],$conn).'</small>
</div>
  
  

</div>
</header>
<br><br><br><br>
<div class="container">
<div id="user_dialog_'.$_POST['to_user_id'].'" class="user_dialog" >
<div style="height:450px; border:1px solid #ccc; overflow-y: scroll; margin-bottom:24px; padding:16px; background-color:black;" class="chat_history" data-touserid="'.$_POST['to_user_id'].'" id="chat_history_'.$_POST['to_user_id'].'">
</div>
<div class="form-group">

<textarea placeholder="Type a message" name="chat_message_'.$_POST['to_user_id'].'" id="chat_message_'.$_POST['to_user_id'].'" class="form-control chat_message"></textarea>
</div><div class="form-group" align="right">
<button type="button" name="send_chat" id="'.$_POST['to_user_id'].'" class="btn btn-info send_chat">Send</button></div></div>
</div>

';



  
echo $output;



function fetch_is_type_status($user_id,$conn){
  $query = "SELECT is_type FROM login_details WHERE userid='".$user_id."' ORDER BY last_activity DESC LIMIT 1";
  $result = $conn->query($query);
  $output='';
  foreach($result as $row){
      if($row['is_type'] == 'yes'){
          $output = 'typing...';
          
      } else {
        $output ='';
      }
  }
  return $output;
}



?>
