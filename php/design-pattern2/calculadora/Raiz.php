<?php
class Raiz implements Expressao{
	private $valor;

	function __construct(Expressao $valor)
	{
		$this->valor = $valor;
		
	}

	public function avalia()
	{
		$arg = $this->valor->avalia();
		
		return (int) sqrt($arg);

	}

	public function aceita(Impressora $impressora){
		$impressora->visitaRaiz($this);
	}
}