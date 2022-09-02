<?php 


//require_once('../class/Book.php');
//if(isset($_POST['tracker']))


require_once('../class/Book.php');

if(isset($_POST['accept'])){
	
	// echo $tracker;
	
	// $sql="SELECT email FROM  reserve WHERE reserveId ='$tracker'" ;
	// $result= mysqli_query($conn,$sql);
	// if(mysqli_num_rows($result)>0){ 
	//    if($row = mysqli_fetch_array($result)){
	// 		 $rw=$row[0];
	// 		 $receiver = $rw;
	// 		 $subject = "Laboratory reservation notification";
	// 		 $body = "Hi, there... ";
	// 		 $sender = "From:evanschaun@gmail.com";
			 
	// 		 if(mail($receiver, $subject, $body, $sender)){
	// 			 echo "Email sent successfully to $receiver";
	// 		 }else{
	// 			 echo "Sorry, failed while sending mail!";
	// 		 }
    //                 //echo "<font color='red'>Reserved Sussesfully!!!</font>";
    //                 //  echo  "<script>alert('Invoice sent succefully')</script>";
                
    //             }
    //             else{
    //                 echo "<script>alert('Something went wrog please try again!');</script>".mysqli_error($conn);
    //             }
            

     
//}

//$tracker = $_POST['tracker'];
$sqlreminder = mysqli_query($conn,"SELECT * FROM  reserve WHERE results='pending';");
$lecturers = mysqli_fetch_all($sqlreminder,MYSQLI_ASSOC);
foreach($lecturers as $lecturers){
	// send email reminder=================================
	
	$email = $lecturers['email'];
	$name = $lecturers['lecturer'];
	$date = $date['tyme'];
	$room = $room['dname'];
	
	
		$to = $email;
		$subject = "Laboratory reservation";

		$message = "$name, how are you? The laboratory space you requested has been reserved. ";
		// Always set content-type when sending HTML email
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

		// More headers
		$headers .= 'From: <evanschaun@gmail.com>' . "\r\n";


		if(mail($to,$subject,$message,$headers)){
			echo "sent successfully";
		}else{
			echo "Error";
		}
}


}
?>
<form action="" method="post">
<div class="modal fade" id="modal-view-pass">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Lecturer</h4>
			</div>
			<div class="modal-body">
			<center>
				<strong>Book By: </strong><span id="book-by"></span> <br />
				<strong>Date: </strong><span id="date"></span> <br />
				<strong>email: </strong><span id="contact"></span> <br />
				<strong>start time: </strong><span id="address"></span><br />
			</center>
				<br />
				<div id="passenger-list">
					
				</div>
			</div>
			<div class="modal-footer">
				<!-- <button type="button" onclick="acceptPayment();" class="btn btn-primary accept-pay">
				<span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
				</button> -->


				
				<button type="submit" name="accept" class="btn btn-success accept-pay">Reserve
				<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
				</button>
			</div>
		</div>
	</div>
</div>
</form>