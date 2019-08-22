<?php

    // Incluindo arquivo de funções
    include('./inc/functions1.php');
    
    if($_POST){
        $loginOk = logar($_POST['email'],$_POST['senha']);
        if($loginOk){

            // Criando a session
            session_start();
            $_SESSION['logado'] = true;

            // Redirecionando para index.php
            header('location: index.php');

        } if($loginOk == false){
            ?>
            <div class="alert alert-danger" role="alert">
            Erro Login!
            </div>
            <?php
        }
    } else {
        $loginOk = true;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login!!!</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">	
    <link rel="stylesheet" href="./css/style.css">
</head>
<header>
    <div class="row">
        <div class="col">
            <li><a href="./index.php">Produtos</a></li>
            <li><a href="./caProduto.php">Cadastrar Produtos</a></li>
        </div>
        <div class="col">
            <li><a href="./usuarios.php">Usuários</a></li>
            <li><a href="./cadastro.php">Cadastro</a></li>
            <li><a href="./login.php">Login</a></li>
        </div>
    </div>
</header>
<body>
    <div class="container">
        <form method="post">
            <div class="form-group">
                <div class="col-sm-12 col-md-4 list-group">
                <label for="email">E-mail</label>
                <input value="" type="text" class="form-control" id="email" name="email" placeholder="Digite o nome do usuário">
            </div>
            </div>
            <div class="form-group">
            <div class="col-sm-12 col-md-4 list-group">
                <label value="" for="senha">Senha</label>
                <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite uma senha para o usuário">
            </div>
            </div>
            <button class="btn btn-primary"type="submit">Entrar</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>  
</body>
</html>