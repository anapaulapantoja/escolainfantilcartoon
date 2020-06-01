<?php
	if(empty($_POST) or (empty($_POST['username']) or empty($_POST['pass']))){
		header('Location: index.php');
		exit;
	}
	session_start();
	
	include("config.php");
	
	$username = $_POST['username'];
	$pass  = $_POST['pass'];
	
	$sql = "SELECT * FROM usuarios
		    WHERE usuario='".$username."'
			AND senha='".md5($pass)."'";
			
	$res = $conn->query($sql) or die($conn->error);
	
	$row = $res->fetch_assoc();
		
	if($res->num_rows > 0){
	   
		$_SESSION["username"] = $username;
		$_SESSION["nivel"]   = $row["nivel"];
		if ($_SESSION["nivel"] == 1) {
		    $_SESSION["username"] = $username;
		    print "<script>location.href='secretaria.php';</script>";
		} elseif ($_SESSION["nivel"] == 2) {
		    $_SESSION["username"] = $username;
		    print "<script>location.href='professor.php';</script>";
		} else {
	        $_SESSION["username"] = $username;
		    print "<script>location.href='pais.php';</script>";
		}
 	}else{
		print "<br><div class='alert alert-danger'>Não foi possível acessar, tente novamente!</div>";
	}
	
?>
