<?php


class ItemDaNota{
	private $itens;
	private $descricao;
	private $valor;

	public function __construct($descricao){
		$this->descricao = $descricao;
		$this->valor = 0;
		$this->itens = array();
	}

	public function getItens(){
		return $this->itens;
	}

	public function criaLista(Item $item){
		$this->itens[] = $item;
		$this->valor += $item->getValor() * $item->getQuantidade();
	}

	public function getDescricao(){
		return $this->descricao;
	}

	public function getValor(){
		return $this->valor;
	}



}