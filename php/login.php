<?php
include 'db.php';
include 'script.php';
session_start();

if (isset($_SESSION['logged']) && $_SESSION['logged'] === true) {
    header('Location: ' . createLink('inicio'));
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = 'SELECT * FROM usuarios WHERE email = ?';
    $statement = $connection->prepare($query);
    $statement->bind_param('s', $email);
    $statement->execute();
    $result = $statement->get_result();
    $user = $result->fetch_assoc();

    if (!$user) {
        header('Location: ' . createLink('login?error=usernotfound'));
        exit();
    }

    if ($user && password_verify($password, $user['senha'])) {
        $_SESSION['logged'] = true;
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['nome'];
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['user_level'] = $user['nivel'];
        header('Location: ' . createLink('inicio'));
        exit();
    } else {
        header('Location: ' . createLink('login?error=invalidpassword'));
        exit();
    }
}