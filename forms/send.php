<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Replace "your-email@example.com" with your actual email address where you want to receive the form submissions.
    $to = "Kayxnigeriaenterprises@gmail.com";
    $subject = "New Form Submission";
    $name = $_POST["namee"];
    $email = $_POST["email"];
    $message = "Name: " . $name . "\nEmail: " . $email;

    // Additional headers
    $headers = "From: " . $email . "\r\n" .
               "Reply-To: " . $email . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    // Send the email
    if (mail($to, $subject, $message, $headers)) {
        // Email sent successfully
        echo "Thank you for subscribing!";
    } else {
        // Email sending failed
        echo "Oops! Something went wrong.";
    }
}
?>
