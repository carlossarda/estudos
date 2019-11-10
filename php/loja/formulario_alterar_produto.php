<?php 
require_once("cabecalho.php");
#include("conecta.php"); passado para o banco_*
// require_once("banco_categoria.php");
// require_once("banco_produto.php");
// require_once("class/categoria.php");
// require_once("class/produto.php");

$categoria = new Categoria();

$categoriaDao = new CategoriaDao($conexao);

$categorias = $categoriaDao->listaCategorias();


// $produto = new LivroFisico("","","",$categoria,"");

$produto_id = $_GET['id'];

$produtoDao = new ProdutoDao($conexao);

$produto = $produtoDao->buscaProduto($produto_id);

// if ($produto->tipoProduto == "Ebook"){
// 	$produto = temWaterMark();

// }else{
// 	if ($produto->tipoProduto == "LivroFisico"){
// 	$produto = temTaxaImpressao();

// 	}
// }

$usado = $produto->getUsado() ? "checked='checked'" : "";

$produto->setUsado($usado);

?>
	<h1>Alteração de produto</h1>
		<form action="altera-produto.php" method="post">
			<input type="hidden" name="id" value="<?=$produto->getId()?>">
			<table class="table">
				<?php
					
					include("formulario_produto_base.php");
				
				?>
				<tr>
					<td>
						<button class="btn btn-primary" type="submit">Alterar</button>
					</td>
				</tr>
			</table>
		</form>

<?php include("rodape.php");?>