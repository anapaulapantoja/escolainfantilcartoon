<?php
	switch($_REQUEST["acao"]){
		case "cadastrar":
			$sql = "INSERT INTO aluno (nome_aluno, usuarios_id_usuario, turma_id_turma) VALUES ('".$_POST["nome_aluno"]."', ".$_POST["id_usuario"].", ".$_POST["id_turma"].")";
			
			$res = $conn->query($sql);
			if($res==true){
				print "<br><div class='alert alert-success'>Cadastro realizado com sucesso!</div>";
			}else{
				print "<br><div class='alert alert-danger'>Não foi possível cadastrar.</div>";
			}
		break;
		case "editar":
		$sql = "UPDATE aluno SET nome_aluno='".$_REQUEST["nome_aluno"]."' WHERE id_aluno=".$_REQUEST["id_aluno"];
			
			$res = $conn->query($sql);
			
			if($res==true){
				print "<br><div class='alert alert-success'>Edição realizada com sucesso!</div>";
			}else{
				print "<br><div class='alert alert-danger'>Não foi possível editar.</div>";
			}
		break;
		case "excluir":
			$sql = "DELETE FROM aluno WHERE id_aluno=".$_REQUEST["id_aluno"];
			
			$res = $conn->query($sql);
			
			if($res==true){
				print "<br><div class='alert alert-success'>Excluiu com sucesso!</div>";
			}else{
				print "<br><div class='alert alert-danger'>Não foi possível excluir.</div>";
			}
		break;
	}
?>
<a class="btn btn-success" href="?page=listar-aluno">Listar</a>
<a class="btn btn-success" href="secretaria.php" role="button">Voltar</a>

