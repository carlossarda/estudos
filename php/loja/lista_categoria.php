 <?php
	require_once ("cabecalho.php");
	// require_once("banco_categoria.php");
	require_once("logica_usuario.php");
	// require_once("class/categoria.php");

	verificaUsuario();
	
 ?>
 
	<table class="table table-striped table-bordered">
	<tr> 
		<td>Id</td>
		<td>Nome</td> 
		<td>Alterar</td>
		<td>Deletar</td>
		

	<?php
		$categoriaDao = new CategoriaDao($conexao);
		$categorias = $categoriaDao->listaCategorias();
		foreach ( $categorias as $categoria):
	?>
		<tr> 
			<td><?= $categoria->getId() ?> </td>
			<td><?= $categoria->getNome() ?></td> 
			<td><a href="formulario_alterar_categoria.php?id=<?=$categoria->getId()?>" class="btn btn-primary">alterar</a></td>
			<td>
				<form action="remove_categoria.php" method="post">
					<input type="hidden" name="id" value="<?=$categoria->getId()?>">
					<button class="btn btn-danger">X</button>
				</form>
			</td>
			
		</tr>
	<?php
		endforeach;
	
	?>
</table>

<?php include("rodape.php"); ?>
