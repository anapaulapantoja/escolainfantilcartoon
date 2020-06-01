<h1>Editar turma</h1>
<?php
	$sql = "SELECT * FROM disciplina WHERE id_disciplina=".$_REQUEST["id_disciplina"];
	$res = $conn->query($sql);
	$row = $res->fetch_object();
?>
<form action="?page=salvar-disciplina" method="POST">
	<div class="form-group">
		<label>Nome</label>
		<input type="text" name="nome_disciplina" class="form-control" value="<?php print $row->nome_disciplina; ?>" required >
	</div>
	<div class="form-group">
		<input type="hidden" name="acao" value="editar">
		<input type="hidden" name="id_disciplina" value="<?php  print $row->id_disciplina; ?>">
		<button type="submit" class="btn btn-success">
			Editar
		</button>
        <a class="btn btn-success" href="secretaria.php" role="button">Voltar</a>
	</div>
</form>