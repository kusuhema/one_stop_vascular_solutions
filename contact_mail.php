<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Adjust the path to autoload.php based on your project

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assign POST data to variables
    $name = $_POST['Name'] ?? '';
    $Subject = $_POST['Subject'] ?? '';
    $Email = $_POST['Email'] ?? '';
    $Relationship = $_POST['Relationship'] ?? '';
   
    $Message = $_POST['Message'] ?? '';
    
 


    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // Server settings for Gmail SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'carehospitals0011@gmail.com'; // Your Gmail email address
        $mail->Password = 'vezxajifcoqlrbur'; // Your Gmail password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('carehospitals0011@gmail.com', 'One Stop Vascular Solutions'); // Your Gmail email and name
        $mail->addAddress('onestopvascular@gmail.com', 'One Stop Vascular Solutions'); // Recipient's email and name

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'New Message from Contact Form';
        $mail->Body = "
            <h1>New Message</h1>
            <p><strong>Name:</strong> $name</p>
            <p><strong>Subject:</strong> $Subject</p>
             <p><strong>Email:</strong> $Email</p>
            <p><strong>Relationship:</strong> $Relationship</p>
             <p><strong>Message:</strong><br>$Message</p>
        ";

        $mail->send();
        echo '<script> window.alert("Message has been sent.\n\nPlease click OK."); window.location.href="index.html";</script>';

    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    // If accessed directly without POST data
    echo 'Access Denied';
}