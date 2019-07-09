<?php 
require 'conexao.php';

$destino = 'planetas.inserir.php';

if(isset($_GET['id'])){

$id=$_GET['id'];
$sql="SELECT * FROM planetas WHERE id='$id'";
$linhas=mysqli_query($conexao,$sql) or die("ERRO: ".mysqli_error($conexao));
$linha=mysqli_fetch_array($linhas);
$destino='planetas.alterar.php';
$oculto = '<input type="hidden" name="id" value="'.$id.'"/>';

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
				
				<form action='<?=$destino; ?>' method="post">
					<p><strong>Insira um novo planeta no sistema: </strong></p>
<?=@$oculto; ?>
					Nome: <input type="text" name="nome" value= '<?= @$linha['nome']; ?>' /><br />
					Tipo: 
					<select name="tipo">
						<option value="terrestre" <?=@($linha['tipo']=="terrestre") ? "selected" : ""?> >Terrestre</option>
						<option value="gasoso" <?=@($linha['tipo']=="gasoso") ? "selected" : ""?> >Gigante Gasoso</option>
						<option value="anão" <?=@($linha['tipo']=="anão") ? "selected" : ""?> >Planeta Anão</option>
					</select><br />
					Diâmetro Equatorial: <input type="text" name="tamanho" value="<?= @$linha['tamanho']; ?>" /><br />
					Descrição:
					<textarea name="descricao"><?= @$linha['descricao']; ?></textarea>
					<input type="submit" value="Enviar" />
				</form>
				
			</section>
			<footer></footer>
		</div>
		
		<div class="clear"></div>

<?php include 'template.rodape.php'?>
	  