<?php include './php/page_config.php';

if(!isset($_SESSION['logged']) && $_SESSION['logged'] !== true){
    header('Location: ' . createLink('login'));
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/index.js" defer></script>
    <title>Viva ativo</title>
    <link rel="shortcut icon" href="./img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100..900&family=Plus+Jakarta+Sans:wght@200..800&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Playfair+Display+SC:ital,wght@0,400;0,700;0,900;1,400;1,700;1,900&family=Reem+Kufi:wght@400..700&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.1/aos.js"></script>
    <?php include './html/head.php' ?>
</head>
<body>
<?php
    include './html/header.php';
    ?>
    <main class="main-content">

    <div class="pagina-perfil">
        <div id="fundo">
            <h2>PERFIL</h2>
        </div>
        <form class="informacoes">
            <div class='info'>
                <div class='nome-email'>
                    <p class="nome-acima" >NOME</p>
                    <p ><?php echo $_SESSION['user_name'] ?></p>
                    <p class='nome-acima'>EMAIL</p>
                    <p ><?php echo $_SESSION['user_email'] ?></p>
                    <p class='nome-acima'>NASCIMENTO</p>
                    <p ><?php echo $_SESSION['user_nascimento'] ?></p>
                    <p class='nome-acima'>TELEFONE</p>
                    <p ><?php echo $_SESSION['user_tel'] ?></p>
                    <p class='nome-acima'>NIVEL</p>
                    <p ><?php echo levelAlias($_SESSION['user_level']) ?></p>
                    <?php
                    if (levelNum($_SESSION['user_level']) > 1) {
                        echo "<p class='nome-acima'>FERRAMENTAS</p>";
                        $link = createLink('ferramentas');
                        echo "<p ><a href='$link'>Ferramentas</a></p>";
                    }
                    ?>
                    <button style="background-color: var(--red);" onclick = "location.href = dirbase + 'php/logout.php'">Sair</button>
                    </div>
                </div>
            </div>
        </form>
        
    </div>
    
</main>

<?php
   include './html/footer.php';
   ?> 
</body>
<style>
    *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}
.main-content{
    display: flex;
    justify-content: center;
    align-items: center;
}


a{
    transition: color 0.3s;
}

a:hover{
    color:#297caf;
}


#checkbox{
    display: none;
}

#botao{
    display: none;
    font-size: 40px;
    color:#00304D;
    cursor: pointer;
    float: right;
    margin-right: 10%;
}

#nav2{ 
    display: none;
    position: absolute;
    background-color: rgba(216, 219, 220, 0.707);
    top: 70px;
    right: 0;
    width: 200px;
    z-index: 1; 
    border: solid 5px rgba(217, 217, 217, 0.886);
}


/* fim cabeçalho */
.pagina-perfil{
    display: flex;
    flex-direction: column;
    background-color: rgb(54, 54, 54);
    color: white;
    border-radius: 7px;
    width: 700px;
    height: 100%;
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    margin: 10vh;
}

#fundo{
    display: flex;
    justify-content: center;
    align-items: center;
    width: 700px;
    height: 140px;
    background-color: rgba(99, 149, 187, 1);
    border-top-left-radius: 7px;
    border-top-right-radius: 7px;
}
#fundo h2{
    font-size: 50px
}

#user-perfil{
    width: 125px;
    height: 125px;
    border-radius: 50%;
    margin-top: -7%;
    border: 5px solid rgb(54, 54, 54);
}

.nome-acima{
    color: rgba(255, 255, 255, 0.599);
    float: left;
    font-size: 14px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    font-weight: 500;
}

.nome-email{
    display: flex;
    flex-direction: column;
}

.info{
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    background-color: rgb(76, 76, 76);
    border-radius: 10px;
    width: 630px;
    margin-top: 20px;
    margin-bottom: 25px;
    padding: 20px;
    padding-bottom: 0;
    
}

.informacoes{
    margin-left: 35px;
}

#banner-histweb{
    margin-left: 40px;
    width: 340px;
    color: #528d58;
    filter: brightness(0) saturate(100%) invert(64%) sepia(7%) saturate(1716%) hue-rotate(75deg) brightness(100%) contrast(84%);
}

#excluir-conta{
    background-color: #ff3232;
    border: none;
    width: 120px;
    border-radius: 5px;
    height: 40px;
    color: white;
    font-weight: 500;
    font-size: 15px;
    transition: all 0.3s;
    cursor: pointer;
    margin-top: 10px;
    margin-bottom: 20px;
}

#excluir-conta:hover{
    background-color: #ff5c5c;
}

#campo-nome{
    border-radius: 5px;
    border: none;
    background-color: rgb(47, 47, 47);
    color: rgba(255, 255, 255, 0.803);
    height: 40px;
    width: 590px;
    padding-left: 10px;
    font-size: 18px;
    margin-top: 7px;
    margin-bottom: 7px;
}
#campo-email{
    border-radius: 5px;
    border: none;
    background-color: rgb(47, 47, 47);
    color: rgba(255, 255, 255, 0.803);
    height: 40px;
    width: 590px;
    padding-left: 10px;
    font-size: 18px;
    margin-top: 7px;
    margin-bottom: 20px;
}

#campo-senha{
    border-radius: 5px;
    border: none;
    background-color: rgb(47, 47, 47);
    color: rgba(255, 255, 255, 0.803);
    height: 40px;
    width: 590px;
    padding-left: 10px;
    font-size: 18px;
    margin-top: 7px;
    margin-bottom: 5px;
}

#mostrar{
    margin-bottom: 10px;
}

#confirma{
    background-color: #438e4b;
    border: none;
    border-radius: 5px;
    font-weight: 500;
    color: white;
    width: 180px;
    height: 40px;
    font-size: 15px;
    align-self: center;
    margin-bottom: 20px;
    cursor: pointer;
    transition: all 0.4s;
}

#confirma:hover{
    background-color: #67b36f;
}

.exclusao{
    align-self: center;
    margin-bottom: 10px;
    display: flex;
    align-items: center;
    flex-direction: column;
}

input[type="file"] {
    margin-top: 7px;
    margin-bottom: 20px;
}

.contato {
    margin-top: 5px;
}
@media (max-width: 600px){
    .sobre p{
        font-size: 25px;
    }
}

@media (max-width: 768px){
    .pagina-perfil{
        width: 300px;
    }
    .info{
        width: 230px;
    }
    #campo-nome, #campo-email, #campo-senha, #upload{
        width: 190px;
        height: 30px;
    }
    #fundo{
        width: 300px;
        height: 120px;
    }
    #banner-histweb{
        width: 250px;
        margin-top: -18px;
        margin-left: 20px;
    }
    #confirma{
        height: 30px;
    }
    #excluir-conta{
        height: 30px;
    }
    #user-perfil{
        margin-top: -11%;
        width: 100px;
        height: 100px;
    }
    .nome-acima{
        font-size: 12px;
    }
    #mostrar{
        margin-top: 20px;
        margin-bottom: 10px;
    }
}
</style>
