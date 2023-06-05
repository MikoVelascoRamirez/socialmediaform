<?php
session_start();

if(isset($_POST['inp_save_profile-settings'])){

    $infoAbout = htmlspecialchars($_POST['about'], ENT_QUOTES, 'UTF-8');
    $titleIntro = htmlspecialchars($_POST['title_intro'], ENT_QUOTES, 'UTF-8');
    $textIntro = htmlspecialchars($_POST['text_intro'], ENT_QUOTES, 'UTF-8');

    include '../../classes/dbh.classes.php';
    include '../classes/profileinfo.classes.php';
    include '../classes/profileinfo-contr.classes.php';

    $profileContr = new ProfileInfoContr($_SESSION['id'], $_SESSION['username']);
    $isUpdated = $profileContr->updateProfileInfo($infoAbout, $titleIntro, $textIntro);

}