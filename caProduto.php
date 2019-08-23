<?php
    include('./inc/functions1.php');

    session_start();
    if(!$_SESSION['logado']){
        // redirecionar para login
        header('location: login.php');
    }

	if($_POST){

        // Verificando o post
        $erros1 = errosNoPost1();
        
		// Verificando se arquivo chegou
		if($_FILES['foto1']){
            if($_FILES['foto1']['error'] == 0){
            // Salvar a foto de forma decente
            move_uploaded_file($_FILES['foto1']['tmp_name'],'./fotos/produtos/'.$_FILES['foto1']['name']);
            // Salvando o nome do arquivo definitivo
            $aArquivo_def = './fotos/produtos/'.$_FILES['foto1']['name'];
            }
            else {
                $erros1[] = 'errUpload1';
            }
        }

        if(count($erros1) == 0){
        /*Adicionar produto ao arquivo json*/
        addProduto($_POST['productName1'],$aArquivo_def,$_POST['description1'],$_POST['price1']);
        }
    }
    else {

    // Garantindo que um vetor de erros exista
    // ainda que vazio quando não houver POST
    $erros1 = [];
    }

// errNome será true se o campo nome for inválido e false se o campo estiver ok. 
    $errNome1 = in_array('errNome1',$erros1);

// errEmail será true se o campo email for inválido e false se o campo estiver ok. 
    $errDesc = in_array('errDesc',$erros1);

// errSenha será ture se o campo senha for inválido e false se o campo estiver ok.
    $errFoto = in_array('errFoto',$erros1);

// errConf será true se o campo de confirmação for inválido e false se o campo estiver ok.
    $errPrice = in_array('errPrice',$erros1);

// Carregando vetor de usuarios
    $produtos = getProdutos();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro de Produtos</title>
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
        <main>
            <div class="form-row">
                <form class="col-sm-12 col-md-4" action="caProduto.php" method="post" enctype="multipart/form-data">
                <!-- multipart/form-data formulário com várias partes (Separar o que é texto normal do que é/são arquivos) -->
                    
                    <div class="form-group">
                        <label for="productName1">Nome do produto</label>
                        <input value="" type="text" class="form-control <?= ($errNome1?'is-invalid':'')?>" id="productName1" name="productName1" placeholder="Digite o nome do produto">
                        <?php if($errNome1): ?><div class="invalid-feedback">Preencha o nome corretamente.</div><?php endif; ?>
                    </div>

                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="foto1" name="foto1">
                            <label class="custom-file-label" for="foto1">Escolha a foto do produto</label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="description1">Descrição</label>
                        <textarea class="form-control <?= ($errDesc?'is-invalid':'')?>" id="description1" name="description1" rows="3"></textarea>
                        <?php if($errDesc): ?><div class="invalid-feedback">Preencha a descrição corretamente.</div><?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label for="price1">Preço</label>
                        <input value="" type="number" class="form-control <?= ($errPrice?'is-invalid':'')?>" id="price1" name="price1" placeholder="Digite o preço do produto">
                        <?php if($errPrice): ?><div class="invalid-feedback">Preencha o preço corretamente.</div><?php endif; ?>
                    </div>                   

                    <button class="btn btn-primary" type="submit">Salvar</button>
                    
                </form>
                
            </div>
        </main>
        
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>