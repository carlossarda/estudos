<?php 

require_once("cabecalho.php"); #usa o require pq se não houver o arquivo da erro, enquanto o include da só um warning.
#include("conecta.php"); adicionado no banco_*
// require_once("banco_produto.php"); # require_once se já houver incluido este arquivo, não inclui de novo, na pratica se usa muito o require.
require_once("logica_usuario.php");	
// require_once("class/produto.php");
// require_once("class/categoria.php");

verificaUsuario();

//	$produto = new Produto();


$tipoProduto = str_replace(" ", "", $_POST['tipoProduto']);

$categoria_id= $_POST['categoria_id'];

$factory = new ProdutoFactory();

$produto = $factory->criaPor($tipoProduto, $_POST);

$produto->atualizaBaseadoEm($_POST);

// $categoria = new Categoria();

// $categoria->setId($_POST['categoria_id']);

$produto->getCategoria()->setId($categoria_id);

/*	$produto->setNome($_POST['nome']);
$produto->setPreco($_POST['preco']);
$produto->setDescricao($_POST['descricao']);
$produto->setCategoria($categoria);
if (array_key_exists('usado', $_POST)){
	$produto->setUsado("true");
}else{
	$produto->setUsado("false");
}*/

// $nome = $_POST['nome'];
// $preco = $_POST['preco'];
// $descricao = $_POST['descricao'];
// $isbn = $_POST['isbn'];
// $setTaxaImpressao = $_POST['taxaImpressao'];
// $waterMark = $_POST['waterMark'];



if (array_key_exists('usado', $_POST)){
	$produto->setUsado("true");
}else{
	$produto->setUsado("false");
}


// if ($tipoProduto == "LivroFisico"){
// 	$produto = new LivroFisico($nome, $preco, $descricao, $categoria, $usado);
// 	$produto->setIsbn($isbn);
// 	$produto->setTaxaImpressao($taxaImpressao);
// }else{
// 	if ($tipoProduto == "Ebook"){
// 	$produto = new Ebook($nome, $preco, $descricao, $categoria, $usado);
// 	$produto->setIsbn($isbn);
// 	$produto->setWaterMark($waterMark);
// 	}else{
// 		$produto = new Produto($nome, $preco, $descricao, $categoria, $usado);
// 	}
// }

// $produto->setTipoProduto($tipoProduto);

$produtoDao = new ProdutoDao($conexao);

if ($produtoDao->insereProduto($produto)) {
?>
<p class="text-success">Produto <?=$produto->getNome()?>, ao preço de R$<?=$produto->getPreco()?>, sendo um <?=$produto->getDescricao()?> adicionado com sucesso!</p> 
<?php	
			
	} else { 
		$msg = mysqli_error($conexao);	

?>

<p class="text-danger">Produto <?= $produto->getNome() ?>, não adicionado: <?=$msg ?></p> 

<?php

	}
		 
// não precisa colocar pois por padrão o php encerra a conexão após a execução do script
//			 mysqli_close($conexao);
		 
?>

<table>
	<button class="btn btn-primary" onClick="javascript:window.location.href='formulario-produto.php'">Voltar</button>
</table>
		 
		 
<?php include("rodape.php");?>