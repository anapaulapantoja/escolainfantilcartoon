<h1>Consultar Atividades</h1>
<form action="?page=consultar-atividade" method="POST">
	<div class="form-group">
		<label>Selecione o Aluno</label>
	<?php
		if(!isset($_SESSION)) session_start();
	//	if(!isset($_SESSION['username'])){
	//		session_destroy();
			//echo "teste";
	//		exit;
	//	}
	//	    print 'aki2';
	//	echo "Olá, ".$_SESSION['username'];
		//echo "<a href='logout.php'>Sair</a>";
		include("config.php");
		
		$sql = "SELECT a.id_aluno, a.nome_aluno 
				FROM aluno a, usuarios b 
				WHERE a.usuarios_id_usuario = b.id_usuario 
				AND b.usuario = '".$_SESSION['username']."'";
		
		$res = $conn->query($sql) or die ($conn->error);
		$qtd = $res->num_rows;

		if ($qtd > 0){
			print "<select name='id_aluno'
				class='form-control'>";
					
			while($row = $res->fetch_object()){
			print "<option value='".$row->id_aluno."'>".$row
				->nome_aluno."</option>";
		}
		print "</select>";
		}else{
			print "Não há registros encontrados.";
		}
	?>
	</div>
	<div class="form-group">
		<input type="hidden" name="acao" value="consultar">
		<button type="submit" class="btn btn-success">
			Consultar
		</button>
	</div>
</form>