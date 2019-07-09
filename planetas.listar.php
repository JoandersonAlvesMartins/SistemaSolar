<?php 
require 'conexao.php';

$listagem = mysqli_query($conexao,"SELECT * FROM planetas");

if (mysqli_connect_errno()){
printf("<p style='color: red;'> ERRO: %s\n</p>".mysqli_connect_errno());
exit();
}

include 'template.cabecalho.php';
?>
	  
		<div id="left">
			<header><h1><span>Universo Digital<span></h1></header>
			<section>
				<nav>
					<a href="index.php">planetas</a> | 
					<a href="index.php">estrelas</a> | 
					<a href="index.php">sistemas</a>
				</nav>
<br/>
<nav>
<a href="planetas.form.php"> Inserir Planeta</a>
<a href="planetas.listar.php"> Listar Planetas</a>
</nav>
				<div class="clear"></div>
			<section>
			<footer><em>Produzido por<br/> <?php nome();?>&copy;<?php echo date(" Y");?></em></footer>
		</div>
		
		<div id="right">
			<header><h2><span>Planetas<span></h2></header>
			<section>
				<p>Um planeta é um corpo celeste que orbita uma estrela ou um remanescente de estrela, com massa suficiente para se tornar esférico pela sua própria gravidade, mas não ao ponto de causar fusão termonuclear, e que tenha limpo de planetesimais a sua região vizinha (dominância orbital).</p>
				<p>Fonte: <a href="https://pt.wikipedia.org/wiki/Planeta">Saiba Mais</a></p>
				<table>
<tr>
<th></th>
<th>Nome</th>
<th>Tipo</th>
<th>Diâmentro Equatorial</th>
<th></th>
<th></th>
</tr>

<?php 
while($linha=mysqli_fetch_array($listagem)){
?>

<tr>
<td><a href="planetas.form.php?id=<?=$linha['id'] ?>">Editar</a></td>
<td><?=$linha['nome'] ?></td>
<td><?=$linha['tipo'] ?></td>
<td><?=$linha['tamanho'] ?></td>
<td><a href="planetas.excluir.php?id=<?=$linha['id'] ?>">Excluir</a></td>
<td><a href="planetas.pdf.php?id=<?= $linha['id'] ?>">Gerar PDF</a></td>
</tr>

<?php
}
?>				
</table>
<p><a href="planetas.pdf.php"> Relatório Completo em PDF</a></p>
			</section>
			<footer></footer>
		</div>
		
		<div class="clear"></div>

<?php include 'template.rodape.php'?>
	  