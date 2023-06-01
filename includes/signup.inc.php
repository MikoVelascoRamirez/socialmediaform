<?php

if(isset($_POST['inp_signup'])){

    // Tomamos la data
    $uid = htmlspecialchars($_POST['username'], ENT_QUOTES, 'UTF-8');
    $pass = htmlspecialchars($_POST['signup_password'], ENT_QUOTES, 'UTF-8');
    $pass_repeat = htmlspecialchars($_POST['signup_rep_password'], ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');

    //Instancia de la clase SignupContr
    include '../classes/dbh.classes.php';
    include '../classes/signup.classes.php';
    include '../classes/signup-contr.classes.php';

    $signup = new SignUpContr($uid, $pass, $pass_repeat, $email);

    // Ejecutar manejadores de errores y alta de usuario
    $signup->signUpUser();

    // Obtenemos el id del usuario registrado.
    $userId = $signup->fetchIdUser($uid);

    // Regresamos a la página principal
    // header("Location: ../index.php");
}