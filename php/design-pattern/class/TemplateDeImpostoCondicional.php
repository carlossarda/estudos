<?php

require_once "Imposto.php";
require_once "Orcamento.php";

abstract class TemplateDeImpostoCondicional extends Imposto{
	public function __construct(Imposto $imposto = null){
			parent::__construct($imposto);
	}

	public function calcula(Orcamento $orcamento){
		if($this->deveUsarOMaximo($orcamento)){
			return $this->taxacaoMaxima($orcamento) + $this->calculaOutroImposto($orcamento);
		}else{
			return $this->taxacaoMinima($orcamento) + $this->calculaOutroImposto($orcamento);
		}
	}

	public abstract function deveUsarOMaximo(Orcamento $orcamento);

	public abstract function taxacaoMinima(Orcamento $orcamento);

	public abstract function taxacaoMaxima(Orcamento $orcamento);
}

