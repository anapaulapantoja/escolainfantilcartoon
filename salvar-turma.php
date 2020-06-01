<?php
	switch($_REQUEST["acao"]){
		case "cadastrar":
		    $erro = false;
		    // Verifica se o POST tem algum valor
            if ( !isset( $_POST ) || empty( $_POST ) ) {
	              $erro = 'Nada foi postado.';
            }
            foreach ( $_POST as $chave => $valor ) {
	            // Remove todas as tags HTML
	            // Remove os espaços em branco do valor
	            $$chave = trim( strip_tags( $valor ) );
	
	            // Verifica se tem algum valor nulo
	            if ( empty ( $valor ) ) {
		            $erro = 'Existem campos em branco.';
	            }
            }

		    if ( $erro ) {
	            print "<br><div class='alert alert-danger'>Existem campos em branco.</div>";
            } else {
			    $sql = "INSERT INTO turma (nome_turma) VALUES ('".$_POST["nome_turma"]."')";
			
			    $res = $conn->query($sql);
			
			    if($res==true){
				    print "<br><div class='alert alert-success'>Cadastro realizado com sucesso!</div>";
			    }else{
				    print "<br><div class='alert alert-danger'>Não foi possível cadastrar.</div>";
			    }
            }
		break;
		case "editar":
		$sql = "UPDATE turma SET nome_turma='".$_REQUEST["nome_turma"]."' WHERE id_turma=".$_REQUEST["id_turma"];
			
			$res = $conn->query($sql);
			
			if($res==true){
				print "<br><div class='alert alert-success'>Edição realizada com sucesso!</div>";
			}else{
				print "<br><div class='alert alert-danger'>Não foi possível editar.</div>";
			}
		break;
		case "excluir":
			$sql = "DELETE FROM turma WHERE id_turma=".$_REQUEST["id_turma"];
			
			$res = $conn->query($sql);
			
			if($res==true){
				print "<br><div class='alert alert-success'>Excluiu com sucesso!</div>";
			}else{
				print "<br><div class='alert alert-danger'>Não foi possível excluir.</div>";
			}
		break;
	}
?>
<a class="btn btn-success" href="?page=listar-turma">Listar</a>
<a class="btn btn-success" href="secretaria.php" role="button">Voltar</a>


