<?php

    include './includes/header.php';
    include './classes/dbh.classes.php';
    include './UserProfile/classes/profileinfo.classes.php';
    include './UserProfile/classes/profileinfo-view.classes.php';
    // include './UserProfile/classes/profileinfo-contr.classes.php';

    $profileInfo = new ProfileInfoView($_SESSION['id']);        
?>