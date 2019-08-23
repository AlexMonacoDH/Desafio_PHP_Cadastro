<?php

    include('./inc/functions1.php');

    session_start();
    if(!$_SESSION['logado']){
        // redirecionar para login
        header('location: login.php');
    }
/*
    if($_POST){
        // destruir a session
        session_destroy();
        // redirecionar para login
        header('location: login.php');
    }*/

    $produtos = getProdutos();

    //logout
    if(isset($_POST['logout'])){
        //destruir a session
        session_destroy();
        //redirecionar para login
        header('location: login.php');
    }
    //remove product from json file
    elseif($_POST){
        removeJson();
    }
    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Table</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <header>
        <div class="row">
        <div class="col">
            <li><a href="./index.html">Home</a></li>
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
    
    <div class="container">
    
        <h1>Product Table</h1>
        <table class="table" id="table1">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Picture</th>
                    <th scope="col">Price</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($produtos as $i => $p): ?>
                <tr>
                    <th scope="row"><?= $i+1 ?></th>
                    <td><?= $p['productName1'] ?></td>
                    <td><?= $p['description1'] ?></td>
                    <td><img src="<?= $p['foto1'];?>" alt="<?= $p['productName1']; ?>" style="max-width:10vw;max-height:10vh"></td>
                    <td><?= 'R$ '.$p['price1'] ?></td>
                    <td>
                    <form method="post">
                        <!-- para o form funcionar é necessário um valor de input  -->
                        <input type="hidden" name="<?= $i ?>" value="<?= $p['productName1'] ?>">
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                    </td>
                </tr>
            <?php endforeach ?>
            
            </tbody>
        </table>

        <form method="post">
            <!-- para o form funcionar é necessário um valor de input  -->
            <input type="hidden" name="logout" value="logout">
            <button class="btn btn-primary" type="submit">Logout</button>
        </form>
    </div>

    <script src="./inc/functions.js"></script>
    <!-- código para o Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>