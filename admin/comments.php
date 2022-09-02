<!DOCTYPE html>

<html>

<head>

 <title>send notification</title>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />

 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
    .mainClass {
     width: 600px;
     background: green;
     color: #000;
     border: 3px solid #ccc;
     -webkit-border-radius: 10px;
     -moz-border-radius: 10px;
     -ms-border-radius: 10px;
     border-radius: 10px;
     border-top: 3px solid #ddd;
     padding: 1em 1em;
     margin: 0 auto;
     -webkit-box-shadow: 3px 7px 5px #000;
     -moz-box-shadow: 3px 7px 5px #000;
     -ms-box-shadow: 3px 7px 5px #000;
     box-shadow: 3px 7px 5px #000;
    }

    ul {
     list-style: none;
     padding: 0;
    }

    ul > li {
     padding: 0.12em 1em
    }

    label {
     display: block;
     float: left;
     width: 130px;
    }

    input, textarea {
     font-family: Georgia, Serif;
     width: 500px;
    }
    .submit__btn input{
              background-color: black;
              color: wheat;
              border-radius: 10px;
              padding: 6px 20px;

        }
        .submit__btn input:hover{
              background-color: beige;
              color: black;
              
        }
</style>
</head>

<!-- Mail notification -->


<?php




// if(isset($_POST['post'])){
     
//     $sqlreminder = mysqli_query($conn,"SELECT userName, email FROM  lecturer");
//     $lecturers = mysqli_fetch_all($sqlreminder,MYSQLI_ASSOC);
//     foreach($lecturers as $lecturers){
//         // send email reminder=================================
        
//         $email = $lecturers['email'];
//         $name = $lecturers['userName'];
//         //$time = $patient['tyme'];
//         //$dname = $patient['dname'];
        
        
//             $to = $email;
//             $subject = "Laboratory reservation";
    
//             $message = "$name, how are you? The laboratory space you requested has been reserved. ";
//             // Always set content-type when sending HTML email
//             $headers = "MIME-Version: 1.0" . "\r\n";
//             $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    
//             // More headers
//             $headers .= 'From: <evanschaun@gmail.com>' . "\r\n";
    
    
//             if(mail($to,$subject,$message,$headers)){
//                 echo "<script>alert(' sent successfully');</script>";
//             }else{
//                 echo "<script>alert('reminders');</script>";
//             }
//     }
// }
?>
<div class="mainClass">
 <br /><br />

 <!-- <div class="container"> -->

  <!-- <nav class="navbar navbar-inverse">

   <div class="container-fluid">

    <div class="navbar-header">

     <a class="navbar-brand" href="#">PHP Notification Tutorial</a>

    </div>

    <ul class="nav navbar-nav navbar-right">

     <li class="dropdown">

      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:10px;"></span> <span class="glyphicon glyphicon-bell" style="font-size:18px;"></span></a>

      <ul class="dropdown-menu"></ul>

     </li>

    </ul>

   </div>

  </nav> -->

  <br />

  <form method="post" action="" id="comment_form">
<ul>
    <li>
   <div class="">

    <label>Enter Subject</label>

    <input type="text" name="subject" id="subject" class="">

   </div>
   </li>

   <li>
   <div class="">

    <label>Enter Comment</label>

    <textarea name="comment" id="comment" class="" rows="5"></textarea>

   </div>
   </li>
   <li>
   <div class="submit__btn">

    <input type="submit" name="post" id="post" class="" value="Post" />

   </div>
   </li>
   </ul>
  </form>


 <!-- </div> -->
 <script>

$(document).ready(function(){

// updating the view with notifications using ajax

function load_unseen_notification(view = '')

{

 $.ajax({

  url:"../fetch.php",
  method:"POST",
  data:{view:view},
  dataType:"json",
  success:function(data)

  {

   $('.dropdown-menu').html(data.notification);

   if(data.unseen_notification > 0)
   {
    $('.count').html(data.unseen_notification);
   }

  }

 });

}

load_unseen_notification();

// submit form and get new records

$('#comment_form').on('submit', function(event){
 event.preventDefault();

 if($('#subject').val() != '' && $('#comment').val() != '')

 {

  var form_data = $(this).serialize();

  $.ajax({

   url:"insert.php",
   method:"POST",
   data:form_data,
   success:function(data)

   {

    $('#comment_form')[0].reset();
    load_unseen_notification();

   }

  });

 }

 else

 {
  alert("Both Fields are Required");
 }

});

// load new notifications

$(document).on('click', '.dropdown-toggle', function(){

 $('.count').html('');

 load_unseen_notification('yes');

});

setInterval(function(){

 load_unseen_notification();;

}, 5000);

});

</script>

</div>


</html>