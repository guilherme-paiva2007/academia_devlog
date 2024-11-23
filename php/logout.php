<?php
include 'script.php';
session_start();
session_unset();
session_destroy();

header('Location: ' . createLink('login'));