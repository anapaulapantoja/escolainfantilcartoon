<?php

	$conn = new mysqli("localhost","id10697665_projeto","Ana91419527@","id10697665_escola");	
	$sql = "SELECT c.id_atividade, b.nome_disciplina, c.texto , c.data_atividade
		FROM turma a , disciplina b , atividade c , aluno d
		WHERE c.turma_id_turma = a.id_turma and  d.id_aluno =  ".$_REQUEST["id_aluno"]." and d.turma_id_turma = c.turma_id_turma AND c.disciplina_id_disciplina = b.id_disciplina
		ORDER BY c.data_atividade ,  b.nome_disciplina";
	
	//var_dump($sql);
		
$res = $conn->query($sql) or die ($conn->error);

$qtd = $res->num_rows;
	
require('fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();

// muda fonte e coloca em negrito
$pdf->SetFont('Arial', 'B', 7);

// largura padrão das colunas
$largura = 40;
// altura padrão das linhas das colunas
$altura = 6;

// criando os cabeçalhos para 3 colunas
$pdf->Cell($largura, $altura, 'Código', 1, 0, 'L');
$pdf->Cell($largura, $altura, 'Disciplina', 1, 0, 'L');
$pdf->Cell($largura, $altura, 'Atividade', 1, 0, 'L');
$pdf->Cell($largura, $altura, 'Data', 1, 0, 'L');

// pulando a linha
$pdf->Ln($altura);

// tirando o negrito
$pdf->SetFont('Arial', '', 7);

// montando a tabela com os dados (presumindo que a consulta já foi feita)
while ($row = $res->fetch_object()){
	$pdf->Cell($largura, $altura, $row->id_atividade, 1, 0, 'L');
	$pdf->Cell($largura, $altura, $row->nome_disciplina, 1, 0, 'L');
	$pdf->Cell($largura, $altura, $row->texto, 1, 0, 'L');
	$pdf->Cell($largura, $altura, $row->data_atividade, 1, 0, 'L');
	$pdf->Ln($altura);
}

// exibindo o PDF
$pdf->Output();
?>