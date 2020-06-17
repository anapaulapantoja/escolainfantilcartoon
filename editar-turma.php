<h1>Editar turma</h1>
<?php
	$sql = "SELECT * FROM turma WHERE id_turma=".$_REQUEST["id_turma"];
	$res = $conn->query($sql);
	$row = $res->fetch_object();
?>
<form action="?page=salvar-turma" method="POST">
	<div class="form-group">
		<label>Nome da turma</label>
		<input type="text" maxlength="20" name="nome_turma" class="form-control" value="<?php print $row->nome_turma; ?>" required >
	</div>
	<div class="form-group">
		<input type="hidden" name="acao" value="editar">
		<input type="hidden" name="id_turma" value="<?php  print $row->id_turma; ?>">
		<button type="submit" class="btn btn-success">
			Editar
		</button>
        <a class="btn btn-success" href="secretaria.php" role="button">Voltar</a>
	</div>
</form>