<?php

include('../connect.php');
session_start();

if(!isset($_SESSION['username']))
{
  header('location:../index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lecturer</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="../fontawesome/css/all.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />

 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


	<style>
    
		.admin__main-body{
    background-image: url("Images/computer-lab.jpg");
    background-repeat: no-repeat;
    background-size: cover;
height: 700px;
    justify-content: center;
    align-items: center;
       }
		.admin__main-body .admi__navbar{
    background-color: black;
    color: white;
    display: grid;
    grid-template-columns: 10fr 1fr;
	justify-content: center;
	align-items: center;
  
}
.logoutAdmin{
	padding: 10px 5px;
}
.admin__main-section .admin-links{
  height: 550px;
  width: 150px;
  background-color: green;
  
}
.admin__main-section .admin-links div {
    padding: 5px 5px;
    justify-content: center;
    align-items: center;
}
.admin__main-section .admin-links a {
  color: white;  
}
.admin__main-section .admin-links div:hover {
   background-color: black;  
   
}
.admin-form{
  width: 98%;
  margin: 0 auto;
  align-items: center;
  justify-content: center;
  
}

.log{
  margin: 10px 0 0 0;
}
.navbar-header{
  color: white;
  margin-top: 20px;
 font-size: large;
}

	</style>
</head>
<body>
   <div class="admin__main-body">
   
   <nav class="navbar navbar-inverse">

<div class="container">

 <div class="navbar-header">

  
<?php
$sql=("SELECT userName FROM lecturer WHERE staffID='{$_SESSION['staffID']}'");
$dep= mysqli_query($conn,$sql);
while($dp=mysqli_fetch_array($dep)){
    $dp_id=$dp[0];
    echo "<option value='$dp_id'>"."Hello"." ".$dp[0]."</option>";
    }
?>



 </div>

 <ul class="nav navbar-nav navbar-right">

  <li class="dropdown">

   <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:10px;"></span> <span class="glyphicon glyphicon-bell" style="font-size:18px;"></span></a>

   <ul class="dropdown-menu"></ul>

   <li>
   <div class="log">
				 <button><a href="../logout.php">Logout</a></button>
			 </div>
   </li>

  </li>

 </ul>

</div>

</nav>

		 

       <div class="admin__main-section">
             <div class="admin-links">
            
             <div>
             <a href="../index.php"><i class="fa fa-home "></i>
            <p>HOME</p> 
          </a>
             </div>
          <div>
          <a href="lecturer.php?info=lecProfile"><i class="fa fa-user"></i>
          <P>PROFILE</P>   
          </a>
          </div>
          
          <div>
          <a href="lecturer.php?info=lecturerViewTimetable" class="">
            <i class="fa fa-eye"></i>
            <p>VIEW TIMETABLE</p>
          </a>
          </div>

          <div>
          <a href="lecturer.php?info=bookSlot"><i class="fa fa-envelope"></i></i>
          <P>Book slot</P> 
          
         </a>
          </div>
             </div>

             <div class="admin-form">
                  <div id="">
                      
                  <?php 
				@$info=$_REQUEST['info'];
				if($info!="")
				{
					if($info=="lecProfile")
				{
					include('lecProfile.php');
					}

				if($info=="bookSlot")
				{
					include('bookSlot.php');
					}
          if($info=="lecturerViewTimetable")
				{
					include('lecturerViewTimetable.php');
					}

        }
				else
				{
         
				?>

                 <?php
                }
                ?>
                  </div>
             </div>
       </div>

   </div>
</body>
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
</html>
<?php
// }
?>