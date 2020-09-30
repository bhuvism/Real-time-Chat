<?php  
$conn = new mysqli("localhost","root","75;#)dFys_ei","social");
$conn->set_charset("utf8mb4");
session_start();

echo fetch_user_chat_history($_SESSION['userid'],$_POST['to_user_id'],$conn);

function   fetch_user_chat_history($from_user_id,$to_user_id,$conn){
    $query = "SELECT * FROM chat_message WHERE (from_userid='".$from_user_id."' AND to_userid='".$to_user_id."') OR (from_userid='".$to_user_id."' AND to_userid='".$from_user_id."') ORDER BY timestamp DESC ";
    $result = $conn->query($query);
    $output = '<ul class="list-unstyled">';
    foreach($result as $row){
       
        if($row['from_userid'] == $from_user_id){
            $output .= '
        <li style="border-bottom:1px dotted #ccc">
        <div align="right">  
        <p style="color:white; justify-content:center;"><strong>'.detect_url($row['chat_message']).'</strong><br>
                   
                -<small><em>'.date('h:i a d/m/Y',strtotime($row['timestamp'])).'</em></small>
               
        </p>
        </div>
        </li>
        ';
        } else {
            $output .= '
        <li style="border-bottom:1px dotted #ccc">
        <div align="left">  
        <p style="color:white;"><strong>'.detect_url($row['chat_message']).'</strong><br>
                   
                -<small><em>'.date('h:i a d/m/Y',strtotime($row['timestamp'])).'</em></small>
               
        </p>
        </div>
        </li>
        ';
        }
        
    }
    $output .= '</ul>';
   
    // $query1 = "UPDATE chat_message SET status = '0' WHERE from_userid='".$to_user_id."' AND to_userid='".$from_user_id."' ";
    // $conn->query($query1);
    return $output;
}

function detect_url($text){
    $text = html_entity_decode($text);
    $text = "".$text;
    $text = preg_replace('/(https{0,1}:\/\/[\w\-\.\/#?&=]*)/','<a href="$1" target="_blank">$1</a>',$text);
    return $text;
}

// function get_user_name($user_id,$conn){
//     $query = "SELECT username from users WHERE id='$user_id' ";
//     $result = $conn->query($query);
//     foreach($result as $row){
//         return $row['username'];
//     }
   
// }

?>