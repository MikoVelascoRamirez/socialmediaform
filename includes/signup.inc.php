<?php

if(isset($_POST['inp_signup'])){

    // Tomamos la data
    $uid = $_POST['username'];
    $pass = $_POST['signup_password'];
    $pass_repeat = $_POST['signup_rep_password'];
    $email = $_POST['email'];
}