 <?php 

 require_once("cabecalho.php");
#include("conecta.php"); passado para o banco_*
// require_once("banco_produto.php");
// require_once("class/produto.php");
// require_once("class/categoria.php");

	
$categoria = new Categoria();

$categoria->setId($_POST['categoria_id']);

$nome = $_POST['nome'];
$preco = $_POST['preco'];
$descricao = $_POST['descricao'];
$isbn = $_POST['isbn'];
$tipoProduto = $_POST['tipoProduto'];
$waterMark = $_POST['waterMark'];
$taxaImpressao = $_POST['taxaImpressao'];
// $categoria($categoria);

if (array_key_exists('usado', $_POST)){
	$usado = "true";
}else{
	$usado = "false";
}

if ($tipoProduto == "LivroFisico"){
	$produto = new LivroFisico($nome, $preco, $descricao, $categoria, $usado);
	$produto->setIsbn($isbn);
	$produto->setTaxaImpressao($taxaImpressao);
}else{
	if ($tipoProduto == "Ebook"){
	$produto = new Ebook($nome, $preco, $descricao, $categoria, $usado);
	$produto->setIsbn($isbn);
	$produto->setWaterMark($waterMark);
	}else{
		$produto = new Produto($nome, $preco, $descricao, $categoria, $usado);
	}
}

// $produto = new Produto($nome, $preco, $descricao, $categoria, $usado);
$produto->setId($_POST['id']);
// $produto->setIsbn($isbn);
// $produto->setTipoProduto($tipoProduto);

$produtoDao = new ProdutoDao($conexao);

	if ($produtoDao->alteraProduto($produto)) {
?>
	<p class="text-success">Produto <?=$produto->getNome()?>, ao preço de R$ <?=$produto->getPreco()?>, sendo um <?=$produto->getDescricao()?> foi alterado!</p> 
<?php	
			
	} else { 
		#$msg = mysqli_error($conexao);	somente em caso de erro, usuario não precisa ver.

?>

	<p class="text-danger">Produto <?= $produto->getNome() ?>, não foi alterado: <?= $msg ?></p> 

	<?php
 
		}
			 
// não precisa colocar pois por padrão o php encerra a conexão após a execução do script
//			 mysqli_close($conexao);
			 
	?>
	
	<table>
		<button class="btn btn-primary" onClick="javascript:window.location.href='lista_produto.php'">Voltar</button>
	</table>
			 
			 
<?php include("rodape.php");?>