<?php


class CategoriaDao{

	private $conexao;

	function __construct($conexao){
		$this->conexao = $conexao;
	}


	function listaCategorias() {
		$categorias = array();
		$query = "select * from categorias order by nome";
		$resultado = mysqli_query ($this->conexao, $query);
		
		while ($categoria_array = mysqli_fetch_assoc ($resultado)) {
			
			$categoria = new Categoria;
			
			$categoria->setId($categoria_array["id"]);
			$categoria->setNome($categoria_array["nome"]);
			
			array_push($categorias, $categoria);
		}
		return $categorias;

	}

	function alteraCategoria(Categoria $categoria){
		
	//		$nome = mysqli_real_escape_string($conexao, $nome); #tratar em caso de aspas simples.
		$query = "update categorias set nome='{$categoria->getNome()}' where id='{$categoria->getId()}' ";
		return mysqli_query($this->conexao, $query);
	}

	function removeCategoria($id){

		$query = "delete from categorias where id={$id}";
		return mysqli_query($this->conexao, $query);
	}

	function insereCategoria(Categoria $categoria){
		
	//		$nome = mysqli_real_escape_string($conexao, $nome); #tratar em caso de aspas simples.
		$query = "insert into categorias (nome) values ('{$categoria->getNome()}')";
		return mysqli_query($this->conexao, $query);

	}

	function buscaCategorias($categoria){

		$query = "select * from categorias where id = {$categoria->getId()}";
		
		$resultado = mysqli_query ($this->conexao, $query);
		$categoria_buscada =  mysqli_fetch_assoc($resultado);
		
		$categoria = new Categoria();
		
		$categoria->setId($categoria_buscada['id']);
		$categoria->setNome($categoria_buscada['nome']);
				
		return $categoria;
	}

	function primeiraCategoria(){

		$query = "select * from categorias order by nome limit 1;";
		$resultado = mysqli_query ($this->conexao, $query);
		$categoria_buscada = mysqli_fetch_assoc($resultado);
		$categoria = new Categoria();
		
		$categoria->setId($categoria_buscada['id']);
		$categoria->setNome($categoria_buscada['nome']);
		
		return $categoria;
		
	}
}






?>