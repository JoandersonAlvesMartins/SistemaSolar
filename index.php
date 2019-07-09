<?php
require 'conexao.php';
include 'template.cabecalho.php' ?>
	  
		<div id="left">
			<header><h1><span>Universo Digital<span></h1></header>
			<section>
				<nav>
					<a href="planetas.php">planetas</a> | 
					<a href="index.php">estrelas</a> | 
					<a href="index.php">sistemas</a>
				</nav>
				<div class="clear"></div>
			<section>
			<footer><em>Produzido por<br/> <?php nome();?>&copy;<?php echo date(" Y");?></em></footer>
		</div>
		
		
<?php include 'template.rodape.php'?>
	  