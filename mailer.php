<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader

require 'PHPmailer/Exception.php';
require 'PHPmailer/PHPMailer.php';
require 'PHPmailer/SMTP.php';


//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 2;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.hostinger.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'escondida@escondidasantasmarias.site';                     //SMTP username
    $mail->Password   = 'Cls_260tino';                               //SMTP password
    $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('escondida@escondidasantasmarias.site', 'La escondida');
    $mail->addAddress($email, 'Celes');     //Add a recipient
        //Name is optional
 

    //Attachments


    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'prueba de envio emails';
    $mail->Body    = 'jala masiso</b>';
  

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>