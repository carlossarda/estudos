<?php 

require_once("cabecalho.php");
#include("conecta.php"); passado para o banco_*
// require_once("banco_categoria.php");
require_once("logica_usuario.php");
// require_once("class/categoria.php");
// require_once("class/produto.php");

verificaUsuario();

$categoriaDao = new CategoriaDao($conexao);

$idPadrao = $categoriaDao->primeiraCategoria();

$produto = new LivroFisico("","","",$idPadrao,"");

//	$produto->setCategoria($idPadrao);


//	$produto = array("nome" => "", "descricao" => "", "preco" => "","categoria_id" => "{$idPadrao}");
$produto->setUsado("");




$categorias = $categoriaDao->listaCategorias();
	
?>
	
	<h1>Formulário de produto</h1>
		<form action="adiciona-produto.php" method="post">
			<table class="table">
				
				<?php
				
					include("formulario_produto_base.php");
				
				?>
				
				<tr>
					<td>
						<button class="btn btn-primary" type="submit">Cadastrar</button>
					</td>
				</tr>
			</table>
		</form>
<?php include("rodape.php");?>