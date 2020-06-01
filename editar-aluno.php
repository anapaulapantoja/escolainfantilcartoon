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
		<input type="hidden" name="acao" value="editar">
		<input type="hidden" name="id_aluno" value="<?php  print $row->id_aluno; ?>">
		<button type="submit" class="btn btn-success">
			Editar
		</button>
		<a class="btn btn-success" href="secretaria.php" role="button">Voltar</a>
	</div>
</form>