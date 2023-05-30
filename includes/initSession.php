<?php

// Start session
session_start();

$_SESSION['username'] = $_GET['user'];

header('Location: ../index.php');