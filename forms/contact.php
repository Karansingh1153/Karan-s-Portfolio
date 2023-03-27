<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/phpmailer/phpmailer/src/Exception.php';
require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../vendor/phpmailer/phpmailer/src/SMTP.php';


require '../vendor/autoload.php';

if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes(($data));
        $data = htmlspecialchars($data);
        return $data;
    }
}

$email = validate($_POST['email']);
$name = validate($_POST['name']);
$message = validate($_POST['message']);


$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 0;
$mail->Host = "smtp.gmail.com";
$mail->Port = 587;
$mail->SMTPAuth = true;
$mail->Username = "";
$mail->Password = "";
$mail->setFrom($email, $email);
$mail->addAddress('');
$mail->Subject = 'Contact Form Submission';
$mail->Body = $message;

if($mail->send()){
    header('Location: index.html');
}
