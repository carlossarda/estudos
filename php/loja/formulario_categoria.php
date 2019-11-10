 <?php
	require_once("cabecalho.php");
	// require_once("banco_categoria.php");
	require_once("logica_usuario.php");
 	// require_once("class/categoria.php");
	
	verificaUsuario();
	
	$categoria = new Categoria();
	
	$categoria->setNome("");
  
 ?>
 

 
	<h1>Adicionar categorias
		<form action="adiciona_categoria.php" method="post" class= "table table-striped table-bordered">
			<table class="table">
				
				<?php
				
					require_once("formulario_categoria_base.php");
				
				?>
					<td>
						<button class="btn btn-primary" type="submit">Cadastrar</button>
					</td>
				</tr>
			</table>
		</form>
		
<?php 
require_once("rodape.php");

?>