<?php
	switch($_REQUEST["acao"]){
		case "cadastrar":
			$sql = "INSERT INTO usuarios (nome, email, usuario, senha, nivel) VALUES ('".$_POST["nome"]."', '".$_POST["email"]."', '".$_POST["usuario"]."',md5( '".$_POST["senha"]."'), ".$_POST["id_nivel"].            ")";
			$res = $conn->query($sql);
			if($res==true){
				print "<br><div class='alert alert-success'>Cadastro realizado com sucesso!</div>";
			}else{
				print "<br><div class='alert alert-danger'>Não foi possível cadastrar.</div>";
			}
		break;
		case "editar":
		$sql = "UPDATE usuarios SET nome='".$_REQUEST["nome"]."', email='".$_REQUEST["email"]."', usuario='".$_REQUEST["usuario"]."' WHERE id_usuario=".$_REQUEST["id_usuario"];
			
			$res = $conn->query($sql);
			echo $sql;
			if($res==true){
				print "<br><div class='alert alert-success'>Edição realizada com sucesso!</div>";
			}else{
				print "<br><div class='alert alert-danger'>Não foi possível editar.</div>";
			}
		break;
		case "excluir":
			$sql = "DELETE FROM usuarios WHERE id_usuario=".$_REQUEST["id_usuario"];
			
			$res = $conn->query($sql);
			
			if($res==true){
				print "<br><div class='alert alert-success'>Excluiu com sucesso!</div>";
			}else{
				print "<br><div class='alert alert-danger'>Não foi possível excluir.</div>";
			}
		break;
	}
?>
<a class="btn btn-success" href="?page=listar-usuario">Listar</a>
<a class="btn btn-success" href="secretaria.php" role="button">Voltar</a>

