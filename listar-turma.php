<h1>Turmas</h1>
<?php
$sql = "SELECT id_turma, nome_turma
        FROM turma ";

$res = $conn->query($sql) or die ($conn->error);

$qtd = $res->num_rows;

if ($qtd > 0) {
	print "Encontrei <b>".$qtd."</b> resultado(s)";
	print "<table class='table table-striped
	table-hover table-bordered'>";
	print "<tr>";
	print "<th>#</th>";
	print "<th>Nome da turma</th>";
	print "<th>Edição/Exclusão</th>";
	print "</tr>";
	while ($row = $res->fetch_object()){
		print "<tr>";
		print "<td>".$row->id_turma."</td>";
		print "<td>".$row->nome_turma."</td>";
		print "<td>
						<button class='btn btn-success' onclick=\"location.href='?page=editar-turma&id_turma=".$row->id_turma."';\" >Editar</button>
						
						<button class='btn btn-danger' onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar-turma&acao=excluir&id_turma=".$row->id_turma."';}else{false;}\">Excluir</button>
						
				</td>";
		print "</tr>";
 	}
	print "</table>";
}else{
	print "Não há registros encontrados.";
}
?>	
<a class="btn btn-success" href="secretaria.php" role="button">Voltar</a>