<?php

class Multiplicador implements AcoesAoGerarNota{
	private $multiplicador;

	public function __construct($mult){
		$this->multiplicador = $mult;
	}

	public function executa(NotaFiscal $nf){
		
		echo "<br>".$nf->getValorBruto() * $this->multiplicador . "<br>";

	}
}