<?php


class RealizadorDeInvestimentos{
	private $valorInv;
	private $tipoInv;

	public function __construct($valor, $tipo){
		$this->valorInv = $valor;
		$this->tipoInv = $tipo;
	}

	public function getValorInv(){
		return $this->valorInv;
	}
	public function getTipoInv(){
		return $this->tipoInv;
	}

	public static function calculaGanhos($valorInv, TipoInvestimento $tipoInv){
			return $tipoInv->calculaGanhos($valorInv);

	}

}