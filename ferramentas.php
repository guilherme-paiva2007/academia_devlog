<?php
include './php/page_config.php';

if (!isset($_SESSION['logged']) && $_SESSION['logged'] !== true) {
    header('Location: ' . createLink('login'));
    exit();
}

if (levelNum($_SESSION['user_level']) < 2) {
    header('Location: ' . createLink('inicio'));
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ferramentas</title>
    <?php include './html/head.php' ?>
</head>
<body>
    <?php include './html/header.php' ?>
    <main class="main-content">
        <section style="width: fit-content; margin: auto">
            <ul>
                <li><a href="<?php echo createLink('instrutor/alunos/cadastrar') ?>">Cadastrar aluno</a></li>
                <li><a href="<?php echo createLink('instrutor/alunos/lista') ?>">Lista de alunos</a></li>
                <li><a href="<?php echo createLink('instrutor/equipamento/lista') ?>">Lista de equipamentos</a></li>
                <li><a href="<?php echo createLink('admin/novoinstrutor') ?>">ADMIN: Cadastro de instrutor</a></li>
            </ul>
        </section>
    </main>
    <?php include './html/footer.php' ?>
</body>
</html>