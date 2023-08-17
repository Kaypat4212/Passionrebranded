<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Contact Us!</title>
</head>
<body>
<!-- Contact Form -->
<div class="row">
<div class="col-form">
<form method="POST">
<div class="form-group">
<input type="text" name="email" class="form-control" placeholder="Email Address">
</div>
<div class="form-group">
<input type="text" name="name" class="form-control" placeholder="Name">
</div>
<div class="form-group">
<input type="text" name="subject" class="form-control" placeholder="Subject">
</div>
<div class="form-group">
<textarea class="form-control" name="body" rows="3" placeholder="Your Message"></textarea>
<button class="btn-form" type="submit">Send Message</button>
</div>
</form>
</div>
</div>
<!-- End Contact Form -->
</body>
</html>

<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require './src/PHPMailer.php';
require './src/SMTP.php';
require './src/Exception.php';

if(isset($_POST['name']) && isset($_POST['email'])){
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$body = $_POST['body'];
$namefrom = "Messages from the website";

$mail = new PHPMailer();





//smtp settings
$mail->Host = "kayxchange.net";
$mail->Port = 465;
$mail->SMTPSecure = "ssl";
$mail->Username = "info@kayxchange.net";
$mail->Password = "082234778Pat#";

//email settings
$mail->isHTML(true);
$mail->setFrom("patrickezike66@gmail.com", $namefrom);
$mail->addReplyTo($email, $name); //Set reply-to address
$mail->addAddress("info@kayxchange.net"); //Set who the message is to be sent to
$mail->Subject = ("Contact form: $subject from $name ($email)");
$mail->Body = $body;

$mail->isSMTP(); // Use SMTP


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