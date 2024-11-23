<?php include './php/page_config.php' ?>
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
</head>
<body>
<?php include './html/header.php'; ?>
    <main class="main-content">
    <section id="secao1">
    <div class="logo-container">
        <h1 id="page-logo">Viva Ativo</h1> <br>
    </div> <br>
        <p>Sua academia ideal</p>
    </section>
    <section id="secao2">
        <div class="imgSobre" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
            <div class="sobre">
                <p>A Viva Ativo é uma academia moderna e acolhedora, focada em proporcionar bem-estar e saúde aos seus alunos. Com equipamentos de última geração e profissionais capacitados. Seu ambiente motivador e inspirador promove uma experiência única para quem busca melhorar a qualidade de vida.</p>
            </div>
        </div>
        </div>
        
    </section>
    <?php
   include './html/footer.php';
   ?> 
</main>
</body>
<style>
    *{
    margin: 0;
    padding: 0;
}

body {
    background: rgba(45, 68, 85, 0.93);
    font-size:x-large;
    font-family: "Inter", sans-serif;
    font-optical-sizing: auto;
    font-style: normal;
}
/* fim pagina */

/* seção 1 */
#secao1{
    background: url('img/academia.jpg')
    no-repeat center center;
    background-size: cover;
    height: 90vh;
    display: flow-root;
    width: 100%;
}
#secao1 h1{
    text-align: left;
    color: #fff;;
    text-shadow: 4px 8px 30px rgb(44, 44, 44);
    font-size: 93px;
    font-family: "Cinzel", serif;
    font-weight: 400;
    margin-top: 200px;
    margin-bottom: 0;
    padding-left: 185px;
   
}
#secao1 p{
    color: #fff;
    text-align: left;
    text-shadow: 2px 5px 15px rgb(44, 44, 44);
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-weight: 400;
    font-size: 38px;
    animation: showup 5s forwards;
    padding-left: 280px;
}
@keyframes showup {
    0% {opacity:0;}
    30% {opacity:0;}
    50% {opacity:1;}

}

.logo-container {
  position: relative;
  height: 20%;
  
  &:before {
    content:  "";
    position: absolute;
    top:      0;
    left: 3.5%;
    width:    40%; 
    height:   4px;
    background-color:#1a4a67;
    transform-origin: center center;
    transform: scaleX(0);
    
    animation: line-animation 3s ease forwards; 
  }
  
  h1#page-logo {
    
    animation: clip-path-reveal-1 3s ease forwards; 
  }
}

@keyframes line-animation {
  0% { transform: scaleX(0); }
  15% { transform: scaleX(0); }
  20%, 25% { transform: scaleX(0.7); top: 50px; } 
  50% { transform: scaleX(0.7); top: calc(100% + 5px); } 
  70% { transform: scaleX(0.50); top: calc(100% + 5px); }
  80%, 100% { transform: scaleX(0.50); top: calc(100% + 5px); }
}

@keyframes clip-path-reveal-1 {
  0%, 20% { clip-path: polygon(0 0, 100% 0, 100% 0, 0% 0); }
  50%, 100% { clip-path: polygon(0 0, 100% 0, 100% 100%, 0% 100%); } 
}



/* fim seção 1 */
/* secão 2 */

/* sobre */
#secao2{
    margin-top: 150px;
}
#secao2 p{
    text-align: justify;
}
.imgSobre {
    background: url('img/sobre.jpg') no-repeat center center;
    background-size: cover;
    height: 600px;
    width: 1300px;
    position: relative;
    border-radius: 10px;
    margin: 50px auto;
    max-width: 90%;
    min-width: 600px;
}

.sobre {
    position: absolute;
    top: 13%;
    left: 50px;
    background-color: rgba(255, 255, 255, 0.9);
    padding: 20px;
    width: 500px;
    height: 400px;
    border-radius: 5px;
    box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
    max-width: 70%;
    min-width: 450px;
}

.sobre h1 {
    font-size: 65px;
    color: #00304D;
    text-align: center;
    font-family: 'Montserrat', sans-serif;
}

.sobre p {
    margin-top: 18px;
    font-size: 30px;
    font-family: 'Plus Jakarta Sans', sans-serif;
}
/* fim sobre */
/* fim seção 2 */

@media (max-width: 600px){
    .sobre p{
        font-size: 25px;
    }
}

@media (max-width: 768px) {
    #nav1{
        display: none;
    }
    nav{
        justify-content:right;
    }
    #user-div{
        margin-right: 20px;
    }
    #opt-sair{
        font-size: 12px;
        width: 30px;
    }
    #botao{
        display: block;
    }
    #checkbox:checked + #botao + #nav2{
        display: block;
    }
    .logo{
        margin-left: 5%;
    }
    #footer {
        display: block;
        overflow-wrap: break-word;
        padding: 25px;
    }
    #footer h2{
        font-size: 24px;
    }
    #footer p{
        font-size: 13px;
    }
    #hotel{
        font-size: 35px;
        margin-top: 20px;
    }
    .flex a{
        margin-top: 9px;
    }
    .flex p{
        margin-bottom: 30px;
    }
    .fa-solid{
        font-size: 55px;
    }
    #secao1{
        height: 75vh;
        
    }
    #secao1 h1{
        font-size: 52px;
        margin-top: 60px;
    }
    #secao1 p{
        font-size: 20px;
    }
    .imgSobre {
        height: 500px;
        width: 1100px;
        position: relative;
        min-width: 60px;
    }
    .sobre {
        width: 300px;
        height: 370px;
        min-width: 45px;
        right: 30px;
    }
    .sobre h1 {
        font-size: 40px;
    }
    .sobre p {
        font-size: 18px;
    }
    #recursos{
        min-width: 60px;
        width: 1470px;
        gap: 15px;
    }
    .recurso{
        width: 130px;
        height: 130px;
        padding: 10px;
    }
    .recurso p{
        font-size: 18px;
    }
    #secao3 h1{
        font-size: 50px;
    }
    .info p{
        font-size: 1px;
    }


    @keyframes line-animation {
    0% { transform: scaleX(0); }
    15% { transform: scaleX(0); }
    20%, 25% { transform: scaleX(1.8); top: 0px; } 
    50% { transform: scaleX(1.8); top: calc(100% + 5px); } 
    70% { transform: scaleX(0.9); top: calc(100% + 5px); } 
    80%, 100% { transform: scaleX(0.9); top: calc(100% + 5px); }
    }

    @keyframes clip-path-reveal-1 {
    0%, 20% { clip-path: polygon(0 0, 100% 0, 100% 0, 0% 0); } 
    50%, 100% { clip-path: polygon(0 0, 100% 0, 100% 100%, 0% 100%); } 
    }
    .logo-container {
        height: 11%;
    }

}




  
  


</style>
</html>