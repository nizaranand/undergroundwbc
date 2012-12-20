<?php
$to = "samjameswatson1989@hotmail.com";
$subject = "Test mail";
$message = "Hello! This is a test email message.";
$from = "samjameswatson1989@hotmail.com";
$headers = "From:" . $from;
mail($to,$subject,$message,$headers);
echo "Mail Sent.";
?>