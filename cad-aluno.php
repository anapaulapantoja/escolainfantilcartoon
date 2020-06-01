<h1>Cadastrar Aluno</h1>
<form action="?page=salvar-aluno" method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nome do Aluno</label>
		<input type="text" name="nome_aluno" class="form-control" required >
	</div>
	<div class="form-group">
		<label>Responsável</label>
		<?php
			$sql = "SELECT * FROM `usuarios`
			where nivel = 3";

			$res = $conn->query($sql) or die ($conn->error);

			$qtd = $res->num_rows;

			if ($qtd > 0){
				print "<select name='id_usuario'
				class='form-control'>";
				
				while($row = $res->fetch_object()){
					print "<option value='".$row->id_usuario."'>".$row
					->nome."</option>";
				}
				print "</select>";
			}else{
				print "Não há registros encontrados.";
			}
			?>	
	</div>
	<div class="form-group">
		<label>Turma</label>
		<?php
			$sql = "SELECT * FROM `turma`";

			$res = $conn->query($sql) or die ($conn->error);

			$qtd = $res->num_rows;

			if ($qtd > 0){
				print "<select name='id_turma'
				class='form-control'>";
				
				while($row = $res->fetch_object()){
					print "<option value='".$row->id_turma."'>".$row
					->nome_turma."</option>";
				}
				print "</select>";
			}else{
				print "Não há registros encontrados.";
			}
			?>	
	</div>
	<div class="form-group">
		<input type="hidden" name="acao" value="cadastrar">
		<button type="submit" class="btn btn-success">
			Cadastrar
		</button>
		<a class="btn btn-success" href="secretaria.php" role="button">Voltar</a>
	</div>
</form>