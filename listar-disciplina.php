<h1>Disciplinas</h1>
<?php
$sql = "SELECT id_disciplina, nome_disciplina
        FROM disciplina ";

$res = $conn->query($sql) or die ($conn->error);

$qtd = $res->num_rows;

if ($qtd > 0) {
	print "Encontrei <b>".$qtd."</b> resultado(s)";
	print "<table class='table table-striped
	table-hover table-bordered'>";
	print "<tr>";
	print "<th>#</th>";
	print "<th>Disciplina</th>";
	print "<th>Edição/Exclusão</th>";
	print "</tr>";
	while ($row = $res->fetch_object()){
		print "<tr>";
		print "<td>".$row->id_disciplina."</td>";
		print "<td>".$row->nome_disciplina."</td>";
		print "<td>
						<button class='btn btn-success' onclick=\"location.href='?page=editar-disciplina&id_disciplina=".$row->id_disciplina."';\" >Editar</button>
						
						<button class='btn btn-danger' onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar-disciplina&acao=excluir&id_disciplina=".$row->id_disciplina."';}else{false;}\">Excluir</button>
						
				</td>";
		print "</tr>";
 	}
	print "</table>";
}else{
	print "Não há registros encontrados.";
}
?>	
<a class="btn btn-success" href="secretaria.php" role="button">Voltar</a>