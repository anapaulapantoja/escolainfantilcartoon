<h1>Editar Aluno</h1>
<?php
	$sql = "SELECT * FROM aluno WHERE id_aluno=".$_REQUEST["id_aluno"];
	$res = $conn->query($sql);
	$row = $res->fetch_object();
?>
<form action="?page=salvar-aluno" method="POST">
	<div class="form-group">
		<label>Nome do Aluno</label>
		<input type="text" name="nome_aluno" class="form-control" value="<?php print $row->nome_aluno; ?>">
	</div>
	<div class="form-group">
		<input type="hidden" name="acao" value="editar">
		<input type="hidden" name="id_aluno" value="<?php  print $row->id_aluno; ?>">
		<button type="submit" class="btn btn-success">
			Editar
		</button>
		<a class="btn btn-success" href="secretaria.php" role="button">Voltar</a>
	</div>
</form>
