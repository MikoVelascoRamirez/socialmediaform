<?php

if(isset($_POST['inp_signup'])){

    // Tomamos la data
    $uid = $_POST['username'];
    $pass = $_POST['signup_password'];
    $pass_repeat = $_POST['signup_rep_password'];
    $email = $_POST['email'];

    //Instancia de la clase SignupContr
    include '../classes/dbh.classes.php';
    include '../classes/signup.classes.php';
    include '../classes/signup-contr.classes.php';

    $signup = new SignUpContr($uid, $pass, $pass_repeat, $email);

    // Ejecutar manejadores de errores y alta de usuario
    $signup->signUpUser();

    // Regresamos a la página principal
    header("Location: ../index.php");
}