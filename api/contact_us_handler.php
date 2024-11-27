<?php
ini_set('memory_limit', '4G'); // Increases memory limit to 4GB

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

echo "Memory usage before processing: " . memory_get_usage() . " bytes\n";

require 'mail/src/Exception.php';
require 'mail/src/PHPMailer.php';
require 'mail/src/SMTP.php';
include("db.php");
if (!$conn) {
    echo 'Connection failed: ' . mysqli_connect_error();
}
try {

    header('Content-Type: application/json');




    $mail = new PHPMailer(true);

    // Check if the connection to the database was successful
    if ($conn->connect_error) {
        throw new Exception("Database connection failed: " . $conn->connect_error);
    }

    // Handle POST request
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        throw new Exception("Invalid request method");
    }



    $data = json_decode(file_get_contents('php://input'), true);

    // Basic validation
    if (empty($data['name']) || empty($data['mobile'])) {
        throw new Exception("Name and mobile fields are required");
    }



    $name = htmlspecialchars($data['name']);
    $email = htmlspecialchars($data['email'] ?? ''); // Optional field
    $mobile = htmlspecialchars($data['mobile']);
    $city = htmlspecialchars($data['city'] ?? ''); // Optional field
    $message = htmlspecialchars($data['message'] ?? ''); // Optional field
    if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        throw new Exception("Invalid email format");
    }

    // Validate Indian mobile number format
    if (!preg_match('/^\d+$/', $mobile)) {
        throw new Exception("Invalid mobile number format. It must contain only digits.");
    }
    // Insert into database
    $stmt = $conn->prepare("INSERT INTO contactus (name, email, mobile, city, message) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $email, $mobile, $city, $message);

    if (!$stmt->execute()) {
        throw new Exception("Database error: " . $stmt->error);
    }
    echo json_encode([
        'status'  => 'success',
        'message' => 'Your enquiry has been saved successfully'
    ]);
    try {
        $mail = new PHPMailer(true);

        // SMTP configuration
        $mail->isSMTP();
        $mail->Host = SMTP_HOST;
        $mail->SMTPAuth = true;
        $mail->Username = SMTP_USERNAME;
        $mail->Password = SMTP_PASSWORD;
        $mail->SMTPSecure = SMTP_SECURE;
        $mail->Port = SMTP_PORT;

        // Sender and recipient details
        $mail->setFrom(SMTP_FROM_EMAIL, SMTP_FROM_NAME);
        $mail->addAddress(address: 'bharatnextgentech@gmail.com');
        $mail->addAddress('dabhit727@gmail.com'); // First recipient
        $mail->addAddress('trushitgadhavi99133@gmail.com'); // First recipient

        // Replace with your recipient email
        // if (!empty($email)) {
        //     $mail->addReplyTo($email, $name);
        // } else {
        //     $mail->addReplyTo(SMTP_REPLY_TO_EMAIL, SMTP_REPLY_TO_NAME);
        // }

        // Email content
        $mail->isHTML(true);
        $mail->Subject = "New Contact Us Message || " . $city;
        $mail->Body = "
            <html>
            <head>
                <style>
                    body {
                        font-family: Arial, sans-serif;
                        background-color: #f4f4f4;
                        margin: 0;
                        padding: 20px;
                    }
                    .container {
                        max-width: 600px;
                        margin: auto;
                        background: #ffffff;
                        padding: 20px;
                        border-radius: 8px;
                        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                    }
                    h1 {
                        color: #333;
                    }
                    table {
                        width: 100%;
                        border-collapse: collapse;
                        margin: 20px 0;
                    }
                    th, td {
                        padding: 10px;
                        border: 1px solid #ddd;
                        text-align: left;
                    }
                    th {
                        background-color: #f2f2f2;
                    }
                    p {
                        color: #555;
                    }
                </style>
            </head>
            <body>
                <div class='container'>
                    <h1>New Contact Us Submission</h1>
                    <table>
                        <tr>
                            <th>Name</th>
                            <td>$name</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>$email</td>
                        </tr>
                        <tr>
                            <th>Mobile</th>
                            <td>$mobile</td>
                        </tr>
                        <tr>
                            <th>City</th>
                            <td>$city</td>
                        </tr>
                        <tr>
                            <th>Message</th>
                            <td>$message</td>
                        </tr>
                    </table>
                    <p>Thank you for your submission!</p>
                </div>
            </body>
            </html>
        ";


        // Attempt to send the email
        $mail->send();
        echo "Memory usage after processing: " . memory_get_usage() . " bytes\n";
    } catch (Exception $e) {
        // Catch PHPMailer exceptions and print the error
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} catch (Exception $e) {
    // Log error details to server logs
    error_log("Error occurred: " . $e->getMessage());

    // Return a user-friendly error message
    http_response_code(500);
    echo json_encode([
        'status' => 'error',
        // 'message' => 'An internal error occurred. Please try again later.',
        'message' => $e->getMessage() // Include only in development; remove in production
    ]);
} finally {
    if (isset($stmt)) {
        $stmt->close();
    }
    $conn->close();
}

exit;
