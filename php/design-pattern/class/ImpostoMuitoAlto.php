<?php

require_once "TemplateDeImpostoCondicional.php";

class ImpostoMuitoAlto extends TemplateDeImpostoCondicional{

	public function __construct($imposto = null){
			parent::__construct($imposto);
	}

	public function deveUsarOMaximo(Orcamento $orcamento){
		return true;
	}

	public function taxacaoMinima(Orcamento $orcamento){
		
	}

	public function taxacaoMaxima(Orcamento $orcamento){
		return $orcamento->getValor()*0.2;
	}
}