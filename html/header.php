<header id="header">
        <div id="container">
            <a href="index.php" id="box-img"><img class= "logo" src="img/logo.png" alt="logo"></li></a>
            <nav>
            <ul id="nav1">
            <li><h3><a id="inicio" href="<?php echo createLink('inicio') ?>">início</a></h3></li>
                    <?php if (!isset($_SESSION['user_id'])) {
                        $link = createLink('login');
                        echo "<li><h3><a href=\"$link\">Entrar</a></h3></li>";
                    } else {
                        $link = createLink('perfil');
                        echo "<li><h3><a href=\"$link\">Perfil</a></h3></li>";
                    } ?>
                    <li><h3><a href="<?php createLink('planos/lista') ?>">Planos</a></h3></li>
                </ul>
                <div id="user-div">
                   
                </div>
                <input type="checkbox" id="checkbox">
                <label for="checkbox" id="botao">☰</label>
                <ul id="nav2">
                    <li><h3><a id="inicio" href="<?php echo createLink('inicio') ?>">início</a></h3></li>
                    <?php if (!isset($_SESSION['user_id'])) {
                        echo "<li><h3><a href=\"<?= createLink('login') ?>\">Entrar</a></h3></li>";
                    } else {
                        echo "<li><h3><a href=\"<?= createLink('perfil') ?>\">Perfil</a></h3></li>";
                    } ?>
                </ul>
            </nav>
        </div>
    </header>
    
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
</style>