<?php

class ProdutoDao{

	private $conexao;

	function __construct($conexao){
		$this->conexao = $conexao;
	}

	function listaProdutos(){
			
		$resultado = mysqli_query($this->conexao, "select p.*, c.nome as categoria_nome from produtos as p join categorias as c on c.id=p.categoria_id");
		$produtos = array();
		
		while($produto_array = mysqli_fetch_assoc($resultado)){
			
			// $categoria = new Categoria();
			
			// $categoria->setNome($produto_array['categoria_nome']);
			
			// $nome = $produto_array['nome'];
			// $preco = $produto_array['preco'];
			// $descricao = $produto_array['descricao'];
			// $isbn = $produto_array['isbn'];
			// $taxaImpressao = $produto_array['taxaImpressao'];
			// $waterMark = $produto_array['waterMark'];

			$tipoProduto = $produto_array['tipoProduto'];

			$factory = new ProdutoFactory();

			$produto = $factory->criaPor($tipoProduto, $produto_array);

			$produto->atualizaBaseadoEm($produto_array);

			// $produto->setCategoria = $categoria;
			$usado = $produto_array['usado'];
			$categoria= $produto_array['categoria_nome'];
			
			// if ($tipoProduto == "Ebook"){
			// 	$produto = new Ebook($nome, $preco, $descricao, $categoria, $usado);
			// 	$produto->setIsbn($isbn);
			// 	$produto->setWaterMark($waterMark);
			// }else{
			// 	if ($tipoProduto == "LivroFisico"){
			// 	$produto = new LivroFisico($nome, $preco, $descricao, $categoria, $usado);
			// 	$produto->setIsbn($isbn);
			// 	$produto->setTaxaImpressao($taxaImpressao);
			// 	}else{
			// 		$produto = new Produto($nome, $preco, $descricao, $categoria, $usado);
			// 	}
			// }


			// $produto = new Produto($nome, $preco, $descricao, $categoria, $usado);
			$produto->setId($produto_array['id']);
			$produto->getCategoria()->setNome($categoria);
			$produto->setUsado($usado);

			// $produto->setIsbn($isbn);
			// $produto->setTipoProduto($tipoProduto);

			array_push($produtos, $produto);
		
		}	
		
		return $produtos;


	}



		
	function insereProduto(Produto $produto){
		
		$isbn = "";

		if ($produto->temIsbn()){
			$isbn = $produto->getIsbn();
		}

		$taxaImpressao = "";

		if ($produto->temTaxaImpressao()){
			$taxaImpressao = $produto->getTaxaImpressao();
		}

		$waterMark = "";

		if ($produto->temWaterMark()){
			$waterMark = $produto->getWaterMark();
		}

		$tipoProduto = get_class($produto);

	//		$nome = mysqli_real_escape_string($conexao, $produto->$nome); #tratar em caso de aspas simples.
	//		$preco = mysqli_real_escape_string($conexao, $produto->$preco); #tratar em caso de aspas simples.
		$query = "insert into produtos (nome, preco, descricao, isbn, tipoProduto, waterMark, taxaImpressao, categoria_id, usado) values 
		('{$produto->getNome()}', 
		{$produto->getPreco()}, 
		'{$produto->getDescricao()}', 
		'{$isbn}', 
		'{$tipoProduto}', 
		'{$waterMark}', 
		'{$taxaImpressao}', 
		{$produto->getCategoria()->getId()}, 
		{$produto->getUsado()})";
		return mysqli_query($this->conexao, $query);
	}

	function alteraProduto(Produto $produto){
		
		
		$isbn = "";

		if ($produto->temIsbn()){
			$isbn = $produto->getIsbn();
		}

		$taxaImpressao = "";

		if ($produto->temTaxaImpressao()){
			$taxaImpressao = $produto->getTaxaImpressao();
		}

		$waterMark = "";

		if ($produto->temWaterMark()){
			$waterMark = $produto->getWaterMark();
		}



		$tipoProduto = get_class($produto);
	//		$nome = mysqli_real_escape_string($conexao, $nome); #tratar em caso de aspas simples.
	//		$preco = mysqli_real_escape_string($conexao, $preco); #tratar em caso de aspas simples.
		$query = "update produtos set nome='{$produto->getNome()}', preco={$produto->getPreco()}, isbn='{$isbn}', tipoProduto='{$tipoProduto}', waterMark='{$waterMark}', taxaImpressao='{$taxaImpressao}', descricao='{$produto->getDescricao()}', categoria_id={$produto->getCategoria()->getId()}, usado={$produto->getUsado()} where id='{$produto->getId()}' ";
		return mysqli_query($this->conexao, $query);
	}

	function removeProduto($id){

		$query = "delete from produtos where id={$id}";
		return mysqli_query($this->conexao, $query);
	}
		
	function buscaProduto($produto_id){
		
		
		$query = "select * from produtos where id = {$produto_id}";
		
		$resultado = mysqli_query ($this->conexao, $query);
		
		$produto_buscado = mysqli_fetch_assoc($resultado);
		
		$tipoProduto = $produto_buscado['tipoProduto'];

		$factory = new ProdutoFactory();

		$produto = $factory->criaPor($tipoProduto,$produto_buscado);

		$produto->atualizaBaseadoEm($produto_buscado);
		
		$categoria = $produto_buscado['categoria_id'];

		
		
		// $nome = $produto_buscado['nome'];
		// $preco = $produto_buscado['preco'];
		// $isbn = $produto_buscado['isbn'];
		// $tipoProduto = $produto_buscado['tipoProduto'];
		// $descricao = $produto_buscado['descricao'];
		// $waterMark = $produto_buscado['waterMark'];
		// $taxaImpressao = $produto_buscado['taxaImpressao'];
		// $categoria($categoria);
		
		$usado = $produto_buscado['usado'];
		

		// if ($tipoProduto == "Ebook"){
		// 	$produto = new Ebook($nome, $preco, $descricao, $categoria, $usado);
		// 	$produto->setIsbn($isbn);
		// 	$produto->setWaterMark($waterMark);

		// }else{
		// 	if ($tipoProduto == "LivroFisico"){
		// 		$produto = new LivroFisico($nome, $preco, $descricao, $categoria, $usado);
		// 		$produto->setIsbn($isbn);
		// 		$produto->setTaxaImpressao($taxaImpressao);
		// 	}else{
		// 		$produto = new Produto($nome, $preco, $descricao, $categoria, $usado);

		// 	}
		// }
		// $produto = new Produto($nome, $preco, $descricao, $categoria, $usado);
		$produto->setId($produto_buscado['id']);
		$produto->getCategoria()->setId($categoria);
		$produto->setUsado($usado);
		// $produto->setIsbn($isbn);
		// $produto->setTipoProduto($tipoProduto);


		return $produto;

	}
}

?>