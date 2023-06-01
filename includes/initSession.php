<?php

// Start session
session_start();

$_SESSION['id'] = $_GET['id'];
$_SESSION['username'] = $_GET['user'];

header('Location: ../profile.php');