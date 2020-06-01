<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="css/bootstrap.min.css" >
		<title>Escola Infantil Cartoon</title>
	</head>
    <body>
		<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		<a class="navbar-brand" href="secretaria.php">Home</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNavDropdown">
			<ul class="navbar-nav">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Usuário
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item" href="?page=cad-usuario">Cadastrar usuário</a>
	                    <a class="dropdown-item" href="?page=listar-usuario">Editar/Excluir</a>				
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Turma
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item" href="?page=cad-turma">Cadastrar</a>
						<a class="dropdown-item" href="?page=listar-turma">Editar/Excluir</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Disciplina
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item" href="?page=cad-disciplina">Cadastrar</a>
						<a class="dropdown-item" href="?page=listar-disciplina">Editar/Excluir</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Aluno
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item" href="?page=cad-aluno">Cadastrar</a>
						<a class="dropdown-item" href="?page=listar-aluno">Editar/Excluir</a>
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
						case "cad-aluno":
							include("cad-aluno.php");
						break;
						case "salvar-aluno":
							include("salvar-aluno.php");
						break;
						case "listar-aluno":
							include("listar-aluno.php");
						break;
						case "editar-aluno":
							include("editar-aluno.php");
						break;
						case "cad-foto":
							include("cad-foto.php");
						break;
						case "rel-aluno":
							include("relatorio.php");
						break;
						case "cad-usuario":
							include("cad-usuario.php");
						break;
						case "salvar-usuario":
							include("salvar-usuario.php");
						break;
						case "listar-usuario":
							include("listar-usuario.php");
						break;
						case "editar-usuario":
							include("editar-usuario.php");
						break;
						case "cad-turma":
							include("cad-turma.php");
						break;
						case "salvar-turma":
							include("salvar-turma.php");
						break;
						case "listar-turma":
							include("listar-turma.php");
						break;
						case "editar-turma":
							include("editar-turma.php");
						break;
						
						case "cad-disciplina":
							include("cad-disciplina.php");
						break;
						case "salvar-disciplina":
							include("salvar-disciplina.php");
						break;
						case "listar-disciplina":
							include("listar-disciplina.php");
						break;
						case "editar-disciplina":
							include("editar-disciplina.php");
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


