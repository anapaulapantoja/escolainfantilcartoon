<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="css/bootstrap.min.css" >
		<title>Escola Infantil Cartoom</title>
	</head>
    <body>
		<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		<a class="navbar-brand" href="professor.php">Home</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNavDropdown">
			<ul class="navbar-nav">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Atividade
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item" href="?page=listar-atividade">Listar Atividade</a>
						<a class="dropdown-item" href="?page=cad-atividade">Cadastrar Atividade</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="btn btn-primary my-2 my-sm-0" href="index.php" role="button">Sair</a
				</li>
			</ul>
		</div>
	</nav>
    
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<?php
					include("config.php");
					switch(@$_REQUEST["page"]){
						case "cad-atividade":
							include("cad-atividade.php");
						break;
						case "editar-atividade":
							include("editar-atividade.php");
						break;
						case "salvar-atividade":
							include("salvar-atividade.php");
						break;
						case "listar-atividade":
							include("listar-atividade.php");
						break;
						case "rel-aluno":
							include("relatorio.php");
						break;
						default:
							include("main.html");
					}
	
				?>
			</div>
		</div>
	</div>
	
	
        <script src="js/jquery-3.3.1.slim.min.js"></script>
		<script src="js/popper.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
    </body>
</html>


