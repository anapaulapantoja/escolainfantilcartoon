<?php
	switch($_REQUEST["acao"]){
		case "cadastrar";
		$sql = "INSERT INTO atividade(turma_id_turma , 
		disciplina_id_disciplina, texto, data_atividade) VALUES (".$_POST["id_turma"].", ".$_POST["id_disciplina"].",
		' ".$_POST["texto"]."','".$_POST["date"]."')";
		$res = $conn->query($sql);
		
		if($res==true){
			print "<br><div class='alert alert-success'>Atividade cadastrada com sucesso!</div>";
		}else{
			print "<br><div class='alert alert-danger'>Não foi possível cadastrar!</div>";
		}
		break;
		case "editar":
		$sql = "UPDATE atividade SET
						disciplina_id_disciplina=".$_POST["disciplina_id_disciplina"].",
						texto='".$_POST["texto"]."'
					WHERE id_atividade=".$_REQUEST["id_atividade"];
					
		//var_dump($sql);
			
			$res = $conn->query($sql);
			
			if($res==true){
				print "<br><div class='alert alert-success'>Editou com sucesso!</div>";
			}else{
				print "<br><div class='alert alert-danger'>Não foi possível editar.</div>";
			}
		break;
		case "excluir";
		$sql = "DELETE FROM atividade WHERE id_atividade=".$_REQUEST["id_atividade"];
			
			$res = $conn->query($sql);
			
			if($res==true){
				print "<br><div class='alert alert-success'>Excluiu com sucesso!</div>";
			}else{
				print "<br><div class='alert alert-danger'>Não foi possível excluir.</div>";
			}
		break;
	}
?>
<a class="btn btn-success" href="?page=listar-atividade">Listar</a>
<a class="btn btn-success" href="professor.php" role="button">Voltar</a>