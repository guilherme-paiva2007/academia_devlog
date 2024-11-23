<?php include './php/page_config.php'; ?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <?php include './html/head.php' ?>
    </head>
    <body class="center">
        <section class="login-container">
            <h2 class="center">Login</h2>
            <form action="<?= createLink('index.php') ?>" method="post" id="form-login">
                <label for="login-input-email" class="indent">Email</label>
                <input type="email" id="login-input-email" name="email" required>
                <label for="login-input-password" class="indent">Senha</label>
                <input type="password" id="login-input-password" name="password" required>
                <button type="submit" class="large">Entrar</button>
            </form>
            <?php error() ?>
        </section>
    </body>
</html>
