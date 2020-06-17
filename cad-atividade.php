<h1>Cadastrar Atividade</h1>
<form action="?page=salvar-atividade" method="POST">
	<div class="form-group">
		<label>Nome da Turma</label>
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
		<label>Nome da Disciplina</label>
		<?php
			$sql = "SELECT * FROM `disciplina`";

			$res = $conn->query($sql) or die ($conn->error);

			$qtd = $res->num_rows;

			if ($qtd > 0){
				print "<select name='id_disciplina'
				class='form-control'>";
				
				while($row = $res->fetch_object()){
					print "<option value='".$row->id_disciplina."'>".$row
					->nome_disciplina."</option>";
				}
				print "</select>";
			}else{
				print "Não há registros encontrados.";
			}
			?>	
	</div>
	<div class="form-group">
		<label>Atividade</label>
		<input type="text" name="texto" class="form-control" size="300" maxlength="250">
	</div>
	<div class="form-group">
		<label>Data</label>
		<input type="date" name="date" class="form-control" size="300" maxlength="250">
	</div>
	
	<div class="form-group">
		<input type="hidden" name="acao" value="cadastrar">
		<button type="submit" class="btn btn-info">
			Cadastrar
		</button>
	</div>
</form>