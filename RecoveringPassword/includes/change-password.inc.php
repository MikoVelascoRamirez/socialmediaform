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
        goto redirect;
    }

    // TODO: Si existe, evaluar si el tiempo de expiración obtenido es menor a la actual.
    $expTime = $result['pwdresetexpires'];

    // TODO: Si el tiempo registrado es menor al actual, eliminar registro y mandar mensaje de tiempo expirado.
    if ($expTime < time()) {
        echo "expredtime";
        $msg = "expiredtime";
        $recov_request->deleteFinishedRequest($tokenSelector);
        goto redirect;
    }

    redirect:
    header("Location: ../../index.php?msg={$msg}");
    exit();
}
