


<?php
$receiver = "evanschaun2@gmail.com";
$subject = "Email Test via PHP using Localhost";
$body = "Hi, there....";
$sender = "From:evanschaun@gmail.com";

if(mail($receiver, $subject, $body, $sender)){
    echo "Email sent successfully to $receiver";
}else{
    echo "Sorry, failed while sending mail!";
}
?>

