<?php 
$conn = new mysqli("localhost","root","75;#)dFys_ei","social");
$conn->set_charset("utf8mb4");
session_start();



    $to_user_id = $_POST['to_user_id'];
    echo $to_user_id;
	// $filename = $_POST['fd'];
	// $target = "files/".basename($filename);

	// $query = "INSERT INTO files(from_userid,to_userid,file) VALUES('".$_SESSION['userid']."','".$to_user_id."','".$filename."')";
	// $result = $conn->query($query);

	// move_uploaded_file($_FILES['file']['tmp_name'], $target);

    


    
    // function fetch_file($from_user_id,$to_user_id,$conn){
    //     $query = "SELECT * FROM files WHERE (from_userid='".$from_user_id."' AND to_userid='".$to_user_id."') OR (from_userid='".$to_user_id."' AND to_userid='".$from_user_id."') ORDER BY timestamp DESC ";
    // $result = $conn->query($query);
    // $output = '<ul class="list-unstyled">';
    // foreach($result as $row){
       
    //     if($row['from_userid'] == $from_user_id){
    //         $output .= '
    //     <li style="border-bottom:1px dotted #ccc">
    //     <div align="right">  
    //     <img src="files/'.$row['file'].'"><br>
                   
    //             -<small><em>'.date('h:i a d/m/Y',strtotime($row['timestamp'])).'</em></small>
               
        
    //     </div>
    //     </li>
    //     ';
    //     } else {
    //         $output .= '
    //     <li style="border-bottom:1px dotted #ccc">
    //     <div align="left">  
    //     <img src="files/'.$row['file'].'"><br>
                   
    //             -<small><em>'.date('h:i a d/m/Y',strtotime($row['timestamp'])).'</em></small>
               
        
    //     </div>
    //     </li>
    //     ';
    //     }
        
    // }
    // $output .= '</ul>';
    
    // return $output;
    // }
		
	
?>

