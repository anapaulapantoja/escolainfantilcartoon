<h1>Cadastrar Usuário</h1>
<form action="?page=salvar-usuario" method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nome do Usuário</label>
		<input type="text" name="nome" class="form-control" required >
	</div>
	<div class="form-group">
		<label>Email</label>
		<input type="email" name="email" class="form-control" required >
	</div>
	<div class="form-group">
		<label>Username</label>
		<input type="text" name="usuario" class="form-control" required >
	</div>
	<div class="form-group">
		<label>Senha</label>
		<input type="password" name="senha" class="form-control" required >
	</div>
	<div class="form-group">
		<label>Nível de acesso</label>
		<?php
			$sql = "SELECT * FROM `niveis`";

			$res = $conn->query($sql) or die ($conn->error);

			$qtd = $res->num_rows;

			if ($qtd > 0){
				print "<select name='id_nivel'
				class='form-control'>";
				
				while($row = $res->fetch_object()){
					print "<option value='".$row->id_nivel."'>".$row
					->nome_nivel."</option>";
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