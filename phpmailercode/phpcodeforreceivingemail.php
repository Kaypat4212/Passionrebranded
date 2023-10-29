<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

if(isset($_POST['name']) && isset($_POST['email'])){
$name = $_POST['name'];
$email = $_POST['email'];
$namefrom = "Messages from the website";

$mail = new PHPMailer();





//smtp settings
$mail->Host = "server86.web-hosting.com";
$mail->Port = 465;
$mail->SMTPSecure = "ssl";
$mail->Username = "info@kayxchange.net";
$mail->Password = "08121164870Pat#";

//email settings
$mail->isHTML(true);
$mail->setFrom("info@kayxchange.net", $namefrom);
$mail->addReplyTo($email, $name); //Set reply-to address
$mail->addAddress("info@kayxchange.net"); //Set who the message is to be sent to
$mail->Subject = "Contact form from $name ($email)";
$mail->Body = "Name: $name<br>Email: $email";

if($mail->send()){
$status = "success";
$response = "Email is sent!";
}
else
{
$status = "failed";
$response = "Something is wrong: <br>" . $mail->ErrorInfo;
}

exit(json_encode(array("status" => $status, "response" => $response)));
}

?>