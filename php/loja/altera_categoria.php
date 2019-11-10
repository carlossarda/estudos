 <?php 
require_once("cabecalho.php");
// require_once("banco_categoria.php");
			
$categoria = new Categoria;

$categoria->setId($_POST['id']);
$categoria->setNome($_POST['nome']);

$categoriaDao = new CategoriaDao($conexao);

if ($categoriaDao->alteraCategoria($categoria)) {
?>
	<p class="text-success">Categoria foi alterada para <?=$categoria->getNome()?>!</p> 
<?php	
			
} else { 
	$msg = mysqli_error($conexao);	#somente em caso de erro, usuario não precisa ver.

?>

	<p class="text-danger">Categoria <?= $categoria->getNome() ?>, não foi alterado: <?= $msg ?></p> 

<?php

	}
	 
// não precisa colocar pois por padrão o php encerra a conexão após a execução do script
//			 mysqli_close($conexao);
	 
?>
	
	<table>
		<button class="btn btn-primary" onClick="javascript:window.location.href='lista_categoria.php'">Voltar</button>
	</table>
			 
			 
<?php include("rodape.php");?>