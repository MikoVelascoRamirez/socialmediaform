<?php

//TODO: Validar que se haya accedido mediante formulario
if (isset($_POST['reset_pass'])) {

    // TODO: Obtener el token de selector
    $tokenSelector = $_POST['token_selector'];

    // TODO: Obtener parámetros URL.
    $previousURL = $_SERVER['HTTP_REFERER'];
    $queryString = parse_url($previousURL, PHP_URL_QUERY);
    parse_str($queryString, $params);

    // TODO: Instanciar objeto de controlador
    include_once('../../classes/dbh.classes.php');
    include_once('../classes/change-password.classes.php');
    include_once('../classes/change-password-contr.classes.php');

    $recov_request = new ChangePasswordContr($tokenSelector);

    // TODO: Seleccionar todo el registro si el token de selector existe en la bd
    $result = $recov_request->checkAvailability();
    $msg = "";
    
    if (gettype($result) === "string") {
        $msg = $result;
        goto redirect;
    }

    $password = $_POST['pass'];
    $repeatPassword = $_POST['pass_repeat'];

    // TODO: De lo contrario, verificar si los campos introducidos no estan vacíos y las contraseñas son iguales.

    if ($recov_request->checkFields($password, $repeatPassword)) {
        header("Location: ../../change_password.php?selector={$params['selector']}&validator={$params['validator']}&msg=incorrect");
        exit();
    }


    // TODO: Verificar si los hashes por URL y el de la BD son iguales

    $hashesAreEqual = $recov_request->verifyTokenValidator($params['validator']);

    // TODO: Caso negativo: redireccionar al formulario de cambio de contraseña.
    if (!$hashesAreEqual) {
        $msg = "somethingwaswrong";
        goto redirect;
    }

    // TODO: Caso positivo: tomar la contraseña introducida, y cambiarla.
    $newPassword = password_hash($_POST['pass'], PASSWORD_DEFAULT);
    $updatePassword = $recov_request->updatePassword($newPassword, $result['pwdresetemail']);

    if (!$updatePassword) {
        $msg = "somethingwaswrong";
        goto redirect;
    }

    // TODO: En caso de salir todo bien, eliminar la petición y regresar al inicio
    $recov_request->deleteFinishedRequest($tokenSelector);
    $msg = "passwordchanged";

    redirect:
    header("Location: ../../index.php?msg={$msg}");
    exit();
}
