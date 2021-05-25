<?php
// Check for empty fields
if(empty($_POST['fname'])      ||
   empty($_POST['lname'])      ||
   empty($_POST['email'])     ||
   empty($_POST['subject'])     ||
   empty($_POST['message'])   ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
   echo "No arguments Provided!";
   return false;
   }
   
$fname = strip_tags(htmlspecialchars($_POST['fname']));
$lname = strip_tags(htmlspecialchars($_POST['lname']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$subject = strip_tags(htmlspecialchars($_POST['subject']));
$message = strip_tags(htmlspecialchars($_POST['message']));
   
// Create the email and send the message
$to = 'afurlongla@gmail.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nFirst name: $fname\n\nLast name: $lname\n\nEmail: $email_address\n\nMessage:\n$message";
$headers = "From: afurlongla@gmail.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";   
mail($to,$subject,$email_body,$headers);
return true;         

header("Location: ../index.html?sent=success");
?>