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
}