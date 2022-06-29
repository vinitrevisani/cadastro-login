<?php
header("Content-type:text/html; charset=utf8");

require_once "classes/interacao.php";

$Usuario = new Usuarios();

if(isset($_POST["cadastrar"])){

    $result = $Usuario->registrar();

    if($result == 1 ){
        header('location:sucess.php');
        
    }
    else{
        echo "<script>alert('Error')</script";
    }
}


?>

<!DOCTYPE html>
<html lang="pt=br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="css/style.css" rel="stylesheet"/>
</head>
<body>
    <form action="cadastros.php" method="post">

        <div class="back" id="back">

            <div class="icon">
                <img class="logo" src="img/img.png">
                <h1>CADASTRO</h1>
            </div>

            <div class="titulo">
                <h1>FAÇA CADASTRO</h1>
                <hr>
            </div>

            <div class="btn" onclick="openmenu()">
                <h1></h1>
            </div>
            
        </div>

        
        
        <div class="menu" id="menu">
            <div class="menu-login">
                <div class="form">
                    <label for="login">NOME</label>
                    <input type="text" name="nome" class="form-input" placeholder="Digite seu nome">
                    <hr class="form-hr">
                    <label for="login">USUÁRIO</label>
                    <input type="text" name="usuario" class="form-input" placeholder="Digite seu usuario">
                    <hr class="form-hr">
                    <label for="login">EMAIL</label>
                    <input type="text" name="email" class="form-input" placeholder="Digite seu email">
                    <hr class="form-hr">
                    <label for="login">SENHA</label>
                    <input type="password" name="senha" class="form-input" placeholder="Digite sua senha">
                    <hr class="form-hr">

                    <button name="cadastrar" type="submit">CADASTRO</button>
                    <a href="index.php" class="btn-register">Clique aqui para logar!</a>
                </div>

            </div> 
            <div class="btn-close" id="btn-close" onclick="closemenu()">
                <h1>X</h1>
            </div>
            
        </div>

        <script>
            function openmenu(){
                var menu = document.getElementById('menu')
                menu.style.display = "flex";

                setInterval(function(){
                    var btn = document.getElementById('btn-close')
                    btn.style.display = "flex"
                },600)            
            }

            function closemenu(){
                var menu = document.getElementById('menu')
                menu.style.display = "none";

            }
        </script>
    </form>
</body>
</html>