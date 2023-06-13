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

