<h1>Cadastrar Disciplina</h1>
<form action="?page=salvar-disciplina" method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nome</label>
		<input type="text" name="nome_disciplina" class="form-control" required >
	</div>
	<div class="form-group">
		<input type="hidden" name="acao" value="cadastrar">
		<button type="submit" class="btn btn-success">
			Cadastrar
		</button>
		<a class="btn btn-success" href="secretaria.php" role="button">Voltar</a>
	</div>
</form>