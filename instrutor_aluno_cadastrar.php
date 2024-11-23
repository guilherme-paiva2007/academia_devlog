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
        <?php #include './html/head.php' ?>
    </head>
    <?php
    include './html/header.php';
    ?>
    <main class="main-content">
    <section id="secao1">
        <div id="box-login">
            <div id="box-img-login">
                <img id="img-login" src="img/logo2.png" alt="">
            </div>
            <form method="post" id="form-register">
                <h1>Registrar Aluno</h1>
                <input id="email" class="inserir" name="email" type="email" placeholder="Email" required>
                <input id="senha" class="inserir" name="senha" type="password" placeholder="Senha" required>
                <a href="../hostcenter/index.html"><input id="entrar" type="submit" value="Entrar"></a>
                <p class="outro">Não possui uma conta? <a href="cadastro.php">Cadastre-se!</a></p>
            </form>
        </div>
    </section>

   <?php
   include './html/footer.php';
   ?> 
</main>
</body>


        
    </body>
</html>
<style>
    #secao1{
    display: flex;
    justify-content: center;
    align-items: center;
    height: 90vh;
    width: 100%;
    background-color: #2D4455;
}

#box-login{
    display: flex;
    background-color: white;
    width: 720px;
    border-radius: 20px;
}

#box-img-login{
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #dde8f1;
    width: 350px;
    height: 450px;
    border-top-left-radius: 20px;
    border-bottom-left-radius: 20px;
}

#img-login{
    width: 335px;
    height: 280px;
}

form{
    width: 360px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

h1{
    font-family: Reem Kufi;
    font-size: 40px;
    color: #00304D;
    margin-bottom: 30px;
}


.inserir{
    width: 230px;
    height: 35px;
    border: none;
    border-radius: 50px;
    background-color: rgb(227, 227, 227);
    margin-bottom: 10px;
    padding-left: 16px;
    font-family: Inter;
}

#entrar{
    background-color: #75B0DD;
    color: white;
    border: none;
    border-radius: 10px;
    width: 200px;
    height: 40px;
    cursor: pointer;
    margin: 10px;
    font-family: Reem Kufi;
    font-size: 15px;
    transition: background-color 0.2s;
}

#entrar:hover{
    background-color: #92c3e8;
}

.outro{
    text-align: center;
    margin-top: 40px;
}
</style>