 <?php 
require_once("cabecalho.php");
// require_once("banco_categoria.php");
require_once("logica_usuario.php");
	

	$id = $_POST['id'];
	
	$categoriaDao = new CategoriaDao($conexao);

	if ($categoriaDao->removeCategoria($id)){
		$_SESSION["success"] = "Removido com sucesso.";
		header("Location: lista_categoria.php");
		die();	
	} 
?>


<?php include("rodape.php"); ?>