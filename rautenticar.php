<?php
	if(empty($_POST) or (empty($_POST['email']))){
		header('Location: recuperar.php');
		exit;
	}
	
	session_start();
	
	include("config.php");
	
	$email = $_POST['email'];
	
	$sql = "SELECT * FROM usuarios
		    WHERE email='".$email."'";
			
	$res = $conn->query($sql) or die($conn->error);
	
	$row = $res->fetch_assoc();
	
	$qtd = $res->num_rows;
		
	if($res->num_rows > 0){
		$chave = sha1(uniqid( mt_rand(), true));
		$conf = "INSERT INTO recuperacao VALUES ('".$email."','".$chave."')";
 
		$res = $conn->query($conf) or die($conn->error);
		if($res==true){
 
			$link = "https://testepaulinha.000webhostapp.com/novasenha.php?utilizador=$email&confirmacao=$chave";
 
			if( mail($email, 'Recuperação de password', 'Olá '.$email.' , visite este link para cadastrar nova senha '.$link) ){
			    print "<br><div class='alert alert-success'>Enviado com sucesso!</div>";
			} else {
				print "<br><div class='alert alert-danger'>Houve um erro ao enviar o email.</div>";
			}
		}
	}
?>
<a class="btn btn-success" href="index.php" role="button">Voltar</a>

	
