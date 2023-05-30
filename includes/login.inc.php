<?php

if($_POST['inp_login']){
    
    // Tomando la data
    $uid = $_POST['login_username'];
    $pass = $_POST['login_password'];

    // Instancia de la clase LoginContr
    include '../classes/dbh.classes.php';
    include '../classes/login.classes.php';
    include '../classes/login-contr.classes.php';

    // Ejecución de manejadores de errores y de inicio de sesión
    $loginContr = new LoginContr($uid, $pass);
    $loginContr->loginUser();

    header("Location: ../includes/initSession.php?user={$uid}");
}


// header("Location: ../includes/destroySession.inc.php");