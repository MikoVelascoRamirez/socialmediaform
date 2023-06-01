<?php

if($_POST['inp_login']){
    
    // Tomando la data
    $uid = htmlspecialchars($_POST['login_username'], ENT_QUOTES, 'UTF-8');
    $pass = htmlspecialchars($_POST['login_password'], ENT_QUOTES, 'UTF-8');

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