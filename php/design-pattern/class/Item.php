<?php  

class Item{
	private $nome;
	private $valor;
	private $quantidade;

	public function __construct($novoNome, $novoPreco, $quantidade){
		$this->nome = $novoNome;
		$this->valor = $novoPreco;
		$this->quantidade = $quantidade;

	}

	public function getNome(){
		return $this->nome;
	}

	public function setNome($novoNome){
		$this->nome = $novoNome;
	}

	public function getValor(){
		return $this->valor;
	}

	public function setValor($novoValor){
		$this->valor = $novoValor;
	}

	public function getQuantidade(){
		return $this->quantidade;
	}

}

?>