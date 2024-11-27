<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'mail/src/Exception.php';
require 'mail/src/PHPMailer.php';
require 'mail/src/SMTP.php';

$mail = new PHPMailer(true);
try {
    $mail->isSMTP();
    $mail->Host = 'smtp.hostinger.com'; // Your SMTP host
    $mail->SMTPAuth = true;
    $mail->Username = 'info@bharatnextgentech.com'; // Your SMTP username
    $mail->Password = 'Bharat@123'; // Your SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom('info@bharatnextgentech.com', 'BharatNextGenTech');
    $mail->addAddress('bharatnextgentech@gmail.com', 'Recipient');

    $mailBody = "<h1>test</h1>";
    $mail->Subject = 'New Contact Us Message';
    $mail->Body = $mailBody;

    $mail->send();
    echo json_encode(['status' => 'success', 'message' => 'Message sent successfully']);
} catch (Exception $e) {
    echo json_encode(['status' => 'error', 'message' => "Message could not be sent. Error: {$mail->ErrorInfo}"]);
}
