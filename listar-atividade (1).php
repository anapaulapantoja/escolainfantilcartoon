<h1>Listar Atividades</h1>
<?php
$sql = "SELECT c.id_atividade, a.id_turma, a.nome_turma, b.nome_disciplina, c.texto , DATE_FORMAT(c.data_atividade,'%d/%m/%Y') as data_atividade
		FROM turma a , disciplina b , atividade c 
		WHERE c.turma_id_turma = a.id_turma AND c.disciplina_id_disciplina = b.id_disciplina
		ORDER BY c.id_atividade, a.nome_turma, b.nome_disciplina";

$res = $conn->query($sql) or die ($conn->error);

$qtd = $res->num_rows;

if ($qtd > 0) {
	print "Encontrei <b>".$qtd."</b> resultado(s)";
	print "<table class='table table-striped
	table-hover table-bordered'>";
	print "<tr>";
	print "<th>Turma</th>";
	print "<th>Disciplina</th>";
	print "<th>Atividade</th>";
	print "<th>Data</th>";
	print "<th>Edição/Exclusão</th>";
	print "</tr>";
	while ($row = $res->fetch_object()){
		print "<tr>";
		print "<td>".$row->nome_turma."</td>";
		print "<td>".$row->nome_disciplina."</td>";
		print "<td>".$row->texto."</td>";
		print "<td>".$row->data_atividade."</td>";
		print "<td>
					<button class='btn btn-success' onclick=\"location.href='?page=editar-atividade&id_turma=".$row->id_turma."&id_atividade=".$row->id_atividade."';\" >Editar</button>
						
					<button class='btn btn-danger' onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar-atividade&acao=excluir&id_aluno=".$row->id_turma."&id_atividade=".$row->id_atividade."';}else{false;}\">Excluir</button>
			    </td>";
		print "</tr>";
 	}
	print "</table>";
}else{
	print "Não há registros encontrados.";
}
?>	