<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "../../vendor/autoload.php";

$mail = new PHPMailer(TRUE);

$email = $_GET['mail'];
$selector = $_GET['selector'];
$validator = $_GET['validator'];

// echo $email . "<br>";
// echo $selector . "<br>";
// echo $validator . "<br>";

// TODO: Crear url de acceso a cambio de contraseña
$link = "http://localhost/backend/PHP_POO/Excercises/LoginSystem/change_password.php?selector={$selector}&validator={$validator}";

try {
    // Set the email sender
    $mail->setFrom('turybarca@gmail.com', 'SocialTul');
    // Add a recipient
    $mail->addAddress($email, "KRAKK");
    // Set the subject
    $mail->Subject = 'Reset your password';
    // Set the mail message body
    $mail->Body = "We recieved a password reset request. The link to reset your password is below. If you did not make this request, you can ignore this email.\n\nHere is your password reset link: ".$link;

    // SMTP Params
    $mail->isSMTP(); // Telling PHPMailer to use SMTP
    $mail->Host = "smtp.gmail.com"; // SMTP server address
    $mail->SMTPAuth = true; // Using SMTP authentication
    $mail->SMTPSecure = 'tls'; /* Set the encryption system. */
    $mail->Username = 'turybarca@gmail.com'; /* SMTP authentication username. */
    $mail->Password = 'ixjaoenfkclazyjk'; /* SMTP authentication password. */
    $mail->Port = 587; /* Set the SMTP port. */

    /* Enable SMTP debug output. */
    // $mail->SMTPDebug = 4;

    // Send the mail
    $mail->send();
    header('Location: ../../reset_password.php?msg=messagesentcheckyouremail');
} catch (Exception $e) {
    echo $e->errorMessage();
    header('Location: ../../reset_password.php?msg=somethingfailed');
} catch (\Exception $e) {
    echo $e->getMessage();
}
