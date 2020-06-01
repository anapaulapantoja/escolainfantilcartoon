<?php
	define('HOST','localhost');
	define('USER','id10697665_projeto');
	define('PASS','Ana91419527@');
	define('BASE','id10697665_escola');
	
	$conn = new mysqli(HOST,USER,PASS,BASE);
	
	if(mysqli_connect_errno()){
		printf("Conexão falhou: %s\n", mysqli_connect_error());
		exit();
	}
?>




