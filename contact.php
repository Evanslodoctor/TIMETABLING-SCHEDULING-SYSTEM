<?php
include_once "./config.php";

$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$message = mysqli_real_escape_string($conn, $_POST['message']);


    $insert = $conn->query("INSERT INTO contact(name, email, message) VALUES('$name', '$email', '$message')");

    if($insert){
        $data = "Sent";
    }else{
        $data =  "Failed";

    }


echo ' ' . $data .' ';
?>