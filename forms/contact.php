<?php
require_once 'path/to/swiftmailer/autoload.php';

// Create the Transport
$transport = new Swift_SmtpTransport('info@kayxchange.net', 465);
$transport->setUsername('info@kayxchange.net');
$transport->setPassword('KayXchange124');

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

// Create the message
$message = new Swift_Message('Subject of the email');
$message->setFrom(['your-email@example.com' => 'Your Name']);
$message->setTo(['recipient@example.com' => 'Recipient Name']);
$message->setBody('Hello, this is the email body.');

// Send the message
$result = $mailer->send($message);

// Check the result
if ($result) {
  echo 'Email sent successfully!';
} else {
  echo 'Oops! An error occurred while sending the email.';
}


?>

<!DOCTYPE html>
<html>
<head>
  <title>Contact Form</title>
</head>
<body>
  <h1>Contact Form</h1>
  <form method="POST" action="send_email.php">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required><br><br>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br><br>
    <label for="subject">Subject:</label>
    <input type="text" id="subject" name="subject" required><br><br>
    <label for="message">Message:</label><br>
    <textarea id="message" name="message" required></textarea><br><br>
    <input type="submit" value="Submit">
  </form>
</body>
</html>
