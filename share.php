<?php
$conn = new mysqli("localhost","root","75;#)dFys_ei","social");
session_start();


    

    $query = "SELECT * FROM users WHERE id !='".$_SESSION['userid']."' ";
    $result = $conn->query($query);
   

    $output = '
    <table class="table table-bordered table-striped">
        <tr>
            <th scope="col">Username</th>
            <th scope="col"></th>
           
           
        </tr>
    ';
    foreach($result as $row){
        $_SESSION['rowusername'] = $row['username'];
        
        $output .= '
            <tr>
                <td>'.$row['username'].'  </td>
                
                <td><button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-info btn-xs select_file" data-touserid="'.$row['id'].'" data-tousername="'.$row['username'].'" >Select</button> </td>
              
            </tr>
        ';
    }
    $output .= '</table>';
    echo $output;

   ?>