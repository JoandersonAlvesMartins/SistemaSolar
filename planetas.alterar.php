<?php
require 'conexao.php';

$id=$_POST['id'];
$nome=$_POST['nome'];
$tipo=$_POST['tipo'];
$tamanho=$_POST['tamanho'];
$descricao=$_POST['descricao'];

$sql=("UPDATE planetas SET nome='$nome',tipo='$tipo',tamanho='$tamanho',descricao='$descricao' WHERE id='$id'");

mysqli_query($conexao,$sql) or die ("<p style='color:red;'>ERRO ao acessar a planilha no banco:</p> " .mysqli_error($conexao));
header('Location: planetas.listar.php');
exit();
?>