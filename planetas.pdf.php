<?php
require 'fpdf.php';
require 'conexao.php';

function converte($string){
return iconv("UTF-8","ISO-8859-1",$string);
}

$pdf = new FPDF('P','pt','A4');

$pdf -> AddPage();
$pdf -> Image('imagens/logo.pb.png');

$pdf -> setFont('arial','',12);
$pdf -> cell(70,20,converte("Aluno ETE Jordão: Joanderson Alves Martins"),0,1,'L');

$pdf -> setFont('arial','',12);
$pdf -> cell(0,20,"Rua Fulano de Tal, s/n, Bairro Industrial",0,1,'L');

$pdf -> setFont('arial','',12);
$pdf -> cell(70,20,"atendimento@universodigital.com",0,1,'L');

$pdf -> ln(10);

$pdf -> setFont('arial','B',18);
$pdf -> cell(0,5,converte("Relatório"),0,1,'C');
$pdf -> cell(0,5,"","B",1,'C');
$pdf -> ln(10);

if (isset($_GET['id']) && $_GET['id'] <> ""){
$id = $_GET['id'];
$sql = "SELECT * FROM planetas WHERE id = '$id';";

$pdf -> setFont('arial','B',14);
$pdf -> cell(0,5,converte("PDF Individual"),0,1,'L');
$pdf -> cell(0,5,"","B",1,'L');
$pdf -> ln(10);

} else {
$sql = "SELECT * FROM planetas;";

$pdf -> setFont('arial','B',14);
$pdf -> cell(0,5,converte("PDF Geral"),0,1,'L');
$pdf -> cell(0,5,"","B",1,'L');
$pdf -> ln(10);

}

$listagem = mysqli_query($conexao,$sql);

while($linha = mysqli_fetch_array($listagem)){

$pdf -> setFont('arial','B',12);
$pdf -> cell(70,20,converte("Código: "),0,0,'L');
$pdf -> setFont('arial','',12);
$pdf -> cell(0,20,$linha['id'],0,1,'L');

$pdf -> setFont('arial','B',12);
$pdf -> cell(70,20,"Filme: ",0,0,'L');
$pdf -> setFont('arial','',12);
$pdf -> cell(0,20,converte($linha['nome']),0,1,'L');

$pdf -> setFont('arial','B',12);
$pdf -> cell(70,20,converte("Diâmetro: "),0,0,'L');
$pdf -> setFont('arial','',12);
$pdf -> cell(70,20,$linha['tamanho'],0,1,'L');

$pdf -> setFont('arial','B',12);
$pdf -> cell(70,20,"Tipo: ",0,0,'L');
$pdf -> setFont('arial','',12);
$pdf -> cell(70,20,$linha['tipo'],0,1,'L');

$pdf -> setFont('arial','B',12);
$pdf -> cell(70,20,converte("Descrição: "),0,1,'L');
$pdf -> setFont('arial','',12);
$pdf -> MultiCell(0,20,converte($linha['descricao']),0,'J');

$pdf -> ln(10);
}

$pdf -> Output('relatorio.pdf','I');
?>	  