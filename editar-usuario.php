<h1>Editar Aluno</h1>
<?php
	$sql = "SELECT * FROM usuarios WHERE id_usuario=".$_REQUEST["id_usuario"];
	$res = $conn->query($sql);
	$row = $res->fetch_object();
?>
<form action="?page=salvar-usuario" method="POST">
	<div class="form-group">
		<label>Nome</label>
		<input type="text" name="nome" class="form-control" value="<?php print $row->nome; ?>" required >
	</div>
	<div class="form-group">
		<label>Email</label>
		<input type="email" name="email" class="form-control" value="<?php print $row->email; ?>" required >
	</div>
	<div class="form-group">
		<label>Username</label>
		<input type="text" name="usuario" class="form-control" value="<?php print $row->usuario; ?>" required >
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