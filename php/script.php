<?php
function createLink($destination) {
    $projectFolder = '/academia_devlog/';
    return $projectFolder . $destination;
}

function error() {
    if (isset($_GET['error'])) {
        $error = $_GET['error'];
        if ($error === 'usernotfound') {
            echo '<p class="description error center">Usuário não encontrado</p>';
        }
        if ($error === 'invalidpassword') {
            echo '<p class="description error center">Senha inválida</p>';
        }
    }
}

function levelAlias($level) {
    if ($level === "admin") {
        return "Administrador";
    }
    if ($level === "aluno") {
        return "Aluno";
    }
    if ($level === "instrutor") {
        return "Instrutor";
    }
    return $level;
}

function levelNum($level) {
    if ($level === "admin") {
        return 3;
    }
    if ($level === "instrutor") {
        return 2;
    }
    if ($level === "aluno") {
        return 1;
    }
    return 0;
}

function redirectInvalidLevel($levelStr, $requiredLevel = 1) {
    $level = levelNum($levelStr);
    if ($level < $requiredLevel) {
        header('Location: ' . createLink('login'));
        exit();
    }
}