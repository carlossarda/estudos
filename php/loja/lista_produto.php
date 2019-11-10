<?php require_once("cabecalho.php");
#include("conecta.php"); passado para o banco_*
// require_once("banco_produto.php");
require_once("logica_usuario.php"); #não precisa mais, pois o session start esta no mostra_alerta.php
// require_once("class/produto.php");
// require_once("class/categoria.php");

#include("mostra_alerta.php"); passado para o cabecalho.php

	verificaUsuario();

?>

<?php /*----------------Substituido pela função mostra alerta


	if(isset($_SESSION["success"])){ ?>
	
	<p class="alert-success"><?=$_SESSION["success"] ?></p>
	
<?php 
	unset($_SESSION["success"]); 
	}*/

#	mostraAlerta("success");  passado para o cabecalho.php

?>
	

<?php /* ---------------Substituido pelo uso de sessão

	if (array_key_exists("removido", $_GET) && $_GET["removido"]=="true"){
	?>
	<p class="alert-success">Produto apagado com sucesso</p>
<?php 
	}
*/?>

<table class="table table-striped table-bordered">
	<tr> 
		<td>Id</td>
		<td>Nome</td> 
		<td>Preço</td>
		<td>Imposto</td>
		<td>Descrição</td>
		<td>Tipo de Produto</td>
		<td>Isbn</td>
		<td>Watermark</td>
		<td>Taxa de Impressao</td>
		<td>Usado</td>
		<td>Categoria</td>
		<td>Alterar</td>
		<td>Deletar</td>
		

<?php
	
$produtoDao = new produtoDao($conexao);
$produtos = $produtoDao->listaProdutos();
foreach ( $produtos as $produto):

?>
		<tr> 
			<td><?= $produto->getId() ?> </td>
			<td><?= $produto->getNome() ?></td>
			<td>R$<?= $produto->getPreco() ?></td>
			<td>R$<?= $produto->calculaImposto() ?></td>
			<td><?= substr($produto->getDescricao(), 0,40) ?></td>
			<td><?= get_class($produto) ?></td>
			<td>
				<?php

					if($produto->temIsbn()) {
						echo $produto->getIsbn();
					}

				 
				?>
			
			</td>
			<td>
				<?php

					if($produto->temWaterMark()) {
						echo $produto->getWaterMark();
					}

				 
				?>
			
			</td>

			<td>
				<?php

					if($produto->temTaxaImpressao()) {
						echo $produto->getTaxaImpressao();
					}

				 
				?>
			
			</td>
			
			<td><?= $exibirUsado = $produto->getUsado() ? "Sim" : "Não" ?></td>
			<td><?= $produto->getCategoria()->getNome() ?></td>
			<td><a href="formulario_alterar_produto.php?id=<?=$produto->getId()?>" class="btn btn-primary">alterar</a></td>
			<td>
				<form action="remove_produto.php" method="post">
					<input type="hidden" name="id" value="<?=$produto->getId() ?>">
					<button class="btn btn-danger">X</button>
				</form>
			</td>
			
		</tr>
<?php

endforeach;
	
?>
</table>



<?php include("rodape.php"); ?>
