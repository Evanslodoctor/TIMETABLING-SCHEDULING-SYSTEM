<?php

if(isset($_POST["subject"]))

{

include("../connect.php");

$subject = mysqli_real_escape_string($conn, $_POST["subject"]);

$comment = mysqli_real_escape_string($conn, $_POST["comment"]);

$query = "INSERT INTO comments(comment_subject, comment_text)VALUES ('$subject', '$comment')";

if(mysqli_query($conn, $query))
{

print "<h3 >Notification sent Successfuly</h3>";
}

}

?>