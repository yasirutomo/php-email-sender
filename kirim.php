<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
 
$email = htmlspecialchars($_POST['email']);
$title = htmlspecialchars($_POST['title']);
$message = htmlspecialchars($_POST['message']);
 
$mail = new PHPMailer(true);
 
try {                       
    $mail->SMTPDebug = 2;  
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    // email address setting:
    $mail->Username   = 'your_email@gmail.com';
    // App Password:
    $mail->Password   = 'app_password';
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;
 
    $mail->setFrom('your_email@gmail.com', 'Your Name');
    $mail->addAddress($email); 
    $mail->isHTML(true);
    $mail->Subject = $title;
    $mail->Body = $message;
    $mail->send();
    
    echo "email sent successfully";
}catch (Exception $e) {
    echo "email failed to send";
}
 
?>