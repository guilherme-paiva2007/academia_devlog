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
    <header id="header">
        <div id="container">
            <a href="index.php" id="box-img"><img class= "logo" src="img/logo.png" alt="logo"></li></a>
            <nav>
            <ul id="nav1">
                    <li><h3><a id="inicio" href="./index.php">início</a></h3></li>
                    <li><h3><a href="./login.php">login</a></h3></li>
                    <li><h3><a href="./perfil.php">perfil</a></h3></li>
                </ul>
                <div id="user-div">
                   
                </div>
                <input type="checkbox" id="checkbox">
                <label for="checkbox" id="botao">☰</label>
                <ul id="nav2">
                    <li><h3><a id="inicio" href="./index.php">início</a></h3></li>
                    <li><h3><a href="./login.php">login</a></h3></li>
                    <li><h3><a href="./perfil.php">perfil</a></h3></li>
                </ul>
            </nav>
        </div>
    </header>
    <main class="main-content">


    <div class="container">
  <ul class="responsive-table">
    <li class="table-header">
      <div class="col col-1">1</div>
      <div class="col col-2">2</div>
      <div class="col col-3">3</div>
      <div class="col col-4">4</div>
    </li>
    <li class="table-row">
      <div class="col col-1" data-label="Job Id">info 1</div>
      <div class="col col-2" data-label="Customer Name">info 2</div>
      <div class="col col-3" data-label="Amount">info 3</div>
      <div class="col col-4" data-label="Payment Status">info 4</div>
    </li>
    <li class="table-row">
    <div class="col col-1" data-label="Job Id">info 1</div>
      <div class="col col-2" data-label="Customer Name">info 2</div>
      <div class="col col-3" data-label="Amount">info 3</div>
      <div class="col col-4" data-label="Payment Status">info 4</div
    </li>
    <li class="table-row">
    <div class="col col-1" data-label="Job Id">info 1</div>
      <div class="col col-2" data-label="Customer Name">info 2</div>
      <div class="col col-3" data-label="Amount">info 3</div>
      <div class="col col-4" data-label="Payment Status">info 4</div
    </li>
    <li class="table-row">
    <div class="col col-1" data-label="Job Id">info 1</div>
      <div class="col col-2" data-label="Customer Name">info 2</div>
      <div class="col col-3" data-label="Amount">info 3</div>
      <div class="col col-4" data-label="Payment Status">info 4</div
    </li>
  </ul>
</div>


    </section>
    <footer>
            <div id="footer">
        
                <div class="contato">
                    <h2>Informações de Contato</h2>
                    <p>Endereço: Av. Alegria, 100, Caçapava - SP, 12745-160</p>
                    <p>Telefone: (12) 3653-1943</p>
                    <p>E-mail: contato@sesi-senai.com.br</p>
            
                </div> 
            
                <div class="equipe">
                    <h2>Equipe Desenvolvedora</h2>
                        <p>Ana Lívia</p>
                        <p>Gabriel Reis</p>
                        <p>Guilherme Paiva</p>
                </div>
                </div>
            </div>
        </footer> 
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
/* cabeçalho */
header {
    background-color: rgb(255, 255, 255);
    color: #0e3960;
    padding: 10px;
    text-align: center;
    position: sticky;
    top: 0;
    z-index: 50;
    box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
    transition: all 0.4s ease;
}

#header.ativo{
    top: -95px;
    opacity: 0;
}

#container {
    max-width: 1300px;
    margin: 0 auto;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
#box-img{
    width: 180px;
    height: 70px;
    display: flex;
    align-items: center;
    margin-right:10%
}
.logo {
    width: 100px;
    float: left;
}
#nav1{
    margin-left: 8%;
    display: flex;
    justify-content: center;
}
#login{
    color: #0e3960;
    text-decoration: none;
    font-size: 17px;
    font-weight: 600;
    font-family: 'Plus Jakarta Sans', sans-serif;
    text-transform: uppercase;
}
#user-div{
    display: flex;
    align-items: center;
    list-style: none;
}
#user{
    background-color: rgba(255, 255, 255, 0);
    border: none;
    color: #0e3960;
    text-decoration: none;
    font-size: 17px;
    font-weight: bold;
    font-family: 'Plus Jakarta Sans', sans-serif;
    text-transform: uppercase;
    cursor: pointer;
    height: 30px;
    margin-top: 7px;
    align-self: center;
}
#opt-nome{
    display: none;
}
#opt-sair{
    background-color: rgb(255, 255, 255);
    font-weight: 600;
    cursor: pointer;
}
nav {
    display: flex;
    flex-direction: row;
    flex-grow: 1;
    justify-content: space-between;
    align-items: center;
}

nav ul {
    list-style: none;
    display: flex;
    margin: 0;
    padding: 0;
}

nav ul li {
    padding: 10px;
}

nav ul li a {
    color: #0e3960;
    text-decoration: none;
    font-size: 17px;
    font-weight: bold;
    font-family: 'Plus Jakarta Sans', sans-serif;
    text-transform: uppercase;
    margin: 0 3vw;
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
/* tabela */
.container {
  max-width: 1000px;
  margin-left: auto;
  margin-right: auto;
  padding-left: 10px;
  padding-right: 10px;
}


.responsive-table {
  li {
    border-radius: 3px;
    padding: 25px 30px;
    display: flex;
    justify-content: space-between;
    margin-bottom: 25px;
  }
  .table-header {
    background-color: #95A5A6;
    font-size: 14px;
    text-transform: uppercase;
    letter-spacing: 0.03em;
    margin-top:100px
  }
  .table-row {
    background-color: #ffffff;
    box-shadow: 0px 0px 9px 0px rgba(0,0,0,0.1);
  }
  .col-1 {
    flex-basis: 10%;
  }
  .col-2 {
    flex-basis: 40%;
  }
  .col-3 {
    flex-basis: 25%;
  }
  .col-4 {
    flex-basis: 25%;
  }
  
  @media all and (max-width: 767px) {
    .table-header {
      display: none;
    }
    .table-row{
      
    }
    li {
      display: block;
    }
    .col {
      
      flex-basis: 100%;
      
    }
    .col {
      display: flex;
      padding: 10px 0;
      &:before {
        color: #6C7A89;
        padding-right: 10px;
        content: attr(data-label);
        flex-basis: 50%;
        text-align: right;
      }
    }
  }
}
/* fim tabela */
/* footer */
footer {
    background-color:rgba(99, 149, 187, 1);
    width: 100%;
    color: white;
    margin-top: 60px;
}

#footer {
    justify-content: space-evenly;
    display: flex;
    margin-top: 90px;
    padding-top: 20px;
    padding-bottom: 20px;
}

footer h2 {
    margin-top: 20px;
    margin-bottom: 10px;
    font-family: 'Montserrat', sans-serif;
}

footer p, footer a {
    font-size: 14px;
    line-height: 1.5;
    font-family: "Plus Jakarta Sans", sans-serif;
    padding: 3px;
}

footer a {
    text-decoration: none;
    color: #092c4f;
}

footer a:hover {
    text-decoration: underline;
}

.contato {
    margin-top: 5px;
}
</style>
</html>