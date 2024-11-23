<?php
$connection = new mysqli("localhost", "root", "", "academia_devlog_db");

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}