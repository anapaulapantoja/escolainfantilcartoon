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
		$conf = "INSERT INTO recuperacao (utilizador, confirmacao) VALUES ('".$email."','".$chave."')";
     
		$res = $conn->query($conf) or die($conn->error);
		if($res==true){
 
			$link = "https://testepaulinha.000webhostapp.com/novasenha.php?utilizador=$email&confirmacao=$chave";
 
			if( mail($email, 'Recuperação de password', 'Olá '.$email.' , visite este link para cadastrar nova senha '.$link) ){
			    echo"<script language='javascript' type='text/javascript'>alert('Link de recuperação de senha enviado com sucesso.');window.location.href='/recuperar.php';</script>";
			} else {
				echo"<script language='javascript' type='text/javascript'>alert('Houve um erro ao encaminhar o email.');window.location.href='/recuperar.php';</script>";
			}
		}
	}
	else {
			echo"<script language='javascript' type='text/javascript'>alert('Email não cadastrado.');window.location.href='/recuperar.php';</script>";
			}
?>
<a class="btn btn-success" href="index.php" role="button">Voltar</a>


	