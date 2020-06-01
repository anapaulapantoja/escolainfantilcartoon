<meta charset="utf-8">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<?php	

	$conn = new mysqli("localhost","id10697665_root","teste","id10697665_carros");
	
	$pasta = "arquivos/";
	
	$tmp_name = $_FILES["arquivo"]["tmp_name"];
	$nome = $_FILES["arquivo"]["name"];
	$cod = date("dmYHis") . "-" . $_FILES["arquivo"]["name"];
	$uploadfile = $pasta . basename($cod);
	
	if(move_uploaded_file($tmp_name, $uploadfile)){
		$sql = "INSERT INTO arquivos (arquivo, data1, aluno_id_aluno) VALUES ('".$cod."','".date("Y-m-d H:i:s")."', '".$_POST["id_aluno"]."')";
		
		$res = $conn->query($sql) or die($conn->error);
		
		if($res==true){
		    print "<script>alert('Cadastrou com sucesso!');</script>";
		    print "<script>location.href='professor.php?page=listar-aluno';</script>";
		}else{
		    print "Não cadastrou";
		}
		
	}else{
		print "Deu ruim carregar o arquivo".$nome;
	}
?>
<a href="professor.php" class="btn btn-primary">Voltar</a>









