



<?php 
require_once('../class/Book.php');
if(isset($_POST['tracker'])){
	$tracker = $_POST['tracker'];
	// echo $tracker;

	$result = $book->updateBook($tracker);
	$return['valid'] = true;
	$return['msg'] = "Reserved Successfully!";
	echo json_encode($return);
}//isset
	
$book->Disconnect();