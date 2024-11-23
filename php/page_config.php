<?php
include 'script.php';

session_start();
// if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
//     header('Location: ' . createLink('login.php'));
//     exit();
// }

include 'db.php';