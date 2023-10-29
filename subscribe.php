<?php

// Get the subscriber's email address
$subscriberEmail = $_POST['email'];
$name = $_POST['name'];

// Sanitize email address
$subscriberEmail = filter_var($subscriberEmail, FILTER_SANITIZE_EMAIL);

// Validate email address
if (!filter_var($subscriberEmail, FILTER_VALIDATE_EMAIL)) {
  echo 'Invalid email address.';
  exit;
}

// Send welcome email to subscriber
$subject = 'Welcome to the Kayxchange newsletter!';
$message = file_get_contents('/send_newsletter-subscriber.html');
$headers = 'From: info@kayxchange.net';

mail($subscriberEmail, $subject, $message, $headers);

// Send email notification to admin
$adminEmail = 'info@kayxchange.net';
$subject = 'New subscriber to Kayxchange newsletter!';
$message = 'A new subscriber has subscribed to your Kayxchange newsletter: ' . $subscriberEmail;
$headers = 'From: info@kayxchange.net';

mail($adminEmail, $name, $subject, $message, $headers);

// Redirect the user to the thank you page
header('Location: Subscribed.html');

?>