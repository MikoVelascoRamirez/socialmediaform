<?php

// TODO: Validar si se hizo la petición vía formulario

if ($_POST['inp_rec_new_pass']) {

    // TODO: Tomar el email
    $email = $_POST['email'];

    // TODO: Verificar si el correo pertenece a un usuario
    include '../../classes/dbh.classes.php';
    include '../classes/reset-request.classes.php';
    include '../classes/reset-request-contr.classes.php';
    $resetRequest = new ResetRequestContr($email);

    // TODO: Si el campo esta vacío o no existe el correo, regresar a index.php
    if (!$resetRequest->checkEmail()) {
        header('Location: ../../reset_password.php?errormsg=couldnotproceed');
        exit();
    }
}
