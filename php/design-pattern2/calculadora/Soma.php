<?php

class Soma implements Expressao{
	private $esquerdo;
	private $direito;

	function __construct(Expressao $ladoEsquerdo, Expressao $ladoDireito)
	{
		$this->esquerdo = $ladoEsquerdo;
		$this->direito = $ladoDireito;
	}

	public function avalia()
	{
		$valorEsquerdo = $this->esquerdo->avalia();
		$valorDireito = $this->direito->avalia();
		return $valorEsquerdo + $valorDireito;
	}

	public function getEsquerda(){
		return $this->esquerdo;
	}

	public function getDireita(){
		return $this->direito;
	}

	public function aceita(Impressora $impressora){
		$impressora->visitaSoma($this);
	}
}