<?php

// Get the subscriber's email address
$subscriberEmail = $_POST['email'];
$name = $_POST['name'];

// Sanitize inputs
$subscriberEmail = filter_var($subscriberEmail, FILTER_SANITIZE_EMAIL);
$name = filter_var($name, FILTER_SANITIZE_STRING);

// Validate email address
if (!filter_var($subscriberEmail, FILTER_VALIDATE_EMAIL)) {
    echo 'Invalid email address.';
    exit;
}

// Read the HTML content for the welcome email
$message = file_get_contents('send_newsletter-subscriber.html');

// Replace placeholders in the HTML content with actual values
$message = str_replace('{name}', $name, $message);

// Send welcome email to subscriber
$subject = 'Welcome to the Kayxchange newsletter!';
$headers = 'From: info@kayxchange.net' . "\r\n" .
    'Content-Type: text/html; charset=UTF-8' . "\r\n";

if (mail($subscriberEmail, $subject, $message, $headers)) {
    echo 'Welcome email sent successfully.';
} else {
    echo 'Error sending welcome email.';
    exit;
}

// Send email notification to admin
$adminEmail = 'info@kayxchange.net';
$adminSubject = 'New subscriber to Kayxchange newsletter!';
$adminMessage = 'A new subscriber has subscribed to your Kayxchange newsletter: ' . $name . ' - ' . $subscriberEmail;
$adminHeaders = 'From: info@kayxchange.net' . "\r\n" .
    'Content-Type: text/plain; charset=UTF-8' . "\r\n";

mail($adminEmail, $adminSubject, $adminMessage, $adminHeaders);

// Redirect the user to the thank you page
header('Location: Subscribed.html');
exit;

?>
