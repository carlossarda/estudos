<?php 


class ICCC extends TemplateDeImpostoCondicional{

	public function __construct(Imposto $imposto = null){
			parent::__construct($imposto);
	}

	public function deveUsarOMaximo(Orcamento $orcamento){
		return $orcamento->getValor() > 500;
	}

	public function taxacaoMinima(Orcamento $orcamento){
		return $orcamento->getValor()*0.07;
	}

	public function taxacaoMaxima(Orcamento $orcamento){
		return $orcamento->getValor()*0.05;
	}

}
?>