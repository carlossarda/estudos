<?php 
require_once("cabecalho.php");
// require_once("banco_categoria.php"); 
require_once("logica_usuario.php");	

verificaUsuario();

$categoria = new Categoria;

$categoria->setId($_POST['id']);
$categoria->setNome($_POST['nome']);

$categoriaDao = new CategoriaDao($conexao);

if ($categoriaDao->insereCategoria($categoria)) {
?>
	<p class="text-success">Categoria <?=$categoria->getNome()?> adicionada com sucesso!</p> 
	<?php	
				
		} else { 
			$msg = mysqli_error($conexao);	

	?>

	<p class="text-danger">Categoria <?= $categoria->getNome() ?>, não adicionado: <?= $msg ?></p> 

<?php

}
		 
?>
	
	<table>
		<button class="btn btn-primary" onClick="javascript:window.location.href='formulario_categoria.php'">Voltar</button>
	</table>
			 
			 
<?php include("rodape.php");?>