<?php
// require './PHPMailer/src/PHPMailer.php';

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     // Replace "your-email@gmail.com" with the email address where you want to receive the form submissions.
//     $to = "info@kayxchange.net";

//     // Get form inputs
//     $name = $_POST["name"];
//     $email = $_POST["email"];

//     // Create a new PHPMailer instance
//     $mail = new PHPMailer;

//     // Enable SMTP debugging (optional)
//     $mail->SMTPDebug = 0; // Set to 2 for more detailed debug output

//     // Set SMTPMailer to use SMTP
//     $mail->isSMTP();

//     // Specify the SMTP server
//     $mail->Host = 'server86.web-hosting.com';

//     // Enable SMTP authentication
//     $mail->SMTPAuth = true;

//     // Set your Gmail email address and password
//     $mail->Username = 'info@kayxchange.net'; // Replace with your Gmail email address
//     $mail->Password = '082234778Pat#'; // Replace with your Gmail password

//     // Set the encryption - SSL (deprecated) or TLS
//     $mail->SMTPSecure = 'ssl'; // 'ssl' is deprecated

//     // Set the SMTP port number (465 for SSL, 587 for TLS)
//     $mail->Port = 465;

//     // Set the sender and recipient of the email
//     $mail->setFrom('info@kayxchange.net', 'Patrick'); // Replace with your Gmail email address and your name
//     $mail->addAddress($to);

//     // Set email subject and body
//     $mail->Subject = 'New Subscriber';
//     $mail->Body = "Name: $name\nEmail: $email";

//     // Send the email
//     if ($mail->send()) {
//         // Email sent successfully
//         echo "Thank you for subscribing! Your form has been submitted.";
//     } else {
//         // Email sending failed
//         echo "Oops! Something went wrong. Please try again later.";
//     }
// }
// 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '/PHPMailer/src/Exception.php';
require '/PHPMailer/src/PHPMailer.php';
require '/PHPMailer/src/SMTP.php';

if (isset($_POST["send"])) {
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'kayxchange.net'; // Update to the correct SMTP server
    $mail->SMTPAuth = true; // Use boolean value, not a string
    $mail->Username = 'info@kayxchange.net';
    $mail->Password = '082234778Pat#'; // Replace with the correct SMTP password
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('info@kayxchange.net');

    $mail->addAddress($_POST["email"]);

    $mail->isHTML(true);

    $mail->Subject = $_POST["subject"];
    $mail->Body = $_POST["message"];

    try {
        $mail->send();
        echo "<script>alert('Sent successfully'); document.location.href = 'index.php';</script>";
    } catch (Exception $e) {
        echo "<script>alert('Sending failed: " . $mail->ErrorInfo . "');</script>";
    }
}

?>
