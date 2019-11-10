 <?php 

require_once("cabecalho.php");
// require_once("banco_categoria.php");
// require_once("banco_produto.php");
// require_once("class/categoria.php");

$categoria = new Categoria();

$categoria->setId($_GET['id']);

$categoriaDao = new CategoriaDao($conexao);

$categoria = $categoriaDao->buscaCategorias($categoria);


?>
		<h1>Alterar categoria</h1>
		<form action="altera_categoria.php" method="post">
			<input type="hidden" name="id" value="<?=$categoria->getId()?>">
			<table class="table">
				<?php
				
					include("formulario_categoria_base.php");
				
				?>
				</tr>
				<tr>
					<td>
						<button class="btn btn-primary" type="submit">Alterar</button>
					</td>
				</tr>
			</table>
		</form>