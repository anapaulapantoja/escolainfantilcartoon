<?php
     if( empty($_GET['utilizador']) )
        die('<p>Não é possível alterar a password: dados em falta</p>');
        
    $hash = $_GET['confirmacao'];
    
	session_start();
	
	include("config.php");
	
	$sql = "UPDATE `usuarios` 
	    SET senha= md5('".$_GET["senha"]."') 
		WHERE email ='".$_GET['utilizador']."'";
	
	$res = $conn->query($sql) or die($conn->error);
		
    if($res==true){
		print "<br><div class='alert alert-success'>Senha alterada!</div>";
	}else{
		print "<br><div class='alert alert-danger'>Não foi possível alterar.</div>";
	}
	
?>
<a class="btn btn-success" href="index.php" role="button">Voltar</a>