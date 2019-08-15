<?php
	// Definindo uma constante para o nome do arquivo
    define('PHOTO','produtos.json');
    // Definindo uma constante para o nome do arquivo
    define('ARQUIVO','usuarios.json');
    
    // Função para validar dados do post
	function errosNoPost(){
		$erros =[];
		if(!isset($_POST['nome']) || $_POST['nome']==''){
			$erros[] = 'errNome';
		}

		if(!isset($_POST['email']) || $_POST['email']==''){
			$erros[] = 'errEmail';
		}

		if(!isset($_POST['senha']) || $_POST['senha']==''){
			$erros[] = 'errSenha';
		}

		if($_POST['conf'] != $_POST['senha'] && isset($_POST['conf'])){
			$erros[] = 'errConf';
		}

		return $erros;
    }
    
    // Carregando o conteúdo do arquivo (string json) para uma variável
	function getUsuarios(){
		$json = file_get_contents(ARQUIVO);
		$usuarios = json_decode($json,true);
		return $usuarios;
	}
	
	// Função que adiciona usuario ao json
	function addUsuario($nome,$email,$senha,$foto){

		// Carregando os usuarios
		$usuarios = getUsuarios();

		// Adicionando um novo usuario ao array de usuarios
		$usuarios[] = [
			'nome' => $nome,
			'email' => $email,
			'senha' => password_hash($senha,PASSWORD_DEFAULT),
			'foto' => $foto
			// função password_hash garante a cripotagria dos dados
		];
		
		// Transformando o array usuarios numa string json
		$json = json_encode($usuarios);

		// Salvar a string json no arquivo
		file_put_contents(ARQUIVO,$json); 
	}
    
    // Carregando o conteúdo do arquivo (string json) para uma variável
	function getProdutos(){
		$json = file_get_contents(PHOTO);
		$produtos = json_decode($json,true);
		return $produtos;
	}
	
	// Função que adiciona produto ao json
	function addProduto($name,$foto,$description,$price){

		// Carregando os produtos
		$produtos = getProdutos();

		// Adicionando um novo produto ao array de produtos
		$produtos[] = [
			'productName1' => $name,
			'foto1' => $foto,
			'description1' => $description,
			'price1' => $price
		];
		
		// Transformando o array produtos numa string json
		$json = json_encode($produtos);

		// Salvar a string json no arquivo
		file_put_contents(PHOTO,$json); 
    }
    
    // Função para verificar se o login é válido
	function logar($email,$senha){
		
		// Carregar o Json
		$usuarios = getUsuarios();

		// Procurar o usuario com o e-mail dado
		$achou = false;
		foreach ($usuarios as $f) {
			if($f['email'] == $email){
				$achou = true;
				break;
				// o break interrompe o forearch/LOOP; não interrompe o script
			}
		}

		if(!$achou){
			return false;
		} else {
			$senhaOk = password_verify($senha,$f['senha']);
			return $senhaOk;
		}
	}