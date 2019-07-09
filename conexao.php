<?php 
$servername="localhost";
$username="root";
$password="";
$database="universo";

$conexao = mysqli_connect($servername,$username,$password,$database);
mysqli_set_charset($conexao,"utf8");

if(mysqli_connect_error()){
    echo "<p style='color:red;'>Erro ao connectar com o banco: </p>".mysqli_connect_error();
exit();
}

?>
	  