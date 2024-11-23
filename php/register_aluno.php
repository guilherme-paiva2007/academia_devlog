<?php
include 'db.php';
include 'script.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json');
    $data = json_decode(file_get_contents('php://input'), true);
    $_POST = $data;
    if (!isset($_POST['nome']) || !isset($_POST['email']) || !isset($_POST['senha']) || !isset($_POST['telefone']) || !isset($_POST['nascimento'])) {
        echo "missing info";
        exit();
    }
    
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $password = $_POST['senha'];
    $tel = $_POST['telefone'];
    $nascimento = $_POST['nascimento'];
    $nivel = 'aluno';

    $query = "SELECT * FROM usuarios WHERE email = ?";
    $statement = $connection->prepare($query);
    $statement->bind_param('s', $email);
    $statement->execute();
    $result = $statement->get_result();
    $user = $result->fetch_assoc();

    if ($user) {
        echo "user exists";
        exit();
    }

    $query = 'INSERT INTO usuarios (nome, email, senha, tel, nascimento, nivel) VALUES (?, ?, ?, ?, ?, ?)';
    $statement = $connection->prepare($query);
    $passHash = password_hash($password, PASSWORD_DEFAULT);
    $statement->bind_param('ssssss', $nome, $email, $passHash, $tel, $nascimento, $nivel);
    $statement->execute();
    $result = $statement->get_result();

    echo "success";
    exit();
} else {
    echo "invalid request";
    exit();
}