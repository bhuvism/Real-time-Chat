<?php 
  $server = "localhost";
$mysql_username = "<your_mysql_username>";
$mysql_password = "<your_mysql_password>";
$db_name = "<your_db_name>";
$conn = new mysqli($server,$mysql_username,$mysql_password,$db_name);
    $conn->set_charset("utf8mb4");
    session_start();
    ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

    $query = "SELECT * FROM users WHERE id !='".$_SESSION['userid']."' ";
    $result = $conn->query($query);
   

    $output = '
    <table class="table table-bordered table-striped">
        <tr>
            <th scope="col">Username</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
           
        </tr>
    ';
    foreach($result as $row){
        $_SESSION['rowusername'] = $row['username'];
        $status = '';
        date_default_timezone_set('Asia/Kolkata');
      
        $current_timestamp = date('Y-m-d H:i:s');
        $current_timestamp = date('Y-m-d H:i:s',strtotime($current_timestamp)-10);
        $user_last_activity = fetch_user_last_activity($row['id'],$conn);
        
        if($user_last_activity > $current_timestamp){
            $status = '<span class="label btn-success">online</span>';
        } else {
            $status = '<small><em><span >Last seen at &nbsp;'.fetch_last_activity($row['id'],$conn).'</span></em></small>';
        }
        $output .= '
            <tr>
                <td>'.$row['username'].''.count_unseen_message($_SESSION['userid'],$row['id'],$conn). '  </td>
                <td>'.$status.'</td>
                <td><button type="button" class="btn btn-info btn-xs start_chat" data-touserid="'.$row['id'].'" data-tousername="'.$row['username'].'" >Connect !</button> </td>
              
            </tr>
        ';
    }
    $output .= '</table>';
    echo $output;

    function fetch_user_last_activity($user_id,$conn){
        $query = "SELECT * FROM login_details WHERE userid='$user_id' ORDER BY last_activity DESC LIMIT 1 ";
        $result = $conn->query($query);

        foreach($result as $row){
            return $row['last_activity'];
        }
    }

    function count_unseen_message($to_user_id,$from_user_id,$conn){
        $query = "SELECT * FROM chat_message WHERE from_userid='$from_user_id' AND to_userid='$to_user_id' AND status='1' ";
        $result = $conn->query($query);
        $count = $result->num_rows;
        $output = '';
        if($count > 0){
            $output = '&nbsp;<span style="border-radius:70%;" class="label btn-success">'.$count.'</span>';
        }
        return $output;
    }

    

    function fetch_last_activity($user_id,$conn){
        
        $query = "SELECT * FROM login_details WHERE userid='".$user_id."' ORDER BY last_activity DESC LIMIT 1 ";
        $result = $conn->query($query);
        foreach($result as $row){
            return  date('h:i a d/m/Y',strtotime($row['last_activity'])) ;
        }
    }
?>
