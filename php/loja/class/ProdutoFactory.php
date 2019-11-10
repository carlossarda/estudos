<?php


class ProdutoFactory{

	// private $classes = array("Produto", "LivroFisico", "Ebook");
	private $classes = array("LivroFisico", "Ebook");

	
	function criaPor($tipoProduto, $params){

		$nome = $params['nome'];
		$preco = $params['preco'];
		$descricao = $params['descricao'];
		$categoria = new Categoria();
		$usado = $params['usado'];
		
		

		if(in_array($tipoProduto, $this->classes)){

			return $produto = new $tipoProduto($nome, $preco, $descricao, $categoria, $usado);

		}else{

			return $produto = new LivroFisico($nome, $preco, $descricao, $categoria, $usado);

		}

	}

}




?>