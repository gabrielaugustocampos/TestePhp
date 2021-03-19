<?php
	require_once "config.php";

	$nome = $_POST['nome'];
	$cpf = $_POST['cpf'];
	$email = $_POST['email'];
	$senha = md5($_POST['senha']);

	$insere = "INSERT INTO cadastro (nome, cpf, email, senha) VALUES ('$nome', '$cpf', '$email', '$senha')" or die(mysqli_error());
		
		// echo $ingpadrao; exit();
				
		if (!mysqli_query($conn, $insere)) {  
			die('Erro: '.mysqli_error($conn));
		} else {

            $result = "Cadastrado com sucesso!"; 

            echo json_encode($result);
		}
	
	 

?>