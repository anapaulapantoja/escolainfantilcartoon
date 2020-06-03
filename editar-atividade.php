<h1>Editar Atividade</h1>
<?php
	$sql = "SELECT * FROM atividade WHERE id_atividade=".$_REQUEST["id_atividade"];
//	$sql = "SELECT c.id_atividade, a.id_aluno, a.nome_aluno, b.nome_disciplina, c.texto 
//		FROM aluno a , disciplina b , atividade c 
//		WHERE id_atividade=".$_REQUEST["id_atividade"]." AND c.aluno_id_aluno = a.id_aluno AND//.disciplina_id_disciplina = b.id_disciplina
	//	ORDER BY a.nome_aluno, b.nome_disciplina";
	//	var_dump($sql);
	$res = $conn->query($sql);
	$row = $res->fetch_object();
	
	//print $_REQUEST["id_modelo"];
?>
<form action="?page=salvar-atividade" method="POST">
	<div class="form-group">
		<label>Texto</label>
		<input type="text" name="texto" class="form-control" value="<?php print $row->texto; ?>">
	</div>
	<div class="form-group">
		<input type="hidden" name="acao" value="editar">
		<input type="hidden" name="id_atividade" value="<?php print $row->id_atividade; ?>">
		<button type="submit" class="btn btn-success">
			Editar
		</button>
		<a class="btn btn-success" href="professor.php">Voltar</a>
	</div>
</form>




