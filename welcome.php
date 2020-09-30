<?php
$conn = new mysqli("localhost","root","75;#)dFys_ei","social");
$conn->set_charset("utf8mb4");
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(!isset($_SESSION['userid'])){
   
      header('Location: login.php');
  
    
}

$user = $_SESSION['username'];



?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connect here!</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <!-- <link rel="stylesheet" href="assets/css/emojione.picker.css">
<script type="text/javascript" src="assets/js/emojione.picker.min.js"></script> -->
<link rel="stylesheet" href="https://cdn.rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.css">
<script src="https://cdn.rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.js"></script>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script> 
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<style>
 
#user_details tbody tr  {
  background-color: #2c2c33;
  color:white;
}
  </style>
  </head>
 
  <header id="header" class="fixed-top">
        <div class="container">
    
          <div class="logo float-left">
            <h1 class="text-light"><a href="#header"><img src="assets/img/log.png"  style="border-radius:50%;"> <span>Hi, <?php echo  $user; ?></span></a></h1>
            
          </div>

          <!-- <ul style="float:right; " class="nav nav-tabs ">
  <li class="nav-item">
    <a  class="nav-link active" href="logout.php">Logout</a>
  </li></ul> -->

  <nav class="main-nav float-right d-none d-lg-block">
            <ul >
              <!-- <li class="active"><a href="index.php">Home</a></li>
              <li><a href="login.php">Login</a></li> -->
              <li><a href="private_share.html">Private Share</a> </li>
              <li><a href="logout.php">Logout</a> </li>
             
            </ul>
          </nav>
    
        </div>
      </header><br><br><br><br>

 
      
      <div   class="table-responsive">
        
        <div style="margin:10px;" id="user_details"></div>
        <div id="user_model_details"></div>
      
      </div>
      
     <script>
      
        $(document).ready(function(){

          setInterval(function(){
            update_last_activity();
            fetch_user();
            update_chat_history_data();
            is_type();
          }, 5000);

          function is_type(){
            $.ajax({
              url:"display_user_chat.php",
              success:function(){

              }
            })
          }

         

          function fetch_user(){
            $.ajax({
              url:"fetch_user.php",
              method:"POST",
              success:function(data){
                  $('#user_details').html(data);
               }
            });
          }
          function update_last_activity(){
            $.ajax({
              url:"update_last_activity.php",
              success:function(){

              }
            });
          }

//           function make_chat_dialog_box(to_user_id, to_user_name)
//  {
   
//   var modal_content = '<div id="user_dialog_'+to_user_id+'" class="user_dialog" title="You are chatting with '+to_user_name+'">';
//   modal_content += '<div style="height:250px; border:1px solid #ccc; overflow-y: scroll; margin-bottom:24px; padding:16px;" class="chat_history" data-touserid="'+to_user_id+'" id="chat_history_'+to_user_id+'">';
//   modal_content += fetch_user_chat_history(to_user_id);
//   modal_content += '</div>';
//   modal_content += '<div class="form-group">';
//   modal_content += '<form action="insert_file.php" method="POST" class="form-container"><input type="file" name="file" id="share_media_'+to_user_id+'" class="form-control">&nbsp;<input type="hidden" value="'+to_user_id+'" name="input2"><button name="btn" type="button" id="'+to_user_id+'" class="btn btn-info share_media">send</button></form><br>';
//   modal_content += '<textarea name="chat_message_'+to_user_id+'" id="chat_message_'+to_user_id+'" class="form-control chat_message"></textarea>';
//   modal_content += '</div><div class="form-group" align="right">';
//   modal_content+= '<button type="button" name="send_chat" id="'+to_user_id+'" class="btn btn-info send_chat">Send</button></div></div>';

//   $('#user_model_details').html(modal_content);
//  }

 $(document).on('click', '.start_chat', function(){
 
  var to_user_id = $(this).data('touserid');
  var to_user_name = $(this).data('tousername');
  $.ajax({
    url:"display_user_chat.php",
    method:"POST",
    data:{to_user_id:to_user_id,to_user_name:to_user_name},
    success:function(data){
      $("body").html(data);
      $('#chat_message_'+to_user_id).emojioneArea({
   pickerPosition:"top",
   toneStyle: "bullet"
  });
    }
  });
  
  // make_chat_dialog_box(to_user_id, to_user_name);
  // $("#user_dialog_"+to_user_id).dialog({
  //  autoOpen:false,
  //  width:400
  // });
  // $('#user_dialog_'+to_user_id).dialog('open');
  // $('#chat_message_'+to_user_id).emojionePicker();
  
  
 
 });

//  $(document).on('click','.share_media',function(){

//   var to_user_id = $(this).attr('id');
//   var file_name=$('#share_media_'+to_user_id).val();
    
// 		var index_dot=file_name.lastIndexOf(".")+1;
// 		var ext=file_name.substr(index_dot);
//   // var file_data = $('#share_media_'+to_user_id).prop('files')[0];
//   var chat_message = new FormData();
//   chat_message.append('fileupload',$( '#share_media_'+to_user_id )[0].files[0], file_name);
//   // chat_message.append('file',file_data);
  
//   $.ajax({
//     url:"insert_file.php",
//     method:"POST",
//     data:{ chat_message:chat_message},
//     cache: false,
//     success:function(data){
//       alert(data);
//     },
//     processData:false
//   })
//  })
// $(document).on('click', '.start_chat', function(){
 
//    var to_user_id = $(this).data('touserid');
//    var to_user_name = $(this).data('tousername');
  
//    $.ajax({
//      url:"display_user_chat.php",
//      method:"POST",
//      data:{to_user_id:to_user_id,to_user_name:to_user_name},
//      success:function(){
          
//      }
//    })
// });

 $(document).on('click','.send_chat',function(){
   var to_user_id = $(this).attr('id');
   var chat_message = $('#chat_message_'+to_user_id).val();
   $.ajax({
     url:"insert_chat.php",
     method:"POST",
     data:{to_user_id:to_user_id, chat_message:chat_message},
     success:function(data){
        $('#chat_message_'+to_user_id).val('');
        $('#chat_history_'+to_user_id).html(data);
     }
   });
 });

 function fetch_user_chat_history(to_user_id){
   $.ajax({
     url:"fetch_user_chat_history.php",
     method:"POST",
     data:{to_user_id:to_user_id},
     success:function(data){
      $('#chat_history_'+to_user_id).html(data);
     }
   })
 }

 function update_chat_history_data(){
   $('.chat_history').each(function(){
     var to_user_id = $(this).data('touserid');
     fetch_user_chat_history(to_user_id);
   })
 }

 

 $(document).on('focus','.chat_message',function(){
   var is_type = 'yes';
   
   $.ajax({
     url:"update_is_type.php",
     method:"POST",
     data:{is_type:is_type},
    
     success:function(){

     }

   })
 })

 $(document).on('blur','.chat_message',function(){
   var is_type = 'no';
   var user_id = $('.send_chat').attr('id');
   $.ajax({
     url:"update_is_type.php",
     method:"POST",
     data:{is_type:is_type},
    
     success:function(){
       
     }

   })
 })

        });
     </script>
  <script src="https://cdn.jsdelivr.net/npm/darkmode-js@1.5.5/lib/darkmode-js.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
   
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/counterup/counterup.min.js"></script>
    <script src="assets/vendor/mobile-nav/mobile-nav.js"></script>
    <script src="assets/vendor/wow/wow.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
    <script src="assets/vendor/venobox/venobox.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
  </body>
  </html>
    