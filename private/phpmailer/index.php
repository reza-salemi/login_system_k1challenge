<?php
require_once ('../../private/initialize.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

if(is_post_request())
{
    $email = $_POST['email'] ?? '';
    $result = select_email($email);


    if($result['email'] != $email){
        echo "your email not found";
    }

//Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 0;
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.mailtrap.io';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'fd06ce4bc613c3';                       //SMTP username
        $mail->Password   = 'e511716e17f386';                       //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 2525;

        //Recipients
        $mail->setFrom('59645795ac-f05122@inbox.mailtrap.io', 'Mailer');
        $mail->addAddress($result['email'], 'hello');     //Add a recipient



        //Content
        $mail->isHTML(true);                           //Set email format to HTML
        $mail->Subject = 'reset your password';
        $mail->Body    = 'your can reset your password with this link';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

}