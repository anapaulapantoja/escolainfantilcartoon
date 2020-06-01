<h1>Alunos</h1>
<?php
$sql = "SELECT a.id_aluno, a.nome_aluno, b.nome , c.arquivo, d.nome_turma
        FROM aluno a
        LEFT JOIN arquivos c
        ON  a.id_aluno = c.aluno_id_aluno
        LEFT JOIN usuarios b
        ON a.usuarios_id_usuario = b.id_usuario
        LEFT JOIN turma d
        ON a.turma_id_turma = d.id_turma";

$res = $conn->query($sql) or die ($conn->error);

$qtd = $res->num_rows;

if ($qtd > 0) {
	print "Encontrei <b>".$qtd."</b> resultado(s)";
	print "<table class='table table-striped
	table-hover table-bordered'>";
	print "<tr>";
	print "<th>#</th>";
	print "<th>Nome do aluno</th>";
	print "<th>Responsável</th>";
	print "<th>Turma</th>";
	print "<th>Edição/Exclusão</th>";
	print "<th>Relatório de Atividades</th>";
	print "</tr>";
	while ($row = $res->fetch_object()){
		print "<tr>";
		print "<td>".$row->id_aluno."</td>";
		print "<td>".$row->nome_aluno."</td>";
		print "<td>".$row->nome."</td>";
		print "<td>".$row->nome_turma."</td>";
		print "<td>
						<button class='btn btn-success' onclick=\"location.href='?page=editar-aluno&id_aluno=".$row->id_aluno."';\" >Editar</button>
						
						<button class='btn btn-danger' onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar-aluno&acao=excluir&id_aluno=".$row->id_aluno."';}else{false;}\">Excluir</button>
						
				</td>";
		print "<td><a href='relatorio.php?id_aluno=".$row->id_aluno."'>PDF</a></td>";
		print "</tr>";
 	}
	print "</table>";
}else{
	print "Não há registros encontrados.";
}
?>	
<a class="btn btn-success" href="secretaria.php" role="button">Voltar</a>