<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer;
//$mail->SMTPDebug = SMTP::DEBUG_SERVER;
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->SMTPDebug = 0;
$mail->Port = 587;
$mail->Host = 'smtp.mailgun.org';                     // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'hello@mail.mycloudparticles.in';                     // SMTP username
$mail->Password = 'APS_._264875';                       // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable encryption, only 'tls' is accepted
$mail->From = 'navneetdwivedi562@gmail.com';
$mail->FromName = 'Cloud particles';
$mail->addAddress('dushyant.greatideas@gmail.com');                 // Add a recipient
$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
$mail->Subject = 'Hello';
$body = 'Testing some Mailgun awesomeness';
//$emailBody = \Illuminate\Support\Facades\View::make('test', ["data" => $body])->render();

//$mail->Body = $emailBody;
$mail->Body = 'Testing some Mailgun awesomeness';
if (!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}

