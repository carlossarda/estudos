<?php

	
abstract class Produto{
	
	private $id;
	private $nome;
	private $preco;
	private $descricao;
	private $categoria;
	// private $isbn;
	// private $tipoProduto;
	private $usado;
	
	function __construct($nome, $preco, $descricao, Categoria $categoria, $usado){
		$this->nome = $nome;
		$this->preco = $preco;
		$this->descricao = $descricao;
		$this->categoria = $categoria;
		$this->usado = $usado;
	}
	
	
	public function getId(){
		return $this->id;
	}
	
	public function setId($id){
		if($id>0){
			$this->id = $id;
		}
	}
	
	public function getNome(){
		return $this->nome;
	}
	
/*	public function setNome($nome){
		$this->nome = $nome;
	}*/
	
	public function getPreco(){
		return $this->preco;
	}
	
/*	public function setPreco($preco){
		if($preco>0){
			$this->preco = $preco;
		}
	}*/
	
	public function getDescricao(){
		return $this->descricao;
	}
	
/*	public function setDescricao($descricao){
		$this->descricao = $descricao;
	}*/
	
	public function getCategoria(){
		return $this->categoria;
	}
	
/*	public function setCategoria($categoria){
		$this->categoria = $categoria;
	}*/
	
	// public function getIsbn(){
	// 	return $this->isbn;
	// }
	
	// public function setIsbn($isbn){
	// 	$this->isbn = $isbn;
		
	// }

	// public function getTipoProduto(){
	// 	return $this->tipoProduto;
	// }
	
	// public function setTipoProduto($tipoProduto){
	// 	$this->tipoProduto = $tipoProduto;
		
	// }

	public function getUsado(){
		return $this->usado;
	}
	
	public function setUsado($usado){
		$this->usado = $usado;
		
	}
	
	public function precoComDesconto($desconto=0.1){
		if($desconto>0 && $desconto<=0.5){
			$this->preco -= ($this->preco * $desconto);
		}
		return round($this->preco, 2) ;
	}

	// public function isLivro(){
	// 	return $this->tipoProduto == "Livro";

	// }
	public function temIsbn(){
		return $this instanceof Livro;

	}

	public function temTaxaImpressao(){
		return $this instanceof LivroFisico;

	}
	public function temWaterMark(){
		return $this instanceof Ebook;

	}
	

	public function calculaImposto(){
		return round(($this->preco * 0.195),2);
	}

	abstract function atualizaBaseadoEm($params);
	//{
	// 	if ($this->temIsbn()){
	// 		$this->setIsbn($params['isbn']);
	// 	}

	// 	if ($this->temTaxaImpressao()){
	// 		$this->setTaxaImpressao($params['taxaImpressao']);
	// 	}

	// 	if ($this->temWaterMark()){
	// 		$this->setWaterMark($params['waterMark']);
	// 	}
	// }
		
}



?>