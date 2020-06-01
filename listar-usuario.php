<h1>Usuários</h1>
<?php
$sql = "SELECT a.id_usuario, a.nome, a.email, a.usuario, b.nome_nivel
        FROM usuarios a
        LEFT JOIN niveis b
        ON  a.nivel = b.id_nivel";

$res = $conn->query($sql) or die ($conn->error);

$qtd = $res->num_rows;

if ($qtd > 0) {
	print "Encontrei <b>".$qtd."</b> resultado(s)";
	print "<table class='table table-striped
	table-hover table-bordered'>";
	print "<tr>";
	print "<th>#</th>";
	print "<th>Nome </th>";
	print "<th>Email</th>";
	print "<th>Username</th>";
	print "<th>Nivel de acesso</th>";
	print "<th>Edição/Exclusão</th>";
	print "</tr>";
	while ($row = $res->fetch_object()){
		print "<tr>";
		print "<td>".$row->id_usuario."</td>";
		print "<td>".$row->nome."</td>";
		print "<td>".$row->email."</td>";
		print "<td>".$row->usuario."</td>";
		print "<td>".$row->nome_nivel."</td>";
		print "<td>
			<button class='btn btn-success' onclick=\"location.href='?page=editar-usuario&id_usuario=".$row->id_usuario."';\" >Editar</button>
					
					<button class='btn btn-danger' onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar-usuario&acao=excluir&id_usuario=".$row->id_usuario."';}else{false;}\">Excluir</button>
						
				</td>";
		print "</tr>";
 	}
	print "</table>";
}else{
	print "Não há registros encontrados.";
}
?>	
<a class="btn btn-success" href="secretaria.php" role="button">Voltar</a>