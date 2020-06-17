<form action="?page=salvar-atividade" method="POST">
	<div class="form-group">
		<h1>Atividades</h1>
	<?php
//		if(!isset($_SESSION)) session_start();
//	
//		if(!isset($_SESSION['username'])){
//			session_destroy();
//			//echo "teste";
//			exit;
//		}
		//echo "Olá, ".$_SESSION['username'];
		//echo "<a href='logout.php'>Sair</a>";
		include("config.php");
$sql = "SELECT c.id_atividade, b.nome_disciplina, c.texto , DATE_FORMAT(c.data_atividade ,'%d/%m/%Y') as data_atividade 
		FROM turma a , disciplina b , atividade c , aluno d
		WHERE c.turma_id_turma = a.id_turma and  d.id_aluno =  ".$_POST["id_aluno"]." and d.turma_id_turma = c.turma_id_turma AND c.disciplina_id_disciplina = b.id_disciplina
		ORDER BY c.data_atividade ,  b.nome_disciplina";		
$res = $conn->query($sql) or die ($conn->error);

$qtd = $res->num_rows;

if ($qtd > 0) {
	print "Encontrei <b>".$qtd."</b> resultado(s)";
	print "<table class='table table-striped
	table-hover table-bordered'>";
	print "<tr>";
	print "<th>Código</th>";
	print "<th>Disciplina</th>";
	print "<th>Atividade</th>";
	print "<th>Data</th>";
	print "</tr>";
	while ($row = $res->fetch_object()){
		print "<tr>";
		print "<td>".$row->id_atividade."</td>";
		print "<td>".$row->nome_disciplina."</td>";
		print "<td>".$row->texto."</td>";
		print "<td>".$row->data_atividade."</td>";
		print "</tr>";
 	}
	print "</table> \n";
}else{
	print "Não há atividades. \n";
}
?>	
<p><a class="btn btn-success" href="pais.php" role="button">Voltar</a></p>
</form>