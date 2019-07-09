<?php
require 'conexao.php';

$nome=$_POST['nome'];
$tipo=$_POST['tipo'];
$tamanho=$_POST['tamanho'];
$descricao=$_POST['descricao'];

$sql="INSERT INTO planetas (nome,tipo,tamanho,descricao) VALUES ('$nome','$tipo','$tamanho','$descricao')";

mysqli_query($conexao, $sql) or die("ERRO: ".mysqli_error($conexao)); 
header('Location: planetas.form.php');
exit();

?>