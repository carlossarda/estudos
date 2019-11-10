<?php require_once("cabecalho.php");
#include("conecta.php"); passado para o banco_*
// require_once("banco_produto.php");
require_once("logica_usuario.php");


	$id = $_POST['id'];

	$produtoDao = new produtoDao($conexao);
	
	if ($produtoDao->removeProduto($id)){
		$_SESSION["success"] = "Removido com sucesso.";
		#header("Location: lista_produto.php?removido=true");
		header("Location: lista_produto.php");
		die();	
	} 
?>
<!--	<table>
			<button class="btn btn-primary" onClick="javascript:window.location.href='lista_produto.php'">Voltar</button>
		</table>
-->

<?php include("rodape.php"); ?>