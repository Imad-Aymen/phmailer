# phmailer
How to send gmail with php 
This works with PHPMailer library
Follow the steps below
1. Download PHPMailer from https://github.com/PHPMailer/PHPMailer
2. Extract the zip file and copy the PHPMailer folder to your project directory
3. Create a new PHP file and add the following code
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';
$mail = new PHPMailer(true);
try {
    //Server settings
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'your_email@gmail.com';
    $mail->Password   = 'your_password';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;
    //Recipients
    $mail->setFrom('from@example.com', 'Mailer');
    $mail->addAddress('joe@example.net', 'Joe User');  
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');
    // Attachments
$mail->addAttachment('/var/tmp/file.tar.gz');
$mail->addAttachment('/tmp/image.jpg', 'new.jpg');
$mail->addAttachment('/tmp/filename', 'newname');
$mail->addAttachment('/tmp/filename', 'newname');
$mail->send();
echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

