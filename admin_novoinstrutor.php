<?php
include './php/page_config.php';

if (!isset($_SESSION['logged']) || $_SESSION['logged'] !== true) {
    header('Location: ' . createLink('login'));
    exit();
}

if (levelNum($_SESSION['user_level']) < 2) {
    header('Location: ' . createLink('inicio'));
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registrar Aluno</title>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <?php include './html/head.php' ?>
    </head>
    <body class="center">
        <div>
            <h2>Registrar Instrutor</h2>
            <form method="post" id="form-register-instrutor">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required><br><br>
    
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required><br><br>
    
                <label for="telefone">Telefone:</label>
                <input type="tel" id="telefone" name="telefone" required><br><br>
    
                <label for="data_nascimento">Data de Nascimento:</label>
                <input type="date" id="data_nascimento" name="data_nascimento" required><br><br>
    
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required><br><br>
    
                <label for="confirmar_senha">Confirmar Senha:</label>
                <input type="password" id="confirmar_senha" name="confirmar_senha" required><br><br>
    
                <button type="submit">Registrar</button>
            </form>
        </div>
    </body>
</html>