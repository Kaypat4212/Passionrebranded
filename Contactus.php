<?php

// Validate the form data.
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

if (empty($name) || empty($email) || empty($subject) || empty($message)) {
    echo 'Please fill out all of the required fields.';
} else {
    // Send an email.
    mail('info@kayxchange.net', $subject, "{$name},\n Message:\n{$message}\n\nBest regards,", "From: {$email}\r\n");

    echo 'Your message has been sent. Thank you!';
}

?>