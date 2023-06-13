<?php

//TODO: Validar que se haya accedido mediante formulario
if (isset($_POST['reset_pass'])) {

    // TODO: Obtener el token de selector
    $tokenSelector = $_POST['token_selector'];
    // echo $tokenSelector;

    // TODO: Obtener parámetros URL.
    $previousURL = $_SERVER['HTTP_REFERER'];
    $queryString = parse_url($previousURL, PHP_URL_QUERY);
    parse_str($queryString, $params);

    // TODO: Instanciar objeto de controlador
    include_once('../../classes/dbh.classes.php');
    include_once('../classes/change-password.classes.php');
    include_once('../classes/change-password-contr.classes.php');

    $recov_request = new ChangePasswordContr();

    // TODO: Seleccionar todo el registro si el token de selector existe en la bd
    $result = $recov_request->getRecoveryRequest($tokenSelector);
    $msg = "";
    // $recov_request->getRecoveryRequest($tokenSelector);

    if (!$result) {
        $msg = "invalidtoken";
        // goto redirect;
    }

    // TODO: Si existe, evaluar si el tiempo de expiración obtenido es menor a la actual.
    $expTime = $result['pwdresetexpires'];

    // TODO: Si el tiempo registrado es menor al actual, eliminar registro y mandar mensaje de tiempo expirado.
    if ($expTime < time()) {
        echo "expredtime";
        $msg = "expiredtime";
        $recov_request->deleteFinishedRequest($tokenSelector);
        // goto redirect;
    }

    $password = $_POST['pass'];
    $repeatPassword = $_POST['pass_repeat'];

    // TODO: De lo contrario, verificar si los campos introducidos no estan vacíos y las contraseñas son iguales.

    $emptyFields = $recov_request->emptyInput($password, $repeatPassword);
    $passwordsAreTheSame = $recov_request->checkPasswords($password, $repeatPassword);

    if (!$emptyFields || !$passwordsAreTheSame) {
        // echo $queryString;
        // echo $previousURL;
        // print_r($params);
        header("Location: ../../change_password.php?selector={$params['selector']}&validator={$params['validator']}&msg=incorrect");
        exit();
    }

    // echo $params['validator'] . "<br>";
    // echo $result['pwdresetvalidatortoken'] . "<br>";

    // TODO: Verificar si los hashes por URL y el de la BD son iguales

    $hashesAreEqual = $recov_request->verifyTokenValidator($params['validator'], $result['pwdresetvalidatortoken']);

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
