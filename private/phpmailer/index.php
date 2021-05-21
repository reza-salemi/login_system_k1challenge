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

    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);

    $url = "http://localhost/login_system_k1challenge/public/create_new_pass.php?selector=" .$selector. " " ;
    $url .= "&validator=" . bin2hex($token);

    $expires = date('U') + 1800 ;
    delete_pass($email);


    if($result['email'] != $email){
        echo "your email not found";
    }
    $row = insert_pwdReset($email,$selector,$token,$expires);

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


        $message = "<p>We recived a password reset request.</p>";
        $message .= "<p>Here is Your password reset link: <br/>";
        $message .= "<a href=\". $url .\">$url</a></p>";
        //Content
        $mail->isHTML(true);                           //Set email format to HTML
        $mail->Subject = 'reset your password';
        $mail->Body    = $message;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

}