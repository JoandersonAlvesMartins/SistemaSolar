<?php 
require 'conexao.php';

$id = $_GET['id'];
$sql = "DELETE FROM planetas WHERE id='$id'";

mysqli_query($conexao,$sql) or die ("ERRO: ".mysqli_error($conexao));

header('Location: planetas.listar.php');
exit();
?>

	  