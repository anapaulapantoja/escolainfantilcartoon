<h1>Cadastrar Turma</h1>
<form action="?page=salvar-turma" method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nome da turma</label>
		<input type="text" name="nome_turma" class="form-control" required >
	</div>
	<div class="form-group">
		<input type="hidden" name="acao" value="cadastrar">
		<button type="submit" class="btn btn-success">
			Cadastrar
		</button>
		<a class="btn btn-success" href="secretaria.php" role="button">Voltar</a>
	</div>
</form>